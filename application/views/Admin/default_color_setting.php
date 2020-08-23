<?php 
   include_once('include/header.php'); 
   $user_id = $this->session->userdata('user_id');
?>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>Default Color<small>Setting</small></h1>
      <ol class="breadcrumb">
         <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active"><a href="content_management.php">Default Color Setting</a></li>
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
                  <h3 class="box-title">Color Setting</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" method="post" id="updateColorSetting" onsubmit="return updateColorSetting();" enctype="multipart/form-data">
                  <div class="box-body">
                     <div id="color-setting-msg"></div>
                     <input type="hidden" name="id" value="<?=$default_color_content['id']; ?>">
                     
                     <div class="form-group">
                        <label class=" form-control-label">Primary color</label>

                        
                        <div id="color-picker-component" class="input-group colorpicker-component">
                        
                         <input type="text" name="primary_color" id="primary_color" value="<?=$default_color_content['primary_color']; ?>" class="form-control"/>
                         <span class="input-group-addon"><i></i></span>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class=" form-control-label">Top Header Text color</label>

                        
                        <div id="color-picker-component" class="input-group colorpicker-component">
                        
                         <input type="text" name="top_header" id="top_header" value="<?=$default_color_content['top_header']; ?>" class="form-control"/>
                         <span class="input-group-addon"><i></i></span>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class=" form-control-label">Top Header Background color</label>

                        
                        <div id="color-picker-component" class="input-group colorpicker-component">
                        
                         <input type="text" name="top_header_bg" id="top_header_bg" value="<?=$default_color_content['top_header_bg']; ?>" class="form-control"/>
                         <span class="input-group-addon"><i></i></span>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class=" form-control-label">Header Text color</label>

                       
                        <div id="color-picker-component" class="input-group colorpicker-component">
                        
                         <input type="text" name="header" id="header" value="<?=$default_color_content['header']; ?>" class="form-control"/>
                         <span class="input-group-addon"><i></i></span>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class=" form-control-label">Header Background color</label>

                        
                        <div id="color-picker-component" class="input-group colorpicker-component">
                        
                         <input type="text" name="header_bg" id="header_bg" value="<?=$default_color_content['header_bg']; ?>" class="form-control"/>
                         <span class="input-group-addon"><i></i></span>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class=" form-control-label">Footer Text color</label>

                     
                        <div id="color-picker-component" class="input-group colorpicker-component">
                        
                         <input type="text" name="footer" id="footer" value="<?=$default_color_content['footer']; ?>" class="form-control"/>
                         <span class="input-group-addon"><i></i></span>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class=" form-control-label">Footer Background color</label>

                       
                        <div id="color-picker-component" class="input-group colorpicker-component">
                        
                         <input type="text" name="footer_bg" id="footer_bg" value="<?=$default_color_content['footer_bg']; ?>" class="form-control"/>
                         <span class="input-group-addon"><i></i></span>
                        </div>

                     </div>
                     <div class="form-group">
                        <label class=" form-control-label">Bottom Footer Text color</label>

                        
                        <div id="color-picker-component" class="input-group colorpicker-component">
                        
                         <input type="text" name="bottom_footer" id="bottom_footer" value="<?=$default_color_content['bottom_footer']; ?>" class="form-control"/>
                         <span class="input-group-addon"><i></i></span>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class=" form-control-label">Bottom Footer Background color</label>

                        <div id="color-picker-component" class="input-group colorpicker-component">
                        
                         <input type="text" name="bottom_footer_bg" id="bottom_footer_bg" value="<?=$default_color_content['bottom_footer_bg']; ?>" class="form-control"/>
                         <span class="input-group-addon"><i></i></span>
                        </div>
                     </div>

                     
                     
                  </div>
                  <div class="box-footer">
                     <button type="submit" name="submit" id="colorSettingSubmitBtn" class="btn btn-success">Submit</button>
                  </div>
               </form>
            </div>
         </div>
        
         
      </div>
   </section>
   
</div>
<?php include_once('include/footer.php'); ?>
<link href="<?=base_url();?>assets/css/bootstrap-colorpicker.css" rel="stylesheet">
<script src="<?=base_url();?>assets/js/bootstrap-colorpicker.js"></script>
<script>
          $(function () {
              $('.colorpicker-component').colorpicker();
          });
      </script>
<script>
   function updateColorSetting(){
   
      $.ajax({
         type:'POST',
         url:site_url+'admin/update-color',
         data:$('#updateColorSetting').serialize(),
         dataType:'json',
   
         beforeSend:function(){
            $('#colorSettingSubmitBtn').prop('disabled',true);
            $('#colorSettingSubmitBtn').html('Submit <i class="fa fa-spinner fa-spin fa-fw"></i>');
         },
         success:function(resp){
            $('#colorSettingSubmitBtn').prop('disabled',false);
            $('#colorSettingSubmitBtn').html('Submit');
            if(resp.status==1){
              $('#color-setting-msg').html(resp.msg);
      
      
            } else {
               $('#color-setting-msg').html(resp.msg);
            }
         }
      });
      return false;
   }

   
   
   
</script>

