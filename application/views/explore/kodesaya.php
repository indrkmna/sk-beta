<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Kode Saya</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="<?php echo base_url()?>">Home</a></li>
							<li><a href="<?php echo base_url('dashboard')?>">Dashboard</a></li>
							<li>Kode Saya</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row">
			
			<!-- Listings -->
			<div class="col-lg-12 col-md-12">
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
				<div class="dashboard-list-box margin-top-0">
					<h4>Daftar Kode</h4>
					<ul>
						<?php foreach($explore as $explore){?>
						<li>
							<div class="list-box-listing">
								<div class="list-box-listing-img"><a href="#">
								<?php 
									$limitSc 	= $this->mUpload->limitScreenshoot($explore['upload_id']);
									foreach ($limitSc as $limitSc){
								?>
								<img src="<?php echo base_url('assets/upload/image/'.$limitSc['nama_foto'])?>" alt="">
								<?php }?>
								</a></div>
								<?php 
								$vote 		= $this->mUpload->totalVote($explore['upload_id']);
								$rate 		= $this->mUpload->totalRate($explore['upload_id']);
								?>
								<div class="list-box-listing-content">
									<div class="inner">
										<h3><?php echo $explore['title']?></h3>
										<?php if(!empty($vote || $rate)){?>
										<div class="star-rating" data-rating="<?php echo $vote/$rate?>">
											<div class="rating-counter">(<?php echo $rate?> reviews)</div>
										</div>
										<?php }else{?>
										<div class="star-rating">
											<div class="rating-counter">(<?php echo $rate?> Review)</div>
											<span class="star empty"></span>
											<span class="star empty"></span>
											<span class="star empty"></span>
											<span class="star empty"></span>
											<span class="star empty"></span>
										</div>
										<?php } ?>
									</div>
								</div>
							</div>
							<?php if($_GET['status']=='Publish'){ $status= '?status=Publish'; }else{$status='?status=Draf';}?>
							<div class="buttons-to-right">
								<a href="<?php echo base_url('file/add_file/'.$explore['upload_id'])?>" class="button gray"><i class="fa fa-cloud-upload"></i> Upload File</a>							
								<a href="<?php echo base_url('explore/edit/'.$explore['upload_id'])?>" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
								<a href="<?php echo base_url('explore/delete/'.$explore['upload_id'].$status)?>" class="button gray"><i class="sl sl-icon-close"></i> Delete</a>
							</div>
						</li>
						<?php } ?>

					</ul>
				</div>
			</div>


			<!-- Copyrights -->
			<div class="col-md-12">
				<div class="copyrights">© <?php echo date('Y').' '.$site['nameweb'];?>.</div>
			</div>
		</div>

	</div>
	<!-- Content / End -->
