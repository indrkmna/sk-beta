
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

<form action="<?php echo base_url('admin/faq/edit/'.$faq['faq_id']) ?>" method="post" enctype="multipart/form-data">
	<input type="hidden" name="faq_id" value="<?php echo $faq['faq_id'] ?>">
	<div class="col-md-6">
    <div class="form-group">
    	<label>Faq Name</label>
        <input name="faq_name" placeholder="Faq name" class="form-control" type="text" value="<?php echo $faq['faq_name']?>">
    </div>
    </div>
    
    <div class="col-md-6">
    	<div class="form-group">
                            <label class="control-label col-md-3">Satatus</label>
							<select name="status" class="form-control">
								<option value="publish" <?php if($faq['status']=='publish'){echo 'selected';}?>>Publish</option>
								<option value="draf" <?php if($faq['status']=='draf'){echo 'selected';}?>>Draf</option>
							</select>
						</div>
    </div>
	
	<div class="col-md-12">
	 <div class="form-group">
                            <label class="control-label">Faq Description</label>
                            
                               <textarea name="faq_description" rows="5" class="form-control" placeholder="Description"><?php echo $faq['faq_description']?></textarea>
                                <span class="help-block"></span>
                        
                        </div>
	</div>
    
    <div class="col-md-12">
		<input type="submit" name="submit" value="Save" class="btn btn-primary">
	</div>
</form>