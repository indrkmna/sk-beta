			<!-- Copyrights -->
			<div class="col-md-12">
				<div class="copyrights">© <?php echo date('Y').' '.$site['nameweb'];?>.</div>
			</div>
		</div>

	</div>
	<!-- Content / End -->


</div>
<!-- Dashboard / End -->


</div>
<!-- Wrapper / End -->
<!-- Scripts
================================================== -->
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

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript">
		
			
			$(function () {
				$(".rates .lirates").slice(0, 4).show();
				$("#loadMore").on('click', function (e) {
					e.preventDefault();
					$(".rates .lirates:hidden").slice(0, 4).slideDown();
					if ($(".rates .lirates:hidden").length == 0) {
						$("#loadMore").fadeOut('slow');
					}
					$('html,body').animate({
						scrollTop: $(this).offset().top
					}, 1500);
				});
			});
			
			$(function () {
				$(".yrates .lirates").slice(0, 3).show();
				$("#yloadMore").on('click', function (e) {
					e.preventDefault();
					$(".yrates .lirates:hidden").slice(0, 3).slideDown();
					if ($(".yrates .lirates:hidden").length == 0) {
						$("#yloadMore").fadeOut('slow');
					}
					$('html,body').animate({
						scrollTop: $(this).offset().top
					}, 1500);
				});
			});
			
			
        </script>
<?php require_once('js_texteditor.php');?>

<script type="text/javascript" src="<?php echo base_url();?>assets/front/scripts/select2.min.js"></script>
<script type="text/javascript">
            $(document).ready(function(){
                $('.select2').select2();
                $(".select2-tags").select2({
                  tags: true
                })
            })
        </script>
</body>

</html>