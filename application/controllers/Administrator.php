<?php 
	class Administrator extends CI_Controller{

		

		public function view($page = 'index'){
			if($this->session->userdata('login')) {
    			redirect('administrator/users/users');
   			}

			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
				show_404();
			}
			$data['title'] = ucfirst($page);
			$this->load->view('administrator/header-script');
			//$this->load->view('administrator/header');
			//$this->load->view('administrator/index');
			$this->load->view('administrator/'.$page, $data);
			$this->load->view('administrator/footer');
		}

		

		public function home($page = 'home'){
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
				show_404();
			}
			$data['title'] = ucfirst($page);
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('administrator/'.$page, $data);
			$this->load->view('administrator/footer');
		}

		public function dashboard($page = 'dashboard'){
		   if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
		   $data['title'] = ucfirst($page);
		   $this->load->view('administrator/header-script');
		   $this->load->view('administrator/header');
		   $this->load->view('administrator/header-bottom');
		   $this->load->view('administrator/'.$page, $data);
		   $this->load->view('administrator/footer');
		}

	 

	  // Log in Admin
		public function adminLogin(){
			$data['title'] = 'Admin Login';

			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() === FALSE){
				//$data['title'] = ucfirst($page);
				$this->session->unset_userdata('success');
				$this->session->unset_userdata('danger');
				$this->load->view('administrator/header-script');
				//$this->load->view('administrator/header');
				//$this->load->view('administrator/header-bottom');
				$this->load->view('administrator/index', $data);
				$this->load->view('administrator/footer');
			}else{
				// get email and Encrypt Password
				$email = $this->input->post('email');
				$encrypt_password = md5($this->input->post('password'));

				$user_id = $this->Administrator_Model->adminLogin($email, $encrypt_password);
				$sitelogo = $this->Administrator_Model->update_siteconfiguration(1);

				if ($user_id) {
					//Create Session
					$user_data = array(
								'user_id' => $user_id->id,
				 				'name' => $user_id->name,
				 				'email' => $user_id->email,
				 				'login' => true,
				 				'role' => $user_id->role_id,
				 				'image' => $user_id->image,
				 				'site_logo' => $sitelogo['logo_img']
				 	);
					 $this->session->unset_userdata('danger');

				 	$this->session->set_userdata($user_data);

					//Set Message
					$this->session->set_flashdata('success', 'You are logged in.');
					redirect('administrator/index');
				}else{
					$this->session->unset_userdata('success');
					$this->session->set_flashdata('danger', 'Login Credential in invalid!');
					redirect('administrator/index');
				}
				
			}
		}

				// log admin out
		public function logout(){
			// unset user data
			$this->session->unset_userdata('login');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('role_id');
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('image');
			$this->session->unset_userdata('site_logo');

			//Set Message
			$this->session->set_flashdata('success', 'You are logged out.');
			redirect(base_url().'administrator/index');
		}


		public function add_user($page = 'add-user')
		{
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}

			$data['title'] = 'Create User';


			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');

			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/'.$page, $data);
		  		 $this->load->view('administrator/footer');
			}else{
				//Upload Image
				$config['upload_path'] = './assets/images/users';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$errors =  array('error' => $this->upload->display_errors());
					$post_image = 'noimage.jpg';
				}else{
					$data =  array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}
				$password = md5('Test@123');
				$this->Administrator_Model->add_user($post_image,$password);

				//Set Message
				$this->session->set_flashdata('success', 'User has been created Successfull.');
				redirect('administrator/users');
			}
			
		}

		// Check Email exists
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'This email is already registered.');

			if ($this->User_Model->check_email_exists($email)) {
				return true;
			}else{
				return false;
			}
		}

		public function users($offset = 0)
		{
			// Pagination Config
			$config['base_url'] = base_url(). 'administrator/users/';
			$config['total_rows'] = $this->db->count_all('users');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link');

			// Init Pagination
			$this->pagination->initialize($config);

			$data['title'] = 'Latest Users';

			$data['users'] = $this->Administrator_Model->get_users(FALSE, $config['per_page'], $offset);

			 	$this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/users', $data);
		  		$this->load->view('administrator/footer');
		}




		
	}
	




