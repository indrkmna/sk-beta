<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
<header id="header-container">

	<!-- Header -->
	<div id="header">
		<div class="container">
			
			<!-- Left Side Content -->
			<div class="left-side">
				
				<!-- Logo -->
				<div id="logo" style="margin-right: 39px;">
					<a href="<?php echo base_url();?>"><img src="<?php echo base_url('assets/upload/image/'.$site['logo']);?>" alt="" style="transform: none; margin-top:-2px; max-height:34px;"></a>
				</div>

				<!-- Mobile Navigation -->
				<div class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>


				<!-- Main Navigation -->
				<nav id="navigation" class="style-1">
					<ul id="responsive">						
					<li><a href="<?php echo base_url();?>"><i class="fa fa-home"></i> Home</a></li>
					<li><a href="<?php echo base_url();?>explore"><i class="fa fa-rocket"></i> Jelajahi Kode</a></li>
					<li><a href="<?php echo base_url();?>questions"><i class="fa fa-question"></i> Tanya Kode</a></li>
					<li><a href="<?php echo base_url();?>article"><i class="fa fa-newspaper-o"></i> Artikel</a></li>
					</ul>
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->
				
			</div>
			<!-- Left Side Content / End -->


			<!-- Right Side Content / End -->
			<div class="right-side">
				<div class="header-widget">
					<?php 
						$logged = $this->session->userdata('user_id'); 
						$user 	= $this->users_model->detail($logged);
							if ($user == FALSE) {							
					?>
					<a href="#sign-in-dialog" class="sign-in popup-with-zoom-anim"><i class="sl sl-icon-login"></i> Login</a>
					<?php }else{ ?>
					<!-- User Menu -->
					<div class="user-menu">
						<div class="user-name">
						<span>						
						<?php if (!empty($user['photo'])){ ?>
						<img src="<?php echo base_url('assets/upload/image/'.$user['photo']);?>" style="height: 100%;">						
						<?php }else{ ?>
						<img src="<?php echo base_url();?>assets/front/images/photo-default.png" alt="">	
						<?php } ?></span>
						<?php echo $user['username'];?></div>
				
						<ul>
							<li><a href="<?php echo base_url('setting');?>"><i class="sl sl-icon-settings"></i> Pengaturan</a></li>
							<li><a href="<?php echo base_url('dashboard');?>"><i class="sl sl-icon-envelope-open"></i> Dashboard</a></li>
							<li><a href="<?php echo base_url('login/logout');?>"><i class="sl sl-icon-power"></i> Logout</a></li>
						</ul>
					</div>
					<?php } ?>
					<a href="<?php echo base_url('explore/create')?>" class="button border with-icon">Upload Kode <i class="sl sl-icon-plus"></i></a>
				</div>
			</div>
			<!-- Right Side Content / End -->

			<!-- Sign In Popup -->
			<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">

				<div class="small-dialog-header">
					<h3>Login ke <?php echo $site['nameweb'];?></h3>
				</div>

				<!--Tabs -->
				<div class="sign-in-form style-1">


					<div class="tabs-container alt">

						<!-- Login -->
							<form method="post" action="<?php echo base_url('login');?>" class="login">

								<p class="form-row form-row-wide">
									<label for="username">Username:
										<i class="im im-icon-Male"></i>
										<input type="text" class="input-text" name="username" id="username" value="" />
									</label>
								</p>

								<p class="form-row form-row-wide">
									<label for="password">Password:
										<i class="im im-icon-Lock-2"></i>
										<input class="input-text" type="password" name="password" id="password"/>
									</label>
									<div class="container" style="width: 100%;">
										<div class="left-side">
											<span class="lost_password">
												<a href="#" style="font-size: 13px">Lupa Password?</a>
											</span>
										</div>
										<div class="right-side">
											<span class="lost_password">
												<a href="<?php echo base_url('register');?>" style="font-size: 13px">Belum memiliki akun?</a>
											</span>
										</div>				
									</div>					
								</p>

								<div class="form-row">
                                <input type="submit" class="button border margin-top-5" name="login" value="Login" style="width:100%; border-radius: 6px; margin-bottom:10px " />	
                                <!--<a href="<?php echo $authUrl; ?>" class="button margin-top-5" style="width:100%; border-radius: 6px; background: blue;" /><div align="center"> <i class="fa fa-facebook"></i> Login dengan Facebook </div></a> -->
                                </div>							
							</form>
					</div>
				</div>
			</div>
			<!-- Sign In Popup / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->