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
<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2><?php echo $article['title'];?></h2>
			</div>
		</div>
	</div>
</div>

<!-- Content
================================================== -->
<div class="container margin-top-45">

	<!-- Blog Posts -->
	<div class="blog-page">
	<div class="row">


		<!-- Post Content -->
		<div class="col-lg-9 col-md-8 padding-right-30">


			<!-- Blog Post -->
			<div class="blog-post single-post">
				
				<!-- Img -->
				<img class="post-img" src="<?php echo base_url('assets/upload/image/'.$article['cover_article']);?>" alt="">

				
				<!-- Content -->
				<div class="post-content">

					<h3><?php echo $article['title'];?></h3>

					<ul class="post-meta">
						<li><?php echo date('d F Y', strtotime($article['date_post']))?></li>
						<li><a href="#"><?php echo $article['category_name'];?></a></li>
						
					</ul>					
						<?php echo $article['content'];?>

					Tags : 
					<?php foreach($listTags as $listTags){?>
					    <a class="tags" href="<?php echo base_url('article/tag/'.$listTags['slug'])?>" style="border-radius: 50px;padding: 5px 16px;background:#f91942;color: #fff;"><?php echo $listTags['name']?></a>
					<?php } ?>
					
					
					<div class="clearfix"></div>
					

				</div>
			</div>
			<!-- Blog Post / End -->


			<!-- Post Navigation -->
			<ul id="posts-nav" class="margin-top-0 margin-bottom-45">
				<?php foreach ($next as $next){?>
				<li class="next-post">
					<a href="<?php echo base_url('article/read/'.$next['slug_article'])?>"><span>Next Post</span>
					<?php echo $next['title']?></a>
				</li>
				<?php } ?>
				<?php foreach ($prev as $prev){?>
				<li class="prev-post">
					<a href="<?php echo base_url('article/read/'.$prev['slug_article'])?>"><span>Previous Post</span>
					<?php echo $prev['title']?></a>
				</li>
				<?php } ?>
			</ul>


			<!-- About Author -->
			<div class="about-author">
				        <?php if (!empty($article['photo'])){ ?>
						<img src="<?php echo base_url('assets/upload/image/'.$article['photo']);?>">						
						<?php }else{ ?>
						<img src="<?php echo base_url();?>assets/front/images/photo-default.png" alt="">	
						<?php } ?>
				<div class="about-description">
					<h4><?php echo $article['first_name'].' '.$article['last_name'];?></h4>
					<a href="<?php echo base_url('profile/'.$article['username']);?>"><?php echo $article['username'];?></a>
					<p><?php echo $article['bio'];?></p>
				</div>
			</div>


			<!-- Related Posts -->
			<div class="clearfix"></div>
			<h4 class="headline margin-top-25">Related Articles</h4>
			<div class="row">
			<?php 
			    if(count($related > 0)){
			    foreach ($related as $related){?>
				<!-- Blog Post Item -->
				<div class="col-md-6">
					<a href="<?php echo base_url('article/read/'.$related['slug_article'])?>" class="blog-compact-item-container">
						<div class="blog-compact-item">
							<img src="<?php echo base_url('assets/upload/image/'.$related['cover_article'])?>" alt="<?php echo $related['title'] ?>">
							<span class="blog-item-tag"><?php echo $related['category_name']?></span>
							<div class="blog-compact-item-content">
								<ul class="blog-post-tags">
									<li><?php echo date('d F Y', strtotime($related['date_post']))?></li>
								</ul>
								<h3><?php echo $related['title'] ?> </h3>
								<?php 
									$out = substr($related['content'],0,100);
									echo $out;
								?>
							</div>
						</div>
					</a>
				</div>
			<?php }}else{ echo 'tidak ada post yang terkait';} ?>
				<!-- Blog post Item / End -->
				
			</div>
			<!-- Related Posts / End -->


			<div class="margin-top-50"></div>
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
			<!-- Reviews -->
			<section id="comments" class="comments">
			<h4 class="headline margin-bottom-35">Comments <span class="comments-amount">(<?php echo $countCom?>)</span></h4>

				<ul>
				<?php 
				$comment 	= $this->mComment->listcommentArticle($article['article_id']);
				foreach ($comment as $com){
				?>
					<li>
						<div class="avatar">
						    <?php if (!empty($com['photo'])){ ?>
						<img src="<?php echo base_url('assets/upload/image/'.$com['photo']);?>">						
						<?php }else{ ?>
						<img src="<?php echo base_url();?>assets/front/images/photo-default.png" alt="">	
						<?php } ?>
						</div>
						<div class="comment-content"><div class="arrow-comment"></div>
							<div class="comment-by"><?php echo $com['username'];?><span class="date"><?php echo time_elapsed_string($com['date_comment']); ?></span>
							</div>
							<p><?php echo $com['comment']?></p>
						</div>
					</li>
				<?php } ?>
				</ul>

			</section>
			<div class="clearfix"></div>


			<!-- Add Comment -->
			<div id="add-review" class="add-review-box">
			    <h3 class="listing-desc-headline margin-bottom-35">Add Comment</h3>
            <?php if($this->session->userdata('user_id')){?>
				<!-- Add Review -->
				
	
				<!-- Review Comment -->
				<form action="<?php echo base_url('article/comment/'.$article['slug_article'])?>" method="POST" id="add-comment" class="add-comment">
					<fieldset>
						<input name="user_id" type="hidden" value="<?php echo $this->session->userdata('user_id');?>"/>
						<input name="article_id" type="hidden" value="<?php echo $article['article_id']?>"/>

						<div>
							<textarea name="comment" cols="40" rows="3" placeholder="Tuliskan sesuatu..."></textarea>
						</div>

					</fieldset>

					<button name="submit" type="submit" class="button">Submit Comment</button>
					<div class="clearfix"></div>
				</form>
                <?php }else{?>
                <div style="width: 100%; text-align: center;">
                <a href="<?php echo base_url('login')?>" class="button">Login</a></div>
                <?php } ?>
			</div>
			<!-- Add Review Box / End -->

	</div>
	<!-- Content / End -->



	<!-- Widgets -->
	<div class="col-lg-3 col-md-4">
		<div class="sidebar right">

			<!-- Widget -->
			<div class="widget">
				<h3 class="margin-top-0 margin-bottom-25">Temukan Artikel</h3>
				<div class="search-blog-input">
					<div class="input"><input class="search-field" type="text" placeholder="Ketikan disini.." value=""/></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<!-- Widget / End -->


			<!-- Widget -->
			<div class="widget margin-top-40">

				<h3>Popular Posts</h3>
				<ul class="widget-tabs">
						
					<!-- Post #1 -->
					<?php foreach($popular as $popular){?>
					<li>
						<div class="widget-content">
								<div class="widget-thumb">
								<a href="<?php echo base_url('article/read/'.$popular['slug_article'])?>">
									<img src="<?php echo base_url('assets/upload/image/'.$popular['cover_article'])?>" alt="">
								</a>
							</div>
							
							<div class="widget-text">
								<h5><a href="<?php echo base_url('article/read/'.$popular['slug_article'])?>"><?php echo $popular['title']?> </a></h5>
								<span><?php echo date('d F Y', strtotime($popular['date_post']))?></span>
							</div>
							<div class="clearfix"></div>
						</div>
					</li>
					<?php } ?>
				
				</ul>

			</div>
			<!-- Widget / End-->

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- @konten -->
<ins class="adsbygoogle"
     style="display:inline-block;width:336px;height:280px"
     data-ad-client="ca-pub-9863358980914739"
     data-ad-slot="9974687825"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

			<div class="clearfix"></div>
			<div class="margin-bottom-40"></div>
		</div>
	</div>
	</div>
	<!-- Sidebar / End -->


</div>
</div>


