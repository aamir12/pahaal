<!DOCTYPE html>
<html lang="en">
   <?php
      $default_content= $this->common_model->GetSingleData('default_content',array('id'=>1));
      $default_color= $this->common_model->GetSingleData('default_color',array('id'=>1));
      ?>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <meta name="viewport" content="width=device-width,initial-scale=1">
      <title><?=$default_content['site_title'] ?></title>
      <link href="<?=site_url();?>assets/site/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
      <link href="<?=site_url();?>assets/site/css/slick.css" rel="stylesheet" type="text/css" media="all" />
      <link href="<?=site_url();?>assets/site/css/slick-theme.css" rel="stylesheet" type="text/css" media="all" />
      <link href="<?=site_url();?>assets/site/css/animate.css" rel="stylesheet" type="text/css" media="all" />
      <link href="<?=site_url();?>assets/site/css/themify.css" rel="stylesheet" type="text/css" media="all" />
      <link href="<?=site_url();?>assets/site/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
      <link href="<?=site_url();?>assets/site/css/menu.css" rel="stylesheet" type="text/css" media="all" />
      <link href="<?=site_url();?>assets/site/css/magnific-popup.css" rel="stylesheet" type="text/css" media="all" />
      <link href="<?=site_url();?>assets/site/css/jquery.fancybox.css" rel="stylesheet" type="text/css" media="all" />
      <link href="<?=site_url();?>assets/site/css/plugins.scss.css" rel="stylesheet" type="text/css" media="all" />
      <link href="<?=site_url();?>assets/site/css/swatches.css" rel="stylesheet" type="text/css" media="all" />
      <link href="<?=site_url();?>assets/site/css/style.scss.css" rel="stylesheet" type="text/css" media="all" id="color" />
      <link rel="stylesheet" type="text/css" href="<?=site_url();?>/assets/site/css/theme-dark.scss.css" media="all" />
      <link href="<?=site_url();?>assets/site/css/responsive.scss.css" rel="stylesheet" type="text/css" media="all" />
      <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,500i,700,900&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Courgette|Dancing+Script:400,500,600,700|Great+Vibes|Pacifico&display=swap" rel="stylesheet">
      <link rel="shortcut icon" href="<?=base_url();?>assets/img/default_image/<?=$default_content['site_icon'] ?>" type="image/png">
      
      <script>
         var site_url = '<?=site_url(); ?>';
         document.documentElement.style.setProperty("--primary-color", "<?=$default_color['primary_color']?>");
         document.documentElement.style.setProperty("--top-header-color", "<?=$default_color['top_header']?>");
         document.documentElement.style.setProperty("--top-header-bg-color", "<?=$default_color['top_header_bg']?>");
         document.documentElement.style.setProperty("--header-color", "<?=$default_color['header']?>");
         document.documentElement.style.setProperty("--header-bg-color", "<?=$default_color['header_bg']?>");
         document.documentElement.style.setProperty("--footer-color", "<?=$default_color['footer']?>");
         document.documentElement.style.setProperty("--footer-bg-color", "<?=$default_color['footer_bg']?>");
         document.documentElement.style.setProperty("--bottom-footer-color", "<?=$default_color['bottom_footer']?>");
         document.documentElement.style.setProperty("--bottom-footer-bg-color", "<?=$default_color['bottom_footer_bg']?>");
      </script>
      <script>
         window.enable_multilang = false;
         window.product_name="Product Name";
         window.product_image="Product Image";
         window.product_desc="Product Description";
         window.availability="Availability";
         window.available_stock="Available In stock";
         window.unavailable_stock="Unavailable In stock";
         window.compare_note="Your Compare list is full! Remove Any product ?";
         window.added_to_cmp="Added to compare";
         window.add_to_cmp="Add to compare";
         window.select_options="Select options";
         window.add_to_cart="Add to cart";
         window.confirm_box="Yes,I want view it!";
         window.cancelButtonText="Continue";
         window.remove="Remove";
         
         var compare_list = []; 
         
         var theme = {
          
         }
      </script>
      
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script src="<?=site_url();?>assets/site/js/TweenMax.min.js" type="text/javascript"></script>
      <script src="<?=site_url();?>assets/site/js/slider-animation.js" type="text/javascript"></script>
      <script src="<?=site_url();?>assets/site/js/head.js" type="text/javascript"></script>
      <script src="<?=site_url();?>assets/site/js/option_selection.js" type="text/javascript"></script>
      <script integrity="sha256-BFmLd7EQOpIHg76CWl9MJFqROXNgxiHNdyBpz5k0cRM=" crossorigin="anonymous" data-source-attribution="shopify.loadfeatures" defer="defer" src="<?=site_url();?>/assets/site/js/load_feature.js"></script>
      <script integrity="sha256-h+g5mYiIAULyxidxudjy/2wpCz/3Rd1CbrDf4NudHa4=" data-source-attribution="shopify.dynamic-checkout" defer="defer" src="<?=site_url();?>assets/site/js/features.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" media="screen" href="<?=site_url();?>/assets/site/css/styles.css">
      <script id="sections-script" data-sections="slideshow,collection-banner,product-tab-slider-2,product-mix-slider,testimonial,feature-product-slider,service,feature-blog,header-9,footer-2" defer="defer" src="<?=site_url();?>/assets/site/js/scripts.js"></script>
      <script>window.performance && window.performance.mark && window.performance.mark('shopify.content_for_header.end');</script>
      <link href="<?=site_url();?>assets/site/css/lightbox.css" rel="stylesheet" />
       <script src="<?=site_url();?>assets/site/js/lightbox.js"></script>
   </head>
   <body class="template-index">
      <!-- pre-loader start -->
      <?php
      if($default_content['loader_status']!='on'){
        ?>
        <div class="loader-wrapper">
         <img class="loader_logo" src="<?=base_url();?>assets/img/default_image/<?=$default_content['loader_image'] ?>" alt="Loader" />
        </div>
        <?php
      }

      if($default_content['top_banner_status']!='on'){
        ?>
        
        <div class="shipping-info pet-parallax lazyloaded"  data-parent-fit="cover" style="padding: 50px 0px; background-image: url(<?=site_url();?>assets/img/default_image/<?=$default_content['top_banner'] ?>);">
         <span class="close_shipping_bar" style="color: white;background: #ffb12b;padding: 5px;border-radius: 10px;">x
         </span>
        </div>
        <?php
      }
      ?>
      
      <div id="shopify-section-header-9" class="shopify-section">
         <!-- header start -->
         <header class="header-2 header-6">
            <div class="mobile-fix-option"></div>
            <div class="top-header ">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-6 col-md-6 text-left top-nav-left">
                        <div class="header-social-app" style="padding: 10px 0px;">
                           <div class="header-social">
                              <ul>
                                 <?php
                                 if($default_content['facebook_link']){
                                  ?>
                                  <li class="facebook">
                                    <a href="<?=$default_content['facebook_link']?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                 </li>
                                  <?php
                                 }
                                 if($default_content['twitter_link']){
                                  ?>
                                  <li class="twitter">
                                    <a href="<?=$default_content['twitter_link']?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                 </li>
                                  <?php
                                 }
                                 if($default_content['instagram_link']){
                                  ?>
                                  <li class="insta">
                                    <a href="<?=$default_content['instagram_link']?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                 </li>
                                  <?php
                                 }
                                 if($default_content['linkedin_link']){
                                  ?>
                                  <li class="google">
                                    <a href="<?=$default_content['linkedin_link']?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                 </li>
                                  <?php
                                 }
                                 
                                 
                                 

                                 ?>
                                 
                                 
                                 
                                 
                                 <!-- <li class="youtube">
                                    <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                                 </li> -->
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-6 text-right top-nav-right">
                        <div class="header-contact" style="padding: 10px 0px;">
                           <ul>
                                 <?php
                                 if($default_content['phone_number']){
                                  ?>
                                  <li><i class="fa fa-phone" aria-hidden="true"></i>
                                     <span >
                                     <?=$default_content['phone_number']?>
                                     </span>
                                  </li>
                                  <?php
                                 }
                                 if($default_content['email']){
                                  ?>
                                  <li><i class="fa fa-envelope" aria-hidden="true"></i>
                                     <span >
                                     <?=$default_content['email']?>
                                     </span>
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
            <div class="man_booo">
              <div class="container">
                <div class="bbtn">
                  <a href="#" class="btn btn-solid">
                    Festival
                  </a>
                </div>
              </div>
            </div>
            <div class="container">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="main-menu addd_ii2">
                        <div class="menu-left">
                           <div class="brand-logo layout2-logo">
                              <a href="<?=base_url();?>" itemprop="url"> 
                              <img src="<?=base_url();?>assets/img/default_image/<?=$default_content['logo'] ?>" alt="<?=$default_content['site_title'] ?>" class="img-fluid lazyload "  style="max-width:250px">
                              </a>
                           </div>
                        </div>
                        <div class="menu-right pull-right addd_ii">
                           <div class="icon-nav">
                              <ul class="header-dropdown">

                <li class="onhover-div mobile-search">
                  <div><img src="//cdn.shopify.com/s/files/1/0358/5507/3324/t/2/assets/search.png?v=16905231596290706977" onclick="openSearch()" class="img-fluid" alt="">
                    <i class="ti-search" onclick="openSearch()"></i></div>
                  <div id="search-overlay" class="search-overlay">
                    <div>
                      <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
                      <div class="overlay-content">
                        <div class="container">
                          <div class="row">
                            <div class="col-xl-12">
                              <form action="/search" method="get" role="search">
                                <div class="form-group">
                                  <input type="search" class="form-control" name="q" placeholder="Search products">
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                
                                 <li class="mobile-wishlist">
                                    <a href="<?=base_url();?>wishlist">
                                       <div>
                                          <img src="<?=site_url();?>/assets/img/heart.png" alt="wishlist">
                                          <i class="fa fa-heart" aria-hidden="true"></i>
                                       </div>
                                    </a>
                                 </li>
                                 <li class="onhover-div mobile-account">
                                    <div>
                                       <img src="<?=site_url();?>/assets/img/avatar.png" alt="">
                                       <i class="fa fa-user-o" aria-hidden="true"></i>
                                    </div>
                                    <ul class="show-div my-account">
                                       <li>
                                          <a href="<?=base_url();?>login" >
                                          Log in
                                          </a>
                                       </li>
                                       <li>
                                          <a href="<?=base_url();?>register" >
                                          Register
                                          </a>
                                       </li>
                                    </ul>
                                 </li>

                                
                                 <li class="onhover-div mobile-cart">
                  <div>
                    
                      <img src="<?=site_url();?>/assets/img/cart.png" alt="cart">
                      <i class="ti-bag fixed_cart"></i>
                      

                    <span class="cart_qty_cls">1</span>
                  </div>

                  
                 <!--  <ul class="show-div shopping-cart" id="cart_container_id"> 

<form action="" method="post" novalidate="" class="cart_ajax_silder_form">
<li>
  <div class="media">
    <a href="#">
      <img class="mr-3" src="https://cdn.shopify.com/s/files/1/0358/5507/3324/products/image_17_536531d4-1dbd-49d7-ab03-471ce0db4d59_small.png?v=1585052877" alt="Unique Laving">
  </a>
    <div class="media-body">
      <a href="#">
      <h4 class="lang_trans" data-trans="#ajax_cart33046379626540">Unique Laving</h4>
      <span class="hide" id="ajax_cart33046379626540">Unique Laving</span>
  </a>
      <h4><em>1 x </em><span class="money" data-currency-usd="$50.00 USD" data-currency="USD">$50.00 USD</span></h4>
  </div>
  </div>
  <div class="close-circle">
    <a href="javascript:void(0)" class="cart_remove_item" >
      <i class="fa fa-times"></i>
  </a>
  </div>
  </li>
<li>
  <div class="total">
    <h5>subtotal : <span class="money" data-currency-usd="$50.00 USD" data-currency="USD">$50.00 USD</span></h5>
  </div>
  </li>
<li>
  <div class="buttons">
    <a href="#" class="view-cart">view cart</a>
    <button type="submit" name="checkout" class="checkout">Checkout</button>
  </div>
  </li>
  </form>

</ul>
         -->          
                </li>
                                 
                              </ul>
                           </div>
                        </div>
                        <div class="main-nav-center">
                           <nav id="main-nav">
                              <div class="toggle-nav">
                                 <i class="fa fa-bars sidebar-bar"></i>
                              </div>
                              <!-- Sample menu definition -->
                              <ul id="main-menu" class="sm pixelstrap sm-horizontal ">
                                 <li>
                                    <div class="mobile-back text-right">
                                       <span >back</span>
                                       <i class="fa fa-angle-right pl-2" aria-hidden="true"></i>
                                    </div>
                                 </li>
                                 <?php
                                    if($default_content['home_page']!='on'){
                                    ?>
                                    <li><a href="<?=base_url();?>">
                                      <span >
                                      Home
                                      </span>
                                      </a>
                                   </li>
                                    
                                    <?php
                                }
                                if($default_content['about_page']!='on'){
                                    ?>
                                    <li><a href="<?=base_url();?>about-us">
                                      <span >
                                      About Us
                                      </span>
                                      </a>
                                   </li>
                                    
                                    <?php
                                }
                                if($default_content['shop_page']!='on'){
                                    ?>
                                    <li><a href="<?=base_url();?>shop">
                                      <span >
                                      Shop
                                      </span>
                                      </a>
                                   </li>
                                    
                                    <?php
                                }
                                if($default_content['blog_page']!='on'){
                                    ?>
                                    <li><a href="<?=base_url();?>blog">
                                      <span >
                                      Blog
                                      </span>
                                      </a>
                                   </li>
                                    
                                    <?php
                                }
                                if($default_content['contact_page']!='on'){
                                    ?>
                                    <li><a href="<?=base_url();?>contact-us">
                                      <span >
                                      Contact Us
                                      </span>
                                      </a>
                                   </li>
                                    
                                    <?php
                                }
                                    ?>
                                 
                                 
                              </ul>
                           </nav>
                        </div>
                        <div class="input-block search-outer">
                           <div class="input-box">
                              <form action="<?=site_url().'shop'?>" method="get" class="big-deal-form search-bar" role="search" style="position: relative;">
											<?php 
											   $parentCat = "";
											   if(isset($_REQUEST['parentCat']) && trim($_REQUEST['parentCat'])!=""){
													$parentCat = htmlspecialchars($_REQUEST['parentCat'], ENT_QUOTES, 'UTF-8');
												}

												$q = "";
											   if(isset($_REQUEST['q']) && trim($_REQUEST['q'])!=""){
													$q = htmlspecialchars($_REQUEST['q'], ENT_QUOTES, 'UTF-8');
												}

											?>
                                 <div class="input-group search-bar">
                                    <div class="input-group-prepend category-menu">
                                       <select name="parentCat">
                                          <option value="">
                                                all category
                                             </option>
                                             <?php foreach($category as $value_cat) { ?>
                                                   <option 
																	  <?=($value_cat['id']==$parentCat)?'selected="selected"':''?>
																	  value="<?php echo $value_cat['id']; ?>" ><?php echo $value_cat['cat_name']; ?></option>
                                              <?php } ?>
                                       </select>
                                    </div>
                                    <input data-id="exampleInputPassword" value="<?=$q?>" class="search__input form-control" name="q" placeholder="Search Our Product" autocomplete="off" type="search">
                                    <div class="input-group-prepend">
                                       <span class="search"><button type="submit" class="search-icon btn btn-solid"><i class="ti-search"></i></button></span>
                                    </div>
                                 </div>
                                 <ul class="search-results" style="position: absolute; left: 0px; top: 42px; display: none;"></ul>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </header>
         <!-- header end -->
      </div>

<script type="text/javascript">
  /*nav*/

  $(function(){

        $('#main-menu a').filter(function(){return this.href==location.href}).parent().addClass('active').siblings().removeClass('active')

        $('#main-menu a').click(function(){

            $(this).parent().addClass('active').siblings().removeClass('active')    

        })

    })

/*nav*/


function openSearch() {
    document.getElementById("search-overlay").style.display = "block";
  }
   function closeSearch() {
    document.getElementById("search-overlay").style.display = "none";
  } 
</script>
