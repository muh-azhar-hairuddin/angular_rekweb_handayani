	<!-- <div class="pre-loader"></div> -->
	<div class="header clearfix">
		<div class="header-right">
			<div class="brand-logo">
				<a href="index.php">
					<img src="<?php echo base_url();?>assets/images/logo.png" alt="" class="mobile-logo">
				</a>
			</div>
			<div class="menu-icon">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon"><i class="fa fa-user-o"></i></span>
						<span class="user-name"><?php echo $this->session->userdata('nama_lengkap') ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="<?php echo base_url(); ?>logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
					</div>
				</div>
			</div>
		</div>
	</div>
