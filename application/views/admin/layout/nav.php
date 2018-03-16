<!-- /. NAV TOP  -->
<nav class="navbar-default navbar-side" role="navigation">
<div class="sidebar-collapse">
<ul class="nav" id="main-menu">
	<li><a  href="<?php echo base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="#"><i class="fa fa-wrench"></i> Pengaturan<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/dashboard/config') ?>">Umum</a></li>
            <li><a href="<?php echo base_url('admin/dashboard/logo') ?>">Logo</a></li>
            <li><a href="<?php echo base_url('admin/dashboard/icon') ?>">Icon</a></li>
            <li><a href="<?php echo base_url('admin/dashboard/banner') ?>">Home Banner</a></li>
            <li><a href="<?php echo base_url('admin/dashboard/locations') ?>">Lokasi</a></li>
            <li><a href="<?php echo base_url('admin/dashboard/social') ?>">Sosial Media</a></li>
            <li><a href="<?php echo base_url('admin/faq') ?>">FAQ</a></li>
            <li><a href="<?php echo base_url('admin/dashboard/privacy') ?>">Privacy Policy</a></li>
        </ul>
    </li>  
    <li><a href="#"><i class="fa fa-user"></i> User<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/users/admin') ?>">Daftar Admin</a></li>
        </ul>
    </li>   
    <li><a href="#"><i class="fa fa-list"></i> Kategori<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/categories') ?>">Daftar Kategori</a></li>    
            <li><a href="<?php echo base_url('admin/categorie_kode') ?>">Daftar Kategori Kode</a></li>    
        </ul>
    </li> 
</ul>
</div>

</nav>  
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
<div id="page-inner">


<div class="row">
<div class="col-md-12">
    <!-- Advanced Tables -->
    <div class="panel panel-default">
        <div class="panel-heading">
             <h2><?php echo $title ?></h2>
        </div>
        <div class="panel-body">
            <div class="table-responsive">