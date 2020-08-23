<?php 
   include_once('include/header.php'); 
   $user_id = $this->session->userdata('user_id');
?>

<div 
  class="content-wrapper"
  ng-app="myApp"
  ng-controller="filterController"
  ng-init="initData('<?=$id?>')">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Edit Filter</h1>
    <ol class="breadcrumb">
      <li><a href="<?=site_url().'Admin'; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="<?=site_url().'filter'; ?>">Filter Management</a></li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content" id="mainContent" style="display:none;">
    <div class="row">
      <form role="form" ng-submit="updateFilter()" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?=site_url().'Admin/filter'; ?>" id="URL">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-body">
				<div class="form-group">
					<label class=" form-control-label">Filter Group Name</label>
					<input type="text" ng-model="filtergroup" name="filtergroup" id="filtergroup"  class="form-control" required >
				</div>
				<div class="form-group">
					<label class=" form-control-label">Sort Order</label>
					<input type="number" ng-model="sortOrder" name="sortOrder" id="sortOrder" tonumber  class="form-control" placeholder="0" >
				</div>

                <h4>Filter</h4>
				<div class="table-responsive">
					<table class="table">
						<tr>
						<th>
							Filter Name
						</th>
						<th>
							Sort Order
						</th>
						<th></th>
						</tr>

					<tr ng-repeat="filter in filterOptions | orderBy:'sortOrder'">
						<td>
							<input type="text" class="form-control" ng-model="filter.filterOption">
						</td>
						<td>
							<input type="number" class="form-control" ng-model="filter.sortOrder" tonumber>
						</td>
						<td>
							<button type="danger" ng-click="deleteFilter($index)" class="btn btn-danger">
								<i class="fa fa-trash"></i>
							</button>
						</td>
					</tr>
					<tr>
						<td colspan="2"></td>
						<td class="w50px">
							<button type="button" class="btn btn-primary" ng-click="addFilter()">
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
				   href="<?=site_url().'Admin/filter'; ?>">
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
<script src="<?php echo site_url(); ?>assets/admin/ng-controllers/filterController.js"></script>
<script src="<?php echo site_url(); ?>assets/ng-directives/custom.js"></script>


