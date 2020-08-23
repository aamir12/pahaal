<!DOCTYPE html>
<html>
<?php
$default_content= $this->common_model->GetSingleData('default_content',array('id'=>1));
?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?=$default_content['site_title'] ?></title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" href="<?=site_url(); ?>assets/img/favicon.png">
	<link rel="stylesheet" href="<?=site_url(); ?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=site_url(); ?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=site_url(); ?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="<?=site_url(); ?>assets/admin/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?=site_url(); ?>assets/admin/dist/css/skins/_all-skins.min.css">
	
	<link rel="stylesheet" href="<?=site_url(); ?>assets/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="<?=site_url(); ?>assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css">
	
	<link rel="stylesheet" href="<?=site_url(); ?>assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<link rel="stylesheet" href="<?=site_url(); ?>assets/admin/custom/style.css">
	<link rel="shortcut icon" href="<?=base_url();?>assets/img/default_image/<?=$default_content['site_icon'] ?>" type="image/png">
	
	<style type="text/css">
		.skin-blue .main-header .logo {
			background-color: #ffff  !important; 
		}
	</style>
	<script>
		var site_url = '<?=site_url(); ?>';
	</script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php 
$user_id = $this->session->userdata('user_id');
$userdata= $this->common_model->GetSingleData('admin',array('id'=>$user_id));
 ?>
	<div class="wrapper">
		<header class="main-header">
			<!-- Logo -->
			<a href="<?=site_url();?>Admin/home" class="logo">
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><img id="main_logo" src="<?=base_url();?>assets/img/default_image/<?=$default_content['logo'] ?>" height="30px" width="auto"  alt="<?=$default_content['site_title'] ?>"></span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- User Account: style can be found in dropdown.less -->
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<?php if($userdata['profile_image']==''){ ?>
                                  <img id="top_admin_image" src="<?=base_url();?>assets/img/profile_image/user_dammy.jpg" class="user-image" alt="<?=$userdata['fname']?>">
								<?php } else { ?>
									 <img id="top_admin_image" src="<?=base_url().'assets/img/profile_image/'.$userdata['profile_image']; ?>" class="user-image" alt="<?=$userdata['fname']?>">
								<?php } ?>
								
								<span class="hidden-xs" ><?=$userdata['fname'].' '.$userdata['lname'] ?></span>
							</a>
							<ul class="dropdown-menu">
								<!-- User image -->
								<li class="user-header">
									<!-- <img src="<?=base_url();?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> -->
									<p><?=$userdata['fname'].' '.$userdata['lname'] ?></p>
								</li>
								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="pull-left">
										<a href="<?=site_url().'Admin/profile';?>" class="btn btn-default btn-flat">Profile</a>
									</div>
									<div class="pull-right">
										<a href="<?=site_url().'Admin/home/logout';?>" class="btn btn-default btn-flat">Sign out</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>
<?php include_once('sidebar.php');?>	  