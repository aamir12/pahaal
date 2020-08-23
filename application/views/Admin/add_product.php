<?php 

   include_once('include/header.php'); 

   $user_id = $this->session->userdata('user_id');

   ?>

<style type="text/css">
	.upload-btn-wrapper {
		position: relative;
		overflow: hidden;
		display: inline-block;
	}
	.btn_upload {
			border: 2px solid gray;
			color: gray;
			background-color: white;
			padding: 5px 15px;
			border-radius: 8px;
			font-size: 14px;
			font-weight: bold;
	}



	.upload-btn-wrapper input[type=file] {
		font-size: 100px;
		position: absolute;
		left: 0;
		top: 0;
		opacity: 0;

	}

</style>



<div class="content-wrapper">

  <!-- Content Header (Page header) -->

  <section class="content-header">

    <h1>Add Product</h1>

    <ol class="breadcrumb">
            <li>
						  <a href="<?=site_url().'Admin'; ?>">
					    	<i class="fa fa-dashboard"></i> Home
							</a>
						</li>
            <li class="active">
						  <a href="<?=site_url().'admin/all-products'; ?>">
							  Product Management
							</a>
						</li>
    </ol>

  </section>

  <!-- Main content -->

  <section class="content">

   <?=$this->session->flashdata('msg'); ?>

    <div class="row">

      <form role="form" method="post" id="addForm" action="<?=site_url().'Admin/Products/addProduct'; ?>" enctype="multipart/form-data"  >

        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-body">
              <div class="form-group">
                <label class=" form-control-label">Title</label>
                <input type="text" name="title" id="title"  class="form-control" required="" >
              </div>

              <div class="form-group">
                <label class=" form-control-label">Description</label>
                <textarea name="description" id="description"  class="form-control textarea"></textarea>
              </div>

              <div class="form-group">
                <label class=" form-control-label">Price</label>
                <input type="number" name="price" id="price" required class="form-control">
              </div>

              <div class="form-group">
                <label class=" form-control-label">Regular Price</label>
                <input type="number" name="reguler_price" id="reguler_price"  class="form-control">
              </div>

              <div class="form-group">
                <label class=" form-control-label">Quantity</label>
                <input type="number" name="quantity" id="quantity"  class="form-control">
              </div>

              <div class="form-group">
                <label class=" form-control-label">Category</label>
                <select class="form-control" name="category" id="category" required >
                  <option value="">Select Category</option>
                  <?php
										foreach ($category as $key => $cat) {
											?>
											<option value="<?=$cat['id']?>" ><?=$cat['cat_name']?></option>
											<?php
										}
                  ?>
                </select>

              </div>
              <div class="form-group subcategory" >
              </div>

              <div class="form-group">
                <label class=" form-control-label"><a href="#" data-placement="right" data-toggle="tooltip" title="Set Special Product">Special Product</a></label><br>
                <input type="checkbox" value="on" name="special" id="special"  >
              </div>

              <div></div>

              <div class="form-group">
                <label class=" form-control-label">Image</label>
                <input type="file" onchange="preview_image(this,'imageChange','')" name="image" id="image" accept="image/*" class="form-control imageUpload">
                <img id="imageChange" src="" width="100" >
              </div>

              <div class="form-group">
                <label class=" form-control-label">Gallery</label><br>
                <div class="upload-btn-wrapper">
									<button type="button" class="btn_upload" id="upBtn">Upload a file</button>
									<input type="file" name="gallery_image" id="gallery_image" accept="image/*" class="form-control imageUpload" >
                </div>
                <div  id="preview"></div>
              </div>

              <div class="form-group" id="productOptions">
                <label class=" form-control-label">Product Option</label>
                <div class="row">
									<div class="col-sm-2">
											<ul class="nav nav-pills nav-stacked" id="option">
												<li>
														<select id="optionmain" name="optionmain" onchange="optionchange(this.value);" >
															<option value=""> select</option>
															<?php
																	foreach($options as $op){
																		echo '<option value="'.$op['id'].'">'.$op['optionName'].'</option>';
																	}
																	?>
														</select>
												</li>
											</ul>
									</div>
									<div class="col-sm-10">
											<div class="tab-content"> 
											</div>
									</div>
								</div>
								<!-- end of row -->
              </div>

            </div>

            <div class="box-footer">
              <button type="submit" name="submit" class="btn btn-success">Add</button>
            </div>

          </div>

        </div>



      </form>

    </div>

  </section>

</div>

<?php include_once('include/footer.php'); ?>



<script type="text/javascript">

$("#image").change(function () {
         if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imageChange').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
});

jQuery(function() {
    jQuery(document).on("change","#gallery_image", function(){
     var total_file=document.getElementById("gallery_image").files.length;
       var divimage=jQuery("#preview img").length;
       for(var i=0;i<total_file;i++){
           k=divimage+1;
            $('#preview').append('<div class="img_div" id="cancel'+k+'"><img style="width: 200px;"  src='+URL.createObjectURL(event.target.files[i])+'><br><input type="file" name="gallery_image_orignal[]" class="form-control imageUpload" id="gallery_image_orignal'+k+'" accept="image/*" style="display:none;"><button style="cursor:pointer" class="cancel_cls btn btn-xs btn-danger" onclick="removeImg('+k+')">X</button></div>');
             document.querySelector("#gallery_image_orignal"+k).files = document.querySelector("#gallery_image").files;
      }

      jQuery('#upBtn').html('Add New');
    });
});

function removeImg(i){
  var divimage=jQuery("#preview img").length;
  if(divimage <= 1){
    jQuery('#upBtn').html('Upload a file');
  }
 jQuery('#cancel'+i).remove();
}
</script>

<script src="<?php echo site_url(); ?>assets/admin/custom/addproduct.js"></script>



