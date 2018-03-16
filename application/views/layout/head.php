<!DOCTYPE html>
<head>
	<title><?php echo $title;?></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/style.css?v1">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/colors/main.css" id="colors">
        <link rel="icon" href="<?php echo base_url('assets/upload/image/'.$site['icon']);?>" type="image/gif" sizes="16x16">
        
        <style>
        .comments .avatar{
            width: 100px;
            height: 80px;
        }
        .comments .avatar img{
            display: inline-block;
            width: 100%;
            height: 100%;
        }
        
        .user-profile-avatar{
            width: 100px;
            height: 100px;
        }
        
        .hosted-by-avatar{
            width: 56px;
            height: 56px;
        }
        </style>
</head>