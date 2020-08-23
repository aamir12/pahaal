<?php 

   include_once('include/header.php'); 

   ?>

<div class="content-wrapper">

   <section class="content-header">

      <h1>Category<small>Management</small></h1>

      <ol class="breadcrumb">

         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

         <li><a href="#">Category</a></li>

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

                  <h3 class="box-title">Category</h3>

                  <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#AddModal">Add <i class="fa fa-plus"></i></button>

               </div>

               <div class="box-body">

                  <div class="table-responsive">

                     <table id="bootstrap-data-table" class="table table-striped table-bordered DataTable">

                        <thead>

                           <tr>

                              <th>S.No.</th>

                              <th>Category Name</th>

                              <th>Category Image</th>

                              <th>Action</th>

                           </tr>

                        </thead>

                        <tbody>

                           <?php if(count($category) > 0){ ?>

                           <?php foreach($category as $key => $value){ 

                              ?>

                           <tr>

                              <td><?=$key+1;?></td>

                              <td><?=$value['cat_name']; ?></td>
                              <?php
                              if($value['category_image']!=''){
                                 $imageurl=site_url().'assets/img/category_image/'.$value['category_image'];
                              }else{
                                 $imageurl=site_url().'assets/img/noimage.png';
                              }
                              ?>
                              <td><img src="<?=$imageurl; ?>" style="height: 50px;"></td>

                              <td>

                                 <a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this category?')" href="<?=site_url().'Admin/Category/delete_category/'.$value['id']; ?>"><i class="fa fa-trash"></i></a>

                                 <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#EditModal<?= $value['id'];?>"><i class="fa fa-edit"></i></button>

                              </td>

                           </tr>

                           <div id="EditModal<?= $value['id'];?>" class="modal fade" role="dialog">

                              <div class="modal-dialog">

                                 <!-- Modal content-->

                                 <div class="modal-content">

                                    <div class="modal-header">

                                       <button type="button" class="close" data-dismiss="modal">&times;</button>

                                       <h4 class="modal-title">Edit Category</h4>

                                    </div>

                                    <form id="edit_category<?= $value['id'];?>" method="post" enctype="multipart/form-data" onsubmit="return edit_category(<?= $value['id'];?>);">

                                       <div class="modal-body">

                                          <div class="edit_msg<?= $value['id'];?>"></div>

                                          <div class="form-group">

                                             <label>Category Name</label>

                                             <input type="text" class="form-control" name="cat_name" value="<?= $value['cat_name'];?>" required>

                                          </div>

                                          <div class="form-group">

                                             <label>Category Image</label>

                                             <input type="file" class="form-control" name="category_image"  ><br>

                                             <img src="<?=$imageurl; ?>" style="height: 50px;">

                                          </div>

                                          

                                          <input type="hidden" name="id" value="<?= $value['id'];?>" required>

                                       </div>

                                       <div class="modal-footer">

                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                          <button type="submit" class="btn btn-primary updateBtn">Update</button>

                                       </div>

                                    </form>

                                 </div>

                              </div>

                           </div>

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

<div id="AddModal" class="modal fade" role="dialog">

   <div class="modal-dialog">

      <!-- Modal content-->

      <div class="modal-content">

         <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Add Category</h4>

         </div>

         <form id="add_category" method="post" enctype="multipart/form-data" onsubmit="return add_category();">

            <div class="modal-body">

               <div class="add_msg"></div>

               <div class="form-group">

                  <label>Category Name</label>

                  <input type="text" class="form-control" name="cat_name" value="" required>

               </div>

               <div class="form-group">

                  <label>Category Image</label>

                  <input type="file" class="form-control" name="category_image" accept="image/*" >

               </div>

            </div>

            <div class="modal-footer">

               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

               <button type="submit" class="btn btn-primary addBtn">Add</button>

            </div>

         </form>

      </div>

   </div>

</div>

<?php include_once('include/footer.php'); ?>

<script>

   function add_category(){

      var form = jQuery('#add_category')[0];

      var formData= new FormData(form);

   	$.ajax({

   		type:'POST',

   		url:site_url+'Admin/Category/add_category',

   		data:formData,

   		dataType:'json',

         contentType: false,

         cache: false,

         processData:false,

   		beforeSend:function(){

   			$('.btn').prop('disabled',true);

   			$('.addBtn').html('Add <i class="fa fa-spinner fa-spin fa-fw"></i>');

   		},

   		success:function(resp){

   			$('.btn').prop('disabled',false);

            $('.addBtn').html('Add');

   			if(resp.status==1){

   				location.reload();

   			} else {

   				$('.add_msg').html(resp.msg);

   			}

   		}

   	});

   	return false;

   }

   function edit_category(id){

      var form = jQuery('#edit_category'+id)[0];

      var formData= new FormData(form);

   	$.ajax({

   		type:'POST',

   		url:site_url+'Admin/Category/edit_category',

   		data:formData,

   		dataType:'json',

         contentType: false,

         cache: false,

         processData:false,

   		beforeSend:function(){

   			$('.btn').prop('disabled',true);

   			$('.updateBtn').html('Update <i class="fa fa-spinner fa-spin fa-fw"></i>');

   		},

   		success:function(resp){

   			$('.btn').prop('disabled',false);

   			$('.updateBtn').html('Update');

   			if(resp.status==1){

   				location.reload();

   			} else {

   				$('.edit_msg'+id).html(resp.msg);

   			}

   		}

   	});

   	return false;

   }

   

</script>



