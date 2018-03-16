<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Reviews</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="<?php echo base_url()?>">Home</a></li>
							<li><a href="<?php echo base_url('dhasboard')?>">Dashboard</a></li>
							<li>Reviews</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row">
			
			<!-- Listings -->
			<div class="col-lg-6 col-md-12">

				<div class="dashboard-list-box margin-top-0">

					<h4>Visitor Reviews</h4> 

					<!-- Reply to review popup -->
					<div id="small-dialog" class="zoom-anim-dialog mfp-hide">
						<div class="small-dialog-header">
							<h3>Reply to review</h3>
						</div>
						<div class="message-reply margin-top-0">
							<textarea cols="40" rows="3"></textarea>
							<button class="button">Reply</button>
						</div>
					</div>

					<ul class="rates">
						
						<?php 
						if (!empty($review)){
						foreach($review as $review){
						
						?>
						
						<li class="lirates" style="display: none;">
							<div class="comments listing-reviews">
								<ul>
									<li>
										<div class="avatar">
										    <?php if (!empty($user['photo'])){ ?>
                						<img src="<?php echo base_url('assets/upload/image/'.$user['photo']);?>">						
                						<?php }else{ ?>
                						<img src="<?php echo base_url();?>assets/front/images/photo-default.png" alt="">	
                						<?php } ?>
										</div>
										<div class="comment-content"><div class="arrow-comment"></div>
											<div class="comment-by"><?php echo $review['first_name'].' '.$review['last_name']?>
											<div class="comment-by-listing">on <a href="<?php echo base_url('explore/read/'.$review['slug_upload'])?>"><?php echo $review['title']?></a></div>
											<span class="date"><?php echo date('d F Y', strtotime($review['post_date']))?></span>
												<div class="star-rating" data-rating="<?php echo $review['vote']?>"></div>
											</div>
											<p><?php echo $review['review']?></p>
										</div>
									</li>
									
								</ul>
							</div>
						</li>
						<?php } 
						
						?>
						<div id="loadMore" style="text-align: center;margin-top: 15px;">
							<a href="#" class="button"> Show More</a>
						</div>
						<?php }else{ ?>
						    <p style="padding: 20px; text-align: center;">Data tidak ada</p>
						<?php } ?> 
					</ul>
				</div>

			</div>

			<!-- Listings -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4>Your Reviews</h4>
					<ul class="yrates">
					<?php 
					if (!empty($yReview)){
					foreach($yReview as $review){?>
						<li class="lirates" style="display: none;">
							<div class="comments listing-reviews">
								<ul>
									<li>
										<div class="avatar">
										    <?php if (!empty($user['photo'])){ ?>
                						<img src="<?php echo base_url('assets/upload/image/'.$user['photo']);?>">						
                						<?php }else{ ?>
                						<img src="<?php echo base_url();?>assets/front/images/photo-default.png" alt="">	
                						<?php } ?>
										</div>
										
										<div class="comment-content"><div class="arrow-comment"></div>
											<div class="comment-by"><?php echo $review['first_name'].' '.$review['last_name']?>
											<div class="comment-by-listing">on <a href="<?php echo base_url('explore/read/'.$review['slug_upload'])?>"><?php echo $review['title']?></a></div>
											<span class="date"><?php echo date('d F Y', strtotime($review['post_date']))?></span>
												<div class="star-rating" data-rating="<?php echo $review['vote']?>"></div>
											</div>
											<p><?php echo $review['review']?></p>
											<a href="" class="rate-review"><i class="sl sl-icon-note"></i> Edit</a>
										</div>

									</li>
								</ul>
							</div>
						</li>
					<?php } ?>
						<div id="yloadMore" style="text-align: center;margin-top: 15px;">
							<a href="#" class="button"> Show More</a>
						</div>
						<?php }else{ ?>
						    <p style="padding: 20px; text-align: center;">Data tidak ada</p>
						<?php } ?> 
					</ul>
				</div>
			</div>


			<!-- Copyrights -->
			<div class="col-md-12">
				<div class="copyrights">© 2017 Listeo. All Rights Reserved.</div>
			</div>
		</div>

	</div>
	<!-- Content / End -->
