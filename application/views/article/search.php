<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2><?php echo $title?></h2>

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
<div class="container">
	<div class="row">

		<div class="col-lg-9 col-md-8 padding-right-30">
			

			<div class="row">
			<p style="margin-left: 10px;"><i class="sl sl-icon-magnifier"></i> Hasil Pencarian "<?php echo $this->session->userdata('sess_ringkasan');?>"</p>	
			<?php 
			if (count($articles) > 0) {
			foreach ($articles as $articles){?>
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
							
								<?php
									$out = substr($articles['content'],0,100);
									echo $out;
								?>
								
								</div>

								<div class="listing-item-details"><?php echo date('d F Y', strtotime($articles['date_post']))?></div>
							</div>
						</a>
					</div>
				</div>
				<!-- Listing Item / End -->
			
			<?php }}else{
							echo '<div class="padding" style="padding: 20px;text-align: center;border: 2px solid #efefef;border-style: dashed;">Data tidak ditemukan</div>';
						} ?>
			</div>

			<!-- Pagination -->
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12">
					<!-- Pagination -->
					<div class="pagination-container margin-top-20 margin-bottom-40">
						<nav class="pagination">
							<ul>
								<?php if(isset($pagin)) { echo $pagin; }  ?>   
							</ul>
						</nav>
					</div>
				</div>
			</div>
			<!-- Pagination / End -->

		</div>

		<!-- Sidebar
		================================================== -->
		<div class="col-lg-3 col-md-4">
			<div class="sidebar">

			<!-- Widget -->
			<div class="widget">
				<h3 class="margin-top-0 margin-bottom-25">Temukan Artikel</h3>
				<div class="search-blog-input">
					<div class="input">
					    <form method="post" action="<?php echo base_url('article/search');?>">	
							<input class="search-field" type="text" name="cari" placeholder="Temukan artikel disini..." value=""/>
							<input type="hidden" name="q">	
						</form>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<!-- Widget / End -->
			
			<!-- Widget -->
			<div class="widget margin-top-40">

				<h3>Popular Artikel</h3>
				<ul class="widget-tabs">
				<?php 
					$i=0;
					foreach ($popular_post as $popular){ 
                      if($i==10) break;
				?>
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
				<?php $i++; } ?>
				</ul>

			</div>
			<!-- Widget / End-->

			</div>
			
		</div>
		<!-- Sidebar / End -->
	</div>
</div>
