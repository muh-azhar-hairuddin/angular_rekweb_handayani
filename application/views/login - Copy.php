<!DOCTYPE html>
<html>
<head>
  <!-- Basic Page Info -->
  <meta charset="utf-8">
  <title>ADMIN | LOGIN</title>

  <!-- Site favicon -->
  <!-- <link rel="shortcut icon" href="images/favicon.ico"> -->
  <!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

  <!-- Mobile Specific Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/css/style.css">

  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-119386393-1');
  </script>
</head>
<body>
	<div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
		<div class="login-box bg-white box-shadow pd-30 border-radius-5">
			<img src="<?php echo base_url();?>assets/images/login-img.png" alt="login" class="login-img">
			<h2 class="text-center mb-30">Rekam Medis</h2>
			<?php echo form_open('cek_login'); ?>
				<div class="input-group custom input-group-lg">
					<input type="text" class="form-control" placeholder="Username" name="username"  value="<?php echo set_value('username');?>"/> <?php echo form_error('username');?>
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
					</div>
				</div>
				<div class="input-group custom input-group-lg">
					<input type="password" class="form-control" placeholder="********" name="password"  value="<?php echo set_value('password');?>"/> <?php echo form_error('password');?>
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
					</div>
				</div>
        <?php
        if ($this->session->flashdata('f_error')){
          ?>
          <div class="clearfix" style="color:rgb(209, 18, 18);margin-top:-15px;margin-bottom: 15px;">
          <?php
            echo '*'.$this->session->flashdata('f_error');
          ?>
          </div>
        <?php } ?>
				<div class="row">
					<div class="col-sm-12">
						<div class="input-group">
								<input class="btn btn-outline-primary btn-lg btn-block" type="submit" value="Sign In">
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<script src="<?php echo base_url();?>assets/vendors/js/script.js"></script>
</body>
</html>
