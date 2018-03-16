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
    selector: "#about",
    height: 250,
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>

<?php
// Session 
if($this->session->flashdata('sukses')) { 
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
} 
// Error
echo validation_errors('<div class="alert alert-success">','</div>'); 
?>

<form action="<?php echo base_url('admin/dashboard/social') ?>" method="post">

<input type="hidden" name="config_id" value="<?php echo $site['config_id'] ?>">

<div class="col-md-6">
	<h3>Akun Sosial Media</h3><hr>
    <div class="form-group">
        <label>Facebook</label>
       <input type="text" name="facebook" placeholder="Fanspage Facebook" value="<?php echo $site['facebook'] ?>"  class="form-control">
    </div>
    <div class="form-group">
        <label>Twitter</label>
        <input type="text" name="twitter" placeholder="Account Twitter" value="<?php echo $site['twitter'] ?>" class="form-control">
    </div>
 
    <div class="form-group">
        <label>Instagram</label>
        <input type="text" name="instagram" placeholder="Account Instagram" value="<?php echo $site['instagram'] ?>" class="form-control">
    </div>

    <div class="form-group">
        <label>Youtube</label>
        <input type="text" name="youtube" placeholder="Account Youtube" value="<?php echo $site['youtube'] ?>" class="form-control">
    </div>      
               
</div>

<div class="col-md-6">
    <h3>Notice</h3><hr>
    <div class="alert alert-warning"><label>Important</label><hr>Silahkan cantumkan alamat sosial media yang valid <br> Contohnya seperti <i>https://facebook.com/indrkmna</i>. <br> Karena fitur ini di integrasikan langsung menggunakan API Server.<br><br>Jika terjadi kesulitan anda dapat menghubungi contact : <i>indrkmna@gmail.com</i></div>
</div>

<div class="col-md-12">
	<input type="submit" name="submit" value="Save" class="btn btn-primary">
    <input type="reset" name="reset" value="Reset" class="btn btn-default">
</div>

</form>