<?php 

   include_once('include/header.php'); 

   $user_id = $this->session->userdata('user_id');

   ?>

<div class="content-wrapper">

   <!-- Content Header (Page header) -->

   <section class="content-header">

      <h1>Home Page<small>Setting</small></h1>

      <ol class="breadcrumb">

         <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

         <li class="active"><a href="content_management.php">Home Page Setting</a></li>

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

                  <h3 class="box-title">All Banner Setting</h3>

               </div>

               <!-- /.box-header -->

               <!-- form start -->

               <form role="form" method="post" id="updateHomeBanner" onsubmit="return updateHomeBanner();" enctype="multipart/form-data">

                  <div class="box-body">

                     <div id="site-identity-msg"></div>

                     <input type="hidden" name="id" value="<?=$page_content['id']; ?>">
                     <h4 class="box-title">First Banner Setting</h4>

                     <div class="form-group">

                        <label class=" form-control-label">First Banner</label><br>
                        <input type="file" name="f_b" id="f_b"  class="form-control" onchange="preview_image(this,'f_b_image','')" accept="image/*">

                        <img  src="<?=site_url();?>/assets/img/default_image/<?=$page_content['f_b']; ?>" id="f_b_image" style="width: 100px;" >

                     </div>
                     <div class="form-group">

                        <label class=" form-control-label">First Banner Top Heading</label>

                        <input type="text" name="f_b_top_heading" id="f_b_top_heading" value="<?=$page_content['f_b_top_heading']; ?>" class="form-control">

                     </div>
                     <div class="form-group">

                        <label class=" form-control-label">First Banner Heading</label>

                        <input type="text" name="f_b_heading" id="f_b_heading" value="<?=$page_content['f_b_heading']; ?>" class="form-control">

                     </div>
                     <div class="form-group">

                        <label class=" form-control-label">First Banner Link</label>

                        <input type="text" name="f_b_link" id="f_b_link" value="<?=$page_content['f_b_link']; ?>" class="form-control">

                     </div>

                     <!--second-->
                      <h4 class="box-title">Second Banner Setting</h4>
                     <div class="form-group">

                        <label class=" form-control-label">Second Banner</label><br>
                        <input type="file" name="s_b" id="s_b"  class="form-control" onchange="preview_image(this,'s_b_image','')" accept="image/*">

                        <img  src="<?=site_url();?>/assets/img/default_image/<?=$page_content['s_b']; ?>" id="s_b_image" style="width: 100px;" >

                     </div>
                     <div class="form-group">

                        <label class=" form-control-label">Second Banner Top Heading</label>

                        <input type="text" name="s_b_top_heading" id="s_b_top_heading" value="<?=$page_content['s_b_top_heading']; ?>" class="form-control">

                     </div>
                     <div class="form-group">

                        <label class=" form-control-label">Second Banner Heading</label>

                        <input type="text" name="s_b_heading" id="s_b_heading" value="<?=$page_content['s_b_heading']; ?>" class="form-control">

                     </div>
                     <div class="form-group">

                        <label class=" form-control-label">Second Banner Link</label>

                        <input type="text" name="s_b_link" id="s_b_link" value="<?=$page_content['s_b_link']; ?>" class="form-control">

                     </div>

                     <!--second-->
                      <h4 class="box-title">Third Banner Setting</h4>
                     <div class="form-group">

                        <label class=" form-control-label">Third Banner</label><br>
                        <input type="file" name="t_b" id="t_b"  class="form-control" onchange="preview_image(this,'t_b_image','')" accept="image/*">

                        <img  src="<?=site_url();?>/assets/img/default_image/<?=$page_content['t_b']; ?>" id="t_b_image" style="width: 100px;" >

                     </div>
                     <div class="form-group">

                        <label class=" form-control-label">Third Banner Top Heading</label>

                        <input type="text" name="t_b_top_heading" id="t_b_top_heading" value="<?=$page_content['t_b_top_heading']; ?>" class="form-control">

                     </div>
                     <div class="form-group">

                        <label class=" form-control-label">Third Banner Heading</label>

                        <input type="text" name="t_b_heading" id="t_b_heading" value="<?=$page_content['t_b_heading']; ?>" class="form-control">

                     </div>
                     <div class="form-group">

                        <label class=" form-control-label">Third Banner Link</label>

                        <input type="text" name="t_b_link" id="t_b_link" value="<?=$page_content['t_b_link']; ?>" class="form-control">

                     </div>
                     <!--second-->
                      <h4 class="box-title">Fourth Banner Setting</h4>
                     <div class="form-group">

                        <label class=" form-control-label">Fourth Banner</label><br>
                        <input type="file" name="fi_b" id="fi_b"  class="form-control" onchange="preview_image(this,'fi_b_image','')" accept="image/*">

                        <img  src="<?=site_url();?>/assets/img/default_image/<?=$page_content['fi_b']; ?>" id="fi_b_image" style="width: 100px;" >

                     </div>
                     <div class="form-group">

                        <label class=" form-control-label">Fourth Banner Top Heading</label>

                        <input type="text" name="fi_b_top_heading" id="fi_b_top_heading" value="<?=$page_content['fi_b_top_heading']; ?>" class="form-control">

                     </div>
                     <div class="form-group">

                        <label class=" form-control-label">Fourth Banner Heading</label>

                        <input type="text" name="fi_b_heading" id="fi_b_heading" value="<?=$page_content['fi_b_heading']; ?>" class="form-control">

                     </div>
                     <div class="form-group">

                        <label class=" form-control-label">Fourth Banner Link</label>

                        <input type="text" name="fi_b_link" id="fi_b_link" value="<?=$page_content['fi_b_link']; ?>" class="form-control">

                     </div>

                     <!--second-->
                      <h4 class="box-title">Fifth Banner Setting</h4>
                     <div class="form-group">

                        <label class=" form-control-label">Fifth Banner</label><br>
                        <input type="file" name="fiv_b" id="fiv_b"  class="form-control" onchange="preview_image(this,'fiv_b_image','')" accept="image/*">

                        <img  src="<?=site_url();?>/assets/img/default_image/<?=$page_content['fiv_b']; ?>" id="fiv_b_image" style="width: 100px;" >

                     </div>
                     <div class="form-group">

                        <label class=" form-control-label">Fifth Banner Top Heading</label>

                        <input type="text" name="fiv_b_top_heading" id="fiv_b_top_heading" value="<?=$page_content['fiv_b_top_heading']; ?>" class="form-control">

                     </div>
                     <div class="form-group">

                        <label class=" form-control-label">Fifth Banner Heading</label>

                        <input type="text" name="fiv_b_heading" id="fiv_b_heading" value="<?=$page_content['fiv_b_heading']; ?>" class="form-control">

                     </div>
                     <div class="form-group">

                        <label class=" form-control-label">Fifth Banner Link</label>

                        <input type="text" name="fiv_b_link" id="fiv_b_link" value="<?=$page_content['fiv_b_link']; ?>" class="form-control">

                     </div>


                     <!--second-->
                      <h4 class="box-title">Sixth Banner Setting</h4>
                     <div class="form-group">

                        <label class=" form-control-label">Sixth Banner</label><br>
                        <input type="file" name="six_b" id="six_b"  class="form-control" onchange="preview_image(this,'six_b_image','')" accept="image/*">

                        <img  src="<?=site_url();?>/assets/img/default_image/<?=$page_content['six_b']; ?>" id="six_b_image" style="width: 100px;" >

                     </div>
                     <div class="form-group">

                        <label class=" form-control-label">Sixth Banner Top Heading</label>

                        <input type="text" name="six_b_top_heading" id="six_b_top_heading" value="<?=$page_content['six_b_top_heading']; ?>" class="form-control">

                     </div>
                     <div class="form-group">

                        <label class=" form-control-label">Sixth Banner Heading</label>

                        <input type="text" name="six_b_heading" id="six_b_heading" value="<?=$page_content['six_b_heading']; ?>" class="form-control">

                     </div>
                     <div class="form-group">

                        <label class=" form-control-label">Sixth Banner Link</label>

                        <input type="text" name="six_b_link" id="six_b_link" value="<?=$page_content['six_b_link']; ?>" class="form-control">

                     </div>


                     <!--second-->
                      <h4 class="box-title">Seventh Banner Setting</h4>
                     <div class="form-group">

                        <label class=" form-control-label">Seventh Banner</label><br>
                        <input type="file" name="sev_b" id="sev_b"  class="form-control" onchange="preview_image(this,'sev_b_image','')" accept="image/*">

                        <img  src="<?=site_url();?>/assets/img/default_image/<?=$page_content['sev_b']; ?>" id="sev_b_image" style="width: 100px;" >

                     </div>
                     <div class="form-group">

                        <label class=" form-control-label">Seventh Banner Top Heading</label>

                        <input type="text" name="sev_b_top_heading" id="sev_b_top_heading" value="<?=$page_content['sev_b_top_heading']; ?>" class="form-control">

                     </div>
                     <div class="form-group">

                        <label class=" form-control-label">Seventh Banner Heading</label>

                        <input type="text" name="sev_b_heading" id="sev_b_heading" value="<?=$page_content['sev_b_heading']; ?>" class="form-control">

                     </div>
                     <div class="form-group">

                        <label class=" form-control-label">Seventh Banner Link</label>

                        <input type="text" name="sev_b_link" id="sev_b_link" value="<?=$page_content['sev_b_link']; ?>" class="form-control">

                     </div>

                     <!--second-->
                      <h4 class="box-title">Eighth Banner Setting</h4>
                     <div class="form-group">

                        <label class=" form-control-label">Eighth Banner</label><br>
                        <input type="file" name="ei_b" id="ei_b"  class="form-control" onchange="preview_image(this,'ei_b_image','')" accept="image/*">

                        <img  src="<?=site_url();?>/assets/img/default_image/<?=$page_content['ei_b']; ?>" id="ei_b_image" style="width: 100px;" >

                     </div>
                     <div class="form-group">

                        <label class=" form-control-label">Eighth Banner Top Heading</label>

                        <input type="text" name="ei_b_top_heading" id="ei_b_top_heading" value="<?=$page_content['ei_b_top_heading']; ?>" class="form-control">

                     </div>
                     <div class="form-group">

                        <label class=" form-control-label">Eighth Banner Heading</label>

                        <input type="text" name="ei_b_heading" id="ei_b_heading" value="<?=$page_content['ei_b_heading']; ?>" class="form-control">

                     </div>
                     <div class="form-group">

                        <label class=" form-control-label">Eighth Banner Link</label>

                        <input type="text" name="ei_b_link" id="ei_b_link" value="<?=$page_content['ei_b_link']; ?>" class="form-control">

                     </div>


                     <!--second-->
                      <h4 class="box-title">Ninth Banner Setting</h4>
                     <div class="form-group">

                        <label class=" form-control-label">Ninth Banner</label><br>
                        <input type="file" name="ni_b" id="ni_b"  class="form-control" onchange="preview_image(this,'ni_b_image','')" accept="image/*">

                        <img  src="<?=site_url();?>/assets/img/default_image/<?=$page_content['ni_b']; ?>" id="ni_b_image" style="width: 100px;" >

                     </div>
                     <div class="form-group">

                        <label class=" form-control-label">Ninth Banner Top Heading</label>

                        <input type="text" name="ni_b_top_heading" id="ni_b_top_heading" value="<?=$page_content['ni_b_top_heading']; ?>" class="form-control">

                     </div>
                     <div class="form-group">

                        <label class=" form-control-label">Ninth Banner Heading</label>

                        <input type="text" name="ni_b_heading" id="ni_b_heading" value="<?=$page_content['ni_b_heading']; ?>" class="form-control">

                     </div>
                     <div class="form-group">

                        <label class=" form-control-label">Ninth Banner Link</label>

                        <input type="text" name="ni_b_link" id="ni_b_link" value="<?=$page_content['ni_b_link']; ?>" class="form-control">

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

                  <h3 class="box-title">All Heading Content</h3>

               </div>

               <form role="form" method="post" id="headingContentUpdate" onsubmit="return headingContentUpdate();" enctype="multipart/form-data">

                  <div class="box-body">

                     <div id="heading-msg"></div>
                     <input type="hidden" name="id" value="<?=$page_content['id']; ?>">
                     <h4 class="box-title">Trending Section Setting</h4>

                    
                     <div class="form-group">

                        <label class=" form-control-label">Top Heading</label>

                        <input type="text" name="t_s_top_heading" id="t_s_top_heading" value="<?=$page_content['t_s_top_heading']; ?>" class="form-control">

                     </div>
                     <div class="form-group">

                        <label class=" form-control-label">Main Heading</label>

                        <input type="text" name="t_s_heading" id="t_s_heading" value="<?=$page_content['t_s_heading']; ?>" class="form-control">

                     </div>

                     <h4 class="box-title">Special Section Setting</h4>

                    
                     <div class="form-group">

                        <label class=" form-control-label">Top Heading</label>

                        <input type="text" name="s_s_top_heading" id="s_s_top_heading" value="<?=$page_content['s_s_top_heading']; ?>" class="form-control">

                     </div>
                     <div class="form-group">

                        <label class=" form-control-label">Main Heading</label>

                        <input type="text" name="s_s_heading" id="s_s_heading" value="<?=$page_content['s_s_heading']; ?>" class="form-control">

                     </div>

                     <h4 class="box-title">Blog Section Setting</h4>

                    
                     <div class="form-group">

                        <label class=" form-control-label">Top Heading</label>

                        <input type="text" name="blog_s_top_heading" id="blog_s_top_heading" value="<?=$page_content['blog_s_top_heading']; ?>" class="form-control">

                     </div>
                     <div class="form-group">

                        <label class=" form-control-label">Main Heading</label>

                        <input type="text" name="blog_s_heading" id="blog_s_heading" value="<?=$page_content['blog_s_heading']; ?>" class="form-control">

                     </div>
                     

                     

                     

                  </div>

                  <div class="box-footer">

                     <button type="submit" name="submit" id="headerContentSubmitBtn" class="btn btn-success">Submit</button>

                  </div>

               </form>

            </div>

         </div>

         

      </div>

   </section>

  

</div>

<?php include_once('include/footer.php'); ?>

<script>

   function updateHomeBanner(){

   var formData = new FormData($('#updateHomeBanner')[0]);

   	$.ajax({

   		type:'POST',

   		url:site_url+'admin/banner-setting',

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



   function headingContentUpdate(){

   var formData = new FormData($('#headingContentUpdate')[0]);

   	$.ajax({

   		type:'POST',

   		url:site_url+'admin/heading-setting',

   		data:formData,

   		dataType:'json',

        cache:false,

        contentType: false,

        processData: false,

   		beforeSend:function(){

   			$('#headerContentSubmitBtn').prop('disabled',true);

   			$('#headerContentSubmitBtn').html('Submit <i class="fa fa-spinner fa-spin fa-fw"></i>');

   		},

   		success:function(resp){

   			$('#headerContentSubmitBtn').prop('disabled',false);

            $('#headerContentSubmitBtn').html('Submit');

   			if(resp.status==1){

                $('#heading-msg').html(resp.msg);

   

   			} else {

   				$('#heading-msg').html(resp.msg);

   			}

   		}

   	});

   	return false;

   }

</script>



