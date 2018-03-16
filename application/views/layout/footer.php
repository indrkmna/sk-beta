<div id="footer" class="sticky-footer">
	<!-- Main -->
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-6">
				<img class="footer-logo" src="<?php echo base_url('assets/upload/image/'.$site['logo']);?>" alt="">
				<br><br>
<p>                                                
<?php
$out = strlen($site['about']) > 150 ? substr($site['about'],0,150).'... <a href="'. base_url("about").'" class="moretag">Selengkapnya</a> ' : site['about'];
echo $out;
?> 
</p>
			</div>

			<div class="col-md-4 col-sm-6 ">
				<h4>Navigasi</h4>
				<ul class="footer-links">
					<li><a href="<?php echo base_url('login')?>">Login</a></li>
					<li><a href="<?php echo base_url('register')?>">Sign Up</a></li>
					<!--<li><a href="<?php echo base_url('partner')?>">Our Partner</a></li>-->
				</ul>

				<ul class="footer-links">
					<li><a href="<?php echo base_url('faq')?>">FAQ</a></li>
                    <li><a href="<?php echo base_url('privacy')?>">Privacy Policy</a></li>
				</ul>
				<div class="clearfix"></div>
			</div>		

			<div class="col-md-3  col-sm-12">
				<h4>Kontak Kami</h4>
				<div class="text-widget">
					Phone: <span><?php echo $site['phone_number']?> </span><br>
					E-Mail:<span> <?php echo $site['email']?></span><br>
				</div>

				<ul class="social-icons margin-top-20">
					<li><a class="facebook" href="<?php echo $site['facebook']?>"><i class="icon-facebook"></i></a></li>
					<li><a class="instagram" href="<?php echo $site['instagram']?>"><i class="icon-instagram"></i></a></li>
					<li><a class="youtube" href="<?php echo $site['youtube']?>"><i class="icon-youtube"></i></a></li>
				</ul>

			</div>

		</div>
		
		<!-- Copyright -->
		<div class="row">
			<div class="col-md-12">
				<div class="copyrights">© <?php echo date('Y').' '.$site['nameweb'];?>. Beta Version</div>
			</div>
		</div>

	</div>

</div>
<!-- Footer / End -->


<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>


</div>
<!-- Wrapper / End -->

	<script src="../../cdn-cgi/scripts/0e574bed/cloudflare-static/email-decode.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/front/scripts/jquery-2.2.0.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/front/scripts/mmenu.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/front/scripts/chosen.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/front/scripts/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/front/scripts/rangeslider.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/front/scripts/magnific-popup.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/front/scripts/waypoints.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/front/scripts/counterup.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/front/scripts/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/front/scripts/tooltips.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/front/scripts/custom.js"></script>
	<script src="<?php echo base_url();?>assets/front/scripts/switcher.js"></script>
	<script type="text/javascript">
		
			$("#btnrev").click(function(){        
				$.post("<?php echo base_url('explore/review')?>", $("#add-comment").serialize(), function(data) {
					alert('Review Berhasil Terkirim');
				});
			});
			$(document).ready(function(){
				$('.rate').click(function() {
					var selValue = $('input[name=rating]:checked').val(); 
					$('#u_rate').html('<br/><input type="hidden" name="vote" value="' + selValue + '">');
				});
			});
			
			$(function () {
				$(".listing-reviews li").slice(0, 4).show();
				$("#loadMore").on('click', function (e) {
					e.preventDefault();
					$(".listing-reviews li:hidden").slice(0, 4).slideDown();
					if ($(".listing-reviews li:hidden").length == 0) {
						$("#loadMore").fadeOut('slow');
					}
					$('html,body').animate({
						scrollTop: $(this).offset().top
					}, 1500);
				});
			});
			
			$(function () {
				$(".kode .con").slice(0, 3).show();
				$("#MoreKode").on('click', function (e) {
					e.preventDefault();
					$(".kode .con:hidden").slice(0, 3).slideDown();
					if ($(".kode .con:hidden").length == 0) {
						$("#MoreKode").fadeOut('slow');
					}
					$('html,body').animate({
						scrollTop: $(this).offset().top
					}, 1500);
				});
			});
			
        </script>
</body>
</html>