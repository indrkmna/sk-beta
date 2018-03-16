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

<form action="<?php echo base_url('admin/dashboard/locations') ?>" method="post" enctype="multipart/form-data">
	<input type="hidden" name="config_id" value="<?php echo $site['config_id'] ?>">
	
    <div class="col-md-6">
        <div class="form-group">
        	<label>Paste Google Maps Frame Here</label>
            <textarea name="google_maps" placeholder="Google Maps Frame" class="form-control" value="about" id="about"><?php echo $site['google_maps']; ?></textarea>
        </div>
    </div>
    
    <div class="col-md-6" style="padding-bottom: 20px;">
    	<label>Example:</label><br>
        <img src="<?php echo base_url('assets/upload/image/frame_maps.png/') ?>" style="max-width:400px; height:auto;">
    </div>
    <div class="col-md-12">
        <iframe src="<?php echo $site['google_maps'];?>" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>

    <div class="col-md-12">
	   <input type="submit" name="submit" value="Save" class="btn btn-primary">
    </div>
</form>