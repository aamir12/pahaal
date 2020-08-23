<?php 
   include_once('include/header.php'); 
   $user_id = $this->session->userdata('user_id');
?>

<div class="content-wrapper"
  ng-app="myApp"
  ng-controller="optionController"
  ng-init="initData('<?=$id?>')">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Edit Option</h1>
    <ol class="breadcrumb">
      <li><a href="<?=site_url().'Admin'; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="<?=site_url().'Admin/options'; ?>">Option Management</a></li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content" id="mainContent" style="display:none;">
    <div class="row">
      <form role="form" ng-submit="updateOption()" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?=site_url().'Admin/options'; ?>" id="URL">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-body">
				<div class="form-group">
					<label class=" form-control-label">Option Name</label>
					<input type="text" ng-model="optionName" name="optionName" id="optionName"  class="form-control" required >
				</div>
				<!-- <div class="form-group">
					<label class=" form-control-label">Option Type</label>
					<select name="optionType" class="form-control" id="optionType" ng-model="optionType" required  
					> 	<option selected value="">Select option type </option>
						<option value="select">Select (Dropdown)</option>
						<option value="radio">Radio (Button)</option>
					</select>
				</div> -->

                <h4>Optons Values</h4>
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<tr>
							<th>
								Option Value Name
							</th>
							<th>
								Sort Order
							</th>
							<th></th>
						</tr>

						<tr ng-repeat="option in Options">
							<td>
								<input type="text" class="form-control" ng-model="option.optionKey">
							</td>
							<td>
								<input type="number" class="form-control" tonumber  ng-model="option.sortOrder">
							</td>
							<td>
								<button type="danger" ng-click="deleteOption($index)" class="btn btn-danger">
									<i class="fa fa-trash"></i>
								</button>
							</td>
						</tr>
						<tr>
							<td colspan="2"></td>
							<td class="w50px">
								<button type="button" class="btn btn-primary" ng-click="addOption()">
									<i class="fa fa-plus"></i>
								</button>
							</td>
						</tr>
					</table>
				</div>
				
            </div>
            <div class="box-footer">
              <button 
			    type="submit" 
				name="submit" 
				ng-disabled="btnDisable"
				class="btn btn-success">
				<i ng-if="!btnDisable" class="fa fa-save"></i>
				<i ng-if="btnDisable" class="fa fa-circle-o-notch fa-spin"></i>
				Save</button>

				<a class="btn btn-danger"
				   href="<?=site_url().'Admin/options'; ?>">
				   <i class="fa fa-share-square"></i>
				    Cancel
				</a>
            </div>
          </div>
        </div>

      </form>
    </div>
  </section>
</div>
<?php include_once('include/footer.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular.min.js"></script>
<script src="<?php echo site_url(); ?>assets/admin/ng-controllers/optionsController.js"></script>
<script src="<?php echo site_url(); ?>assets/ng-directives/custom.js"></script>


