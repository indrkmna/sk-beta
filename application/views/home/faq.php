<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>FAQ</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="<?php echo base_url()?>">Home</a></li>
						<li>FAQ</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->

<!-- Container -->
<div class="container margin-bottom-65">

	<div class="row">

		<div class="col-md-12">
			<h4 class="headline margin-top-70 margin-bottom-30">FAQ</h4>

			<!-- Toggles Container -->
			<div class="style-2">
				<?php foreach($faq as $faq){?>
				<!-- Toggle 1 -->
				<div class="toggle-wrap">
					<span class="trigger "><a href="#"><?php echo $faq['faq_name']?><i class="sl sl-icon-plus"></i></a></span>
					<div class="toggle-container">
						<p><?php echo $faq['faq_description']?></p>
					</div>
				</div>
				<?php } ?>
			</div>
			<!-- Toggles Container / End -->
		</div>

	</div>
</div>
<!-- Container / End -->
