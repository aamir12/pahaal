<?php 
   include_once('include/header.php'); 
   ?>
<div class="content-wrapper">
   <section class="content-header">
      <h1>Subcategory<small>Management</small></h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="#">Subcategory</a></li>
         <li class="active">List</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <?php echo $this->session->flashdata('msg'); ?>
      <div class="row">
         <div class="col-xs-12">
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">Subcategory</h3>
                  <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#AddModal">Add <i class="fa fa-plus"></i></button>
               </div>
               <div class="box-body">
                  <div class="table-responsive">
                     <table id="bootstrap-data-table" class="table table-striped table-bordered DataTable">
                        <thead>
                           <tr>
                              <th>S.No.</th>
                              <th>Subcategory Name</th>
                              <th>Category Name</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php if(count($subcategory) > 0){ ?>
                           <?php foreach($subcategory as $key => $value){ 
                              ?>
                           <tr>
                              <td><?= $key+1;?></td>
                              <td><?php echo 	$value['subcategory']; ?></td>
                              <?php
                              $catData= $this->common_model->GetSingleData('category',array('id'=>$value['cat_id']));
                             
                              ?>
                              <td><?=$catData['cat_name']?></td>
                              <td>
                                 <a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this subcategory?')" href="<?php echo site_url().'Admin/Subcategory/delete_subcategory/'.$value['id']; ?>"><i class="fa fa-trash"></i></a>
                                 <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#EditModal<?= $value['id'];?>"><i class="fa fa-edit"></i></button>
                              </td>
                           </tr>
                           <div id="EditModal<?= $value['id'];?>" class="modal fade" role="dialog">
                              <div class="modal-dialog">
                                 <!-- Modal content-->
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                                       <h4 class="modal-title">Edit Subcategory</h4>
                                    </div>
                                    <form id="edit_subcategory<?= $value['id'];?>" onsubmit="return edit_subcategory(<?= $value['id'];?>);">
                                       <div class="modal-body">
                                          <div class="edit_msg<?= $value['id'];?>"></div>
                                          <div class="form-group">
                                             <label>Subcategory Name</label>
                                             <input type="text" class="form-control" name="subcategory" value="<?= $value['subcategory'];?>" required>
                                          </div>
                                          <div class="form-group">
                                             <label>Category</label>
                                             <select class="form-control"  name="cat_id" required>
                                                <option value="">Select Category</option>
                                                <?php foreach($category as $value_cat) { ?>
                                                   <option <?php if($value_cat['id']==$value['cat_id']){ echo "selected"; } ?> value="<?php echo $value_cat['id']; ?>" ><?php echo $value_cat['cat_name']; ?></option>
                                                <?php } ?>
                                                
                                             </select>
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
            <h4 class="modal-title">Add Subcategory</h4>
         </div>
         <form id="add_subcategory" onsubmit="return add_subcategory();">
            <div class="modal-body">
               <div class="add_msg"></div>
               <div class="form-group">
                  <label>Subcategory Name</label>
                  <input type="text" class="form-control" name="subcategory" value="" required>
               </div>
               <div class="form-group">
                  <label>Category</label>
                  <select class="form-control"  name="cat_id" required>
                     <option value="">Select Category</option>
                     <?php foreach($category as $value_cat) { ?>
                        <option value="<?php echo $value_cat['id']; ?>" ><?php echo $value_cat['cat_name']; ?></option>
                     <?php } ?>
                     
                  </select>
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
   function add_subcategory(){
   	$.ajax({
   		type:'POST',
   		url:site_url+'Admin/Subcategory/add_subcategory',
   		data:$('#add_subcategory').serialize(),
   		dataType:'json',
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
   function edit_subcategory(id){
   	$.ajax({
   		type:'POST',
   		url:site_url+'Admin/Subcategory/edit_subcategory',
   		data:$('#edit_subcategory'+id).serialize(),
   		dataType:'json',
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

