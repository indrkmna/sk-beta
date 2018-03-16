
<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Artikel</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="<?php echo base_url()?>">Home</a></li>
						<li><?php echo $title?></li>
					</ul>
				</nav>

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
						<li><a href="#">5 Comments</a></li>
					</ul>					
						<?php echo $article['content'];?>
					<!-- Share Buttons -->
					<ul class="share-buttons margin-top-40 margin-bottom-0">
						<li><a class="fb-share" href="#"><i class="fa fa-facebook"></i> Share</a></li>
					</ul>
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
				<img src="<?php echo base_url();?>assets/front/images/user-avatar.jpg" alt="" />
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
			<?php foreach ($related as $related){?>
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
			<?php } ?>
				<!-- Blog post Item / End -->
				
			</div>
			<!-- Related Posts / End -->


			<div class="margin-top-50"></div>

			<!-- Reviews -->
			<section class="comments">
			<h4 class="headline margin-bottom-35">Comments <span class="comments-amount">(5)</span></h4>

				<ul>
					<li>
						<div class="avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
						<div class="comment-content"><div class="arrow-comment"></div>
							<div class="comment-by">Kathy Brown<span class="date">22 August 2017</span>
								<a href="#" class="reply"><i class="fa fa-reply"></i> Reply</a>
							</div>
							<p>Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor imperdiet vitae. Curabitur lacinia neque non metus</p>
						</div>

						<ul>
							<li>
								<div class="avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
								<div class="comment-content"><div class="arrow-comment"></div>
									<div class="comment-by">Tom Smith<span class="date">22 August 2017</span>
										<a href="#" class="reply"><i class="fa fa-reply"></i> Reply</a>
									</div>
									<p>Rrhoncus et erat. Nam posuere tristique sem, eu ultricies tortor imperdiet vitae. Curabitur lacinia neque.</p>
								</div>
							</li>
							<li>
								<div class="avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
								<div class="comment-content"><div class="arrow-comment"></div>
									<div class="comment-by">Kathy Brown<span class="date">20 August 2017</span>
										<a href="#" class="reply"><i class="fa fa-reply"></i> Reply</a>
									</div>
									<p>Nam posuere tristique sem, eu ultricies tortor.</p>
								</div>

								<ul>
									<li>
										<div class="avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
										<div class="comment-content"><div class="arrow-comment"></div>
											<div class="comment-by">John Doe<span class="date">18 August 2017</span>
												<a href="#" class="reply"><i class="fa fa-reply"></i> Reply</a>
											</div>
											<p>Great template!</p>
										</div>
									</li>
								</ul>

							</li>
						</ul>

					</li>

					<li>
						<div class="avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /> </div>
						<div class="comment-content"><div class="arrow-comment"></div>
							<div class="comment-by">John Doe<span class="date">18 August 2017</span>
								<a href="#" class="reply"><i class="fa fa-reply"></i> Reply</a>
							</div>
							<p>Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris.</p>
						</div>

					</li>
				 </ul>

			</section>
			<div class="clearfix"></div>


			<!-- Add Comment -->
			<div id="add-review" class="add-review-box">

				<!-- Add Review -->
				<h3 class="listing-desc-headline margin-bottom-35">Add Review</h3>
	
				<!-- Review Comment -->
				<form id="add-comment" class="add-comment">
					<fieldset>

						<div class="row">
							<div class="col-md-6">
								<label>Name:</label>
								<input type="text" value=""/>
							</div>
								
							<div class="col-md-6">
								<label>Email:</label>
								<input type="text" value=""/>
							</div>
						</div>

						<div>
							<label>Comment:</label>
							<textarea cols="40" rows="3"></textarea>
						</div>

					</fieldset>

					<button class="button">Submit Comment</button>
					<div class="clearfix"></div>
				</form>

			</div>
			<!-- Add Review Box / End -->

	</div>
	<!-- Content / End -->



	<!-- Widgets -->
	<div class="col-lg-3 col-md-4">
		<div class="sidebar right">

			<!-- Widget -->
			<div class="widget">
				<h3 class="margin-top-0 margin-bottom-25">Search Blog</h3>
				<div class="search-blog-input">
					<div class="input"><input class="search-field" type="text" placeholder="Type and hit enter" value=""/></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<!-- Widget / End -->


			<!-- Widget -->
			<div class="widget margin-top-40">

				<h3>Popular Artikel</h3>
				<ul class="widget-tabs">
				<?php foreach ($popular_post as $popular){ ?>
					<li>
						<div class="widget-content">
								<div class="widget-thumb">
								<a href="<?php echo base_url('article/read/'.$popular['slug_article']);?>"><img src="<?php echo base_url('assets/upload/image/'.$popular['cover_article']);?>" alt=""></a>
							</div>
							
							<div class="widget-text">
								<h5><a href="<?php echo base_url('article/read/'.$popular['slug_article']);?>"><?php echo $popular['title'];?> </a></h5>
								<span><?php echo date('d/m/Y', strtotime($popular['date_post'])); ?></span>
								<span><?php echo $popular['views'];?> Dilihat</span>
							</div>
							<div class="clearfix"></div>
						</div>
					</li>
				<?php } ?>
				</ul>

			<!-- Widget / End-->


			<div class="clearfix"></div>
			<div class="margin-bottom-40"></div>
		</div>
	</div>
	</div>
	<!-- Sidebar / End -->


</div>
</div>


