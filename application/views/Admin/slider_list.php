<?php 

   include_once('include/header.php'); 

   ?>

<div class="content-wrapper">

   <section class="content-header">

      <h1>Slider<small>Management</small></h1>

      <ol class="breadcrumb">

         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

         <li><a href="#">Slider</a></li>

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

                  <h3 class="box-title">Slider</h3>

                  <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#AddModal">Add <i class="fa fa-plus"></i></button>

               </div>

               <div class="box-body">

                  <div class="table-responsive">

                     <table id="bootstrap-data-table" class="table table-striped table-bordered DataTable">

                        <thead>

                           <tr>

                              <th>S.No.</th>
                              <th>Slider Image</th>
                              <th>Heading First</th>
                              <th>Heading Second</th>
                              <th>Heading Third</th>
                              <th>Button Link</th>
                              <th>Side of Content</th>
                              <th>Action</th>

                           </tr>

                        </thead>

                        <tbody>

                           <?php if(count($slider_content) > 0){ ?>

                           <?php foreach($slider_content as $key => $value){ 

                              ?>

                           <tr>

                              <td><?=$key+1;?></td>
                              <td><img src="<?=site_url()?>assets/img/slider_image/<?=$value['image']; ?>" style="height: 50px;"></td>

                              <td><?=$value['heading_first']; ?></td>
                              <td><?=$value['heading_second']; ?></td>
                              <td><?=$value['heading_third']; ?></td>
                              <td><?=$value['link']; ?></td>
                              <td><?=$value['content_side']; ?></td>

                              

                              <td>

                                 <a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this slider image?')" href="<?=site_url().'Admin/Page_setting/delete_silder/'.$value['id']; ?>"><i class="fa fa-trash"></i></a>

                                 <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#EditModal<?= $value['id'];?>"><i class="fa fa-edit"></i></button>

                              </td>

                           </tr>

                           <div id="EditModal<?= $value['id'];?>" class="modal fade" role="dialog">

                              <div class="modal-dialog">

                                 <!-- Modal content-->

                                 <div class="modal-content">

                                    <div class="modal-header">

                                       <button type="button" class="close" data-dismiss="modal">&times;</button>

                                       <h4 class="modal-title">Edit Slider</h4>

                                    </div>

                                    <form id="edit_slider<?= $value['id'];?>" method="post" enctype="multipart/form-data" onsubmit="return edit_slider(<?= $value['id'];?>);">

                                       <div class="modal-body">

                                          <div class="edit_msg<?= $value['id'];?>"></div>

                                          <div class="form-group">

                                             <label>Slider Image</label>

                                             <input type="file" class="form-control" name="image"  ><br>

                                             <img src="<?=site_url()?>assets/img/slider_image/<?=$value['image']; ?>" style="height: 50px;">

                                          </div>
                                          <div class="form-group">

                                                <label>Heading First</label>

                                                <input type="text" class="form-control" value="<?=$value['heading_first']; ?>" name="heading_first" value="">

                                             </div>
                                             <div class="form-group">

                                                <label>Heading Second</label>

                                                <input type="text" class="form-control" value="<?=$value['heading_second']; ?>" name="heading_second" value="">

                                             </div>
                                             <div class="form-group">

                                                <label>Heading Third</label>

                                                <input type="text" class="form-control" value="<?=$value['heading_third']; ?>" name="heading_third" value="">

                                             </div>
                                             <div class="form-group">

                                                <label>Button Link</label>

                                                <input type="text" class="form-control" value="<?=$value['link']; ?>" name="link" value="">

                                             </div>
                                             <div class="form-group">

                                                <label>Side of Content</label>
                                                <select class="form-control" name="content_side">
                                                   <option <?php if($value['content_side']=='right'){echo 'selected';}?> value="right">Right</option>
                                                   <option <?php if($value['content_side']=='left'){echo 'selected';}?> value="left">Left</option>
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

            <h4 class="modal-title">Add Slider</h4>

         </div>

         <form id="add_slider" method="post" enctype="multipart/form-data" onsubmit="return add_slider();">

            <div class="modal-body">

               <div class="add_msg"></div>
               <div class="form-group">

                  <label>Slider Image</label>

                  <input type="file" class="form-control" name="image" accept="image/*" required>

               </div>
                

               <div class="form-group">

                  <label>Heading First</label>

                  <input type="text" class="form-control" name="heading_first" value="">

               </div>
               <div class="form-group">

                  <label>Heading Second</label>

                  <input type="text" class="form-control" name="heading_second" value="">

               </div>
               <div class="form-group">

                  <label>Heading Third</label>

                  <input type="text" class="form-control" name="heading_third" value="">

               </div>
               <div class="form-group">

                  <label>Button Link</label>

                  <input type="text" class="form-control" name="link" value="">

               </div>
               <div class="form-group">

                  <label>Side of Content</label>
                  <select class="form-control" name="content_side">
                     <option value="right">Right</option>
                     <option value="left">Left</option>
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

   function add_slider(){

      var form = jQuery('#add_slider')[0];

      var formData= new FormData(form);

   	$.ajax({

   		type:'POST',

   		url:site_url+'Admin/Page_setting/add_slider',

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

   function edit_slider(id){

      var form = jQuery('#edit_slider'+id)[0];

      var formData= new FormData(form);

   	$.ajax({

   		type:'POST',

   		url:site_url+'Admin/Page_setting/edit_slider',

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



