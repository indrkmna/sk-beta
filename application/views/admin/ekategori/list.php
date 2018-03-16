    
       <button class="btn btn-primary" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i> Create Category</button>
        <br />
        <br />
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Icon</th>
                    <th>Categories Name</th>
                    <th style="width:18%;">Action</th>
                </tr>
            </thead>
            <tbody>
				<?php $i=1; foreach($category as $category){?>
				<tr>
					<td><?php echo $i;?></td>
					<td><img src="<?php echo base_url('assets/upload/image/'.$category['icon'])?>" width="50" height="50"></td>
					<td><?php echo $category['categories_name']?></td>
					<td>
					<a href="<?php echo base_url('admin/categorie_kode/edit/'.$category['id_category'])?>" class="btn btn-primary">Edit</button>
					<a href="<?php echo base_url('admin/categorie_kode/delete/'.$category['id_category'])?>" class="btn btn-danger">Hapus</button>
					</td>
				</tr>
				<?php $i++; } ?>
            </tbody>

            <tfoot>
            <tr>
                <th>#</th>
                <th>Icon</th>
                <th>Categories Name</th>
                <th style="width:18%;">Action</th>
            </tr>
            </tfoot>
        </table>

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

<!-- Bootstrap modal -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
		<form action="<?php echo base_url('admin/categorie_kode')?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Create Categori</h3>
            </div>
            <div class="modal-body form">
                
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Kategori</label>
                            <div class="col-md-9">
                                <input name="categories_name" placeholder="Nama Kategori" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
						
						<div class="form-group">
							<label class="control-label col-md-3">Upload Icon</label>
							<div class="col-md-9">
							<input type="file" name="icon" class="form-control" id="file">
							<div id="imagePreview"></div>
							</div>
						</div>
                    </div>
					
                
            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
        </div><!-- /.modal-content -->
		</form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
</body>
</html>