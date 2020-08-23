<?php 
   include_once('include/header.php'); 
   ?>
<div class="content-wrapper">
   <section class="content-header">
      <h1>Coupon<small>Management</small></h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="#">Coupon</a></li>
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
                  <h3 class="box-title">Coupon</h3>
                  <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#AddModal">Add <i class="fa fa-plus"></i></button>
               </div>
               <div class="box-body">
                  <div class="table-responsive">
                     <table id="bootstrap-data-table" class="table table-striped table-bordered DataTable">
                        <thead>
                           <tr>
                              <th>S.No.</th>
                              <th>Title</th>
                              <th>Discount (%)</th>
                              <th>Expiry Date</th>
                              <th>Description</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php if(count($coupon) > 0){ ?>
                           <?php foreach($coupon as $key => $value){ 
                              ?>
                           <tr>
                              <td><?= $key+1;?></td>
                              <td><?=$value['title']; ?></td>
                              <td><?=$value['discount']; ?></td>
                              <td><?=$value['expiry_date']; ?></td>
                              <td><?=$value['description']; ?></td>
                              <td>
                                 <a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this coupon?')" href="<?=site_url().'Admin/Coupon/delete_coupon/'.$value['id']; ?>"><i class="fa fa-trash"></i></a>
                                 <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#EditModal<?= $value['id'];?>"><i class="fa fa-edit"></i></button>
                              </td>
                           </tr>
                           <div id="EditModal<?= $value['id'];?>" class="modal fade" role="dialog">
                              <div class="modal-dialog">
                                 <!-- Modal content-->
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                                       <h4 class="modal-title">Edit Coupon</h4>
                                    </div>
                                    <form id="edit_coupon<?= $value['id'];?>" onsubmit="return edit_coupon(<?= $value['id'];?>);">
                                       <div class="modal-body">
                                          <div class="edit_msg<?= $value['id'];?>"></div>
                                          <div class="form-group">
                                             <label>Title</label>
                                             <input type="text" class="form-control" name="title" value="<?= $value['title'];?>" required>
                                          </div>
                                          <div class="form-group">
                                             <label>Discount</label>
                                             <input type="number" class="form-control" name="discount" value="<?= $value['discount'];?>" required>
                                          </div>
                                          <div class="form-group">
                                             <label>Expiry Date</label> 
                                             <input type="date" class="form-control" min="<?=date('Y-m-d')?>" name="expiry_date" value="<?= $value['expiry_date'];?>" required >
                                          </div>
                                          

                                          <div class="form-group">
                                             <label>Description</label>
                                             
                                             <textarea class="form-control" name="description" ><?= $value['description'];?></textarea>
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
            <h4 class="modal-title">Add Coupon</h4>
         </div>
         <form id="add_coupon" onsubmit="return add_coupon();">
            <div class="modal-body">
               <div class="add_msg"></div>
               <div class="form-group">
                  <label>Title</label>
                  <input type="text" class="form-control" name="title" value="" required>
               </div>
               <div class="form-group">
                  <label>Discount (%)</label>
                  <input type="number" class="form-control" name="discount" value="" required>
               </div>
               
               <div class="form-group">
                  <label>Expiry Date</label>
                  <input type="date" class="form-control" name="expiry_date" value="" min="<?=date('Y-m-d')?>" required>
               </div>

               <div class="form-group">
                  <label>Description</label>
                  
                  <textarea class="form-control" name="description" ></textarea>
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
   function add_coupon(){
   	$.ajax({
   		type:'POST',
   		url:site_url+'Admin/Coupon/add_coupon',
   		data:$('#add_coupon').serialize(),
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
   function edit_coupon(id){
   	$.ajax({
   		type:'POST',
   		url:site_url+'Admin/Coupon/edit_coupon',
   		data:$('#edit_coupon'+id).serialize(),
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

