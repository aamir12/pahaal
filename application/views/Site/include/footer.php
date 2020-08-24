<div id="shopify-section-footer-7" class="shopify-section">
   <!-- footer -->
   <footer class="p-0 full-banner parallax   bg-img-footer effect-cls footer-effect" style="   background-blend-mode: overlay;  background: var(--footer-bg-color);color: var(--footer-color); ">
      <div class="box-layout" style="padding: 100px 0px 40px 0px;">
         <div class="container">
            <div class="row footer-theme2 bottom-section">
               <div class="col-md-12 about-store">
                  <div class="footer-block custome-section">
                     <div class="footer-container store-about">
                        <div class="footer-title footer-mobile-title">
                           <h4 class="lang_trans" data-trans="#footer2_1585033142083_title">
                              About
                           </h4>
                           <span class="hide" id="footer2_1585033142083_title"></span>
                        </div>
                        <div class="footer-contant">
                           <div class="footer-logo" itemscope="" itemtype="">
                              <img class=" lazyloaded" src="<?=base_url();?>assets/img/default_image/<?=$default_content['footer_logo'] ?>" alt="<?=$default_content['site_title'] ?>" style="max-width:195px">
                           </div>
                           <p style="color: var(--footer-color)" class="lang_trans" data-trans="#footer2_1585033142083_text">
                              <?=$default_content['footer_content'] ?>
                           </p>
                           <span class="hide" id="footer2_1585033142083_text"></span>
                           <div class="download-app row">
                              <div class="app1">
                                 <a href="<?=base_url();?>"><img src="//cdn.shopify.com/s/files/1/0358/5507/3324/files/11.jpg?v=1587117292" class=" lazyloaded" alt=""></a>
                              </div>
                              <div class="app2">
                                 <a href="<?=base_url();?>"><img src="//cdn.shopify.com/s/files/1/0358/5507/3324/files/22.jpg?v=1587117290" class=" lazyloaded" alt=""></a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <section class="footer-top">
            <div class="container">
               <div class="row footer-theme2 top-section">
                  <div class="col">
                     <div class="sub-title">
                        <div class="footer-title">
                           <h4 style="color: #000000" class="lang_trans" data-trans="#footer1_1585033169308_info_title">
                              Store Info
                           </h4>
                           <span class="hide" id="footer1_1585033169308_info_title"></span>
                        </div>
                        <div class="footer-contant">
                           <ul class="contact-list">
                            <?php
                              if($default_content['address']!=''){
                                  ?><li ><i class="fa fa-map-marker"></i><span class="lang_trans" data-trans="#footer1_1585033169308_address"><?=$default_content['address']?></span><span class="hide" id="footer1_1585033169308_address"></span></li><?php
                              }
                              if($default_content['phone_number']!=''){
                                  ?><li ><i class="fa fa-phone"></i><span class="lang_trans" data-trans="#footer1_1585033169308_contact_info">Call Us:  <?=$default_content['phone_number']?></span><span class="hide" id="footer1_1585033169308_contact_info"></span></li><?php
                              }
                              if($default_content['email']!=''){
                                  ?><li ><i class="fa fa-envelope-o"></i><span class="lang_trans" data-trans="#footer1_1585033169308_email">Email Us: <?=$default_content['email']?></span><span class="hide" id="footer1_1585033169308_email"></span></li><?php
                              }
                              ?>
                              
                              
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col">
                     <div class="sub-title">
                        <div class="footer-title">
                           <h4 style="color: #000000" class="lang_trans" data-trans="#footer1_1585039342118_menu_title">
                              All Pages
                           </h4>
                           <span class="hide" id="footer1_1585039342118_menu_title"></span>
                        </div>
                        <div class="footer-contant">
                           <ul>
                            <?php
                                if($default_content['home_page']!='on'){
                                    ?><li><a href="<?=base_url();?>"   style="color: var(--footer-color);">Home</a></li>
                                    <?php
                                }
                                if($default_content['about_page']!='on'){
                                    ?><li><a href="<?=base_url();?>about-us"   style="color: var(--footer-color);">About us</a></li>
                                    <?php
                                }
                                if($default_content['shop_page']!='on'){
                                    ?><li><a href="<?=base_url();?>"  style="color: var(--footer-color);">Shop</a></li>
                                    <?php
                                }
                                if($default_content['blog_page']!='on'){
                                    ?><li><a href="<?=base_url();?>"   style="color: var(--footer-color);">Blog</a></li><?php
                                }
                                if($default_content['contact_page']!='on'){
                                    ?><li><a href="<?=base_url();?>contact-us" style="color: var(--footer-color);">Contact Us</a></li><?php
                                }
                              ?>
                              
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col">
                     <div class="sub-title">
                        <div class="footer-title">
                           <h4 style="color: #000000" class="lang_trans" data-trans="#footer1_1585033161622_menu_title">
                              Your Account
                           </h4>
                           <span class="hide" id="footer1_1585033161622_menu_title"></span>
                        </div>
                        <div class="footer-contant">
                           <ul>
                              <li>
                                 <a href="<?=base_url();?>login" style="color: var(--footer-color)" class="lang_trans" data-trans="#footer1_login">
                                 Login
                                 </a>
                                 <span class="hide" id="footer1_login">Login</span>
                              </li>
                              
                              <li>
                                 <a href="<?=base_url();?>cart" style="color: var(--footer-color)" class="lang_trans" data-trans="#footer1_my-cart">
                                 My Cart
                                 </a>
                                 <span class="hide" id="footer1_my-cart">My Cart</span>
                              </li>
                              <li>
                                 <a href="<?=base_url();?>wishlist" style="color: var(--footer-color)" class="lang_trans" data-trans="#footer1_wishlist">
                                 Wishlist
                                 </a>
                                 <span class="hide" id="footer1_wishlist">Wishlist</span>
                              </li>
                              <li>
                                 <a href="<?=base_url();?>terms-and-condition" style="color: var(--footer-color)" class="lang_trans" data-trans="#footer1_create-account">
                                 Terms and conditions
                                 </a>
                                 <span class="hide" id="footer1_create-account">Terms and conditions</span>
                              </li>
                              <li>
                                 <a href="<?=base_url();?>privacy-policy" style="color: var(--footer-color)" class="lang_trans" data-trans="#footer1_create-account">
                                 Privacy policy
                                 </a>
                                 <span class="hide" id="footer1_create-account">Privacy policy</span>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col form-p">
                     <div class="footer-block">
                        <div class="subscribe-white">
                           <div class="footer-title footer-mobile-title">
                              <h4 class="lang_trans" data-trans="#footer2_1585033158132_newsltr_title">
                                 Newsletter
                              </h4>
                              <span class="hide" id="footer2_1585033158132_info_title"></span>
                           </div>
                           <div class="footer-contant">
                              <div class="footer-title footer-desktop-title">
                                 <h4 class="lang_trans" data-trans="#footer2_1585033158132_newsltr_title">
                                    Newsletter
                                 </h4>
                                 <span class="hide" id="footer2_1585033158132_info_title"></span>
                              </div>
                              <p style="color: var(--footer-color)" class="lang_trans" data-trans="#footer2_1585033158132_text">
                                 Join us for get latest updates
                              </p>
                              <span class="hide" id="footer2_1585033158132_text"></span>
                              <form action="" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate="">
                                 <div id="mc_embed_signup_scroll">
                                    <div class="form-group">
                                       <input class="required email form-control" value="" name="EMAIL" placeholder="Enter Your Email" id="mce-EMAIL" required="" type="email">
                                    </div>
                                    <div id="mce-responses" class="clear">
                                       <div class="response" id="mce-error-response" style="display:none"></div>
                                       <div class="response" id="mce-success-response" style="display:none"></div>
                                    </div>
                                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                    <div style="position: absolute; left: -5000px;" hidden="">
                                       <input name="b_17af379706d80b694776f991f_9ebb72e4d2" tabindex="-1" value="" type="text">
                                    </div>
                                    <button type="submit" class="btn btn-solid" name="subscribe" id="mc-embedded-subscribe"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                                 </div>
                              </form>
                              <div class="social-white">
                                 <div>
                                    <ul>
                                       <?php
                                 if($default_content['facebook_link']!=''){
                                  ?><li class="facebook"><a href="<?=$default_content['facebook_link']?>"><i style="color: var(--footer-color)" class="fa fa-facebook" aria-hidden="true"></i></a></li><?php
                                }
                                if($default_content['twitter_link']!=''){
                                  ?><li class="twitter"><a href="<?=$default_content['twitter_link']?>"><i style="color: var(--footer-color)" class="fa fa-twitter" aria-hidden="true"></i></a></li><?php
                                }
                                if($default_content['instagram_link']!=''){
                                  ?><li class="insta"><a href="<?=$default_content['instagram_link']?>"><i style="color: var(--footer-color)" class="fa fa-instagram" aria-hidden="true"></i></a> </li><?php
                                }
                                if($default_content['linkedin_link']!=''){
                                  ?><li class="linkedin"><a href="<?=$default_content['linkedin_link']?>"><i style="color: var(--footer-color)" class="fa fa-linkedin" aria-hidden="true"></i></a></li><?php
                                }
                               ?>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      <div class="sub-footer black-subfooter">
         <div class="container">
            <div class="row">
               <div class="col-xl-6 col-md-6 col-sm-12 footer-link">
                  <div class="footer-end lang_trans" data-trans="#footer2_1585033153559_copyright_text">
                     <p><?=$default_content['copy_right_content']?></p>
                  </div>
                  <span class="hide" id="footer2_1585033153559_copyright_text"></span>
               </div>
               <!-- <div class="col-xl-6 col-md-6 col-sm-12">
                  <div class="payment-card-bottom">
                     <ul class="paymant-bottom">
                        <li>
                           <a href=""><img src="//cdn.shopify.com/s/files/1/0358/5507/3324/t/4/assets/payment_img_1.png?v=11237394468909895816" class=" lazyloaded" alt=""></a>
                        </li>
                        <li>
                           <a href=""><img src="//cdn.shopify.com/s/files/1/0358/5507/3324/t/4/assets/payment_img_2.png?v=18304543508994962608" class=" lazyloaded" alt=""></a>
                        </li>
                        <li>
                           <a href=""><img src="//cdn.shopify.com/s/files/1/0358/5507/3324/t/4/assets/payment_img_3.png?v=8953150521721035323" class=" lazyloaded" alt=""></a>
                        </li>
                        <li>
                           <a href=""><img src="//cdn.shopify.com/s/files/1/0358/5507/3324/t/4/assets/payment_img_4.png?v=2378090977771716926" class=" lazyloaded" alt=""></a>
                        </li>
                        <li>
                           <a href=""><img src="//cdn.shopify.com/s/files/1/0358/5507/3324/t/4/assets/payment_img_5.png?v=15780901864777253417" class=" lazyloaded" alt=""></a>
                        </li>
                     </ul>
                  </div>
               </div> -->
            </div>
         </div>
      </div>
   </footer>
   <!-- footer end -->
</div>
<!-- tap to top -->
 <div class="tap-top ">
   <i class="fa fa-arrow-up" aria-hidden="true"></i>
   </div>
  
<!-- tap to top end -->
<script src="<?=site_url();?>/assets/site/js/lazysizes.min.js" ></script>
<script src="<?=site_url();?>/assets/site/js/jquery.elevatezoom.js" ></script>
<script src="<?=site_url();?>/assets/site/js/handlebars-v4.0.5.js" ></script>
<script src="<?=site_url();?>/assets/site/js/popper.min.js" ></script>    
<script src="<?=site_url();?>/assets/site/js/slick.js" ></script>
<script src="<?=site_url();?>/assets/site/js/menu.js" ></script>
<script src="<?=site_url();?>/assets/site/js/bootstrap.js" ></script>
<script src="<?=site_url();?>/assets/site/js/jquery.vide.min.js" ></script>
<script src="<?=site_url();?>/assets/site/js/jquery.magnific-popup.js" ></script>
<script src="<?=site_url();?>/assets/site/js/isotope.min.js" ></script>
<script src="<?=site_url();?>/assets/site/js/plugins.js" ></script>
<script src="<?=site_url();?>/assets/site/js/script.js" ></script>
<!-- <script src="<?=site_url();?>/assets/site/js/theme.min.js" ></script>     -->
<script src="<?=site_url();?>/assets/site/js/imagesloaded.pkgd.min.js" ></script>    
<script src="<?=site_url();?>/assets/site/js/masonry.pkgd.min.js" ></script>    

<!-- Some styles to get you started. -->
<style>
   .search-results {
   z-index: 8889;
   list-style-type: none;   
   width: 100%;
   margin: 0;
   padding: 0;
   background: #ffffff;
   border: 1px solid #eee;
   border-radius: 3px;
   -webkit-box-shadow: 0px 4px 7px 0px rgba(0,0,0,0.1);
   box-shadow: 0px 4px 7px 0px rgba(0,0,0,0.1);
   overflow: scroll;
   top: 64px !important;
   height: 430px;
   }
   .search-results li {
   display: block;
   width: 100%;
   height: auto;
   margin: 0;
   padding: 8px 8px !important;
   border-top: 1px solid #eee;
   line-height: 38px;
   overflow: hidden;
   }
   .search-results li:first-child {
   border-top: none;
   }
   .search-results .title {
   width: auto;
   white-space: nowrap;
   overflow: hidden;
   text-overflow: ellipsis;
   -o-text-overflow: ellipsis;
   text-align: left;
   border: none;
   display: block;
   line-height: 22px;
   font-size: 16px !important;
   text-transform: capitalize;
   padding: 20px 15px 0px;
   margin-bottom: 7px;
   color: #666;
   }
   .search-results .price {
   width: auto;
   float: left;
   font-size: 15px;
   padding: 6px 15px;
   line-height: 16px;
   color: #222;
   display: block;
   font-weight: 600;}
   .search-results .thumbnail {
   float: left;
   display: block;
   width: auto;
   padding: 0;
   text-align: center;
   overflow: hidden;
   }
   @media(max-width: 991px) {
   .search-results .thumbnail {
   width: 20%;
   margin: 0;
   }
   .search-results .title {
   width: 75%;
   }
   }
</style>
</body>
</html>

