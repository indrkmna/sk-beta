<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="<?php echo base_url('admin/dasbor') ?>">
    
	<?php echo $site['nameweb'] ?></a> 
</div>
<div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> 
<?php
date_default_timezone_set('Asia/Jakarta');
$tgl_sekarang = date('F, d M Y');
echo $tgl_sekarang;

// Data user
$admin_id		= $this->session->userdata('id');
$name_session 	= $this->mAdmins->get_by_id($admin_id);
?>
 &nbsp; <a href="#" class="btn btn-danger square-btn-adjust"><i class="fa fa-user"></i> <?php echo $name_session->username ?></a> <a href="<?php echo base_url('admin/login/logout') ?>" class="btn btn-danger square-btn-adjust"><i class="fa fa-sign-out"></i> Logout</a> <a href="<?php echo base_url() ?>" class="btn btn-danger square-btn-adjust" target="_blank"><i class="fa fa-home"></i> Homepage</a> 
  </div>
</nav> 