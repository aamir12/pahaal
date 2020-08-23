<?php 
include_once('include/header.php'); 
$user_id = $this->session->userdata('user_id');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		<h1>Profile<small>Preview</small></h1>
		<!-- <ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="#">Profile</a></li>
		</ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
		
		<div id="alert-msg"></div>
		
		<div class="row">
			<!-- left column -->
			<div class="col-md-6">
				<!-- general form elements -->
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Personal Information</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<form role="form" method="post" id="updateProfile"  onsubmit="return updateProfile();" enctype="multipart/form-data">
						<div class="box-body">
							<div class="form-group">
								<label class=" form-control-label">First Name</label>
								<input type="text" name="fname" id="fname" value="<?php echo $userdata['fname'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label class=" form-control-label">Last Name</label>
								<input type="text" name="lname" id="lname" value="<?php echo $userdata['lname'] ?>" class="form-control">
							</div>
							
							
							<div class="form-group">
								<label class=" form-control-label">Email</label>
								<input type="text" id="email" name="email" disabled value="<?php echo $userdata['email'] ?>" class="form-control">
							</div>
						
							<div class="form-group">
								<label>Profile</label>
								<input type="file" name="profile_image" onchange="preview_image(this,'profile_image','top_admin_image')">
								<?php if($userdata['profile_image']){ ?>
								<img id="profile_image" src="<?php echo site_url().'assets/img/profile_image/'.$userdata['profile_image']; ?>" style="height: 50px;width: 50px;" alt="<?php echo $userdata['fname'] ?>">
								<?php } else { ?>
								<img id="profile_image" src="<?php echo base_url();?>assets/img/profile_image/user_dammy.jpg" class="user-image" alt="<?php echo $userdata['fname'] ?>">
								<?php } ?>
							</div>
						</div>
						<div class="box-footer">
							
							<button  type="submit" name="submit" id="updateProfileBtn"  class="btn btn-success">Update</button>
						</div>
					</form>
				</div>
			</div>

			<div class="col-md-6">
				<!-- general form elements -->
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Change Password</h3>
					</div>
			
					<form role="form" method="post" id="changePassword" onsubmit="return changePassword();">
						<div class="box-body">
							<div id="error_pass"></div>
							<div class="form-group">
								<label class=" form-control-label">Current Password</label>
								<input type="password" name="admin_pass" id="Current_Password" class="form-control">
							</div>
							<div class="form-group">
								<label class=" form-control-label">New Password</label>
								<input type="password" name="New_Password" id="New_Password" class="form-control">
							</div>
							<div class="form-group">
								<label class=" form-control-label">Confirm Password</label>
								<input type="password" name="Confirm_Password" id="Confirm_Password" class="form-control">
							</div>
						</div>

						<div class="box-footer">
							
							<button  type="submit" name="submit" id="changePasswordBtn"  class="btn btn-success">Change</button>
						</div>
					</form>
				</div>
			</div>
		</div>
    </section>
</div>
 
<?php include_once('include/footer.php'); ?>
<script>
   function updateProfile(){
	var formData = new FormData($('#updateProfile')[0]);
   	$.ajax({
   		type:'POST',
   		url:site_url+'update-admin',
   		data:formData,
   		dataType:'json',
		cache:false,
        contentType: false,
        processData: false,
   		beforeSend:function(){
   			$('#updateProfileBtn').prop('disabled',true);
   			$('#updateProfileBtn').html('Update <i class="fa fa-spinner fa-spin fa-fw"></i>');
   		},
   		success:function(resp){
   			$('#updateProfileBtn').prop('disabled',false);
            $('#updateProfileBtn').html('Update');
   			if(resp.status==1){
				$('#alert-msg').html(resp.msg);
				$('.hidden-xs').html(resp.name);
				$('.admin_name').html(resp.name);

   			} else {
   				$('#alert-msg').html(resp.msg);
   			}
   		}
   	});
   	return false;
}

function changePassword(){
	
   	$.ajax({
   		type:'POST',
   		url:site_url+'update-admin-password',
   		data:$('#changePassword').serialize(),
   		dataType:'json',
		
   		beforeSend:function(){
   			$('#changePasswordBtn').prop('disabled',true);
   			$('#changePasswordBtn').html('Change <i class="fa fa-spinner fa-spin fa-fw"></i>');
   		},
   		success:function(resp){
   			$('#changePasswordBtn').prop('disabled',false);
            $('#changePasswordBtn').html('Change');
   			if(resp.status==1){
				$('#alert-msg').html(resp.msg);
				$('#changePassword')[0].reset()
				
   			} else {
   				$('#alert-msg').html(resp.msg);
   			}
   		}
   	});
   	return false;
}
</script>
