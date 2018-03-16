<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2><?php echo $title?></h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="<?php echo base_url()?>">Home</a></li>
							<li><a href="<?php echo base_url('dashboard')?>">Dashboard</a></li>
							<li><?php echo $title?></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
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


				<form action="<?php echo base_url('file/add_file/'.$kode['upload_id'])?>" method="post" enctype="multipart/form-data">
				<input type="hidden" name="upload_id" value="<?php echo $kode['upload_id'];?>">
					<!-- Section -->
					<div class="add-listing-section margin-top-45">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i>FORM INPUT FILE</h3>
						</div>

						<!-- Title -->
						<div class="row with-forms">
							<div class="col-md-6">
						       <label>Nama File</label>
						      <input type="text" name="file_name" placeholder="Masukan nama file" class="form-control">
							</div>							
							<div class="col-md-6">
						       <label>Upload File (<b>Max File Upload 5MB</b>)</label>
						      <input type="file" name="file_url" class="form-control" id="file">
							</div>
							<div class="col-md-12">
						       <label>Deskripsi File</label>
						      <textarea name="file_description" class="form-control"></textarea>
							</div>							
						</div>
					</div>
					<!-- Section / End -->

					<button type="submit" name="submit" class="button preview">Simpan <i class="fa fa-arrow-circle-right"></i></button>
				</form>
				</div>
			</div>

			<!-- Copyrights -->
			<div class="col-md-12">
				<div class="copyrights">© <?php echo date('Y').' '.$site['nameweb'];?>.</div>
			</div>


	</div>
	<!-- Content / End -->
