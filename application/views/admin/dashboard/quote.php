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

<form action="<?php echo base_url('admin/dasbor/quote') ?>" method="post">

<input type="hidden" name="id_konfigurasi" value="<?php echo $site['id_konfigurasi'] ?>">

<div class="col-md-6">
	<div class="form-group">
    	<label>Judul Quote 1</label>
        <input type="text" name="judul_1" class="form-control" value="<?php echo $site['judul_1'] ?>" placeholder="Judul quote 1" required>
        
    </div>
    <div class="form-group">
    	<label>Judul Quote 2</label>
        <input type="text" name="judul_2" class="form-control" value="<?php echo $site['judul_2'] ?>" placeholder="Judul quote 2">
        
    </div>
    <div class="form-group">
    	<label>Judul Quote 3</label>
        <input type="text" name="judul_3" class="form-control" value="<?php echo $site['judul_3'] ?>" placeholder="Judul quote 3">
        
    </div>
    <div class="form-group">
    	<label>Judul Quote 4</label>
        <input type="text" name="judul_4" class="form-control" value="<?php echo $site['judul_4'] ?>" placeholder="Judul quote 4">
        
    </div>
</div>

<div class="col-md-6">
	<div class="form-group">
    	<label>Pesan Quote 1</label>
        <input type="text" name="pesan_1" class="form-control" value="<?php echo $site['pesan_1'] ?>" placeholder="Pesan quote 1" required>
    </div>
   <div class="form-group">
    	<label>Pesan Quote 2</label>
        <input type="text" name="pesan_2" class="form-control" value="<?php echo $site['pesan_2'] ?>" placeholder="Pesan quote 2">
    </div>
    <div class="form-group">
    	<label>Pesan Quote 3</label>
        <input type="text" name="pesan_3" class="form-control" value="<?php echo $site['pesan_3'] ?>" placeholder="Pesan quote 3">
    </div>
    <div class="form-group">
    	<label>Pesan Quote 4</label>
        <input type="text" name="pesan_4" class="form-control" value="<?php echo $site['pesan_4'] ?>" placeholder="Pesan quote 4">
    </div>
</div>

<div class="col-md-12">
	<input type="submit" name="submit" value="Simpan Konfigurasi Website" class="btn btn-primary">
    <input type="reset" name="reset" value="Reset" class="btn btn-primary">
</div>


</form>