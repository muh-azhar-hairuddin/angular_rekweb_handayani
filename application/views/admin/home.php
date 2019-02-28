<!DOCTYPE html>
<html>
<head>
  <!-- Basic Page Info -->
  <meta charset="utf-8">
  <title>ADMIN</title>

  <!-- Site favicon -->
  <!-- <link rel="shortcut icon" href="images/favicon.ico"> -->
  <!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

  <!-- Mobile Specific Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  
  <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/login-img.png" type="image/x-icon" />
  <!-- CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/css/style.min.css">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/plugins/datatables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/plugins/datatables/media/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/plugins/datatables/media/css/responsive.dataTables.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css">

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-119386393-1');
  </script>
</head>
<body>
	<?php $this->load->view('admin/header'); ?>
  <?php $this->load->view('admin/sidebar'); ?>
	<div class="main-container">

    <div id="loading"></div>
    <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
      <div id="content"></div>
      <?php $this->load->view('admin/footer'); ?>
    </div>

	</div>
  <?php $this->load->view('admin/script'); ?>
  <script>
  $('document').ready(function(){
    loadPage('admin_data_kohort')
  });
  </script>
</body>
</html>