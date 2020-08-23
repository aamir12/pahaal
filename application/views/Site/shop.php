<?php
   include_once('include/header.php'); 
   ?>
<!-- breadcrumb start -->
<div class="breadcrumb-section">
   <div class="container">
      <div class="row">
         <div class="col-sm-6">
            <div class="page-title">
               <h2 >
                 Shop
               </h2>
            </div>
         </div>
         <div class="col-sm-6">
            <nav aria-label="breadcrumb" class="theme-breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/" >Home</a></li>
                  <li class="breadcrumb-item active " >
                     Shop
                  </li>
               </ol>
            </nav>
         </div>
      </div>
   </div>
</div>
<!-- breadcrumb End -->
<div id="shopify-section-collection-left-sidebar-template" class="shopify-section">
   <!-- section start -->
   <section class="section-big-pt-space ratio_asos left-sidebar-collection">
      <div class="collection-wrapper">
         <div class="container addtocart_count">
            <div class="row">
				
               <div class="collection-filter col-sm-3" data-collurl="/collections/new-grocery">
					<form id="filterFrm">
					<input type="hidden" id="search" name="search" value="<?=isset($q)?$q:''?>">
					<input type="hidden" id="pageNumber" name="page" value="<?= isset($params['page'])?$params['page']:'1'?>">
                  <div class="coll_sidebar" data-sticky_column>
                        
						   <?php 
								if(count($allCategory)>0){
							?>
                     <div class="collection-filter-block">
                        <div class="category-block collection-collapse-block open ">
                           <h3 class="collapse-block-title " >
                              category
                           </h3>
									<input type="hidden" name="parentCat" value="<?= isset($params['parentCat'])?$params['parentCat']:''?>" id="parentCat">
									<input type="hidden" name="subCat"  value="<?= isset($params['subCat'])?$params['subCat']:''?>" id="subCat">
                           <div class="collection-collapse-block-content" style="">
                              <div class="collection-brand-filter">
                                 <div class="collection-category-list">
                                    <ul class="sidebar_category category-list" id="category_filters">
													<?php 
													  foreach ($allCategory as $cat) {
														  ?>

															<li data-value="left-sidebar" >
																<a href="javascript:void(0);" onclick="setCatSub('<?=$cat['id']?>','')" >
																    <?= $cat['cat_name'] ?>
																</a>
																<?php 
																  if(count($cat['subCategory'])>0){
																?>
																<ul>
																   <?php foreach($cat['subCategory'] as $subcat){
																	?>
																	<li>
																		<a href="javascript:void(0);" onclick="setCatSub('<?=$cat['id']?>','<?=$subcat['id']?>')">
																		    <?= $subcat['subcategory']?>
																		</a>
																	</li>
																	<?php 
																	 }
																	?>
																</ul>
																<?php 
																  }
																?>
															</li>
													<?php	   
													  }
													?>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
							 <?php
							 }?>
                     <!-- silde-bar colleps block start here -->
                     <div class="collection-filter-block custom_filter">
								<?php 
								  if(count($colors)>0){
								?>
                        <div class="collection-collapse-block open">
                           <h3 class="collapse-block-title " >
                              colors
                           </h3>
                           <div class="collection-collapse-block-content">
                              <div class="color-selector">
                                 <ul class="sidebar_filter_cls sidebar_color">
												<?php 
												  $colorsArray = [];
												  if(isset($params['colors'])){
													$colorsArray = explode(',',$params['colors']);
												  }
												  
												  foreach ($colors as $color) {
													 ?>
													 <li class="gray colors <?= in_array($color['id'],$colorsArray)?' active ':'';?>" style="background:<?=$color['optionKey']?>"  data-value="<?=$color['id']?>"  >
													   <input type="checkbox" 
														   id="color<?=$color['id']?>"
															<?= in_array($color['id'],$colorsArray)?"checked='checked'":'';?>  name="colors[]" value="<?=$color['id']?>" style="display:none;">
													 </li>
													 <?php 
												  }
												?>
                                 </ul>
                              </div>
                           </div>
                        </div>
								<?php 
								  }
								?>
                        <!-- price filter start here -->
                        <div class="collection-collapse-block open">
                           <h3 class="collapse-block-title " >
                              price
                           </h3>
									<?php 
									  $priceStr = "";
									  if(isset($params['price'])){
										$priceStr =$params['price'];
									  }
									?>
                           <div class="collection-collapse-block-content">
                              <div class="collection-brand-filter">
                                 <ul class="sidebar_filter_cls sidebar_price" id="price_filters">
                                    <li>
                                       <div class="custom-control custom-checkbox collection-filter-checkbox">
                                          <input type="radio" 
														  <?= ($priceStr=="0-500")?"checked='checked'":'';?> onchange="filter()" name="price" class="custom-control-input" id="price0500" value="0-500">
                                          <label class="custom-control-label" for="price0500">$0-$500</label>
                                       </div>
                                    </li>
                                    <li >
                                       <div class="custom-control custom-checkbox collection-filter-checkbox">
                                          <input type="radio"
														<?= ($priceStr=="500-1000")?"checked='checked'":'';?>
														onchange="filter()" name="price" class="custom-control-input" id="price5001000" value="500-1000">
                                          <label class="custom-control-label" for="price5001000">$500-$1000</label>
                                       </div>
                                    </li>
                                    <li >
                                       <div class="custom-control custom-checkbox collection-filter-checkbox">
                                          <input type="radio"
														<?= ($priceStr=="1000-3000")?"checked='checked'":'';?>  onchange="filter()" name="price" class="custom-control-input" id="price10003000" value="1000-3000">
                                          <label class="custom-control-label" for="price10003000">$1000-$3000</label>
                                       </div>
                                    </li>
                                    <li  >
                                       <div class="custom-control custom-checkbox collection-filter-checkbox">
                                          <input type="radio"
														<?= ($priceStr=="3000-5000")?"checked='checked'":'';?> onchange="filter()" name="price" class="custom-control-input" id="price30005000" value="3000-5000">
                                          <label class="custom-control-label" for="price30005000">$3000-$5000</label>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <!-- Brand filter start here -->
                        <!-- <div class="collection-collapse-block open">
                           <h3 class="collapse-block-title " >
                             brand
                           </h3>
                           
                           <div class="collection-collapse-block-content" style="">
                             <div class="collection-brand-filter">
                               <ul class="sidebar_filter_cls sidebar_brand">
                                 
                                 <li data-value="simul" >
                                   <div class="custom-control custom-checkbox collection-filter-checkbox">
                                     <input type="checkbox" class="custom-control-input" id="simul" data-value="simul" >
                                     <label class="custom-control-label" for="simul">Simul</label>
                                   </div>
                                 </li>
                                 
                                 <li data-value="nee" >
                                   <div class="custom-control custom-checkbox collection-filter-checkbox">
                                     <input type="checkbox" class="custom-control-input" id="nee" data-value="nee" >
                                     <label class="custom-control-label" for="nee">Nee</label>
                                   </div>
                                 </li>
                                 
                                 <li data-value="puma" >
                                   <div class="custom-control custom-checkbox collection-filter-checkbox">
                                     <input type="checkbox" class="custom-control-input" id="puma" data-value="puma" >
                                     <label class="custom-control-label" for="puma">Puma</label>
                                   </div>
                                 </li>
                                 
                                 <li data-value="huwai" >
                                   <div class="custom-control custom-checkbox collection-filter-checkbox">
                                     <input type="checkbox" class="custom-control-input" id="huwai" data-value="huwai" >
                                     <label class="custom-control-label" for="huwai">huwai</label>
                                   </div>
                                 </li>
                                 
                               </ul>
                             </div>
                           </div>
                           </div> -->
                     </div>
                     <!-- silde-bar colleps block end here -->
                     <!-- side-bar single product slider start -->
                     <div class="theme-card">
                        <h5 class="title-border " >
                           best sale
                        </h5>
                        <div class="offer-slider slide-1 ">
                           <div>
                              <div class="media">
                                 No Product Found
                              </div>
                              <!-- <div class="media">
                                 <a href="/collections/new-grocery/products/tong-garden-pistachios" >
                                 <img class="lazyload  img-fluid" src="//cdn.shopify.com/s/files/1/0358/5507/3324/products/image_8_12b96b17-0003-424d-8425-cd79ef27fb1e.png?v=1585052951" alt="Tong Pistachios" >
                                 </a>
                                 <div class="media-body align-self-center">
                                    <div class="rating">
                                       <span class="shopify-product-reviews-badge" data-id="4779557650476"></span>
                                    </div>
                                    <a href="/collections/new-grocery/products/tong-garden-pistachios">
                                       <h6 itemprop="name" >
                                          Tong Pistachios
                                       </h6>
                                    </a>
                                    <h4><span class="money">$48.00</span></h4>
                                 </div>
                              </div>
                              <div class="media">
                                 <a href="/collections/new-grocery/products/grocery-spice" >
                                 <img class="lazyload  img-fluid" src="//cdn.shopify.com/s/files/1/0358/5507/3324/products/image_9_4a4d5876-7aff-4ba5-8374-905291be7c89.png?v=1585052619" alt="Grocery Spice" >
                                 </a>
                                 <div class="media-body align-self-center">
                                    <div class="rating">
                                       <span class="shopify-product-reviews-badge" data-id="4779526783020"></span>
                                    </div>
                                    <a href="/collections/new-grocery/products/grocery-spice">
                                       <h6 itemprop="name" >
                                          Grocery Spice
                                       </h6>
                                    </a>
                                    <h4><span class="money">$48.00</span></h4>
                                 </div>
                              </div> -->
                           </div>
                           <!-- <div>
                              <div class="media">
                                 <a href="/collections/new-grocery/products/usable-dhaniya-powder" >
                                 <img class="lazyload  img-fluid" src="//cdn.shopify.com/s/files/1/0358/5507/3324/products/image_24_6657b003-f4eb-4e7a-b2d3-d7cc8f33ed3e.png?v=1585052357" alt="Usable Powder" >
                                 </a>
                                 <div class="media-body align-self-center">
                                    <div class="rating">
                                       <span class="shopify-product-reviews-badge" data-id="4779502698540"></span>
                                    </div>
                                    <a href="/collections/new-grocery/products/usable-dhaniya-powder">
                                       <h6 itemprop="name" >
                                          Usable Powder
                                       </h6>
                                    </a>
                                    <h4><span class="money">$30.00</span></h4>
                                 </div>
                              </div>
                              <div class="media">
                                 <a href="/collections/new-grocery/products/best-dhaniya-powder" >
                                 <img class="lazyload  img-fluid" src="//cdn.shopify.com/s/files/1/0358/5507/3324/products/image_11_bb3d247d-932a-41c1-9d70-8405cb83932c.png?v=1585052141" alt="haniya powder" >
                                 </a>
                                 <div class="media-body align-self-center">
                                    <div class="rating">
                                       <span class="shopify-product-reviews-badge" data-id="4779483168812"></span>
                                    </div>
                                    <a href="/collections/new-grocery/products/best-dhaniya-powder">
                                       <h6 itemprop="name" >
                                          haniya powder
                                       </h6>
                                    </a>
                                    <h4><span class="money">$28.00</span></h4>
                                 </div>
                              </div>
                              <div class="media">
                                 <a href="/collections/new-grocery/products/the-full-grocy" >
                                 <img class="lazyload  img-fluid" src="//cdn.shopify.com/s/files/1/0358/5507/3324/products/image_7_d80bff85-d193-4d86-9cb5-dbaf5028b6b0.png?v=1585052059" alt="The full Grocy" >
                                 </a>
                                 <div class="media-body align-self-center">
                                    <div class="rating">
                                       <span class="shopify-product-reviews-badge" data-id="4779475173420"></span>
                                    </div>
                                    <a href="/collections/new-grocery/products/the-full-grocy">
                                       <h6 itemprop="name" >
                                          The full Grocy
                                       </h6>
                                    </a>
                                    <h4><span class="money">$35.00</span></h4>
                                 </div>
                              </div>
                           </div> -->
                        </div>
                     </div>
                    
                  </div>
						</form>
               </div>
					
               
               <div class="collection-content col col-sm-9" data-sticky_column>
                  <div class="page-main-content">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="collection-content col">
                              <div class="collection-product-wrapper" style="margin-top: 0;">
                                 <div class="product-wrapper-ajax ">
                                    <div class="product-wrapper-grid collection-grid">
                                       <div class="container-fluid">
                                           <div class="row ">
														   <div class="col-md-12 text-right">
															<button onclick="clearAll()" style="display:none;" class="btn  btn-solid " id="clearBtn">
															   Clear  All
															</button>
															</div>
														 </div>
                                          <div class="row sapce-category product " id="productResult">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="product-pagination" id="pageDiv" style="display:none;">
                                       <div class="theme-paggination-block">
                                          <div class="container-fluid p-0">
                                             <div class="row">
                                                <div class="col-xl-6 col-md-6  col-sm-12">
                                                   <nav aria-label="Page navigation"  id="pageHtml">
                                                      <!-- <ul class="pagination">
                                                         <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                                                         <li class="page-item"><a class="page-link paginate_btn_cls" href="">2</a></li>
                                                         <li class="page-item">
                                                            <a class="page-link paginate_btn_cls" href="" aria-label="Next">
                                                            <span aria-hidden="true"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                                                            </a>
                                                         </li>
                                                      </ul> -->
                                                   </nav>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-sm-12">
                                                   <div class="product-search-count-bottom">
                                                      <h5 id="pageInfo"></h5>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
					
            </div>
         </div>
      </div>
   </section>
   <!-- section End -->
   <script>
      
      $(document).ready(function() {
        if ($(window).width() > 991) {
          $(".coll_sidebar, .collection-content").stick_in_parent();
        }
      });
      
   </script>
</div>

<script src="<?=site_url();?>/assets/site/js/productFilter.js" ></script>  
<?php
   include_once('include/footer.php'); 
?>
