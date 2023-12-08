<style type="text/css">
    .alert.alert-warning.icons-alert {
    text-align: left;
    }
    .alert.alert-success.icons-alert {
    text-align: left;
    }
    .alert.alert-danger.icons-alert {
    text-align: left;
    }
	.bg-primary{
		background-color: #002f5f !important;
	}
	.btn-primary{
		background-color: #002f5f !important;
	}
	
</style>
            <section class="login p-fixed d-flex text-center bg-primary">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
	
                    <!-- Authentication card start -->
                    <div class="login-card card-block auth-body">

                           
                            <div class="auth-box">

                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-left txt-primary">Register</h3>
                                    </div>
                                    
                                        <div class="col-md-12" style="margin-bottom: -40px;">
                                        	<?php if(validation_errors() != null): ?>
                                              <?php echo '<div class="alert alert-warning icons-alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <i class="icofont icofont-close-line-circled"></i>
                                                        </button>
                                                        <p><strong>Alert! &nbsp;&nbsp;</strong>'.validation_errors().'</p></div>'; ?>
                                            <?php endif; ?>
                                        </div>
                                </div>
                                <hr/>
                                <?php echo form_open_multipart('administrator/register_submit'); ?>
								<div class="form-group text-center">
									<div class="input-group">
										<input type="text" class="form-control" name="name" placeholder="Name">
									</div>
									<div class="input-group">
										<input type="text" name="email" class="form-control" placeholder="Email">
									</div>
									<div class="input-group">
										<input type="password" class="form-control" name="password" placeholder="Password">
									</div>
									<div class="input-group">
										<input type="password" class="form-control" name="password2" placeholder="Confirm Password">
									</div>
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
								<div class="row">
									<div class=" col-md-12">
                                        <a href="<?php echo base_url(); ?>/" class="text-right f-w-600 text-inverse">Already a member ?</a>
                                    </div>
                                </div>
								<?php echo form_close() ?>
                                <hr/>
                            </div>
                       
                        <!-- end of form -->
                    </div>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        
        <!-- end of container-fluid -->
    </section>    
    
   