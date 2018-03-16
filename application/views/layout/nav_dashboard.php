<!-- Dashboard -->
<div id="dashboard">

	<!-- Navigation
	================================================== -->

	<!-- Responsive Navigation Trigger -->
	<a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>

	<div class="dashboard-nav">
		<div class="dashboard-nav-inner">

			<ul data-submenu-title="Umum">
				<li class="active"><a href="<?php echo base_url('dashboard');?>"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
			</ul>
			
			<ul data-submenu-title="Posting">
				<li><a><i class="sl sl-icon-layers"></i> Kode Saya</a>
					<ul>
						<li><a href="<?php echo base_url('explore/create')?>">Upload Kode</a></li>
						<li><a href="<?php echo base_url('explore/kodesaya?status=Publish')?>">Publish</a></li>
						<li><a href="<?php echo base_url('explore/kodesaya?status=Draf')?>">Draft</a></li>
					</ul>	
				</li>
				<li><a href="<?php echo base_url('review');?>"><i class="sl sl-icon-star"></i> Reviews</a></li>
				<li><a href="<?php echo base_url('questions');?>"><i class="sl sl-icon-question"></i> Tanya Kode</a></li>
				<li><a><i class="sl sl-icon-layers"></i> Artikel</a>
					<ul>
						<?php
							$user_id = $this->session->userdata('user_id');
							$user 	 = $this->users_model->detail($user_id);
						?>
						<li><a href="<?php echo base_url('article/dashboard');?>">Daftar Artikel</a></li>
						<li><a href="<?php echo base_url('article/create');?>">Buat Artikel</a></li>
					</ul>	
				</li>			</ul>	

			<ul data-submenu-title="Akun">
				<li><a href="<?php echo base_url('profile/'.$user['username']);?>"><i class="sl sl-icon-user"></i> Profil Saya</a></li>
				<li><a href="<?php echo base_url('auth/logout');?>"><i class="sl sl-icon-power"></i> Logout</a></li>
			</ul>
			
		</div>
	</div>
	<!-- Navigation / End -->
