<style>
#imagePreview {
    width: 150px;
    height: 150px;
    background-position: center center;
    background-size: cover;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
}
</style>
<script type="text/javascript">
$(function() {
    $("#file").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
    });
});
</script>


<?php
// Session 
if($this->session->flashdata('sukses')) { 
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
} 

// File upload error
if(isset($error)) {
	echo '<div class="alert alert-success">';
	echo $error;
	echo '</div>';
}

// Error
echo validation_errors('<div class="alert alert-success">','</div>'); 
?>

<form action="<?php echo base_url('admin/dashboard/feature') ?>" method="post" enctype="multipart/form-data">
	<input type="hidden" name="config_id" value="<?php echo $site['config_id'] ?>">
	
    <div class="col-md-6">
    <div class="form-group">
    	<label>Gambar</label>
        <input type="file" name="img_2" class="form-control" id="file">
        <div id="imagePreview"><img src="<?php echo base_url('assets/upload/image/'.$site['img_2']) ?>" width="150px" height="150px"></div>
    </div>
    </div>
    
    <div class="col-md-6">
        <div class="form-group">
            <label>Judul (1)</label>
            <input type="text" name="title_2" placeholder="Judul" value="<?php echo $site['title_2'] ?>" required class="form-control">
        </div>
        <div class="form-group">
            <label>Isi (1)</label>
            <textarea name="text_2" rows="5" class="form-control" placeholder="Isi"><?php echo $site['text_2'] ?></textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Judul (2)</label>
            <input type="text" name="title_3" placeholder="Judul" value="<?php echo $site['title_3'] ?>" required class="form-control">
        </div>
        <div class="form-group">
            <label>Isi (2)</label>
            <textarea name="text_3" rows="5" class="form-control" placeholder="Isi"><?php echo $site['text_3'] ?></textarea>
        </div>  
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Judul (3)</label>
            <input type="text" name="title_4" placeholder="Judul" value="<?php echo $site['title_4'] ?>" required class="form-control">
        </div>
        <div class="form-group">
            <label>Isi (3)</label>
            <textarea name="text_4" rows="5" class="form-control" placeholder="Isi"><?php echo $site['text_4'] ?></textarea>
        </div>  
    </div>
    <div class="col-md-6">    
        <div class="form-group">
            <label>Judul (4)</label>
            <input type="text" name="title_5" placeholder="Judul" value="<?php echo $site['title_5'] ?>" required class="form-control">
        </div>
        <div class="form-group">
            <label>Isi (4)</label>
            <textarea name="text_5" rows="5" class="form-control" placeholder="Isi"><?php echo $site['text_5'] ?></textarea>
        </div>  
    </div>
    <div class="col-md-6">   
        <div class="form-group">
            <label>Judul (5)</label>
            <input type="text" name="title_6" placeholder="Judul" value="<?php echo $site['title_6'] ?>" required class="form-control">
        </div>
        <div class="form-group">
            <label>Isi (5)</label>
            <textarea name="text_6" rows="5" class="form-control" placeholder="Isi"><?php echo $site['text_6'] ?></textarea>
        </div>  
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Judul (6)</label>
            <input type="text" name="title_7" placeholder="Judul" value="<?php echo $site['title_7'] ?>" required class="form-control">
        </div>
        <div class="form-group">
            <label>Isi (6)</label>
            <textarea name="text_7" rows="5" class="form-control" placeholder="Isi"><?php echo $site['text_7'] ?></textarea>
        </div>          
    </div>
    <div class="col-md-12">
	<input type="submit" name="submit" value="Simpan" class="btn btn-primary">
</div>
</form>