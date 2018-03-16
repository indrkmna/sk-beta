<script src="<?php echo base_url() ?>assets/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
	file_browser_callback: function(field, url, type, win) {
        tinyMCE.activeEditor.windowManager.open({
            file: '<?php echo base_url() ?>assets/kcfinder/browse.php?opener=tinymce4&field=' + field + '&type=' + type,
            title: 'KCFinder',
            width: 700,
            height: 500,
            inline: true,
            close_previous: false
        }, {
            window: win,
            input: field
        });
        return false;
    },
    selector: "#isi",
	height: 250,
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>
<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2><?php echo $title?></h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="<?php echo base_url()?>">Home</a></li>
							<li><a href="<?php echo base_url('dashboard')?>">Dashboard</a></li>
							<li><?php echo $title?></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
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
				<div id="add-listing">
				
					<!-- Section -->
					<div class="add-listing-section margin-top-45">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-picture"></i> Screenshoot</h3>
						</div>
						<script type="text/javascript" src="<?php echo base_url();?>assets/front/scripts/jquery-2.2.0.min.js"></script>
						<script type="text/javascript" src="<?php echo base_url();?>assets/front/scripts/dropzone.js"></script>
						<!-- Dropzone -->
						<div class="submit-section">
							<form action="" class="dropzone" ></form>
						</div>
						<?php $i=1; foreach ($listSc as $listSc){?>
						<div id="imgs<?php echo $i;?>" style="display: inline-block;padding: 5px 5px; position: relative;">
						<div style="flex: 1;max-width: 118px;position: relative;">
						<a href="" style="width: 100%;height: 100%;display: inline-block;overflow: hidden;position: relative;z-index: 10;">
							<img style="object-fit: cover;height: 100%;width: 100%;border-radius: 4px;" src="<?php echo base_url('assets/upload/image/'.$listSc['nama_foto'])?>" alt="">
							<br> <span id="delete<?php echo $i;?>" value="<?php echo $listSc['token']?>">Delete </span>
						</a>
						</div>
						</div>
						<script>
						$(function () {
						$("#delete<?php echo $i;?>").on("click", function (e) {
								e.preventDefault();
								var token = $(this).attr('value');
								$.ajax({
									type:"post",
									data:{token:token},
									url:"<?php echo base_url('explore/remove_foto') ?>",
									cache:false,
									dataType: 'json',
									success: function(){
									    $('#imgs<?php echo $i;?>').hide();
										console.log("Foto terhapus");
									},
									error: function(){
										console.log("Error");

									}
								});
								
							});
							});

						</script>
						<?php $i++; } ?>
						<script type="text/javascript">

						Dropzone.autoDiscover = false;

						var foto_upload= new Dropzone(".dropzone",{
						url: "<?php echo base_url('explore/proses_upload') ?>",
						maxFilesize: 2,
						method:"post",
						acceptedFiles:"image/*",
						paramName:"userfile",
						dictInvalidFileType:"Type file ini tidak dizinkan",
						addRemoveLinks:true,
						});


						//Event ketika Memulai mengupload
						foto_upload.on("sending",function(a,b,c){
							a.token=Math.random();
							c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
							
						});
						
						//Event ketika Memulai mengupload
						foto_upload.on("sending",function(a,b,c){
							a.users=$("#txt_name").val();
							c.append("user_foto",a.users); //Menmpersiapkan token untuk masing masing foto
						});

						//Event ketika foto dihapus
						foto_upload.on("removedfile",function(a){
							var token=a.token;
							$.ajax({
								type:"post",
								data:{token:token},
								url:"<?php echo base_url('explore/remove_foto') ?>",
								cache:false,
								dataType: 'json',
								success: function(){
								    
									console.log("Foto terhapus");
								},
								error: function(){
									console.log("Error");

								}
							});
						});
						

						</script>
						
					</div>
					<!-- Section / End -->

				<form action="<?php echo base_url('explore/edit/'.$explore['upload_id'])?>" method="post">
					<!-- Section -->
					<div class="add-listing-section margin-top-45">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i> Basic Informations</h3>
						</div>
						<input type="hidden" name="upload_id" value="<?php echo $explore['upload_id'] ?>" id="txt_name"/>
						<!-- Title -->
						<div class="row with-forms">
							<div class="col-md-12">
								<h5>Judul <i class="tip" data-tip-content="Judul kode anda "></i></h5>
								<input class="search-field" type="title" name="title" value="<?php echo $explore['title'] ?>"/>
							</div>
						</div>

						<!-- Row -->
						<div class="row with-forms">

							<!-- kategori -->
							<div class="col-md-6">
								<h5>Kategori</h5>
								<select name="category_id" class="chosen-select-no-single" >
									<option label="blank">Pilih Kategori</option>	
									<?php foreach ($category as $category){?>
									<option value="<?php echo $category['id_category']?>" <?php if($explore['category_id']==$category['id_category']) { echo "selected"; } ?>>
										<?php echo $category['categories_name']?>
									</option>
									<?php } ?>
								</select>
							</div>

							<!-- Status -->
							<div class="col-md-6">
								<h5>Status</h5>
								<select name="status_upload" class="chosen-select-no-single" >
									<option label="blank">Pilih Status</option>	
									 <option value="publish" 
                                      <?php if($explore['status_upload']=="publish") { echo "selected"; } ?>
                                      >Publish</option>

                                      <option value="draf" 
                                      <?php if($explore['status_upload']=="draf") { echo "selected"; } ?>
                                      >Draf</option> 
								</select>
							</div>

						</div>
						<!-- Row / End -->

					</div>
					<!-- Section / End -->

					<!-- Section -->
					<div class="add-listing-section margin-top-45">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-docs"></i> Details</h3>
						</div>

						<!-- Description -->
						<div class="form">
							<h5>Deskripsi</h5>
							<textarea id="isi"  class="WYSIWYG" name="description" cols="40" rows="3" id="summary" spellcheck="true"><?php echo $explore['description'] ?></textarea>
						</div>

					</div>
					<!-- Section / End -->

					<button type="submit" name="submit" class="button preview">Simpan <i class="fa fa-arrow-circle-right"></i></button>
				</form>
				</div>
			</div>

			<!-- Copyrights -->
			<div class="col-md-12">
				<div class="copyrights">© <?php echo date('Y').' '.$site['nameweb'];?>.</div>
			</div>

		</div>

	</div>
	<!-- Content / End -->
