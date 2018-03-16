<!-- Container -->
<div class="container">
	<div class="row">
		<div class="col-md-12">
		    <div class="container" style="margin-top:20px">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- @download-page_ -->
            <ins class="adsbygoogle"
                 style="display:inline-block;width:970px;height:90px"
                 data-ad-client="ca-pub-9863358980914739"
                 data-ad-slot="3561837037"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>		 
            </div>
			<section id="not-found">
			<table class="basic-table">
				<tbody>
					<tr>
						<th>Nama File</th>
						<th>Deskripsi</th>
					</tr>
					<?php foreach ($files as $file){?>
					<tr>
						<td data-label="Column 1">
							<?php echo $file['file_name'];?><br>
							<a href="<?php echo base_url('assets/upload/image/'.$file['file_url']);?>" download>
							 <b>Download</b></a>														
						</td>
						<td data-label="Column 2"><?php echo $file['file_description'];?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			</section>
		</div>
	</div>
</div>
<!-- Container / End -->
