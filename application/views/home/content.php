<style>
    .Absolute-Center {
        margin: auto;
    }
    
    .Absolute-Center.is-Responsive {
        width: 75%;
        height: 50%;
    }
    .facebook{
        background: yellow;
    }
    
    @media only screen and (max-width: 500px) {
        .Absolute-Center.is-Responsive {
            width: 100%;
            height: 50%;
        }
    }
</style>
<?php if ($this->session->userdata('user_id') == false){ ?>					
<div class="main-search-container" data-background-image="<?php echo base_url('assets/upload/image/'.$site['home_banner']);?>">
	<div class="main-search-inner" style="padding-top:70px;">

		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h2><?php echo $site['nameweb'];?></h2>
					<h4>Mulai berbagi dengan teman yang lainnya. Temukan solusi yang tepat untuk aplikasi anda.</h4>
				</div>
				<div class="col-md-6">		
	            <div class="Absolute-Center is-Responsive">
				<div class="register-form" style="background: #ffffff; padding:20px 20px 20px 20px; border-radius: 6px;">
                <?php
                    if($this->session->flashdata('msg')) { 
                    echo $this->session->flashdata('msg');
                    } 
                    echo validation_errors('<div class="notification error closeable">','</div>'); 
                  ?>					
					<form method="post" action="<?php echo base_url('register');?>" class="login">
						<p class="form-row form-row-wide">
							<label for="username">Username:
								<i class="im im-icon-Male"></i>
								<input type="text" class="input-text" name="username" id="username" value="" />
							</label>
						</p>
						<p class="form-row form-row-wide">
							<label for="username">Email:
								<i class="im im-icon-Mail"></i>
								<input type="email" class="input-text" name="email" id="email" value="" />
							</label>
						</p>
						<p class="form-row form-row-wide">
							<label for="password">Password:
								<i class="im im-icon-Lock-2"></i>
								<input class="input-text" type="password" name="password" id="password"/>
							</label>
						</p>
						<div class="form-row">
							<input type="submit" class="button border margin-top-5" name="login" value="Register" style="width:800px; border-radius: 6px;" />
						</div>	
                                <span class="lost_password">                      
                                    <p style="line-height: 20px; font-size: 12px;">Dengan mengeklik "<b>Register</b>", Anda menyetujui persyaratan layanan dan <a href="<?php echo base_url('privacy');?>"> Kebijakan Privasi</a> kami. Kami sesekali akan mengirimkan email terkait akun Anda.</p>
                                </span>   										
						</div>
					</form>
					</div>
				</div>
				</div>				
			</div>
		</div>
	</div>
</div>
<?php } ?>						

<!-- Content
================================================== -->
<!-- Content
================================================== -->
<div class="container">
	<div class="row">

		<div class="col-md-12">
			<h3 class="headline centered margin-top-75">
				<i class="fa fa-search"></i> Temukan Kategori
				<span>Temukan kode dengan kategori</span>
			</h3>
		</div>
	</div>
</div>


<!-- Category Boxes -->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="categories-boxes-container margin-top-5 margin-bottom-30">
				<?php foreach ($cat as $cat){?>
				<!-- Box -->
				<a href="<?php echo base_url('explore/categories/'.$cat['slug_cat'])?>" class="category-small-box">
					<img src="<?php echo base_url('assets/upload/image/'.$cat['icon'])?>">
					<h4><?php echo $cat['categories_name']?></h4>
				</a>
				<?php } ?>

			</div>
		</div>
	</div>
</div>
<!-- Category Boxes / End -->



<!-- Fullwidth Section -->
<section class="fullwidth margin-top-65 padding-top-75 padding-bottom-70" data-background-color="#f8f8f8">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 class="headline centered margin-bottom-45">
					<i class="fa fa-fire"></i> Populer Kode
					<span>Review kode yang kamu inginkan</span>
				</h3>
			</div>
			<div class="col-md-12">
				<div class="simple-slick-carousel dots-nav">
				<?php foreach ($explore as $explore){?>
				<!-- Listing Item -->
				<div class="carousel-item">
					
					<a id="kode_upload" href="<?php echo base_url('explore/read/'.$explore['slug_upload'])?>" class="listing-item-container">
						<div class="listing-item">
							<?php 
							$vote 		= $this->mUpload->totalVote($explore['upload_id']);
							$rate 		= $this->mUpload->totalRate($explore['upload_id']);
							$limitSc 	= $this->mUpload->limitScreenshoot($explore['upload_id']);
							foreach ($limitSc as $limitSc){
							?>
							<img src="<?php echo base_url('assets/upload/image/'.$limitSc['nama_foto'])?>" alt="">
							<?php } ?>
							<div class="listing-item-details">
								<ul>
									<li><?php echo date('d F Y', strtotime($explore['date_post']))?></li>
								</ul>
							</div>
							<div class="listing-item-content">
								<span class="tag"><?php echo $explore['categories_name']?></span>
								<h3><?php echo $explore['title']?></h3>
							</div>
						</div>
						<?php if(!empty($vote || $rate)){?>
						<div class="star-rating" data-rating="<?php echo $vote/$rate;?>">
							<div class="rating-counter">(<?php echo $rate?> reviews)</div>
						</div>
						<?php }else{ ?>
						<div class="star-rating">
							<div class="rating-counter">(<?php echo $rate?> Review)</div>
							<span class="star empty"></span>
							<span class="star empty"></span>
							<span class="star empty"></span>
							<span class="star empty"></span>
							<span class="star empty"></span>
						</div>
						<?php } ?>
					</a>
				</div>
				<?php } ?>
				<!-- Listing Item / End -->		

			</div>
				
			</div>

		</div>
	</div>

</section>
<!-- Fullwidth Section / End -->


<!-- Info Section -
<div class="container">

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2 class="headline centered margin-top-80">
				Plan The Vacation of Your Dreams 
				<span class="margin-top-25">Explore some of the best tips from around the world from our partners and friends.  Discover some of the most popular listings in Sydney.</span>
			</h2>
		</div>
	</div>

	<div class="row icons-container">
		<div class="col-md-4">
			<div class="icon-box-2 with-line">
				<i class="im im-icon-Map2"></i>
				<h3>Find Interesting Place</h3>
				<p>Proin dapibus nisl ornare diam varius tempus. Aenean a quam luctus, finibus tellus ut, convallis eros sollicitudin turpis.</p>
			</div>
		</div>

		<div class="col-md-4">
			<div class="icon-box-2 with-line">
				<i class="im im-icon-Mail-withAtSign"></i>
				<h3>Contact a Few Owners</h3>
				<p>Maecenas pulvinar, risus in facilisis dignissim, quam nisi hendrerit nulla, id vestibulum metus nullam viverra porta purus.</p>
			</div>
		</div>

		<div class="col-md-4">
			<div class="icon-box-2">
				<i class="im im-icon-Checked-User"></i>
				<h3>Make a Reservation</h3>
				<p>Faucibus ante, in porttitor tellus blandit et. Phasellus tincidunt metus lectus sollicitudin feugiat pharetra consectetur.</p>
			</div>
		</div>
	</div>

</div>
<!-- Info Section / End -->


<!-- Recent Blog Posts -->
<section class="fullwidth border-top padding-top-75 padding-bottom-75" data-background-color="#fff">
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<h3 class="headline centered margin-bottom-45">
					<i class="fa fa-newspaper-o"></i> Artikel Terbaru
					<span>Artikel terbaru yang dapat anda baca</span>
				</h3>
			</div>
		</div>

		<div class="row">
			<!-- Blog Post Item -->
			<?php 
                 $i=0;
					foreach ($article as $article){
                      if($i==6) break;
            ?>
			<div class="col-md-4">
					<a href="<?php echo base_url('article/read/'.$article['slug_article'])?>" class="blog-compact-item-container">
						<div class="blog-compact-item">
							<img src="<?php echo base_url('assets/upload/image/'.$article['cover_article'])?>" alt="<?php echo $article['title'] ?>">
							<span class="blog-item-tag"><?php echo $article['category_name']?></span>
							<div class="blog-compact-item-content">
								<ul class="blog-post-tags">
									<li><?php echo date('d F Y', strtotime($article['date_post']))?></li>
								</ul>
								<h3><?php echo $article['title'] ?></h3>
							</div>
						</div>
					</a>
			</div>
			<?php $i++; } ?>
			<!-- Blog post Item / End -->

			<div class="col-md-12 centered-content">
				<a href="<?php echo base_url('article')?>" class="button border margin-top-10">Artikel Selengkapnya</a>
			</div>

		</div>

	</div>
</section>
<!-- Recent Blog Posts / End -->

