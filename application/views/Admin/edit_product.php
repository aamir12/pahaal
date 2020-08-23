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
        <h1>Edit Product</h1>
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
            <form role="form" method="post" id="addForm"
                action="<?=site_url().'Admin/Products/editProduct/'.$product['id']; ?>"
								enctype="multipart/form-data">

                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="form-group">
                                <label class=" form-control-label">Title</label>
                                <input type="text" name="title" id="title" value="<?=$product['title']?>"
                                    class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Description</label>
                                <textarea name="description" id="description"
                                    class="form-control textarea"><?=$product['description']?></textarea>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Price</label>
                                <input type="number" name="price" id="price" value="<?=$product['price']?>" required
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                <label class=" form-control-label">Regular Price</label>
                                <input type="number" name="reguler_price" id="reguler_price"
                                    value="<?=$product['reguler_price']?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class=" form-control-label">Quantity</label>
                                <input type="number"
																  name="quantity" 
																	id="quantity" value="<?=$product['quantity']?>"
                                  class="form-control">
                            </div>

                            <div class="form-group">
                                <label class=" form-control-label">Category</label>
                                <select class="form-control" name="category" id="category" required>
                                    <option value="">Select Category</option>
                                    <?php
																				foreach ($category as $key => $cat) {
																		?>		<option <?php if($cat['id']==$product['category']){echo 'selected';}?>
																							value="<?=$cat['id']?>"><?=$cat['cat_name']?></option>
																		<?php
																				}
																		?>
                                </select>
                            </div>

                            <div class="form-group subcategory">
                                <label class=" form-control-label">Sub category</label>
																	<select class="form-control" name="subcategory">
																		<?php
																			$conditionsub='cat_id='.$product['category'];
																			$subcategortData = $this->common_model->GetAllData('subcategory',$conditionsub,'id');
																			if(count($subcategortData) > 0){
																				foreach ($subcategortData as $key => $subcategory) {
																		?>		<option <?php if($subcategory['id']==$product['subcategory']){echo 'selected';}?>
																							value="<?=$subcategory['id']?>"><?=$subcategory['subcategory']?></option>
																			<?php
																				}
																			}else{
																				?>
																				<option value=''>Not Any Subcategory provider found!</option>
																			<?php
																			}
																			?>
																		</select>
                            </div>

                            <div class="form-group">
                                <label class=" form-control-label">
																  <a href="#" data-placement="right"
                                        data-toggle="tooltip" title="Set Special Product">Special
                                        Product
																	</a>
																</label><br>
                                <input type="checkbox" value="on" name="special" id="special"
                                    <?php if($product['special']=='on'){echo "checked";}?>>
                            </div>



                            <div class="form-group">
                                <label class=" form-control-label">Image
                                </label>
                                <input type="file" onchange="preview_image(this,'imageChange','')" name="image"
                                    id="image" accept="image/*" class="form-control imageUpload">
                                <img id="imageChange"
                                    src="<?=site_url().'assets/img/product_image/'.$product['image'];?>"
																		 width="100">
                            </div>

                            <div class="form-group">
                                <label class=" form-control-label">
																  Gallery
                                </label><br>
                                <div class="upload-btn-wrapper">
                                    <button type="button" 
																		  class="btn_upload"
																			id="upBtn">Upload a file
																		</button>
                                    <input type="file" name="gallery_image" id="gallery_image" accept="image/*"
                                        class="form-control imageUpload">
                                </div>
                                <div id="preview">
																	<?php
																		foreach ($gallery_image as $key => $gallery) {
																			?>
																			<div class="img_div" id="cancel<?=$key?>">
																				<img style="width: 200px;"
																						src="<?=site_url().'assets/img/gallery_image/'.$gallery['gallery_image'];?>"><br>
																				<input type="hidden" value="<?=$gallery['id']?>" name="gallery-image-id[]">
																				<button class="cancel_cls btn btn-xs btn-danger"
																						onclick="removeImg(<?=$key?>)">X</button>
																			</div>
																			<?php
																		}
																	?>
                                </div>
                            </div>
														<!-- product option -->
														<div class="form-group" id="productOptions">
															<label class=" form-control-label">Product Option</label>
															<div class="row">
																<div class="col-sm-2">
																		<ul class="nav nav-pills nav-stacked" id="option">
																		<?php 
																			$option_values = array();
																			foreach ($product_options as $product_option){
																				if ($product_option['type'] == 'select' ||
																						$product_option['type'] == 'radio' ||
																						$product_option['type'] == 'checkbox' ){
																						if (!isset($option_values[$product_option['option_id']])) {
																							$option_values[$product_option['option_id']] = $this->OM->getOptionValues($product_option['option_id']);
																						}
																				}
																			}												
																			$option_row = 0;
																			foreach($product_options as $product_option){ ?>
																				<li>
																					<a  href="#tab-option<?php echo $option_row;?>"
																							data-toggle="tab">
																							<i class="fa fa-minus-circle"
																								onclick="deleteOption('<?php echo $option_row; ?>');"></i>
																								<?php echo $product_option['name']; ?>
																					</a>
																				</li>
																	  	<?php
																				$option_row++;
																			}	?> 

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
																		<?php 
																			$option_row = 0;
																			$option_value_row = 0;
																			foreach($product_options as $product_option){ ?>
																		<div class="tab-pane" id="tab-option<?php echo $option_row;?>">
																				<input type="hidden" name="product_option[<?php echo $option_row;?>][product_option_id]" value="<?php echo $product_option['product_option_id'];?>" />
																				<input type="hidden" name="product_option[<?php echo $option_row;?>][name]" value="<?php echo $product_option['name']; ?>" />
																				<input type="hidden" name="product_option[<?php echo $option_row;?>][option_id]" value="<?php echo $product_option['option_id']; ?>" />
																				<input type="hidden" name="product_option[<?php echo $option_row;?>][type]" value="<?php echo  $product_option['type']; ?>" />
																				<input type="hidden" name="ak_pre_optionid[]" value="<?php echo $product_option['option_id']; ?>" />
																				<?php 
																					if( $product_option['type']=='select' ||
																						  $product_option['type']=='radio' || 
																							$product_option['type']=='checkbox'){
																					?>
																				<div class="table-responsive">
																					<table id="option-value<?php echo $option_row;?>" class="table table-striped table-bordered table-hover">
																							<thead>
																								<tr class="active">
																										<th class="text-left">Option Value</th>
																										<th class="text-right">Quantity	</th>
																										<th class="text-right">Price</th>
																										<th class="w50px"></th>
																								</tr>
																							</thead>
																							<tbody>
																							<?php 
																								foreach($product_option['product_option_value'] as $product_option_value){
																								?>
																								<tr id="option-value-row<?php echo $option_value_row; ?>">
																										<td class="text-left">
																											<select name="product_option[<?php echo $option_row; ?>][product_option_value][<?php echo $option_value_row; ?>][option_value_id]" class="form-control">
																													<?php 
																														if(isset($option_values[$product_option['option_id']]) )
																														{
																																foreach($option_values[$product_option['option_id']] as $option_value ){
																																	if($option_value['option_value_id'] == $product_option_value['option_value_id']){ ?>   
																																		<option value="<?php echo  $option_value['option_value_id'];?>" selected="selected">
																																		<?php echo  $option_value['name']; ?></option>
																																		<?php 
																																	}else {?>
																																		<option value="<?php echo $option_value['option_value_id'] ?>"><?php echo  $option_value['name']; ?></option>
																																		<?php 
																																  }
																													   	}
																														} 
																														?>
																											</select>
																											<input type="hidden" name="product_option[<?php echo $option_row; ?>][product_option_value][<?php echo $option_value_row; ?>][product_option_value_id]" value="<?php echo $product_option_value['product_option_value_id']; ?>" />
																										</td>
																										<td class="text-right"><input type="text" name="product_option[<?php echo $option_row; ?>][product_option_value][<?php echo $option_value_row; ?>][quantity]" value="<?php echo  $product_option_value['quantity']; ?>" placeholder="Quantity" class="form-control" />
																										</td>
																										<td class="text-right">
																											<input type="text" name="product_option[<?php echo $option_row; ?>][product_option_value][<?php echo $option_value_row; ?>][price]" value="<?php echo $product_option_value['price']; ?>" placeholder="Price" class="form-control" />
																										</td>
																										<td class="text-left">
																										  <button type="button" 
																											  onclick="deleteOptionValue('<?php echo $option_value_row ;?>');"
																												class="btn btn-danger">
																												<i class="fa fa-minus-circle"></i>
																											</button></td>
																								</tr>
																								<?php 
																										$option_value_row++;
																										}
																								?> 
																							</tbody>
																							<tfoot>
																								<tr>
																										<td colspan="3"></td>
																										<td class="text-left"><button type="button" onclick="addOptionValue('<?php echo $option_row; ?>');" data-toggle="tooltip"  class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>
																								</tr>
																							</tfoot>
																					</table>
																				</div>
																				<select id="option-values<?php echo $option_row; ?>" style="display: none;">
																					<?php 
																							if(isset($option_values[$product_option['option_id']])){
																								foreach ($option_values[$product_option['option_id']] as  $option_value) {
																								?>
																					        <option 
																									  value="<?php echo $option_value['option_value_id'] ?> ">
																										<?php echo  $option_value['name']; ?>
																									</option>
																				    	  <?php  	
																						  	}
																							}
																					?>
																				</select>
																				<?php 
																				  }?>
																		</div>
																		<?php
																			$option_row++;
																			}?> 
																	</div>
                                </div>
															</div>
															<!-- end of row -->
														</div>
														<!-- end of product option -->
														<input type="hidden" value="<?=$option_value_row?>" id="option_value_row">
														<input type="hidden" value="<?=$option_row?>" id="option_row">
                        </div>

                        <div class="box-footer">
                            <button type="submit"
														  name="submit"
															class="btn btn-success">Update</button>
                        </div>

                    </div>

                </div>

              

            </form>

        </div>

    </section>

</div>

<?php include_once('include/footer.php'); ?>

<script type="text/javascript">
$("#image").change(function() {
    if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imageChange').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);
    }
});

jQuery(function() {
    jQuery(document).on("change", "#gallery_image", function(){
            var total_file = document.getElementById("gallery_image").files.length;
            var divimage = jQuery("#preview img").length;
            for (var i = 0; i < total_file; i++) {
                k = divimage + 1;
                $('#preview').append('<div class="img_div" id="cancel' + k +
                    '"><img  src=' + URL.createObjectURL(event.target.files[i]) +
                    '><br><input type="file" name="gallery_image_orignal[]" class="form-control imageUpload" id="gallery_image_orignal' +
                    k +
                    '" accept="image/*" style="display:none;"><button  class="cancel_cls btn btn-xs btn-danger" onclick="removeImg(' +
                    k + ')">X</button></div>');

                document.querySelector("#gallery_image_orignal" + k).files = document.querySelector(
                    "#gallery_image").files;

            }
            jQuery('#upBtn').html('Add New');
        });
});



function removeImg(i) {
    var divimage = jQuery("#preview img").length;
    if (divimage <= 1) {
        jQuery('#upBtn').html('Upload a file');
    }
    jQuery('#cancel' + i).remove();
}
</script>


<script src="<?php echo site_url(); ?>assets/admin/custom/editproduct.js"></script>



