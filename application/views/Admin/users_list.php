<?php 
   include_once('include/header.php'); 
   ?>
<div class="content-wrapper">
   <section class="content-header">
      <h1>Users<small>Management</small></h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="#">Users</a></li>
         <li class="active">List</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <?=$this->session->flashdata('msg'); ?>
      <div class="row">
         <div class="col-xs-12">
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">Customer</h3>
                  
               </div>
               <div class="box-body">
                  <div class="table-responsive">
                     <table id="bootstrap-data-table" class="table table-striped table-bordered DataTable">
                        <thead>
                           <tr>
                              <th>S.No.</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Address</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php if(count($users) > 0){ ?>
                           <?php foreach($users as $key => $value){ 
                              ?>
                           <tr>
                              <td><?= $key+1;?></td>
                              <td><?=$value['fname']; ?></td>
                              <td><?=$value['lname']; ?></td>
                              <td><?=$value['email']; ?></td>
                              <td><?=$value['phone']; ?></td>
                              <td><?=$value['address']; ?></td>
                              <td>
                              <?php 
                              if($value['status']==1){
                              	?>
                              	<a class="btn btn-success btn-xs" onclick="return confirm('Are you sure you want to deactive this User?')" href="<?=site_url().'Admin/Users/deactive_user/'.$value['id']; ?>">Active</a>
                              	<?php
                              }else{
                              	?>
                              	<a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to active this User?')" href="<?=site_url().'Admin/Users/active_user/'.$value['id']; ?>">Deactive</a>
                              	<?php
                              }
                              ?>
                               	
                               </td>
                              <td>
                                 <a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this User?')" href="<?=site_url().'Admin/Users/delete_user/'.$value['id']; ?>"><i class="fa fa-trash"></i></a>
                                 
                              </td>
                           </tr>
                           
                           <?php } ?>
                           <?php } ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>

<?php include_once('include/footer.php'); ?>


