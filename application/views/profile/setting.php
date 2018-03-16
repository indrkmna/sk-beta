        <style type="text/css">
            .alert-box { color:#555; border-radius:10px; font-family:Tahoma,Geneva,Arial,sans-serif;font-size:11px; padding:10px 10px 10px 36px; margin:10px; } 
            .alert-box span { font-weight:bold; text-transform:uppercase; } 
            .error { background:#ffecec; border:1px solid #f5aca6; } 
            .success { background:#e9ffd9; border:1px solid #a6ca8a; } 
            #msgbx_err{ display: none; } 
            #msgbx_success{ display: none; } 

        </style>
<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Pengaturan Akun</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="<?php echo base_url();?>">Home</a></li>
							<li><a href="<?php echo base_url('dashboard');?>">Dashboard</a></li>
							<li>Pengaturan</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row">
			<?php
			// Session 
			if($this->session->flashdata('sukses')) { 
				echo '<div class="notification success closeable">';
				echo $this->session->flashdata('sukses');
				echo '</div>';
			} 

			// File upload error
			if(isset($error)) {
				echo '<div class="notification error closeable">';
				echo $error;
				echo '</div>';
			}

			// Error
			echo validation_errors('<div class="notification error closeable">','</div>'); 
			?>		
			<!-- Profile -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4 class="gray">Detil Profil </h4>
					<form action="<?php echo base_url('setting');?>" method="post" enctype="multipart/form-data">
					<div class="dashboard-list-box-static">
						
						<!-- Avatar -->
						<div class="edit-profile-photo">
							<img src="<?php echo base_url('assets/upload/image/'.$user['photo']);?>" alt="">
							<div class="change-photo-btn">
								<div class="photoUpload">
								    <span><i class="fa fa-upload"></i> Upload Photo</span>
								    <input type="file" name="photo" class="upload" />
								</div>
							</div>
						</div>
						<!-- Details -->
						<div class="my-profile">
							<label>Nama Depan</label>
							<input value="<?php echo $user['first_name'];?>" name="first_name" placeholder="Nama Depan" type="text">

							<label>Nama Belakang</label>
							<input value="<?php echo $user['last_name'];?>" name="last_name" placeholder="Nama Belakang" type="text">

							<label>Jenis Kelamin</label>
							<select name="gender">
								<option value="l">Laki-Laki</option>
								<option value="p">Perempuan</option>
							</select>

							<label>Nomer Telepon</label>
							<input value="<?php echo $user['phone'];?>" name="phone" placeholder="Nomer Telepon" type="text">

							<label>Email</label>
							<input value="<?php echo $user['email'];?>" name="email" type="text">

							<label>Address</label>
							<textarea name="address" cols="30" rows="10"><?php echo $user['address'];?></textarea>							
							<label>BIO</label>
							<textarea name="bio" id="bio" cols="30" rows="10"><?php echo $user['bio'];?></textarea>

							<label><i class="fa fa-facebook-square"></i> Facebook</label>
							<input placeholder="https://www.facebook.com/" name="url_facebook" value="<?php echo $user['url_facebook'];?>" type="text">
						</div>
						<button class="button margin-top-15">Save Changes</button>
					</div>
					</form>
				</div>
			</div>

			<!-- Change Password -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4 class="gray">Informasi Login</h4>
					<div class="dashboard-list-box-static">
					<form action="<?php echo base_url('setting/login');?>" method="post">
						<!-- Change Password -->
						<div class="my-profile">
							<label class="margin-top-0">Username</label>	
							<input type="text" name="username" value="<?php echo $user['username'];?>" placeholder="Username" id="txtuser" >
			                <a href="javascript:void(0);" style="margin-left: 5px;" id="chk_avail">Cek Username</a>
			                <div id="msgbx_err" class="alert-box error"><span>Usernama sudah ada</div>
			                <div id="msgbx_success" class="alert-box success"><span>Username tersedia</span></div>
							<label>New Password</label>
							<input type="password" name="password">
							<label>Confirm New Password</label>
							<input type="password" name="confirm_password">
							<button class="button margin-top-15">Change Password</button>
						</div>
					</form>
					</div>
				</div>
			</div>
			<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>        
			<script>
			    $(function() {
			        $('#chk_avail').click(function() {
			            var name = $('#txtuser').val();
			            $.post('<?php echo base_url(); ?>setting/check_user', {username: name}, function(d) {
			                if (d == 1)
			                {
			                    $('#msgbx_success').css('display', 'none');
			                    $('#msgbx_err').css('display', 'block');
			                }
			                else
			                {
			                    $('#msgbx_err').css('display', 'none');
			                    $('#msgbx_success').css('display', 'block');
			                }
			            });
			        });
			    });
			</script>			