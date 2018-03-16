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
		
		<!-- Search -->
		<div class="col-md-12">
			<form method="post" action="<?php echo base_url('explore/search');?>">	
					
			<div class="main-search-input gray-style margin-top-0 margin-bottom-10">
				
				<div class="main-search-input-item">
						<input type="text" name="cari" placeholder="Temukan Kode disini..." value=""/>
						<input type="hidden" name="q">	
					
					</div>
					<button type="submit" name="submit" class="button">Search</button>
				
			</div>
			</form>
		</div>
		<!-- Search Section / End -->


		<div class="col-md-12">
            
            <!-- Sorting - Filtering Section -->
			<div class="row margin-bottom-25 margin-top-30">

			</div>
			<!-- Sorting - Filtering Section / End -->

			<div class="row kode">

				<!-- Listing Item -->
    			<?php 
    			$i=0; 
                $count = 1;
    			foreach ($explore as $explore){
    			        if ($count%3 == 1)
                        {  
                            echo '<div class="col-lg-4 col-md-6">
                                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                    <!-- @konten -->
                                    <ins class="adsbygoogle"
                                         style="display:inline-block;width:336px;height:280px"
                                         data-ad-client="ca-pub-9863358980914739"
                                         data-ad-slot="9974687825"></ins>
                                    <script>
                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                    </script>    								
    							</div>';
                        }
    			?>
    			<div class="col-lg-4 col-md-6">
					<a href="<?php echo base_url('explore/read/'.$explore['slug_upload'])?>" class="listing-item-container">
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

	</div>
</div>
