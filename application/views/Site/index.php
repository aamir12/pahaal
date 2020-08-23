<?php
   include_once('include/header.php'); 
?>

<!-- BEGIN content_for_index -->
<div id="shopify-section-1554730713690" class="shopify-section">
   <!-- Home slider -->
   <section class="p-0 " >
      <div class="slide-1   home-slider"  data-slick='{"autoplay": false, "autoplaySpeed": 3000, "infinite": false, "arrows": true,"dots": false }' >
         <?php
         if(count($slider_content) > 0){
            foreach($slider_content as $key => $slider){ 
               ?>
               <div>
            <div class="home lazyload  text-<?=$slider['content_side']?> p-<?=$slider['content_side']?>" data-bgset="<?=site_url();?>/assets/img/slider_image/<?=$slider['image']; ?>
               " data-sizes="auto" data-parent-fit="cover" style="height: 85vh;" data-animation-in="zoomInImage">
               <div class="container">
                  <div class="row">
                     <div class="col">
                        <div class="slider-contain" style="height: 85vh;">
                           <div>
                              <?php 
                              if($slider['heading_first']!=''){
                                 ?>
                                 <h4 style="color: #ffffff" class="animated">
                                    <?=$slider['heading_first']?>
                                 </h4>
                                 <?php
                              }
                              if($slider['heading_second']!=''){
                                 ?>
                                 <h1 style="color: #ffffff" class="animated">
                                 <?=$slider['heading_second']?>
                                 </h1>
                                 <?php
                              }
                              if($slider['heading_third']!=''){
                                 ?>
                                 <h3 style="color: #ffffff" data-delay-in="0.5" class="animated">
                                 <?=$slider['heading_third']?>
                              </h3>
                                 <?php

                              }
                              
                              if($slider['link']!=''){
                                 ?>
                                    <a href="<?=$slider['link']?>" class="btn btn-solid animated slider-btn1" data-animation-in="fadeInUp" data-delay-in="0.7" >
                                 Shop now  
                                 </a>
                                 <?php
                              }

                              ?>
                              
                              
                              
                              
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
               <?php
            }

         }?>
         
         
      </div>
   </section>
   <!-- Home slider end -->
   <style>
      .theme-pannel-main{
      display: none;
      }
      .slider-btn2 {
      padding: 14px 34px;
      color: #ffffff;
      background-color: #ffb12b;
      border-color: #ffb12b;
      }
      .slider-btn2:hover, .slider-btn2:focus {
      color: #ffffff;
      background-color: #000000;
      border-color: #000000;
      }
   </style>
</div>
<div id="shopify-section-1582109078318" class="shopify-section">
   <section class="banner-padding collection_banner   " style="padding: 70px 0px 0px 0px;">
      <div class="container">
         <div class="row partition2 ">
            <div class="col-md-4" style="padding: 0px 15px 0px 15px ">
               
                  <div class="collection-banner p-right text-right">
                     <div class="banner-img">
                        <img src="<?=site_url();?>/assets/img/default_image/<?=$page_content['f_b']; ?>" 
                           data-widths="[157, 270, 303, 370, 377, 670, 570, 720, 900, 1080, 1296, 1512, 1728, 2048]" 
                           data-aspectratio="1.4697986577181208" 
                           data-sizes="auto" 
                           class="lazyload  img-fluid" alt="" >
                     </div>
                     <div class="contain-banner">
                        <div >
                           <h4 style="color: #ffffff" >
                             <?=$page_content['f_b_top_heading']; ?>
                           </h4>
                           <h2 style="color: #ffffff;" >
                              <?=$page_content['f_b_heading']; ?>
                           </h2>
               <a href="<?=$page_content['f_b_link']; ?>" class="btn btn-solid">
               Shop Now 
               </a>
               </div>
               </div>
               </div>
               
            </div>
            <div class="col-md-4" style="padding: 0px 15px 0px 15px ">
               <a href="">
                  <div class="collection-banner p-center text-center">
                     <div class="banner-img">
                        <img src="<?=site_url();?>/assets/img/default_image/<?=$page_content['s_b']; ?>" 
                           data-widths="[157, 270, 303, 370, 377, 670, 570, 720, 900, 1080, 1296, 1512, 1728, 2048]" 
                           data-aspectratio="1.4697986577181208" 
                           data-sizes="auto" 
                           class="lazyload  img-fluid" alt="" >
                     </div>
                     <div class="contain-banner">
                        <div >
                           <h4 style="color: #ffffff" >
                              <?=$page_content['s_b_top_heading']; ?>
                           </h4>
                           <h2 style="color: #ffffff;" >
                              <?=$page_content['s_b_top_heading']; ?>
                           </h2>
               <a href="<?=$page_content['s_b_link']; ?>" class="btn btn-solid">
               Shop Now 
               </a>
               </div>
               </div>
               </div>
               </a>
            </div>
            <div class="col-md-4" style="padding: 0px 15px 0px 15px ">
               <a href="">
                  <div class="collection-banner p-right text-right">
                     <div class="banner-img">
                        <img src="<?=site_url();?>/assets/img/default_image/<?=$page_content['t_b']; ?>" 
                           data-widths="[157, 270, 303, 370, 377, 670, 570, 720, 900, 1080, 1296, 1512, 1728, 2048]" 
                           data-aspectratio="1.4697986577181208" 
                           data-sizes="auto" 
                           class="lazyload  img-fluid" alt="" >
                     </div>
                     <div class="contain-banner">
                        <div >
                           <h4 style="color: #ffffff" >
                              <?=$page_content['t_b_top_heading']; ?>
                           </h4>
                           <h2 style="color: #ffffff;" >
                              <?=$page_content['t_b_heading']; ?>
                           </h2>
               <a href="<?=$page_content['t_b_link']; ?>" class="btn btn-solid">
               Order Now 
               </a>
               </div>
               </div>
               </div>
               </a>
            </div>
         </div>
      </div>
   </section>
   <style>
      .banner-btn1 {
      color: #ffffff;
      border-color: #ffb12b;
      background-color: #ffb12b;
      }
      .banner-btn1:hover, .banner-btn1:focus {
      background-color: #000000;
      border-color: #000000;
      color: #ffffff;
      }
      .banner-btn2 {
      color: #ffffff;
      border-color: #ffb12b;
      background-color: #ffb12b;
      }
      .banner-btn2:hover, .banner-btn2:focus {
      background-color: #000000;
      border-color: #000000;
      color: #ffffff;
      }
      .banner-btn3 {
      color: #ffffff;
      border-color: #ffb12b;
      background-color: #ffb12b;
      }
      .banner-btn3:hover, .banner-btn3:focus {
      background-color: #000000;
      border-color: #000000;
      color: #ffffff;
      }
      .collection_banner .grid {
      /*     display: -webkit-flex;
      display: -ms-flexbox;
      display: flex;
      width: 100%;
      -ms-flex-align: stretch;
      -webkit-align-items: stretch;
      -moz-align-items: stretch;
      -ms-align-items: stretch;
      -o-align-items: stretch;
      align-items: stretch;
      -webkit-flex-wrap: wrap;
      -moz-flex-wrap: wrap;
      -ms-flex-wrap: wrap;
      flex-wrap: wrap;
      margin: 0; */
      align-items: center;
      justify-content: center;
      }
      .collection_banner .grid .grid__sizer,
      .grid__item {
      position: relative;
      width: 50%;
      }
      .collection_banner .grid .grid__item {
      margin-bottom: 30px;
      overflow: hidden;
      padding: 0 15px;
      float: left;
      }
      .collection_banner .grid .grid__item--high,
      .collection_banner .grid .grid__item--high img {height: 30rem;}
      .collection_banner .grid img {
      width: 100%;
      max-width: 100%;
      height: auto;
      }
      @media(max-width: 991px) and (min-width: 768px) {
      .collection_banner .grid .grid__item {
      margin-bottom: 15px;
      }
      }
      @media(max-width: 767px) {
      .collection_banner .grid {
      height: auto !important; 
      }
      .collection_banner .grid .grid__sizer,
      .grid__item {
      width: 100%;
      position: relative !important;
      top: auto !important;
      left: auto !important;
      bottom: auto !important;
      right: auto !important;
      }
      .collection_banner .grid .grid__item {
      float: none;
      }
      .collection_banner .grid .grid__item:last-child {
      margin-bottom: 0;
      }
      .masonry_main {
      padding-top: 0px !important;
      }
      }
   </style>
   <script>
      $(document).ready(function () {
      
        // Masonry grid setup
      
        $(".grid").masonry({
      
          itemSelector: ".grid__item",
      
          columnWidth: ".grid__sizer",
      
          percentPosition: true
      
        });
      
      });
      
   </script>
</div>
<div id="shopify-section-1581940687435" class="shopify-section">
   <!-- slider tab  -->
   <section class="two-row-prd-slider two-row-prd " style="padding: 70px 0px 0px 0px">
      <div class="container addtocart_count">
         <div class="title2">
            <h4  style="color: #888888;">
               <?=$page_content['t_s_top_heading']; ?>
            </h4>
            <h2 class="title-inner2 "  style="color: #000;">
               <?=$page_content['t_s_heading']; ?>
            </h2>
         </div>
         <div class="row">
            <div class="col">
               <div class="theme-tab slider-tab">
                  <ul class="tabs tab-title">
                     <li class="current">
                        <a href="tab-112" >
                        <img src="<?=site_url();?>/assets/img/new.png" 
                           data-widths="[38, 50, 157, 270]" 
                           data-aspectratio="1.0" 
                           data-sizes="auto" 
                           class="lazyload  img-fluid" alt="" >
                        New Product
                        </a>
                     </li>
                     <li class="current">
                        <a href="tab-212" >
                        <img src="<?=site_url();?>/assets/img/special2.png" 
                           data-widths="[38, 50, 157, 270]" 
                           data-aspectratio="1.0" 
                           data-sizes="auto" 
                           class="lazyload  img-fluid" alt="" >
                        Special Product
                        </a>
                     </li>
                     <li class="current">
                        <a href="tab-312" >
                        <img src="<?=site_url();?>/assets/img/bestseller.png" 
                           data-widths="[38, 50, 157, 270]" 
                           data-aspectratio="1.0" 
                           data-sizes="auto" 
                           class="lazyload  img-fluid" alt="" >
                        Best Selling
                        </a>
                     </li>
                  </ul>
                  <div class="tab-content-cls">
                     <div id="tab-112" class="tab-content active" >
                        <div class="slick_carousel product-m" data-slick='{"slidesToShow": 5, "rows": 2, "slidesToScroll": 1, "autoplay": false, "autoplaySpeed": 3000, "infinite": false, "arrows": true,"dots": false, "responsive":[{"breakpoint": 1200,"settings":{"slidesToShow": 3 }},{"breakpoint": 992,"settings":{"slidesToShow": 3 }},{"breakpoint": 768,"settings":{"slidesToShow": 2 }},{"breakpoint": 420,"settings":{"slidesToShow": 1 }} ]}'>
                           
                           <?php

                           if(count($new_products) > 0){
                                 foreach ($new_products as  $new_product) {
                                ?>
                                <div class="product-box product-wrap" >
                                 <div class="img-wrapper">
                                    <!-- <div class="lable-block">
                                       <span class="lable4 square large center" >sale</span>
                                    </div> -->
                                    <div class="front">
                                       <a href="#">
                                       <img src="<?=site_url();?>/assets/img/product_image/<?=$new_product['image']?>" 
                                          class="lazyload  img-fluid " alt="<?=$new_product['title']?>" >
                                       </a>
                                    </div>
                                    <div class="back">
                                       <a href="#">
                                       <img src="<?=site_url();?>/assets/img/product_image/<?=$new_product['image']?>" 
                                          class="lazyload  img-fluid " alt="<?=$new_product['title']?>" >
                                       </a>
                                    </div>
                                    
                                    <div class="cart-box">
                                       <a class="action--wishlist tile-actions--btn flex wishlist-btn" href="javascript:void(0)" title="Wishlist" data-product-handle="usable-dhaniya-powder">
                                       <i class="fa fa-heart-o" aria-hidden="true"></i>
                                       </a>
                                       <a class="quick-view" data-lightbox="image-1" href="<?=site_url();?>/assets/img/product_image/<?=$new_product['image']?>"  title="<?=$new_product['title']?>">
                                       <i class="ti-eye"></i>
                                       </a>
                                       
                                    </div>
                                 </div>
                                 <div class="product-detail text-center ">
                                    
                                    <div class="title-price">
                                       <a href="#">
                                          <h6 itemprop="name" class="prd-hover-show">
                                             <?=$new_product['title']?>
                                          </h6>
                                       </a>
                                       <h4 data-id="4779502698540" data-price="3000" class="prd-hover-show">
                                          
                                          <?=Currency.$new_product['price']?>
                                          <?php if($new_product['reguler_price']){
                                             ?>
                                             <del><?=Currency.$new_product['reguler_price']?></del>
                                             <?php
                                          }?>
                                          
                                       </h4>
                                    </div>
                                    <div class="advanced_add_cart select-dropdown">
                                       
                                          <div class="qty-add-box d-flex">
                                             
                                             
                                             <input type="submit" value="add" class="btn add_to_cart_btn_cls btn-solid" />
                                          </div>
                                       
                                    </div>
                                 </div>
                                 
                              </div>
                                <?php
                              }
                           }else{
                              ?>
                               <div class="product-box product-wrap" >
                                 <div class="product-detail text-center ">
                                    <p>No new product found.</p>
                                 </div>
                               </div>
                              <?php
                           }
                           
                           ?>
                           
                           
                        </div>
                     </div>
                     <div id="tab-212" class="tab-content active" >
                        <div class="slick_carousel product-m" data-slick='{"slidesToShow": 5, "rows": 2, "slidesToScroll": 1, "autoplay": false, "autoplaySpeed": 3000, "infinite": false, "arrows": true,"dots": false, "responsive":[{"breakpoint": 1200,"settings":{"slidesToShow": 3 }},{"breakpoint": 992,"settings":{"slidesToShow": 3 }},{"breakpoint": 768,"settings":{"slidesToShow": 2 }},{"breakpoint": 420,"settings":{"slidesToShow": 1 }} ]}'>
                           <?php

                           if(count($special_products) > 0){
                                 foreach ($special_products as  $special_product) {
                                ?>
                                <div class="product-box product-wrap" >
                                 <div class="img-wrapper">
                                    <!-- <div class="lable-block">
                                       <span class="lable4 square large center" >sale</span>
                                    </div> -->
                                    <div class="front">
                                       <a href="#">
                                       <img src="<?=site_url();?>/assets/img/product_image/<?=$special_product['image']?>" 
                                          class="lazyload  img-fluid " alt="<?=$special_product['title']?>" >
                                       </a>
                                    </div>
                                    <div class="back">
                                       <a href="#">
                                       <img src="<?=site_url();?>/assets/img/product_image/<?=$special_product['image']?>" 
                                          class="lazyload  img-fluid " alt="<?=$special_product['title']?>" >
                                       </a>
                                    </div>
                                    
                                    <div class="cart-box">
                                       <a class="action--wishlist tile-actions--btn flex wishlist-btn" href="javascript:void(0)" title="Wishlist" data-product-handle="usable-dhaniya-powder">
                                       <i class="fa fa-heart-o" aria-hidden="true"></i>
                                       </a>
                                       <a class="quick-view" data-lightbox="image-1" href="<?=site_url();?>/assets/img/product_image/<?=$special_product['image']?>"  title="<?=$special_product['title']?>">
                                       <i class="ti-eye"></i>
                                       </a>
                                       
                                    </div>
                                 </div>
                                 <div class="product-detail text-center ">
                                    
                                    <div class="title-price">
                                       <a href="#">
                                          <h6 itemprop="name" class="prd-hover-show">
                                             <?=$special_product['title']?>
                                          </h6>
                                       </a>
                                       <h4 data-id="4779502698540" data-price="3000" class="prd-hover-show">
                                          
                                          <?=Currency.$special_product['price']?>
                                          <?php if($special_product['reguler_price']){
                                             ?>
                                             <del><?=Currency.$special_product['reguler_price']?></del>
                                             <?php
                                          }?>
                                          
                                       </h4>
                                    </div>
                                    <div class="advanced_add_cart select-dropdown">
                                       
                                          <div class="qty-add-box d-flex">
                                             
                                             
                                             <input type="submit" value="add" class="btn add_to_cart_btn_cls btn-solid" />
                                          </div>
                                       
                                    </div>
                                 </div>
                                 
                              </div>
                                <?php
                              }
                           }else{
                              ?>
                               <div class="product-box product-wrap" >
                                 <div class="product-detail text-center ">
                                    <p>No special product found.</p>
                                 </div>
                               </div>
                              <?php
                           }
                           
                           ?>
                        </div>
                     </div>
                     <div id="tab-312" class="tab-content active" >
                        <div class="slick_carousel product-m" data-slick='{"slidesToShow": 5, "rows": 2, "slidesToScroll": 1, "autoplay": false, "autoplaySpeed": 3000, "infinite": false, "arrows": true,"dots": false, "responsive":[{"breakpoint": 1200,"settings":{"slidesToShow": 3 }},{"breakpoint": 992,"settings":{"slidesToShow": 3 }},{"breakpoint": 768,"settings":{"slidesToShow": 2 }},{"breakpoint": 420,"settings":{"slidesToShow": 1 }} ]}'>
                           <?php

                           if(count($new_products) < 0){
                                 foreach ($new_products as  $new_product) {
                                ?>
                                <div class="product-box product-wrap" >
                                 <div class="img-wrapper">
                                    <!-- <div class="lable-block">
                                       <span class="lable4 square large center" >sale</span>
                                    </div> -->
                                    <div class="front">
                                       <a href="#">
                                       <img src="<?=site_url();?>/assets/img/product_image/<?=$new_product['image']?>" 
                                          class="lazyload  img-fluid " alt="<?=$new_product['title']?>" >
                                       </a>
                                    </div>
                                    <div class="back">
                                       <a href="#">
                                       <img src="<?=site_url();?>/assets/img/product_image/<?=$new_product['image']?>" 
                                          class="lazyload  img-fluid " alt="<?=$new_product['title']?>" >
                                       </a>
                                    </div>
                                    
                                    <div class="cart-box">
                                       <a class="action--wishlist tile-actions--btn flex wishlist-btn" href="javascript:void(0)" title="Wishlist" data-product-handle="usable-dhaniya-powder">
                                       <i class="fa fa-heart-o" aria-hidden="true"></i>
                                       </a>
                                       <a class="quick-view" data-lightbox="image-1" href="<?=site_url();?>/assets/img/product_image/<?=$new_product['image']?>"  title="<?=$new_product['title']?>">
                                       <i class="ti-eye"></i>
                                       </a>
                                       
                                    </div>
                                 </div>
                                 <div class="product-detail text-center ">
                                    
                                    <div class="title-price">
                                       <a href="#">
                                          <h6 itemprop="name" class="prd-hover-show">
                                             <?=$new_product['title']?>
                                          </h6>
                                       </a>
                                       <h4 data-id="4779502698540" data-price="3000" class="prd-hover-show">
                                          
                                          <?=Currency.$new_product['price']?>
                                          <?php if($new_product['reguler_price']){
                                             ?>
                                             <del><?=Currency.$new_product['reguler_price']?></del>
                                             <?php
                                          }?>
                                          
                                       </h4>
                                    </div>
                                    <div class="advanced_add_cart select-dropdown">
                                       
                                          <div class="qty-add-box d-flex">
                                             
                                             
                                             <input type="submit" value="add" class="btn add_to_cart_btn_cls btn-solid" />
                                          </div>
                                       
                                    </div>
                                 </div>
                                 
                              </div>
                                <?php
                              }
                           }else{
                              ?>
                               <div class="product-box product-wrap" >
                                 <div class="product-detail text-center ">
                                    <p>No best selling product found.</p>
                                 </div>
                               </div>
                              <?php
                           }
                           
                           ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- slider tab end -->
</div>

<div id="shopify-section-1582109078318" class="shopify-section">
<div class="banner-padding collection_banner   " style="padding: 40px 0px 0px 0px;">
  <div class="container">
    <div class="row partition2 ">

      
      

      
      
      
      
      
      
      

      

      
      <div class="col-md-6" style="padding: 0px 15px 0px 15px ">
        <a href="">
          </a><div class="collection-banner p-right text-right"><a href="">
            <div class="banner-img">
              

              
              
              
              <img src="<?=site_url();?>/assets/img/default_image/<?=$page_content['fi_b']; ?>" data-widths="[157, 270, 303, 370, 377, 670, 570, 720, 900, 1080, 1296, 1512, 1728, 2048]" data-aspectratio="2.2333333333333334" data-sizes="auto" class="img-fluid lazyautosizes lazyloaded" alt="" >
              

              
            </div>
            
            </a><div class="contain-banner"><a href="">
              </a><div><a href="">
                
                <h4 style="color: #ffffff" class="lang_trans" data-trans="#coll_bnr_1582109078318-0_trans_subtitle">
                 <?=$page_content['fi_b_top_heading']; ?>
                </h4>
                
                <span class="hide" id="coll_bnr_1582109078318-0_trans_subtitle"></span>
                
                
                
                <h2 style="color: #ffffff;" class="lang_trans" data-trans="#coll_bnr_1582109078318-0_trans_title">
                  <?=$page_content['fi_b_heading']; ?>
                </h2>
                
                <span class="hide" id="coll_bnr_1582109078318-0_trans_title"></span>
                
                
                
                
                  </a><a href="<?=$page_content['fi_b_link']; ?>" class="btn btn-solid" data-trans="#coll_bnr_1582109078318-0_trans_btntitle">
                    Shop Now 
                  </a>
                  
                     <span class="hide" id="coll_bnr_1582109078318-0_trans_btntitle"></span>
                  
                
                
              </div>
            </div>
            
          </div>
        
      </div>
      
      
      

      

      
      <div class="col-md-6" style="padding: 0px 15px 0px 15px ">
        <a href="">
          </a><div class="collection-banner p-right text-right"><a href="">
            <div class="banner-img">
              

              
              
              
              <img src="<?=site_url();?>/assets/img/default_image/<?=$page_content['fiv_b']; ?>" data-widths="[157, 270, 303, 370, 377, 670, 570, 720, 900, 1080, 1296, 1512, 1728, 2048]" data-aspectratio="2.2333333333333334" data-sizes="auto" class="img-fluid lazyautosizes lazyloaded" alt="" >
              

              
            </div>
            
            </a><div class="contain-banner"><a href="">
              </a><div><a href="">
                
                <h4 style="color: #ffffff" class="lang_trans" data-trans="#coll_bnr_1582109078318-1_trans_subtitle">
               <?=$page_content['fiv_b_top_heading']; ?>
                </h4>
                
                <span class="hide" id="coll_bnr_1582109078318-1_trans_subtitle"></span>
                
                
                
                <h2 style="color: #ffffff;" class="lang_trans" data-trans="#coll_bnr_1582109078318-1_trans_title">
                <?=$page_content['fiv_b_heading']; ?>
                </h2>
                
                <span class="hide" id="coll_bnr_1582109078318-1_trans_title"></span>
                
                
                
                
                  </a><a href="<?=$page_content['fiv_b_link']; ?>" class="btn btn-solid" data-trans="#coll_bnr_1582109078318-1_trans_btntitle">
                    Shop Now 
                  </a>
                  
                     <span class="hide" id="coll_bnr_1582109078318-1_trans_btntitle"></span>
                  
                
                
              </div>
            </div>
            
          </div>
        
      </div>
      
      
    </div>
  </div>
</div>



<style>
  
  
    .banner-btn1 {
      color: #ffffff;
      border-color: #4da219;
      background-color: #4da219;
    }
    .banner-btn1:hover, .banner-btn1:focus {
      background-color: #000000;
      border-color: #000000;
      color: #ffffff;
    }
  
  
    .banner-btn2 {
      color: #ffffff;
      border-color: #4da219;
      background-color: #4da219;
    }
    .banner-btn2:hover, .banner-btn2:focus {
      background-color: #000000;
      border-color: #000000;
      color: #ffffff;
    }
  
  


.collection_banner .grid {
/*     display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    width: 100%;
    -ms-flex-align: stretch;
    -webkit-align-items: stretch;
    -moz-align-items: stretch;
    -ms-align-items: stretch;
    -o-align-items: stretch;
    align-items: stretch;
    -webkit-flex-wrap: wrap;
    -moz-flex-wrap: wrap;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin: 0; */
  align-items: center;
  justify-content: center;
}
.collection_banner .grid .grid__sizer,
.grid__item {
  position: relative;
  width: 33.33%;
}
.collection_banner .grid .grid__item {
  margin-bottom: 30px;
  overflow: hidden;
  padding: 0 15px;
  float: left;
}
.collection_banner .grid .grid__item--high,
.collection_banner .grid .grid__item--high img {height: 30rem;}
.collection_banner .grid img {
  width: 100%;
  max-width: 100%;
  height: auto;
}
  @media(max-width: 991px) and (min-width: 768px) {
    .collection_banner .grid .grid__item {
      margin-bottom: 15px;
    }
  }
  @media(max-width: 767px) {
    .collection_banner .grid {
      height: auto !important; 
    }
    .collection_banner .grid .grid__sizer,
    .grid__item {
      width: 100%;
      position: relative !important;
      top: auto !important;
      left: auto !important;
      bottom: auto !important;
      right: auto !important;
    }
    .collection_banner .grid .grid__item {
      float: none;
    }
    .collection_banner .grid .grid__item:last-child {
      margin-bottom: 0;
    }
    .masonry_main {
       padding-top: 0px !important;
    }
  }
</style>

<script>
  $(document).ready(function () {
    // Masonry grid setup
    $(".grid").masonry({
      itemSelector: ".grid__item",
      columnWidth: ".grid__sizer",
      percentPosition: true
    });
  });
</script>






</div>
<div id="shopify-section-1586781343427" class="shopify-section">
   <script>
      $(document).ready(function () {    
      
        $('.product-slick').slick({
      
          slidesToShow: 1,
      
          slidesToScroll: 1,
      
          arrows: true,
      
          autoplay:false,
      
          fade: true,
      
          asNavFor: '.slider-nav'
      
        });
      
      
      
        $('.slider-nav').slick({
      
          vertical: false,
      
          slidesToShow: 3,
      
          slidesToScroll: 1,
      
          asNavFor: '.product-slick',
      
          arrows: false,
      
          dots: false,
      
          autoplay: false,
      
          focusOnSelect: true
      
        });
      
      
      
        $('.hotdeal-right-slick').slick({
      
          slidesToShow: 1,
      
          slidesToScroll: 1,
      
          arrows: false,
      
          fade: true,
      
          adaptiveHeight: true,
      
          autoplay:false,
      
          autoplaySpeed:1500
      
        });
      
        if ($(window).width() > 576) {
      
          $('.hotdeal-right-nav').slick({
      
            vertical: true,
      
            verticalSwiping: true,
      
            slidesToShow: 3,
      
            slidesToScroll: 1,
      
            asNavFor: '.hotdeal-right-slick',
      
            arrows: false,
      
            infinite: true,
      
            dots: false,
      
            centerMode: false,
      
            focusOnSelect: true
      
          });
      
        }else{
      
          $('.hotdeal-right-nav').slick({
      
            vertical: false,
      
            verticalSwiping: false,
      
            slidesToShow: 3,
      
            slidesToScroll: 1,
      
            asNavFor: '.hotdeal-right-slick',
      
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
      
      
      
      
      
      
      
   </script>
</div>

<div id="shopify-section-1582519539441" class="shopify-section">
   <!-- Product slider start -->
   <section class="two-row-prd-slider special-offer " 
      style="
      padding: 70px 0px 0px 0px;">
      <div class="container effect-banner-style-1">
         <div class="title2">
            <h4  style="color: #888888;">
               <?=$page_content['s_s_top_heading']; ?>
            </h4>
            <h2 class="title-inner2 "  style="color: #000000;">
               <?=$page_content['s_s_heading']; ?>
            </h2>
         </div>
      </div>
      <div class="container  effect-banner-style-2 addtocart_count">
         <div class="row">
            <div class="col">
               <div class="slick_carousel product-m" 
                  data-slick='{"slidesToShow": 5,"slidesToScroll": 1, "autoplay": false, "autoplaySpeed": 3000, "infinite": true, "arrows": true,"dots": false, "responsive":[{"breakpoint": 1367,"settings":{"slidesToShow": 4 }},{"breakpoint": 1024,"settings":{"slidesToShow": 3 }},{"breakpoint": 768,"settings":{"slidesToShow": 2 }},{"breakpoint": 420,"settings":{"slidesToShow": 1 }} ]}'>
                  <?php

                           if(count($special_products_all) > 0){
                                 foreach ($special_products_all as  $special_product_all) {
                                ?>
                                <div class="product-box product-wrap" >
                                 <div class="img-wrapper">
                                    <!-- <div class="lable-block">
                                       <span class="lable4 square large center" >sale</span>
                                    </div> -->
                                    <div class="front">
                                       <a href="#">
                                       <img src="<?=site_url();?>/assets/img/product_image/<?=$special_product_all['image']?>" 
                                          class="lazyload  img-fluid " alt="<?=$special_product_all['title']?>" >
                                       </a>
                                    </div>
                                    <div class="back">
                                       <a href="#">
                                       <img src="<?=site_url();?>/assets/img/product_image/<?=$special_product_all['image']?>" 
                                          class="lazyload  img-fluid " alt="<?=$special_product_all['title']?>" >
                                       </a>
                                    </div>
                                    
                                    <div class="cart-box">
                                       <a class="action--wishlist tile-actions--btn flex wishlist-btn" href="javascript:void(0)" title="Wishlist" data-product-handle="usable-dhaniya-powder">
                                       <i class="fa fa-heart-o" aria-hidden="true"></i>
                                       </a>
                                       <a class="quick-view" data-lightbox="image-1" href="<?=site_url();?>/assets/img/product_image/<?=$special_product_all['image']?>"  title="<?=$special_product_all['title']?>">
                                       <i class="ti-eye"></i>
                                       </a>
                                       
                                    </div>
                                 </div>
                                 <div class="product-detail text-center ">
                                    
                                    <div class="title-price">
                                       <a href="#">
                                          <h6 itemprop="name" class="prd-hover-show">
                                             <?=$special_product_all['title']?>
                                          </h6>
                                       </a>
                                       <h4 data-id="4779502698540" data-price="3000" class="prd-hover-show">
                                          
                                          <?=Currency.$special_product_all['price']?>
                                          <?php if($special_product_all['reguler_price']){
                                             ?>
                                             <del><?=Currency.$special_product_all['reguler_price']?></del>
                                             <?php
                                          }?>
                                          
                                       </h4>
                                    </div>
                                    <div class="advanced_add_cart select-dropdown">
                                       
                                          <div class="qty-add-box d-flex">
                                             
                                             
                                             <input type="submit" value="add" class="btn add_to_cart_btn_cls btn-solid" />
                                          </div>
                                       
                                    </div>
                                 </div>
                                 
                              </div>
                                <?php
                              }
                           }else{
                              ?>
                               <div class="product-box product-wrap" >
                                 <div class="product-detail text-center ">
                                    <p>No special product found.</p>
                                 </div>
                               </div>
                              <?php
                           }
                           
                           ?>
                  
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Product slider end -->
</div>



<!-- <div id="shopify-section-1586924009295" class="shopify-section">
   <section class="banner-padding collection_banner masonry_main  " style="padding: 50px 0px 50px 0px;">
      <div class="container">
         <div class="row partition2 grid" style="position: relative; height: 1162.08px;">
            <div class="grid__item grid__sizer" style="position: absolute; left: 0%; top: 0px;">
               <a href="">
               </a>
               <div class="collection-banner p-left text-left">
                  <a href="">
                     <div class="banner-img">
                        <img src="<?=site_url();?>/assets/img/default_image/<?=$page_content['six_b']; ?>"    class="img-fluid lazyautosizes lazyloaded" alt="" sizes="670px" >
                     </div>
                  </a>
                  <div class="contain-banner">
                     <a href="">
                     </a>
                     <div>
                        <a href="">
                           <h4 style="color: #fff">
                              <?=$page_content['six_b_top_heading']; ?>
                           </h4>
                           <h2 style="color: #fff;">
                             <?=$page_content['six_b_heading']; ?>
                           </h2>
                        </a>
                        <a href="<?=$page_content['six_b_link']; ?>" class="btn btn-solid">
                        Shop Now 
                        </a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="grid__item grid__sizer" style="position: absolute; left: 50%; top: 0px;">
               <a href="">
               </a>
               <div class="collection-banner p-left text-left">
                  <a href="">
                     <div class="banner-img">
                        <img src="<?=site_url();?>/assets/img/default_image/<?=$page_content['sev_b']; ?>" sizes="670px"  class="img-fluid lazyautosizes lazyloaded" alt="">
                     </div>
                  </a>
                  <div class="contain-banner">
                     <a href="">
                     </a>
                     <div>
                        <a href="">
                           <h4 style="color: #fff">
                              <?=$page_content['sev_b_top_heading']; ?>
                           </h4>
                           <h2 style="color: #fff;">
                              <?=$page_content['sev_b_heading']; ?>
                           </h2>
                        </a>
                        <a href="<?=$page_content['sev_b_link']; ?>" class="btn btn-solid">
                        Shop Now 
                        </a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="grid__item grid__sizer" style="position: absolute; left: 50%; top: 462px;">
               <a href="">
               </a>
               <div class="collection-banner p-left text-left">
                  <a href="">
                     <div class="banner-img">
                        <img src="<?=site_url();?>/assets/img/default_image/<?=$page_content['ei_b']; ?>"  sizes="670px"  >
                     </div>
                  </a>
                  <div class="contain-banner">
                     <a href="">
                     </a>
                     <div>
                        <a href="">
                           <h4 style="color: #fff">
                              <?=$page_content['ei_b_top_heading']; ?>
                           </h4>
                           <h2 style="color: #fff;">
                             <?=$page_content['ei_b_heading']; ?>
                           </h2>
                        </a>
                        <a href="<?=$page_content['ei_b_link']; ?>" class="btn btn-solid">
                        Shop Now 
                        </a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="grid__item grid__sizer" style="position: absolute; left: 0%; top: 700px;">
               <a href="">
               </a>
               <div class="collection-banner p-left text-left">
                  <a href="">
                     <div class="banner-img">
                        <img src="<?=site_url();?>/assets/img/default_image/<?=$page_content['ni_b']; ?>" class="img-fluid lazyautosizes lazyloaded" alt=""  sizes="670px"  >
                     </div>
                  </a>
                  <div class="contain-banner">
                     <a href="">
                     </a>
                     <div>
                        <a href="">
                           <h4 style="color: #fff">
                              <?=$page_content['ni_b_top_heading']; ?>
                           </h4>
                           <h2 style="color: #fff;">
                              <?=$page_content['ni_b_heading']; ?>
                           </h2>
                        </a>
                        <a href="<?=$page_content['ni_b_link']; ?>" class="btn btn-solid">
                        Order Now 
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <style>
      .banner-btn1 {
      color: #fff;
      border-color: #ffb12b;
      background-color: #ffb12b;
      }
      .banner-btn1:hover, .banner-btn1:focus {
      background-color: #000000;
      border-color: #000000;
      color: #ffffff;
      }
      .banner-btn2 {
      color: #fff;
      border-color: #ffb12b;
      background-color: #ffb12b;
      }
      .banner-btn2:hover, .banner-btn2:focus {
      background-color: #000000;
      border-color: #000000;
      color: #ffffff;
      }
      .banner-btn3 {
      color: #ffffff;
      border-color: #ffb12b;
      background-color: #ffb12b;
      }
      .banner-btn3:hover, .banner-btn3:focus {
      background-color: #000000;
      border-color: #000000;
      color: #ffffff;
      }
      .banner-btn4 {
      color: #fff;
      border-color: #ffb12b;
      background-color: #ffb12b;
      }
      .banner-btn4:hover, .banner-btn4:focus {
      background-color: #000000;
      border-color: #000000;
      color: #ffffff;
      }
      .collection_banner .grid {
      /*     display: -webkit-flex;
      display: -ms-flexbox;
      display: flex;
      width: 100%;
      -ms-flex-align: stretch;
      -webkit-align-items: stretch;
      -moz-align-items: stretch;
      -ms-align-items: stretch;
      -o-align-items: stretch;
      align-items: stretch;
      -webkit-flex-wrap: wrap;
      -moz-flex-wrap: wrap;
      -ms-flex-wrap: wrap;
      flex-wrap: wrap;
      margin: 0; */
      align-items: center;
      justify-content: center;
      }
      .collection_banner .grid .grid__sizer,
      .grid__item {
      position: relative;
      width: 50%;
      }
      .collection_banner .grid .grid__item {
      margin-bottom: 30px;
      overflow: hidden;
      padding: 0 15px;
      float: left;
      }
      .collection_banner .grid .grid__item--high,
      .collection_banner .grid .grid__item--high img {height: 30rem;}
      .collection_banner .grid img {
      width: 100%;
      max-width: 100%;
      height: auto;
      }
      @media(max-width: 991px) and (min-width: 768px) {
      .collection_banner .grid .grid__item {
      margin-bottom: 15px;
      }
      }
      @media(max-width: 767px) {
      .collection_banner .grid {
      height: auto !important; 
      }
      .collection_banner .grid .grid__sizer,
      .grid__item {
      width: 100%;
      position: relative !important;
      top: auto !important;
      left: auto !important;
      bottom: auto !important;
      right: auto !important;
      }
      .collection_banner .grid .grid__item {
      float: none;
      }
      .collection_banner .grid .grid__item:last-child {
      margin-bottom: 0;
      }
      .masonry_main {
      padding-top: 0px !important;
      }
      }
   </style>
   <script>
      $(document).ready(function () {
        // Masonry grid setup
        $(".grid").masonry({
          itemSelector: ".grid__item",
          columnWidth: ".grid__sizer",
          percentPosition: true
        });
      });
   </script>
</div> -->


<div id="shopify-section-1585031224319" class="shopify-section"><!-- product slider -->

<section class="col-slider-outer" style="padding: 70px 0px 70px 0px;">
  <div class="container addtocart_count">
    <div class="row multiple-slider">
      

      
      <div class="col-lg-3 col-md-6">
        <div class="theme-card">
          <h5 class="title-border lang_trans" data-trans="#colmn_slider_1585031224319-0_title">
            Special Products
          </h5>
          
          
          
          <div class="offer-slider slide-1">
            <?php
            if(count($special_products_all) > 0)
            {
               $divlimit=count($special_products_all)/3;
               $forvalue= ceil($divlimit);
               $start=0;
               $end=3;
               for ($i=0; $i < $forvalue ; $i++) { 

                  ?>
                  <div>
              
              <?php
              foreach (array_slice($special_products_all, $start, $end) as $key=> $special_product_all) {
               

                 ?>
                 <div class="media">
                <a href="#" >
                  
                  
                    
                    <img src="<?=site_url();?>/assets/img/product_image/<?=$special_product_all['image']?>" 
                          
                         class="lazyload  img-fluid" alt="<?=$special_product_all['title']?>" >
                </a>
                <div class="media-body align-self-center">
                  
                  <a href="#" class="p-0">
                    
                    
                    <h6 itemprop="name" class="lang_trans" data-trans="#4760158797868_pro_title">
                     <?=$special_product_all['title']?>
                    </h6>
                    
                    
                    
                  </a>
                  
                  <h4>
                    <span class=money><?=Currency.$special_product_all['price']?></span>
                  </h4>
                  
                </div>
              </div>

                 <?php
              }
              ?>
                
            </div>
                  <?php

              $start= $start + 3;
              $end= $end + 3;
            }

            }else{
               ?>
               <div>
                   <div class="media">
                     No special product found.
                   </div>
               </div>
               <?php
            }
            ?>
            
            
            
            
            
          </div>
        </div>
      </div>
      
      
      
      <div class="col-lg-3 col-md-6">
        <div class="theme-card">
          <h5 class="title-border lang_trans" data-trans="#colmn_slider_1585031224319-1_title">
            New Products
          </h5>
          
          <span class="hide" id="colmn_slider_1585031224319-1_title"></span>
          
          <div class="offer-slider slide-1">
            <?php
            if(count($new_products_all) > 0)
            {
               $divlimit=count($new_products_all)/3;
               $forvalue= ceil($divlimit);
               $start=0;
               $end=3;
               for ($i=0; $i < $forvalue ; $i++) { 

                  ?>
                  <div>
              
              <?php
              foreach (array_slice($new_products_all, $start, $end) as $key=> $new_product_all) {
               

                 ?>
                 <div class="media">
                <a href="#" >
                  
                  
                    
                    <img src="<?=site_url();?>/assets/img/product_image/<?=$new_product_all['image']?>" 
                          
                         class="lazyload  img-fluid" alt="<?=$new_product_all['title']?>" >
                </a>
                <div class="media-body align-self-center">
                  
                  <a href="#" class="p-0">
                    
                    
                    <h6 itemprop="name" class="lang_trans" data-trans="#4760158797868_pro_title">
                     <?=$new_product_all['title']?>
                    </h6>
                    
                    
                    
                  </a>
                  
                  <h4>
                    <span class=money><?=Currency.$new_product_all['price']?></span>
                  </h4>
                  
                </div>
              </div>

                 <?php
              }
              ?>
                
            </div>
                  <?php

              $start= $start + 3;
              $end= $end + 3;
            }

            }else{
               ?>
               <div>
                   <div class="media">
                     No new product found.
                   </div>
               </div>
               <?php
            }
            ?>
            
            
            
          </div>
        </div>
      </div>
      
      
      
      <div class="col-lg-3 col-md-6">
        <div class="theme-card">
          <h5 class="title-border lang_trans" data-trans="#colmn_slider_1585031224319-2_title">
            Best Salers
          </h5>
          
          <span class="hide" id="colmn_slider_1585031224319-2_title"></span>
          
          <div class="offer-slider slide-1">
            <div>
                   <div class="media">
                     No new product found.
                   </div>
               </div>
               <div>
                   <div class="media">
                     No new product found.
                   </div>
               </div>
            
          </div>
        </div>
      </div>
      
      
      
      <div class="col-lg-3 col-md-6">
        <div class="theme-card">
          <h5 class="title-border lang_trans" data-trans="#colmn_slider_1587216730335_title">
            Top Products
          </h5>
          
          <span class="hide" id="colmn_slider_1587216730335_title"></span>
          
          <div class="offer-slider slide-1">
            <div>
                   <div class="media">
                     No new product found.
                   </div>
               </div>
               <div>
                   <div class="media">
                     No new product found.
                   </div>
               </div>
            
          </div>
        </div>
      </div>
                  
    </div>
  </div>
</section>

<!-- product slider end -->


<div id="shopify-section-1584958835087" class="shopify-section">
   <!-- service layout -->
   <div class="container service-top-space " 
      style="padding: 70px 15px 0px 15px;">
      <div class="service service_4">
         <div class="row">
            <div class="col-lg-3 col-md-6 service-block">
               <div class="media">
                  <div class="service-img ">
                     <img class="lazyload  img-fluid" src="<?=site_url();?>/assets/img/image_1_5ca7afdb-8663-4a06-8011-5df3f24f7c2f.png"  alt="Free Shipping"/>
                  </div>
                  <div class="media-body">
                     <h4 >
                        Free Shipping
                     </h4>
                     <p >
                        dummy graphic web designs
                     </p>
                  </div>
               </div>
            </div>
            <div class="col-lg-3 col-md-6 service-block">
               <div class="media">
                  <div class="service-img ">
                     <img class="lazyload  img-fluid" src="<?=site_url();?>/assets/img/image_2_bcc77a61-b5b0-47a8-a6a2-fcc49f1ecfbf.png"  alt="24 X 7 Service"/>
                  </div>
                  <div class="media-body">
                     <h4 >
                        24 X 7 Service
                     </h4>
                     <p >
                        Lorem ipsum dummy text
                     </p>
                  </div>
               </div>
            </div>
            <div class="col-lg-3 col-md-6 service-block">
               <div class="media">
                  <div class="service-img ">
                     <img class="lazyload  img-fluid" src="<?=site_url();?>/assets/img/image_4_7126378e-7f34-4f46-a07f-af07e3457645.png"  alt="Festival Offer"/>
                  </div>
                  <div class="media-body">
                     <h4 >
                        Festival Offer
                     </h4>
                     <p >
                        dummy graphic web designs
                     </p>
                  </div>
               </div>
            </div>
            <div class="col-lg-3 col-md-6 service-block">
               <div class="media">
                  <div class="service-img ">
                     <img class="lazyload  img-fluid" src="<?=site_url();?>/assets/img/image_3_fc0c4166-58d8-4375-b273-7d71884a8878.png"  alt="Online Payment"/>
                  </div>
                  <div class="media-body">
                     <h4 >
                        Online Payment
                     </h4>
                     <p >
                        Lorem ipsum dummy text
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- service layout  end -->
</div>


<div id="shopify-section-1581942173709" class="shopify-section">
   <!-- blog section -->
   <section class="blog section-b-space 
      " style="
      background-color: #fff;padding: 70px 0px 70px 0px">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="title2">
                  <h4  style="color: #888;">
                     <?=$page_content['blog_s_top_heading']; ?>
                  </h4>
                  <h2 class="title-inner2 "  style="color: #222;">
                     <?=$page_content['blog_s_heading']; ?>
                  </h2>
               </div>
               <div class="slick_carousel" data-slick='{"slidesToShow": 3,"slidesToScroll": 1, "autoplay": true, "autoplaySpeed": 6000, "infinite": true, "arrows": true,"dots": false, "responsive":[{"breakpoint": 1367,"settings":{"slidesToShow": 3 }},{"breakpoint": 1024,"settings":{"slidesToShow": 2 }},{"breakpoint": 768,"settings":{"slidesToShow": 1 }},{"breakpoint": 480,"settings":{"slidesToShow": 1 }} ]}'>
                  <?php
                  if(count($blogs) > 0){
                  foreach($blogs as $key => $blog){
                     ?>
                     <div class="col-md-12">
                     <div class="outer-blog">
                        <div class="classic-effect">
                           <figure class="m-0">
                              <img src="<?=site_url();?>/assets/img/blog_image/<?=$blog['blog_image']; ?>" 
                                 data-widths="[157, 270, 303, 370, 377, 670, 570, 720, 900, 1080, 1296, 1512, 1728, 2048]" 
                                 data-aspectratio="1.55" 
                                 data-sizes="auto" 
                                 class="lazyload  img-fluid  w-100" alt="<?=$blog['title']?>" >
                              <div class="ovrly"></div>
                              <div class="buttons search">
                                 <a href="#" class="fa fa-search search-botton"></a>
                              </div>
                              <div class="inner-option">
                                 <h4><time datetime="2020-03-24T13:03:00Z"><?=date("d", strtotime($blog['cdate'])); ?></time></h4>
                                 <h5><time datetime="2020-03-24T13:03:00Z"><?=date("F", strtotime($blog['cdate'])); ?></time></h5>
                              </div>
                           </figure>
                        </div>
                        <div class="blog-details">
                           <a href="#">
                              <p >
                                 <?=$blog['title']?>
                              </p>
                           </a>
                           <h6>
                              By: admin
                              
                           </h6>
                        </div>
                     </div>
                  </div>
                     <?php
                  }

                  }else{
                     ?>
                     <div class="col-md-12" >
                     <div class="outer-blog">
                        
                        No Blog found.
                     </div>
                    </div>
                     <?php
                  }
                  ?>
                  
                 
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- blog section end -->
   <style>
      .title1 h2, .title2 h2, .title3 h2, .title4 h2{
      color: #222;
      }
   </style>
</div>






</div>
<?php
   include_once('include/footer.php'); 
?>

