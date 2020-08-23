<!DOCTYPE html>
<html>
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
    
 
</head>
	<body class="hold-transition login-page">
		<div class="login-box">
			<div class="login-logo">
				<img src="<?=base_url();?>assets/img/default_image/<?=$default_content['logo'] ?>" height="60px" width="auto"  alt="<?=$default_content['site_title'] ?>">
				<!-- <a href="../../index2.html"><b>Admin</b>LTE</a> -->
			</div>
			<?=$this->session->flashdata('msg'); ?>
			<!-- /.login-logo -->
			<div class="login-box-body">
				<p class="login-box-msg">Sign in to start your session</p>
				<form role="form" id="login_form1" action="<?=site_url().'Admin/login/do_login'; ?>" method="post">
					<div class="form-group">
						<label>Email address</label>
						<input type="text" class="form-control" name="email" id="email">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="password" id="password">
					</div>
					<button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
					
				</form>
			</div>
		</div>
		<script src="<?=site_url(); ?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
		<script src="<?=site_url(); ?>assets/admin/bower_components/jquery-ui/jquery-ui.min.js"></script>

		<script src="<?=site_url(); ?>assets/admin/dist/js/adminlte.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
		<script src="<?=site_url(); ?>assets/admin/custom/custom.js"></script>
	</body>
</html>