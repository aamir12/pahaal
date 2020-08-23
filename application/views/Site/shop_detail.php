<?php
   include_once('include/header.php'); 
   ?>
<style>
.colorsCont {
  display: inline-block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 14px;
    vertical-align: middle;
    line-height: 30px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.colorsCont input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.colorsCont .checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 28px;
  width: 28px;
  background-color: red;
  border-radius:50%;
}



/* When the checkbox is checked, add a blue background */
.colorsCont input:checked ~ .checkmark {
  background-color: red;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.colorsCont input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.colorsCont .checkmark:after {
  left: 0px;
  top: 0px;
  width: 28px;
  height: 28px;
  border: solid 4px #898989;
  border-radius:50%;
}
</style>

<!-- breadcrumb start -->
<div class="breadcrumb-section">
   <div class="container">
      <div class="row">
         <div class="col-sm-6">
            <div class="page-title">
               <h2 >
                  <?=$product['title']?>
               </h2>
            </div>
         </div>
         <div class="col-sm-6">
            <nav aria-label="breadcrumb" class="theme-breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?=site_url()?>" >Home</a></li>
                  <li class="breadcrumb-item active " >
						<?=$product['title']?>
                  </li>
               </ol>
            </nav>
         </div>
      </div>
   </div>
</div>
<!-- breadcrumb End -->
<div id="shopify-section-product-template" class="shopify-section">
   <!-- section start -->
   <section id="ProductSection-product-template"  data-section-id="product-template"
      data-section-type="product"
      data-enable-history-state="true">
      <div class="collection-wrapper">
         <div class="container">
            <div class="row">
					<?php 
					  if($product['image']!="" || count($product_images)>0){
					?>
               <div class="col-lg-6">
                  <div class="product-slick">
							<?php 
							  if($product['image']!=""){
								  ?>
								<div id="FeaturedImageZoom-product-template-15090218041388-wrapper">
									<img itemprop="image" src="<?=site_url().'assets/img/product_image/'.$product['image']?>" 
									data-src="<?=site_url().'assets/img/product_image/'.$product['image']?>" 
									data-widths="[157, 270, 303, 370, 377, 670, 570, 720, 900, 1080, 1296, 1512, 1728, 2048]" 
									data-aspectratio="1.0" 
									data-sizes="auto" 
									class="lazyload  img-fluid image_zoom_cls-0 main_img" alt="<?=$product['title']?>" >
								</div>
								  <?php
							  }
							
                     if(count($product_images)>0){
								foreach($product_images as $pimg){
							?>
                     <div id="FeaturedImageZoom-product-template-15090217844780-wrapper">
                        <img itemprop="image" src="<?=site_url().'assets/img/gallery_image/'.$pimg['gallery_image']?>" 
                           data-src="<?=site_url().'assets/img/gallery_image/'.$pimg['gallery_image']?>" 
                           data-widths="[157, 270, 303, 370, 377, 670, 570, 720, 900, 1080, 1296, 1512, 1728, 2048]" 
                           data-aspectratio="1.0" 
                           data-sizes="auto" 
                           class="lazyload  img-fluid image_zoom_cls-1 main_img" alt="<?=$product['title']?>" >
                     </div>
							<?php 
								}
							}
							?>
                    
                  </div>
                  <div class="row">
                     <div class="col-12 p-0">
                        <div class="slider-nav ">

							   <?php 
							   if($product['image']!=""){
								  ?>
                           <div data-match="<?=$product['title']?>">
                              <img itemprop="image" src="<?=site_url().'assets/img/product_image/'.$product['image']?>" 
                                 data-src="<?=site_url().'assets/img/product_image/'.$product['image']?>" 
                                 data-widths="[157, 270, 303, 370, 377, 670, 570, 720, 900, 1080, 1296, 1512, 1728, 2048]" 
                                 data-aspectratio="1.0" 
                                 data-sizes="auto" 
                                 class="lazyload  img-fluid " alt="<?=$product['title']?>" >
                           </div>
								<?php 
								}
								 if(count($product_images)>0){
									foreach($product_images as $pimg){
								?>
                           <div data-match="<?=$product['title']?>">
                              <img itemprop="image" src="<?=site_url().'assets/img/gallery_image/'.$pimg['gallery_image']?>" 
                                 data-src="<?=site_url().'assets/img/gallery_image/'.$pimg['gallery_image']?>" 
                                 data-widths="[157, 270, 303, 370, 377, 670, 570, 720, 900, 1080, 1296, 1512, 1728, 2048]" 
                                 data-aspectratio="1.0" 
                                 data-sizes="auto" 
                                 class="lazyload  img-fluid " alt="<?=$product['title']?>" >
                           </div>
									<?php 
								   }
						    	}
						   	?>
                          
                        </div>
                     </div>
                  </div>
               </div>
					<?php 
					  }
					?>
               <div class="col-lg-6">
                  <div class="product-right">
                     <h2 itemprop="name"  style="font-size: 25px;">
						   	<?=$product['title']?>
                     </h2>
                     <h3 id="product_price"><span class=money><?= Currency.$product['price']?></span> </h3>
                     <form action="/cart/add" method="post" enctype="multipart/form-data" id="AddToCartForm_id" data-section="product-template">
                        <div class="product-description border-product">

								
								<?php 
								if(count($product_options)>0){
									foreach($product_options as $option){
										if($option['type'] == 'radio' || $option['type'] == 'select'){
											if(count($option['product_option_value']) > 0 ){
												
												if($option['option_id'] == COLOR_OPTIONID){
													?>
														<h6 class="product-title size-text">
															Select <?=$option['name']?>       
														<br>
														<?php 
														foreach($option['product_option_value'] as $option_value){ ?>
															<label class="colorsCont">
															<input type="radio" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option_value['product_option_value_id']; ?>">
															<span class="checkmark" style="background-color:<?=$option_value['name']?> "></span>
															<?php 
																if( $option_value['price']){
																	echo ' per (+) '.Currency.$option_value['price'];
																}   
															?>
															</label>
														<?php 
														} ?>
														</h6>

														<p id="Error<?= $option['product_option_id']; ?>" class="text-danger option-error"></p>
													<?php
												}else
												if($option['type'] == 'radio' && $option['option_id'] != COLOR_OPTIONID){

												}else
												if($option['type'] == 'select'){
												?>
													<h6 class="product-title size-text">
													Select <?=$option['name']?>      
													<br>
													<select  name="option[<?php echo $option['product_option_id']; ?>]" >
													<option value="">Select</option>
													<?php 
														foreach($option['product_option_value'] as $option_value){ ?>
															<option value="<?php echo $option_value['product_option_value_id']; ?>"   > <?php echo $option_value['name']; ?>
															<span class=money>
															<?php
															if( $option_value['price']){
																	echo ' per (+) '.Currency.$option_value['price'];
															}?> </span>
															</option>
													<?php 
													}?>
													</select>

												</h6> 
													<p id="Error<?= $option['product_option_id']; ?>" class="text-danger option-error"></p>
												<?php
												}
												
											}
										}

									}
						   	}
                              ?>

								

								   <!-- <h6 class="product-title size-text">
                              Select Color       
										<br>
											<label class="colorsCont">
											<input type="radio" checked="checked" name="color">
											<span class="checkmark"></span>
											</label>

											<label class="colorsCont">
											<input type="radio" checked="checked" name="color">
											<span class="checkmark"></span>
											</label>
                           </h6> -->
                           <!-- <h6 class="product-title size-text">
                              Select Size       
										<br>
                              <select name="id" id="productSelect" >
                                 <option  selected="selected"  data-sku="" value="33046685417516">Default Title - <span class=money>$50.00 USD</span></option>
                              </select>
                           </h6> -->
									
                          
                           <h6 class="product-title" >Quantity:</h6>
                           <div class="qty-box">
                              <div class="input-group">
                                 <span class="input-group-prepend">
                                 <button type="button" class="btn quantity-left-minus" data-type="minus" data-field="">
                                 <i class="ti-angle-left"></i>
                                 </button>
                                 </span>
                                 <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                                 <span class="input-group-prepend">
                                 <button type="button" class="btn quantity-right-plus" data-type="plus" data-field="">
                                 <i class="ti-angle-right"></i>
                                 </button>
                                 </span>
                              </div>
                           </div>
                        </div>
                        <!--                         <div class="border-product"></div> -->
                        <div class="product-buttons">
                           <button type="submit" id="addtocart_btn_id" class="add_to_cart_btn_cls cart_btn_class btn btn-solid"  >Add to cart</button>
                        </div>
                        <!-- <div class="product-title cate-mode  mb-2">
                           <h6 class="mb-1">Please <a href="mailto:dhairya@webiots.com">contact us</a> if you are interested in this product.</h6>
                           <span>
                           <a href="" data-toggle="modal" data-target="#product-inquiry" >inquiry about product?</a>
                           </span>
                        </div> -->
                        <div class="border-product">
                           <div>
                              <h6 class="product-title" >
                                 product details
                              </h6>
                              <div class="pro-desc">
                                <?=html_entity_decode($product['description'])?>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Section ends -->
   <!-- product section start -->
	<?php 
	  if(count($product_releted)>0){
	?>
   <section class="section-b-space ratio_square product-related ">
      <div class="container addtocart_count">
         <div class="row">
            <div class="col-12 product-related">
               <h2 >
                  Related Products
               </h2>
            </div>
         </div>
         <div class="slide-6"
            data-slick='{"slidesToShow": 4,"slidesToScroll": 1, "autoplay": true, "autoplaySpeed": 3000, "infinite": false, "arrows": true, "dots": false, "responsive":[{"breakpoint": 1367,"settings":{"slidesToShow": 4 }},{"breakpoint": 1024,"settings":{"slidesToShow": 3 }},{"breakpoint": 767, "settings":{"slidesToShow": 2 }},{"breakpoint": 420,"settings":{"slidesToShow": 1 }} ]}'>
				<?php 
				  foreach($product_releted as $pr){
				?>
            <div>
               <div class="product-box product-wrap" data-pro-id="<?=$pr['id']?>">
                  <div class="img-wrapper">
						   <div class="lable-block">
                        <!-- <span class="lable4 square large center" >sale</span> -->
                     </div>
                     
                     <div class="front">
                        <a href="<?=site_url().'shop_detail/'.$pr['id']?>">
                        <img style="width:246px;height:295px;" src="<?=site_url().'assets/img/product_image/'.$pr['image']?>" 
                           class="lazyload  img-fluid  w-100" alt="<?=$pr['title']?>" >
                        </a>
                     </div>
                     <div class="back">
                        <a href="<?=site_url().'shop_detail/'.$pr['id']?>">
                        <img style="width:246px;height:295px;" src="<?=site_url().'assets/img/product_image/'.$pr['image']?>" 
                           class="lazyload  img-fluid  w-100" alt="<?=$pr['title']?>" >
                        </a>
                     </div>
                     <div class="cart-box">
                        <a class="action--wishlist tile-actions--btn flex wishlist-btn" href="javascript:void(0)" title="Wishlist" data-product-handle="<?=$pr['title']?>">
                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                        </a>
                        <a class="quick-view" href="#quick-view-product" data-id="4779643961388" data-handle="<?=$pr['title']?>" data-toggle="tooltip" data-placement="top" title="Quick View">
                        <i class="ti-eye"></i>
                        </a>
                     </div>
                  </div>
                  <div class="product-detail text-center ">
                    
                     <div class="title-price">
                        <a href="<?=site_url().'shop_detail/'.$pr['id']?>">
                           <h6 itemprop="name" class="">
									<?=$pr['title']?>
                           </h6>
                        </a>
                        <h4 data-id="4779643961388" data-price="5400" class="">
                           <span class=money><?=$pr['price']?></span>
                        </h4>
                     </div>
                     <div class="advanced_add_cart select-dropdown">
                        <form method="post" action="/cart/add" class="product_grid_cart_form_1" id="product_grid_id_33046698459180">
                           <div class="qty-add-box d-flex">
                              <div class="qty-box d-flex">
                                 <label>Qty</label>
                                 <div class="input-group quantity">
                                    <input min="1" class="form-control input-number" type="number" id="quantity" name="quantity" value="1"/>
                                 </div>
                              </div>
                              <input type="hidden" name="id" value="<?=$pr['id']?>" />
                              <input type="submit" value="add" class="btn add_to_cart_btn_cls btn-solid" />
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
				<?php 
				  }
				?>
            
         </div>
      </div>
   </section>
	<?php 
	  }
	?>
   <!-- product section end -->

   <div class="modal fade" id="product-inquiry" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h3 class="modal-title" id="exampleModalLabel">Have a question?</h3>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <form method="post" action="/contact#contact_form" id="contact_form" accept-charset="UTF-8" class="theme-form">
                  <input type="hidden" name="form_type" value="contact" /><input type="hidden" name="utf8" value="✓" />
                  <div class="form-row">
                     <div class="col-md-6">
                        <label for="name">Your Name</label>
                        <input type="text" class="form-control" placeholder="Name" id="ContactFormName" name="contact[name]" value="" required="">
                     </div>
                     <div class="col-md-6">
                        <label for="email">Email</label>
                        <input type="email" required="" class="form-control" placeholder="Email" id="ContactFormEmail" name="contact[email]" autocorrect="off" autocapitalize="off" value="">
                     </div>
                     <div class="col-md-12">
                        <label for="review">Phone number</label>
                        <input type="tel" class="form-control" placeholder="Phone Number" id="ContactFormPhone" name="contact[phone]" pattern="[0-9\-]*" value="" required="">
                     </div>
                     <div class="col-md-12">
                        <label for="review">Your Message</label>
                        <textarea class="form-control" placeholder="Message" id="ContactFormMessage" name="contact[body]" rows="6"></textarea>
                     </div>
                     <div class="col-md-12">
                        <button id="submit" class="btn btn-solid" name="submit">Send</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <script type="text/javascript">
      $(document).ready(function () {
        $('.product-slick').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: true,
           autoplay:true,
           autoplaySpeed:1500,
          fade: true,
          adaptiveHeight: true,
          asNavFor: '.slider-nav'
        });
      
        $('.slider-nav').slick({
          vertical: false,
          slidesToShow: 3,
          slidesToScroll: 1,
          asNavFor: '.product-slick',
          arrows: false,
          dots: false,
          autoplay: true,
          focusOnSelect: true,
           autoplaySpeed:1500,
        });
        
        $('.product-right-slick').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: true,
          fade: true,
          adaptiveHeight: true,
          asNavFor: '.slider-right-nav',
          autoplay:true,
           autoplaySpeed:1500,
        });
        if ($(window).width() > 576) {
          $('.slider-right-nav').slick({
            vertical: true,
            verticalSwiping: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.product-right-slick',
            arrows: false,
            infinite: true,
            dots: false,
            centerMode: false,
            focusOnSelect: true,
            autoplay:true,
           autoplaySpeed:1500,
          });
        }else{
          $('.slider-right-nav').slick({
            vertical: false,
            verticalSwiping: false,
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.product-right-slick',
            arrows: false,
            infinite: true,
            centerMode: false,
            dots: false,
            focusOnSelect: true,
            
            responsive: [
              {
                breakpoint: 576,
                settings: {
                  slidesToShow: 3,
                  slidesToScroll: 1
                }
              }
            ]
          });
        }
      });
        
       
        
        if($(window).width() > 991){
          $('.product-right-slick, .product-slick').on('afterChange', function(event, slick, currentSlide, nextSlide){
            var img_url_temp = $(this).find('img').attr('src');
            var imgs = $('.image_zoom_cls');
            $('.zoomContainer').remove();
            imgs.removeData('elevateZoom');
            imgs.removeData('zoomImage');
            var temp_zoom_cls = '.image_zoom_cls-'+currentSlide;
            setTimeout(function(){
              $(temp_zoom_cls).elevateZoom({
                zoomType: "inner",
                cursor: "crosshair"
              });
            }, 300);
          });
        }
        if($(window).width() > 991){
          setTimeout(function(){
            $(".slick-current .main_img").elevateZoom({
              zoomType: "inner",
              cursor: "crosshair"
            });
          }, 300);
        }
        
       
       
        $('.slick-current').on('click', function(e) {
          e.preventDefault();
          var index = $(this).attr('data-slider');
          Slider.goToSlide(index);
        });
        
   </script>
</div>
<?php
   include_once('include/footer.php'); 
   ?>
