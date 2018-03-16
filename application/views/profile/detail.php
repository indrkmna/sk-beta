<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<div class="user-profile-titlebar">
					<div class="user-profile-avatar">
						<?php if (!empty($user['photo'])){ ?>
						<img src="<?php echo base_url('assets/upload/image/'.$user['photo']);?>">						
						<?php }else{ ?>
						<img src="<?php echo base_url();?>assets/front/images/photo-default.png" alt="">	
						<?php } ?>
					</div>
					<div class="user-profile-name">
						<h2><?php  echo $user['username'];?></h2>
						<?php if (!empty($user['bio'])){ ?>
						<p>Status : <?php echo $user['bio'];}?> 						
					</div>
				</div> 

			</div>
		</div>
	</div>
</div>



<!-- Content
================================================== -->
<div class="container">
	<div class="row sticky-wrapper">


		<!-- Sidebar
		================================================== -->
		<div class="col-lg-4 col-md-4 margin-top-0">
				
			<!-- Verified Badge -->
			<div class="verified-badge with-tip" data-tip-content="Account has been verified and belongs to the person or organization represented.">
				<i class="sl sl-icon-user-following"></i> Verified Account
			</div>

			<!-- Contact -->
			<div class="boxed-widget margin-top-30 margin-bottom-50">
				<h3>Contact</h3>
				<ul class="listing-details-sidebar">
					<?php if (!empty($user['phone'])){ ?>				
					<li><i class="sl sl-icon-phone"></i><?php  echo $user['phone']?></li>
					<?php } ?>
					<li><i class="fa fa-envelope-o"></i><?php  echo $user['email']?></li>
				</ul>

				<ul class="listing-details-sidebar social-profiles">
					<?php if (!empty($user['url_facebook'])){ ?>								
					<li><a href="#" class="facebook-profile"><i class="fa fa-facebook-square"></i> Facebook</a></li>
					<?php } ?>
				</ul>

			</div>
			<!-- Contact / End-->

		</div>
		<!-- Sidebar / End -->


		<!-- Content
		================================================== -->
		<div class="col-lg-8 col-md-8 padding-left-30">

			<h3 class="margin-top-0 margin-bottom-40"><?php echo $user['username']?> Kode</h3>

			<!-- Listings Container -->
			<div class="row">
				<?php 
				if(!empty($kode)){
				foreach($kode as $kode){?>
				<!-- Listing Item -->
				<div class="col-lg-12 col-md-12">
					<div class="listing-item-container list-layout">
						<a href="<?php echo base_url('explore/read/'.$kode['slug_upload'])?>" class="listing-item">
							
							<!-- Image -->
							<div class="listing-item-image">
								<?php 
									$limitSc 	= $this->mUpload->limitScreenshoot($kode['upload_id']);
									foreach ($limitSc as $limitSc){
								?>
								<img src="<?php echo base_url('assets/upload/image/'.$limitSc['nama_foto'])?>" alt="">
								<?php }?>
								<span class="tag"><?php echo $kode['categories_name']?></span>
							</div>
							
							<!-- Content -->
							<div class="listing-item-content">

								<div class="listing-item-inner">
								<h3><?php echo $kode['title'];?></h3>
								<?php 
								$vote 		= $this->mUpload->totalVote($kode['upload_id']);
								$rate 		= $this->mUpload->totalRate($kode['upload_id']);
								?>
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

								
								<div class="listing-item-details"><?php echo date('d F Y', strtotime($kode['date_post']))?></div>
							</div>
						</a>
					</div>
				</div>
				<!-- Listing Item / End -->
				<?php }}else{ ?>
				    <p style="padding: 20px; text-align: center;">Belum ada data</p>
				<?php } ?>
			</div>
			<!-- Listings Container / End -->
            
            <h3 class="margin-top-0 margin-bottom-40"><?php echo $user['username']?> Articles</h3>
            <div class="row">
				
			<?php 
			if(!empty($article)){
			$i=0; foreach ($article as $articles){?>
				<!-- Listing Item -->
				<div class="col-lg-12 col-md-12">
					<div class="listing-item-container list-layout">
						<a href="<?php echo base_url('article/read/'.$articles['slug_article'])?>" class="listing-item">
							
							<!-- Image -->
							<div class="listing-item-image">
								<img src="<?php echo base_url('assets/upload/image/'.$articles['cover_article'])?>" alt="">
								<span class="tag"><?php echo $articles['category_name']?></span>
							</div>
							
							<!-- Content -->
							<div class="listing-item-content">

								<div class="listing-item-inner">
								<h3><?php echo $articles['title']?></h3>
							    <span>Posted By: <b><?php echo $articles['username']?></b></span>
                                
								
								</div>

								<div class="listing-item-details"><?php echo date('d F Y', strtotime($articles['date_post']))?></div>
							</div>
						</a>
					</div>
				</div>
				<!-- Listing Item / End -->
			
			<?php $i++;} ?>
				<?php }else{ ?>
				    <p style="padding: 20px; text-align: center;">Belum ada data</p>
				<?php } ?>
			</div>
				
			<!-- Reviews -->
			<div id="listing-reviews" class="listing-section">
				<h3 class="margin-top-60 margin-bottom-20">Reviews</h3>

				<div class="clearfix"></div>

				<!-- Reviews -->
				<section class="comments listing-reviews">

					<ul class="rates">
						
						<?php 
						if (!empty($review)){
						foreach($review as $review){?>
						<li class="lirates" style="display: none;">
							<div class="avatar">
							    <?php if (!empty($user['photo'])){ ?>
        						<img src="<?php echo base_url('assets/upload/image/'.$user['photo']);?>">						
        						<?php }else{ ?>
        						<img src="<?php echo base_url();?>assets/front/images/photo-default.png" alt="">	
        						<?php } ?>
							</div>
							<div class="comment-content"><div class="arrow-comment"></div>
								<div class="comment-by"><?php echo $review['first_name'].' '.$review['last_name'] ?> <div class="comment-by-listing">on <a href="<?php echo base_url('explore/read/'.$review['slug_upload'])?>"><?php echo $review['title']?></a></div> <span class="date"><?php echo date('d F Y', strtotime($review['post_date']))?></span>
									<div class="star-rating" data-rating="<?php echo $review['vote']?>"></div>
								</div>
								<p><?php echo $review['review']?></p>
								
							</div>
						</li>
						<?php } ?>
						<div class="clearfix"></div>
						<div id="loadMore" style="text-align: center;margin-top: 15px;">
							<a href="#" class="button"> Show More</a>
						</div>
						
						<?php }else{ ?>
				         <p style="padding: 20px; text-align: center;">Belum ada data</p>
			        	<?php } ?>
					</ul>
				</section>
				<!-- Pagination / End -->
			</div>


		</div>

	</div>
</div>

