    
       <button class="btn btn-primary" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i> Create FAQ</button>
        <br />
        <br />
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Faq Name</th>
                    <th>Status</th>
                    <th style="width:18%;">Action</th>
                </tr>
            </thead>
            <tbody>
				<?php $i=1; foreach($faq as $faq){?>
				<tr>
					<td><?php echo $i;?></td>
					<td><?php echo $faq['faq_name']?></td>
					<td><?php echo $faq['status']?></td>
					<td>
					<a href="<?php echo base_url('admin/faq/edit/'.$faq['faq_id'])?>" class="btn btn-primary">Edit</button>
					<a href="<?php echo base_url('admin/faq/delete/'.$faq['faq_id'])?>" class="btn btn-danger">Hapus</button>
					</td>
				</tr>
				<?php $i++; } ?>
            </tbody>

            <tfoot>
            <tr>
                <th>#</th>
                <th>Faq Name</th>
                <th>Status</th>
                <th style="width:18%;">Action</th>
            </tr>
            </tfoot>
        </table>
<!-- Bootstrap modal -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
		<form action="<?php echo base_url('admin/faq')?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Create Faq</h3>
            </div>
            <div class="modal-body form">
                
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Faq Name</label>
                            <div class="col-md-9">
                                <input name="faq_name" placeholder="Faq Name" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
					
					<div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Faq Description</label>
                            <div class="col-md-9">
                               <textarea name="faq_description" rows="5" class="form-control" placeholder="Description"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
					
					<div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Satatus</label>
							<div class="col-md-9">
							<select name="status" class="form-control">
								<option value="publish">Publish</option>
								<option value="draf">Draf</option>
							</select>
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