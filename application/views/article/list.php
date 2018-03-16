<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Daftar Artikel</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="<?php echo base_url()?>">Home</a></li>
						<li>Artikel</li>
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
				
			<?php 
			$i=0; 
            $count = 1;
			foreach ($articles as $articles){
			        if ($count%3 == 1)
                    {  
                        echo '<div class="col-lg-12 col-md-12">
								<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
								<ins class="adsbygoogle"
									 style="display:block"
									 data-ad-format="fluid"
									 data-ad-layout-key="-fe+6b+2b-jv+sq"
									 data-ad-client="ca-pub-9863358980914739"
									 data-ad-slot="6810870804"></ins>
								<script>
									 (adsbygoogle = window.adsbygoogle || []).push({});
								</script>
							</div>';
                    }
			?>
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
			<?php $i++; $count++;} ?>
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
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- @sidebar -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-9863358980914739"
                 data-ad-slot="7064140379"
                 data-ad-format="auto"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>			
			<!-- Widget -->
			<div class="widget margin-top-10">

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
			    <?php $i++; $count++;} ?>
				</ul>

			</div>
			<!-- Widget / End-->

			</div>
			
		</div>
		<!-- Sidebar / End -->
	</div>
</div>
