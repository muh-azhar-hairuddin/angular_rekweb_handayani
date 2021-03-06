	<div class="left-side-bar">
		<div class="brand-logo">
			<div class="profile-photo mt-3">
				<img src="<?php echo base_url(); ?>assets/images/login-img.png" alt="" class="avatar-photo">
				<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-body pd-5">
								<div class="img-container">
									<img id="image" src="vendors/images/photo2.jpg" alt="Picture">
								</div>
							</div>
							<div class="modal-footer">
								<input type="submit" value="Update" class="btn btn-primary">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<h5 class="text-center"><?php echo $this->session->userdata('nama_lengkap') ?></h5>
			<p class="text-center text-muted">Administrator</p>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li>
						<a href="#" onclick="loadPage('admin_data_pasien');" class="dropdown-toggle no-arrow">
							<span class="fa fa-users"></span><span class="mtext">Data Pasien</span>
						</a>
					</li>
					<li>
						<a href="#" onclick="loadPage('admin_data_kohort');" class="dropdown-toggle no-arrow">
							<span class="fa fa-file"></span><span class="mtext">Pengisian Kohort</span>
						</a>
					</li>
					<li>
						<a href="#" onclick="loadPage('admin_data_admin');" class="dropdown-toggle no-arrow">
							<span class="fa fa-user"></span><span class="mtext">Data Admin</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-print"></span><span class="mtext">Laporan</span>
						</a>
						<ul class="submenu">
							<li><a href="#" onclick="loadPage('admin_lap_kohort_ibu_hamil');">Kohort Ibu Hamil</a></li>
							<li><a href="#" onclick="loadPage('admin_lap_kohort_persalinan');">Kohort Persalinan</a></li>
							<li><a href="#" onclick="loadPage('admin_lap_kohort_nifas');">Kohort Nifas</a></li>
							<li><a href="#" onclick="loadPage('admin_lap_kohort_bayi');">Kohort Bayi</a></li>
						</ul>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>logout" class="dropdown-toggle no-arrow">
							<span class="fa fa-sign-out"></span><span class="mtext">Logout</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
