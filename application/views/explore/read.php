<?php
// set timezone
//	date_default_timezone_set("Asia/Jakarta");

// Time Ago
	function time_elapsed_string($datetime, $full = false) {
				 $today = time();    
                 $createdday= strtotime($datetime); 
                 $datediff = abs($today - $createdday);  
                 $difftext="";  
                 $years = floor($datediff / (365*60*60*24));  
                 $months = floor(($datediff - $years * 365*60*60*24) / (30*60*60*24));  
                 $days = floor(($datediff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));  
                 $hours= floor($datediff/3600);  
                 $minutes= floor($datediff/60);  
                 $seconds= floor($datediff);  
                 //year checker  
                 if($difftext=="")  
                 {  
                   if($years>1)  
                    $difftext=$years." tahun yang lalu";  
                   elseif($years==1)  
                    $difftext=$years." tahun yang lalu";  
                 }  
                 //month checker  
                 if($difftext=="")  
                 {  
                    if($months>1)  
                    $difftext=$months." bulan yang lalu";  
                    elseif($months==1)  
                    $difftext=$months." bulan yang lalu";  
                 }  
                 //month checker  
                 if($difftext=="")  
                 {  
                    if($days>1)  
                    $difftext=$days." hari yang lalu";  
                    elseif($days==1)  
                    $difftext=$days." hari yang lalu";  
                 }  
                 //hour checker  
                 if($difftext=="")  
                 {  
                    if($hours>1)  
                    $difftext=$hours." jam yang lalu";  
                    elseif($hours==1)  
                    $difftext=$hours." jam yang lalu";  
                 }  
                 //minutes checker  
                 if($difftext=="")  
                 {  
                    if($minutes>1)  
                    $difftext=$minutes." menit yang lalu";  
                    elseif($minutes==1)  
                    $difftext=$minutes." menit yang lalu";  
                 }  
                 //seconds checker  
                 if($difftext=="")  
                 {  
                    if($seconds>1)  
                    $difftext=$seconds." detik yang lalu";  
                    elseif($seconds==1)  
                    $difftext=$seconds." detik yang lalu";  
                 }  
                 return $difftext;  
	}
?>

<!-- Slider
================================================== -->
<div class="listing-slider mfp-gallery-container margin-bottom-0">
<?php foreach($listSc as $listSc){?>
	<a href="<?php echo base_url('assets/upload/image/'.$listSc['nama_foto'])?>" data-background-image="<?php echo base_url('assets/upload/image/'.$listSc['nama_foto'])?>" class="item mfp-gallery" title="<?php echo $listSc['nama_foto'] ?>"></a>
<?php } ?>
</div>


<!-- Content
================================================== -->
<div class="container">
	<div class="row sticky-wrapper">
		<div class="col-lg-8 col-md-8 padding-right-30">

			<!-- Titlebar -->
			<div id="titlebar" class="listing-titlebar">
				<div class="listing-titlebar-title">
					<h2><?php echo $explore['title']?> <span class="listing-tag"><?php echo $explore['categories_name']?></span></h2>
					<?php if(!empty($vote || $rate)){?>
					<div class="star-rating" data-rating="<?php echo $vote/$rate;?>">
					<div class="rating-counter"><a href="#listing-reviews">(<?php echo $rate?> Review)</a></div>
					</div>
					<?php }else{ ?>
					<div class="star-rating">
						<div class="rating-counter"><a href="#listing-reviews">(<?php echo $rate?> Review)</a></div>
						<span class="star empty"></span>
						<span class="star empty"></span>
						<span class="star empty"></span>
						<span class="star empty"></span>
						<span class="star empty"></span>
					</div>
					<?php } ?>
						
				</div>
			</div>

			<!-- Listing Nav -->
			<div class="listing-nav-container">
				<ul class="listing-nav">
					<li><a href="#listing-overview" class="active">Overview</a></li>
					<li><a href="#listing-reviews">Reviews</a></li>
					<li><a href="#add-review">Add Review</a></li>
				</ul>
			</div>
			
			<!-- Overview -->
			<div id="listing-overview" class="listing-section">
			<?php echo $explore['description']?>
			</div>
	
			<!-- Reviews -->
			<div id="listing-reviews" class="listing-section">
				<h3 class="listing-desc-headline margin-top-75 margin-bottom-20">Reviews <span>(<?php echo $rate?>)</span></h3>

				<div class="clearfix"></div>

				<!-- Reviews -->
				<section class="comments listing-reviews">

					<ul>
						<?php $i=0; foreach ($listRate as $listRate){?>
						<li style="display: none;">
							<div class="avatar">
							     <?php if (!empty($listRate['photo'])){ ?>
						<img src="<?php echo base_url('assets/upload/image/'.$listRate['photo']);?>">						
						<?php }else{ ?>
						<img src="<?php echo base_url();?>assets/front/images/photo-default.png" alt="">	
						<?php } ?>
							</div>
							<div class="comment-content"><div class="arrow-comment"></div>
								<div class="comment-by"><?php echo $listRate['username']?><span class="date"><?php echo date('d F Y', strtotime($listRate['post_date']))?></span>
									<div class="star-rating" data-rating="<?php echo $listRate['vote']?>"></div>
								</div>
								<p><?php echo $listRate['review']?></p>
							</div>
						</li>
						<?php $i++; } ?>
						<div class="clearfix"></div>
						<?php if($i==4){?>
						<div id="loadMore" style="text-align: center;margin-top: 15px;">
						<a href="#" class="button"> Show More</a>
						</div>
						<?php } ?>
					</ul>
				</section>

				<!-- Pagination -->
				
				<!-- Pagination / End -->
			</div>


			<!-- Add Review Box -->
			<div id="add-review" class="add-review-box">

				<!-- Add Review -->
				<h3 class="listing-desc-headline margin-bottom-20">Add Review</h3>
				
				<span class="leave-rating-title">Your rating for this listing</span>
				
				<form id="add-comment" class="add-comment">
				
				<div id="old_comment"></div>
				<!-- Rating / Upload Button -->
				<div class="row">
					<div class="col-md-6">
						<!-- Leave Rating -->
						<div class="clearfix"></div>
						<div class="leave-rating margin-bottom-30">
							<input class="rate" type="radio" name="rating" id="rating-1" value="5"/>
							<label for="rating-1" class="fa fa-star"></label>
							<input class="rate" type="radio" name="rating" id="rating-2" value="4"/>
							<label for="rating-2" class="fa fa-star"></label>
							<input class="rate" type="radio" name="rating" id="rating-3" value="3"/>
							<label for="rating-3" class="fa fa-star"></label>
							<input class="rate" type="radio" name="rating" id="rating-4" value="2"/>
							<label for="rating-4" class="fa fa-star"></label>
							<input class="rate" type="radio" name="rating" id="rating-5" value="1"/>
							<label for="rating-5" class="fa fa-star"></label>
						</div>
						<p id="u_rate"></p>
						<div class="clearfix"></div>
					</div>
				</div>
				
				<!-- Review Comment -->
					<fieldset>

						<div>
							<label>Review:</label>
							<textarea name="review" cols="40" rows="3" id="comment"></textarea>
							<input type="hidden" name="kode_id" value="<?php echo $explore['upload_id']?>"/>
						</div>

					</fieldset>

					<button id="btnrev" type="submit" name="submit" class="button">Submit Review</button>
					<div class="clearfix"></div>
				</form>

			</div>
			<!-- Add Review Box / End -->


		</div>


		<!-- Sidebar
		================================================== -->
		<div class="col-lg-4 col-md-4 margin-top-75 sticky">

				
			<!-- Verified Badge -->
			<div align="center">
				<a href="<?php echo base_url('download/file/'.$explore['upload_id']);?>" class="button medium"><i class="fa fa-download"></i> Download File</a>
			</div>
			<!-- Contact -->
			<div class="boxed-widget margin-top-35">
				<div class="hosted-by-title">
					<h4><span>Diposting oleh</span> <a href="<?php echo base_url('profile/view/'.$explore['username'])?>"><?php echo $explore['username'];?></a></h4>
					<a href="pages-user-profile.html" class="hosted-by-avatar">
						    <?php if (!empty($explore['photo'])){ ?>
						<img src="<?php echo base_url('assets/upload/image/'.$explore['photo']);?>">						
						<?php }else{ ?>
						<img src="<?php echo base_url();?>assets/front/images/photo-default.png" alt="">	
						<?php } ?>
					</a>
				</div>
				<ul class="listing-details-sidebar">
				    <?php if(!empty($explore['phone'])){ ?>
					<li><i class="sl sl-icon-phone"></i> <?php echo $explore['phone'];?></li>
				    <?php } ?>
					<li><i class="fa fa-envelope-o"></i> <?php echo $explore['email'];?></li>
				</ul>
				<?php if(!empty($explore['url_facebook'])){ ?>
				<ul class="listing-details-sidebar social-profiles">
					<li><a href="<?php echo $explore['url_facebook'];?>" class="facebook-profile"><i class="fa fa-facebook-square"></i> Facebook</a></li>
				</ul>
				<?php } ?>


			</div>
			<div class="margin-top-15">
    			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- @Sidebar-Pilar -->
                <ins class="adsbygoogle"
                     style="display:inline-block;width:300px;height:600px"
                     data-ad-client="ca-pub-9863358980914739"
                     data-ad-slot="4280108055"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>

			

		</div>
		<!-- Sidebar / End -->

	</div>
</div>
