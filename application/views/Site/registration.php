<?php include_once('include/header.php'); ?>
<style>
.terms-and-conditions {
	height: 300px;
	overflow: auto;
}
</style>
<div class="container">
	<div class="row" style="margin-bottom: 50px;">
		<div class="col-sm-offset-3 col-sm-6">
			<div class="text-center logo" style="margin-top: 50px;">
				<img src="<?php echo site_url(); ?>assets/img/logo.png" height="200px" width="auto" alt="User Image">
				<h3>Doctor registration</h3>
			</div>
			<?php if($user){ ?>
			<?php if($user['type']==3){

			$table = ($user['belong_to']=='Hospital')?'hospital':'community';
			
			$factory_name = '';
			
			if($user['belong_to_id']){
				$factory_name = $this->common_model->GetColumnName($table,array('id'=>$user['belong_to_id']),array('name'));
			}

			?>
			<form action="<?php echo base_url(); ?>Home/do_ragistration " method="post" >
				<div class="msg"></div>
				<input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">
				<input type="hidden" name="token" value="<?php echo $_REQUEST['token']; ?>">
				<div class="form-group">
					<label>First Name</label>
					<input type="text" class="form-control" name="fname" value="<?= $user['fname'];?>" required>
				</div>
				<div class="form-group">
					<label>Last Name</label>
					<input type="text" class="form-control" name="lname" value="<?= $user['lname'];?>" required>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" class="form-control" readonly value="<?= $user['email'];?>" required>
				</div>
				
				<div class="form-group">
					<label>Gender</label>
					<select class="form-control" name="gender" required>
						<option value="">Select Gender</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
				</div>
				<div class="form-group">
					<label>Factory</label>
					<input type="text" class="form-control" readonly value="<?php echo 	($factory_name)?$factory_name['name']:'Individual'; ?>" required>
				</div>
<?php         $division1 = $this->common_model->GetColumnName('division',array('id'=>$user['division_id']),array('division'));
				$zone1 = $this->common_model->GetColumnName('zone',array('id'=>$user['zone_id']),array('zone')); ?>
				<div class="form-group">
					<label>Division</label>
					<input type="text" class="form-control" readonly value="<?php echo $division1['division']; ?>" required>
				</div>

				<div class="form-group">
					<label>Zone</label>
					<input type="text" class="form-control" readonly value="<?php echo 	$zone1['zone']; ?>" required>
				</div>
				
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" value="" required>
				</div>
				<div class="form-group">
					<label>Phone</label>
					<input type="text" class="form-control" name="phone" value="<?= $user['phone'];?>" required>
				</div>
				<div class="form-group">
					<label>Note</label>
					<textarea class="form-control" name="note" value="" required></textarea>
				</div>
				<div class="terms-and-conditions" id="terms">
					<div  style="">
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
						
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
						
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
						
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
						
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
						
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
						
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
						
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
						
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
						
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
						
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
						
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
						
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
						
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
					
					</div>
				</div>
				
				<input type="hidden" name="id" value="<?= $user['id'];?>" required>
				<div class="checkbox">
					<label><input type="checkbox" id="is_accept_terms" name="is_accept_terms" value="1" required disabled>Accept terms and conditions</label>
				</div>
				<button type="submit" disabled class="btn btn-primary btn-prop">Confirm</button>
			</form>
			
			<?php } else { ?>
			<div class="alert alert-danger">Something went wrong try again later.</div>
			<p><a href="<?php echo site_url().'Admin/login'; ?>">Login</a></p>
			<?php } ?>
			<?php } else { ?>
			<div class="alert alert-danger">Your link has been expired.</div>
			<?php } ?>
		</div>
	</div>
</div>
<script>
	$(".terms-and-conditions").scroll(function () {
    var ele = document.getElementById('terms');
    if (ele.scrollHeight - ele.scrollTop === ele.clientHeight)
    {
        $('#is_accept_terms').removeAttr('disabled');
        $('.btn-prop').removeAttr('disabled');
    }
});
</script>
<?php include_once('include/footer.php'); ?>