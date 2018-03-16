<!-- Map Container -->
<div class="contact-map margin-bottom-60">

	<!-- Google Maps -->
	<div id="singleListingMap-container">
		<div id="singleListingMap" data-latitude="106.780494" data-longitude="-6.596962" data-map-icon="im im-icon-Map2"></div>
		<a href="#" id="streetView">Street View</a>
	</div>
	<!-- Google Maps / End -->

	<!-- Office -->
	<div class="address-box-container">
		<div class="address-container" data-background-image="<?php echo base_url()?>assets/front/images/our-office.jpg">
			<div class="office-address">
				<h3>Our Office</h3>
				<ul>
					<li>Jabaru</li>
					<li>Indonesia</li>
					<li><?php echo $site['phone_number']?></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- Office / End -->

</div>
<div class="clearfix"></div>
<!-- Map Container / End -->


<!-- Container / Start -->
<div class="container margin-bottom-55">

	<div class="row">
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
		<!-- Contact Details -->
		<div class="col-md-4">

			<h4 class="headline margin-bottom-30">Find Us There</h4>

			<!-- Contact Details -->
			<div class="sidebar-textbox">
				

				<ul class="contact-details">
					<li><i class="im im-icon-Phone-2"></i> <strong>Phone:</strong> <span><?php echo $site['phone_number']?> </span></li>
					<li><i class="im im-icon-Fax"></i> <strong>Fax:</strong> <span><?php echo $site['fax']?></span></li>
					<li><i class="im im-icon-Globe"></i> <strong>Web:</strong> <span><a href="#"><?php echo $site['nameweb']?></a></span></li>
					<li><i class="im im-icon-Envelope"></i> <strong>E-Mail:</strong> <span><span class="__cf_email__" data-cfemail="345b52525d575174514c55594458511a575b59"><?php echo $site['email']?></span></span></li>
				</ul>
			</div>

		</div>

		<!-- Contact Form -->
		<div class="col-md-8">

			<section id="contact">
				<h4 class="headline margin-bottom-35">Contact Form</h4>

				<div id="contact-message"></div> 

					<form method="post" action="<?php echo base_url('contact')?>" name="contactform" id="contactform" autocomplete="on">

					<div class="row">
						<div class="col-md-6">
							<div>
								<input name="sender" type="text" id="name" placeholder="Your Name" required="required" />
							</div>
						</div>

						<div class="col-md-6">
							<div>
								<input name="email" type="email" id="email" placeholder="Email Address" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" required="required" />
							</div>
						</div>
					</div>

					<div>
						<input name="subject" type="text" id="subject" placeholder="Subject" required="required" />
					</div>

					<div>
						<textarea name="messages" cols="40" rows="3" id="comments" placeholder="Message" spellcheck="true" required="required"></textarea>
					</div>

					<input name="submit" type="submit" class="submit button" id="submit" value="Submit Message" />

					</form>
			</section>
		</div>
		<!-- Contact Form / End -->

	</div>

</div>
<!-- Container / End -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
