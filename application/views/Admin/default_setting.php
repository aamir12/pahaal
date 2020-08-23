<?php 

   include_once('include/header.php'); 

   $user_id = $this->session->userdata('user_id');

   ?>

<div class="content-wrapper">

   <!-- Content Header (Page header) -->

   <section class="content-header">

      <h1>Default<small>Setting</small></h1>

      <ol class="breadcrumb">

         <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

         <li class="active"><a href="content_management.php">Default Setting</a></li>

      </ol>

   </section>

   <!-- Main content -->

   <section class="content">

      <div class="row">

         <!-- left column -->

         <div class="col-md-6">

            <!-- general form elements -->

            <div class="box box-primary">

               <div class="box-header with-border">

                  <h3 class="box-title">Site Identity</h3>

               </div>

               <!-- /.box-header -->

               <!-- form start -->

               <form role="form" method="post" id="updateSiteIdentity" onsubmit="return updateSiteIdentity();" enctype="multipart/form-data">

                  <div class="box-body">

                     <div id="site-identity-msg"></div>

                     <input type="hidden" name="id" value="<?=$default_content['id']; ?>">

                     <div class="form-group">

                        <label class=" form-control-label">Logo</label><br>

                        <img style="background: bisque;" src="<?=site_url() .'assets/img/default_image/'.$default_content['logo'];?>" id="logo_image" height="100px">

                     </div>

                     <div class="form-group">

                        <label class=" form-control-label">Change Logo</label><br>

                        <input type="file" name="logo" id="logo"  class="form-control" onchange="preview_image(this,'logo_image','main_logo')" accept="image/*">

                     </div>

                     <div class="form-group">

                        <label class=" form-control-label">Site Title</label>

                        <input type="text" name="site_title" id="site_title" value="<?=$default_content['site_title']; ?>" class="form-control">

                     </div>

                     <div class="form-group">

                        <label class=" form-control-label">Site Icon</label><br>

                        <img src="<?=site_url().'assets/img/default_image/'.$default_content['site_icon'];?>" id="site_icon_image" height="50px">

                     </div>

                     <div class="form-group">

                        <label class=" form-control-label">Change Site Icon</label><br>

                        <input type="file" name="site_icon" id="site_icon"  class="form-control" onchange="preview_image(this,'site_icon_image','')" accept="image/*">

                     </div>

                  </div>

                  <div class="box-footer">

                     <button type="submit" name="submit" id="siteIdentitySubmitBtn" class="btn btn-success">Submit</button>

                  </div>

               </form>

            </div>

         </div>

         <div class="col-md-6">

            <div class="box box-primary">

               <div class="box-header with-border">

                  <h3 class="box-title">Footer Content</h3>

               </div>

               <form role="form" method="post" id="footerContentUpdate" onsubmit="return footerContentUpdate();" enctype="multipart/form-data">

                  <div class="box-body">

                     <div id="footer-msg"></div>

                     <input type="hidden" name="id" value="<?=$default_content['id'] ?>">

                     <div class="form-group">

                        <label class=" form-control-label">Footer Logo</label><br>

                        <img style="background: bisque;" src="<?=site_url().'assets/img/default_image/'.$default_content['footer_logo'];?>" id="footer_logo_image" height="100px">

                     </div>

                     <div class="form-group">

                        <label class=" form-control-label">Change Footer Logo</label><br>

                        <input type="file" name="footer_logo" id="footer_logo" onchange="preview_image(this,'footer_logo_image','')"  class="form-control" accept="image/*">

                     </div>

                     <div class="form-group">

                        <label class="form-control-label">Footer Content</label>

                        <textarea rows="4" name="footer_content" id="footer_content" class="form-control"><?=$default_content['footer_content'] ?></textarea>

                     </div>

                     <div class="form-group">

                        <label class="form-control-label">Copy Right Text</label>

                        <input type="text" name="copy_right_content" id="copy_right_content" value="<?=$default_content['copy_right_content'] ?>" class="form-control">

                     </div>

                     

                  </div>

                  <div class="box-footer">

                     <button type="submit" name="submit" id="footerContentSubmitBtn" class="btn btn-success">Submit</button>

                  </div>

               </form>

            </div>

         </div>

         

      </div>

   </section>

   <section class="content">

      <div class="row">

         <div class="col-md-6">

            <div class="box box-primary">

               <div class="box-header with-border">

                  <h3 class="box-title">Menu Setting</h3>

               </div>

               <form role="form" method="post" id="menuForm" onsubmit="return menuUpdate();">

                  <div class="box-body">

                     <div id="menu-msg"></div>

                     <input type="hidden" name="id" value="<?=$default_content['id'] ?>">

                     <div class="form-group">

                        <label class=" form-control-label"><a href="#" data-placement="right" data-toggle="tooltip" title="Home Page hide in main menu">Hide Home Page</a></label><br>

                        <input type="checkbox" name="home_page" id="home_page" <?php if($default_content['home_page']=='on'){echo "checked";}?> >

                     </div>

                     <div class="form-group">

                        <label class=" form-control-label"><a href="#" data-placement="right" data-toggle="tooltip" title="About Us hide in main menu">Hide About Us Page</a></label><br>

                        <input type="checkbox" name="about_page" id="about_page" <?php if($default_content['about_page']=='on'){echo "checked";}?> >

                     </div>

                     <div class="form-group">

                        <label class=" form-control-label"><a href="#" data-placement="right" data-toggle="tooltip" title="Shop Page hide in main menu">Hide Shop Page</a></label><br>

                        <input type="checkbox" name="shop_page" id="shop_page" <?php if($default_content['shop_page']=='on'){echo "checked";}?> >

                     </div>



                     <div class="form-group">

                        <label class=" form-control-label"><a href="#" data-placement="right" data-toggle="tooltip" title="Blog Page hide in main menu">Hide Blog Page</a></label><br>

                        <input type="checkbox" name="blog_page" id="blog_page" <?php if($default_content['blog_page']=='on'){echo "checked";}?> >

                     </div>

                     

                     <div class="form-group">

                        <label class=" form-control-label"><a href="#" data-placement="right" data-toggle="tooltip" title="Contact Page hide in main menu">Hide Contact Page</a></label><br>

                        <input type="checkbox" name="contact_page" id="contact_page" <?php if($default_content['contact_page']=='on'){echo "checked";}?> >

                     </div>

                  </div>

                  <div class="box-footer">

                     <button type="submit" name="submit" id="menuSubmitBtn" class="btn btn-success">Submit</button>

                  </div>

               </form>

            </div>

         </div>

         <!-- left column -->

         <div class="col-md-6">

            <!-- general form elements -->

            <div class="box box-primary">

               <div class="box-header with-border">

                  <h3 class="box-title">Payment Gateway Details</h3>

                  <h6>Stripe Payment Gateway</h6>

               </div>

               <!-- /.box-header -->

               <!-- form start -->

               <form role="form" method="post" id="paymentDetailUpdate"  onsubmit="return paymentDetailUpdate();">

                  <div class="box-body">

                     <div id="payment-msg"></div>

                     <input type="hidden" name="id" value="<?=$default_content['id']; ?>">

                     <div class="form-group">

                        <label class=" form-control-label"><a href="#" data-placement="right" data-toggle="tooltip" title="Testing mode working for test Publishable key and Secret key!">Testing Mode</a></label><br>

                        <input type="checkbox" name="gateway_mode" id="gateway_mode" <?php if($default_content['gateway_mode']=='on'){echo "checked";}?> >

                     </div>

                     <div class="form-group">

                        <label class=" form-control-label">Publishable key</label>

                        <input type="text" name="publishable_key" id="publishable_key" value="<?=$default_content['publishable_key']; ?>" class="form-control">

                     </div>

                     <div class="form-group">

                        <label class=" form-control-label">Secret key</label>

                        <input type="text" name="secret_key" id="secret_key" value="<?=$default_content['secret_key']; ?>" class="form-control">

                     </div>

                  </div>

                  <div class="box-footer">

                     <button type="submit" name="submit" id="paymentSubmitBtn" class="btn btn-success">Submit</button>

                  </div>

               </form>

            </div>

            <!-- general form elements -->

            

         </div>

      </div>

   </section>



   <section class="content">

      <div class="row">

         <div class="col-md-6">

            <div class="box box-primary">

               <div class="box-header with-border">

                  <h3 class="box-title">Social Media Setting</h3>

               </div>

               <form role="form" method="post" id="socialMediaUpdate" onsubmit="return socialMediaUpdate();" >

                  <div class="box-body">

                     <div id="social-media-msg"></div>

                     <input type="hidden" name="id" value="<?=$default_content['id'] ?>">

                     

                      <div class="form-group">

                        <label class="form-control-label">Facebook Link</label>

                        <input type="text" name="facebook_link" id="facebook_link" value="<?=$default_content['facebook_link'] ?>" class="form-control">

                     </div>

                     <div class="form-group">

                        <label class="form-control-label">Twitter Link</label>

                        <input type="text" name="twitter_link" id="twitter_link" value="<?=$default_content['twitter_link'] ?>" class="form-control">

                     </div>

                     <div class="form-group">

                        <label class="form-control-label">Instagram Link</label>

                        <input type="text" name="instagram_link" id="instagram_link" value="<?=$default_content['instagram_link'] ?>" class="form-control">

                     </div>

                     <div class="form-group">

                        <label class="form-control-label">Linkedin Link</label>

                        <input type="text" name="linkedin_link" id="linkedin_link" value="<?=$default_content['linkedin_link'] ?>" class="form-control">

                     </div> 

                  </div>

                  <div class="box-footer">

                     <button type="submit" name="submit" id="socialMediaSubmitBtn" class="btn btn-success">Submit</button>

                  </div>

               </form>

            </div>

         </div>

         <!-- left column -->

         <div class="col-md-6">

            <!-- general form elements -->

            <div class="box box-primary">

               <div class="box-header with-border">

                  <h3 class="box-title">Contact Details Setting</h3>

                  

               </div>

               <!-- /.box-header -->

               <!-- form start -->

               <form role="form" method="post" id="contactDetailsUpdate"  onsubmit="return contactDetailsUpdate();">

                  <div class="box-body">

                     <div id="contact-detail-msg"></div>

                     <input type="hidden" name="id" value="<?=$default_content['id']; ?>">

                     <div class="form-group">

                        <label class=" form-control-label">Phone Number</label>

                        <input type="text" name="phone_number" id="phone_number" value="<?=$default_content['phone_number']; ?>" class="form-control">

                     </div>

                     <div class="form-group">

                        <label class=" form-control-label">Email</label>

                        <input type="email" name="email" id="email" value="<?=$default_content['email']; ?>" class="form-control">

                     </div>

                     <div class="form-group">

                        <label class=" form-control-label">Address</label>

                        <textarea rows="4" name="address" id="address" class="form-control"><?=$default_content['address']; ?></textarea>

                        

                     </div>

                  </div>

                  <div class="box-footer">

                     <button type="submit" name="submit" id="contactDetailsSubmitBtn" class="btn btn-success">Submit</button>

                  </div>

               </form>

            </div>

            <!-- general form elements -->

            

         </div>

      </div>

   </section>



    <section class="content">

      <div class="row">

         <div class="col-md-6">

            <div class="box box-primary">

               <div class="box-header with-border">

                  <h3 class="box-title">Top Banner Setting</h3>

               </div>

               <form role="form" method="post" id="topBannerUpdate" onsubmit="return topBannerUpdate();" enctype="multipart/form-data">

                  <div class="box-body">

                     <div id="top-banner-msg"></div>

                     <input type="hidden" name="id" value="<?=$default_content['id'] ?>">

                     <div class="form-group">

                        <label class=" form-control-label"><a href="#" data-placement="right" data-toggle="tooltip" title="Top Banner hide in website top area">Hide Top Banner</a></label><br>

                        <input type="checkbox" name="top_banner_status" id="top_banner_status" <?php if($default_content['top_banner_status']=='on'){echo "checked";}?> >

                     </div>

                     <div class="form-group">

                        <label class=" form-control-label">Top Banner</label><br>

                        <img  src="<?=site_url().'assets/img/default_image/'.$default_content['top_banner'];?>" id="top_banner_image" height="100px" width="624px">

                     </div>

                     <div class="form-group">

                        <label class=" form-control-label">Change Banner</label><br>

                        <input type="file" name="top_banner" id="top_banner" onchange="preview_image(this,'top_banner_image','')"  class="form-control" accept="image/*">

                     </div>

                     

                     

                     

                     

                  </div>

                  <div class="box-footer">

                     <button type="submit" name="submit" id="topBannerSubmitBtn" class="btn btn-success">Submit</button>

                  </div>

               </form>

            </div>

         </div>



         <div class="col-md-6">

            <div class="box box-primary">

               <div class="box-header with-border">

                  <h3 class="box-title">Loader Setting</h3>

               </div>

               <form role="form" method="post" id="loaderUpdate" onsubmit="return loaderUpdate();" enctype="multipart/form-data">

                  <div class="box-body">

                     <div id="loader-msg"></div>

                     <input type="hidden" name="id" value="<?=$default_content['id'] ?>">

                     <div class="form-group">

                        <label class=" form-control-label"><a href="#" data-placement="right" data-toggle="tooltip" title="Loader Deactive in website">Deactive Loader</a></label><br>

                        <input type="checkbox" name="loader_status" id="loader_status" <?php if($default_content['loader_status']=='on'){echo "checked";}?> >

                     </div>

                     <div class="form-group">

                        <label class=" form-control-label">Loader</label><br>

                        <img  src="<?=site_url().'assets/img/default_image/'.$default_content['loader_image'];?>" id="loader_image_view" height="100px" >

                     </div>

                     <div class="form-group">

                        <label class=" form-control-label">Change Banner</label><br>

                        <input type="file" name="loader_image" id="loader_image" onchange="preview_image(this,'loader_image_view','')"  class="form-control" accept="image/*">

                     </div>

                     

                     

                     

                     

                  </div>

                  <div class="box-footer">

                     <button type="submit" name="submit" id="loaderSubmitBtn" class="btn btn-success">Submit</button>

                  </div>

               </form>

            </div>

         </div>

        

      </div>

   </section>

</div>

<?php include_once('include/footer.php'); ?>

<script>

   function updateSiteIdentity(){

   var formData = new FormData($('#updateSiteIdentity')[0]);

   	$.ajax({

   		type:'POST',

   		url:site_url+'admin/update-site-identity',

   		data:formData,

   		dataType:'json',

        cache:false,

        contentType: false,

        processData: false,

   		beforeSend:function(){

   			$('#siteIdentitySubmitBtn').prop('disabled',true);

   			$('#siteIdentitySubmitBtn').html('Submit <i class="fa fa-spinner fa-spin fa-fw"></i>');

   		},

   		success:function(resp){

   			$('#siteIdentitySubmitBtn').prop('disabled',false);

            $('#siteIdentitySubmitBtn').html('Submit');

   			if(resp.status==1){

                $('#site-identity-msg').html(resp.msg);

   

   			} else {

   				$('#site-identity-msg').html(resp.msg);

   			}

   		}

   	});

   	return false;

   }



   function footerContentUpdate(){

   var formData = new FormData($('#footerContentUpdate')[0]);

   	$.ajax({

   		type:'POST',

   		url:site_url+'admin/update-footer-content',

   		data:formData,

   		dataType:'json',

        cache:false,

        contentType: false,

        processData: false,

   		beforeSend:function(){

   			$('#footerContentSubmitBtn').prop('disabled',true);

   			$('#footerContentSubmitBtn').html('Submit <i class="fa fa-spinner fa-spin fa-fw"></i>');

   		},

   		success:function(resp){

   			$('#footerContentSubmitBtn').prop('disabled',false);

            $('#footerContentSubmitBtn').html('Submit');

   			if(resp.status==1){

                $('#footer-msg').html(resp.msg);

   

   			} else {

   				$('#footer-msg').html(resp.msg);

   			}

   		}

   	});

   	return false;

   }

   

   function menuUpdate(){

   

   	$.ajax({

   		type:'POST',

   		url:site_url+'admin/update-menu',

   		data:$('#menuForm').serialize(),

   		dataType:'json',

   

   		beforeSend:function(){

   			$('#menuSubmitBtn').prop('disabled',true);

   			$('#menuSubmitBtn').html('Submit <i class="fa fa-spinner fa-spin fa-fw"></i>');

   		},

   		success:function(resp){

   			$('#menuSubmitBtn').prop('disabled',false);

            $('#menuSubmitBtn').html('Submit');

   			if(resp.status==1){

   	        $('#menu-msg').html(resp.msg);

   	

   	

   			} else {

   				$('#menu-msg').html(resp.msg);

   			}

   		}

   	});

   	return false;

   }



    function paymentDetailUpdate(){

   

   	$.ajax({

   		type:'POST',

   		url:site_url+'admin/update-payment-detail',

   		data:$('#paymentDetailUpdate').serialize(),

   		dataType:'json',

   

   		beforeSend:function(){

   			$('#paymentSubmitBtn').prop('disabled',true);

   			$('#paymentSubmitBtn').html('Submit <i class="fa fa-spinner fa-spin fa-fw"></i>');

   		},

   		success:function(resp){

   			$('#paymentSubmitBtn').prop('disabled',false);

            $('#paymentSubmitBtn').html('Submit');

   			if(resp.status==1){

   	        $('#payment-msg').html(resp.msg);

   	

   	

   			} else {

   				$('#payment-msg').html(resp.msg);

   			}

   		}

   	});

   	return false;

   }



   function socialMediaUpdate(){

   

   	$.ajax({

   		type:'POST',

   		url:site_url+'admin/update-social-media',

   		data:$('#socialMediaUpdate').serialize(),

   		dataType:'json',

   

   		beforeSend:function(){

   			$('#socialMediaSubmitBtn').prop('disabled',true);

   			$('#socialMediaSubmitBtn').html('Submit <i class="fa fa-spinner fa-spin fa-fw"></i>');

   		},

   		success:function(resp){

   			$('#socialMediaSubmitBtn').prop('disabled',false);

            $('#socialMediaSubmitBtn').html('Submit');

   			if(resp.status==1){

   	        $('#social-media-msg').html(resp.msg);

   	

   	

   			} else {

   				$('#social-media-msg').html(resp.msg);

   			}

   		}

   	});

   	return false;

   }



   function contactDetailsUpdate(){

   

   	$.ajax({

   		type:'POST',

   		url:site_url+'admin/update-contact-detail',

   		data:$('#contactDetailsUpdate').serialize(),

   		dataType:'json',

   

   		beforeSend:function(){

   			$('#contactDetailsSubmitBtn').prop('disabled',true);

   			$('#contactDetailsSubmitBtn').html('Submit <i class="fa fa-spinner fa-spin fa-fw"></i>');

   		},

   		success:function(resp){

   			$('#contactDetailsSubmitBtn').prop('disabled',false);

            $('#contactDetailsSubmitBtn').html('Submit');

   			if(resp.status==1){

   	        $('#contact-detail-msg').html(resp.msg);

   	

   	

   			} else {

   				$('#contact-detail-msg').html(resp.msg);

   			}

   		}

   	});

   	return false;

   }





   function topBannerUpdate(){

   var formData = new FormData($('#topBannerUpdate')[0]);

      $.ajax({

         type:'POST',

         url:site_url+'admin/update-top-banner',

         data:formData,

         dataType:'json',

        cache:false,

        contentType: false,

        processData: false,

         beforeSend:function(){

            $('#topBannerSubmitBtn').prop('disabled',true);

            $('#topBannerSubmitBtn').html('Submit <i class="fa fa-spinner fa-spin fa-fw"></i>');

         },

         success:function(resp){

            $('#topBannerSubmitBtn').prop('disabled',false);

            $('#topBannerSubmitBtn').html('Submit');

            if(resp.status==1){

                $('#top-banner-msg').html(resp.msg);

   

            } else {

               $('#top-banner-msg').html(resp.msg);

            }

         }

      });

      return false;

   }



   function loaderUpdate(){

   var formData = new FormData($('#loaderUpdate')[0]);

      $.ajax({

         type:'POST',

         url:site_url+'admin/update-loader',

         data:formData,

         dataType:'json',

        cache:false,

        contentType: false,

        processData: false,

         beforeSend:function(){

            $('#loaderSubmitBtn').prop('disabled',true);

            $('#loaderSubmitBtn').html('Submit <i class="fa fa-spinner fa-spin fa-fw"></i>');

         },

         success:function(resp){

            $('#loaderSubmitBtn').prop('disabled',false);

            $('#loaderSubmitBtn').html('Submit');

            if(resp.status==1){

                $('#loader-msg').html(resp.msg);

   

            } else {

               $('#loader-msg').html(resp.msg);

            }

         }

      });

      return false;

   }

</script>



