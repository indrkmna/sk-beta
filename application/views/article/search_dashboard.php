	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar" style="margin-bottom:20px;">
			<div class="row">
				<div class="col-md-12">
					<h2>Artikel </h2>

					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="<?php echo base_url();?>">Home</a></li>
							<li><a href="<?php echo base_url('dashboard');?>">Dashboard</a></li>
							<li>Daftar Artikel</li> 
						</ul>
					</nav>
				</div>
				<div class="col-fs-6 margin-top-20">
					<div class="input-with-icon">
					<form method="post" action="<?php echo base_url('article/dashboard_search');?>">					
						<i class="sl sl-icon-magnifier"></i>
						<input type="text" name="cari" placeholder="Temukan artikel disini..." value="">
						<input type="hidden" name="q">						
					</form>
					</div>
			<p style="margin-left: 10px;"><i class="sl sl-icon-magnifier"></i> Hasil Pencarian "<?php echo $this->session->userdata('sess_ringkasan');?>"</p>	

				</div>			
			</div>
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
		</div>

		<div class="row">
			
			<!-- Listings -->
			<div class="col-lg-12 col-md-12">
			
				<div class="dashboard-list-box margin-top-0">
					<h4>Daftar Artikel            
					<a href="<?php echo base_url('article/create');?>" class="button margin-top-5" style="top:-10px; float:right; border-radius: 6px; background: blue;" /><div align="center"> <i class="fa fa-plus"></i> Buat Artikel </div></a></h4>	
					<ul>				
					<?php 
				      if (count($articles) > 0) {
						foreach ($articles as $article){ 
					?>
						<li>
							<div class="list-box-listing">
								<div class="list-box-listing-img">
								<a href="<?php echo base_url('article/read/'.$article['slug_article']);?>">
									<img src="<?php echo base_url('assets/upload/image/'.$article['cover_article']);?>" alt="">
								</a>
								</div>
								<div class="list-box-listing-content">
									<div class="inner">
										<h3><a href="<?php echo base_url('article/read/'.$article['slug_article']);?>">
										<?php echo $article['title'];?></a></h3>
										<span><i class="fa fa-tag"></i> <?php echo $article['category_name'];?> - <i class="fa fa-calendar"></i> <?php echo date('d/m/Y', strtotime($article['created'])); ?></span> -
										<?php if($article['status_article'] == 'publish'){ ?>
										<a class="button margin-top-5" style="top:8px; padding:3px 5px 3px 5px; border-radius: 4px; background: #0fcd2f;"><?php echo $article['status_article'];?></a>
										<?php }else{ ?>
										<a class="button margin-top-5" style="top:8px; padding:3px 5px 3px 5px; border-radius: 4px; background: #f91942;"><?php echo $article['status_article'];?></a>
										<?php } ?>										
									</div>
								</div>
							</div>
							<div class="buttons-to-right">
								<a href="<?php echo base_url('article/edit/'.$article['article_id']);?>" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
								<a href="<?php echo base_url('article/delete/'.$article['article_id']);?>" class="button gray" onClick="return confirm('Apa anda yakin?')"><i class="sl sl-icon-close"></i> Delete</a>
							</div>
						</li>
					<?php }}else{
							echo '<div class="padding" style="padding:20px;">Data tidak ditemukan</div>';
						} ?>
					</ul>
				</div>
				<div class="pagination-container margin-top-30 margin-bottom-0">
					<nav class="pagination">
						<ul>
							<?php if(isset($pagin)) { echo $pagin; }  ?>   
						</ul>
					</nav>
				</div>
			</div>
