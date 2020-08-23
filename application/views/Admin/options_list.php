<?php 
   include_once('include/header.php'); 
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Option<small>Management</small></h1>
    <ol class="breadcrumb">
      <li><a href="<?=site_url().'Admin'; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li class="active">Option</li>
    </ol>
  </section>
   
  <!-- Main content -->
  <section class="content">
   <?=$this->session->flashdata('msg'); ?>
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Option</h3>
            <div class="pull-right">
              <a  class="btn btn-info pull-right"  href="<?=site_url().'Admin/options/addOption';?>"><i class="fa fa-plus"></i> Add</a>
            </div>
          </div>
   
          <div class="box-body">
            <div class="table-responsive">
            <table class="table DataTable table-hover">
              <thead>
                <tr>
                  <th>Option</th>
			        	  <!-- <th>Type</th> -->
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  if(!empty($options)){
                    foreach($options as $key => $value){
                ?>
                      <tr>
                        <td><?=$value['optionName'];?></td>
					            	<!-- <td><?=$value['optionType'];?></td> -->
                        <td class="text-center">
                          <a class="btn btn-primary btn-xs"  href="<?=site_url().'Admin/options/editOption/'.$value['id']; ?>"><i class="fa fa-edit"></i></a>
													 <?php 
													   if($value['defaultOption']=='0'){ ?>
															 <a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this option?')" href="<?=site_url().'Admin/options/deleteOption/'.$value['id']; ?>"><i class="fa fa-trash"></i></a>
														<?php } ?>
                        </td>
                      </tr>
                      
                <?php
                    }
                  }else{
                ?>
                      <tr>
                        <td colspan="2" class="text-center"><strong>No Record Found!</strong> Click the add button to create your first filter.</td>
                      </tr>
                <?php
                  }
                ?>
              </tbody>
            </table>
         </div>
          </div>
        </div>
      </div>
    </div>
      <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include_once('include/footer.php'); ?>
