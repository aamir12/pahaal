<?php
   include_once('include/header.php'); 

?>

<div class="breadcrumb-section">
  <div class="container">
    <div class="row">
      

      <div class="col-sm-6">
        <div class="page-title">

          
          
          
          <h2 >
            <?=$blog_detail['title']?>
          </h2>
          

        </div>
      </div>
      <div class="col-sm-6">
        <nav aria-label="breadcrumb" class="theme-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=site_url();?>" >Home</a></li>

            
            
            <li class="breadcrumb-item active " >
               <?=$blog_detail['title']?>
            </li>
            

          </ol>
        </nav>
      </div>

            
    </div>
  </div>
</div>

<!-- breadcrumb End -->


<div id="shopify-section-article-template" class="shopify-section"><!--section start-->


<section class="blog-detail-page section-b-space ">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 blog-detail">
                
         
        
          <img src="<?=site_url();?>/assets/img/blog_image/<?=$blog_detail['blog_image']; ?>" 
               data-src="<?=site_url();?>/assets/img/blog_image/<?=$blog_detail['blog_image']; ?>" 
               data-widths="[157, 270, 303, 370, 377, 670, 570, 720, 900, 1080, 1296, 1512, 1728, 2048]" 
               data-aspectratio="1.55" 
               data-sizes="auto" 
               class="lazyload  img-fluid " alt="<?=$blog_detail['title']?>" >
        
        
        
        
        <h3 >
          <?=$blog_detail['title']?>
        </h3>
        

        <ul class="post-social">
          
          <li><?=date("F d, Y", strtotime($blog_detail['cdate'])); ?></li>
          
          
          <li>Posted By : <?php

            $admin_blog= $this->common_model->GetSingleData('admin',array('id'=>$blog_detail['added_by']));
            echo $admin_blog['fname'].' '.$admin_blog['lname'];
            ?>
          </li>
          
          
          <!-- <li><i class="fa fa-comments"></i> 0comments</li> -->
          
        </ul>
        <?=html_entity_decode($blog_detail['content'], ENT_QUOTES)?>
<!-- <div class="row">
<div class="col-lg-6"><img src="https://cdn.shopify.com/s/files/1/0036/3380/7478/files/2_50b1e3ee-7be8-4307-b00d-a94ff90e87d7.jpg?12501063308311862537" class="img-fluid" alt="These are the 5 best phones you can buy right now"></div>
<div class="col-lg-6"><img src="https://cdn.shopify.com/s/files/1/0036/3380/7478/files/1_9e5e3aed-f37a-476e-bb41-2c0fd25f3a72.jpg?12501063308311862537" class="img-fluid" alt="These are the 5 best phones you can buy right now"></div>
</div> -->
      </div>
    </div>
    <div class="row section-b-space blog-advance">
      <div class="col-sm-12">
        
      </div>
    </div>
    
    <!-- <div class="row blog-contact">
      <div class="col-sm-12">
        <h2 >Leave a comment</h2>
        <form method="post" action="/blogs/news/odio-sed-luctus-etiam-sit-amet-elit-massa/comments#comment_form" id="comment_form" accept-charset="UTF-8" class="theme-form"><input type="hidden" name="form_type" value="new_comment" /><input type="hidden" name="utf8" value="✓" />
        <div class="form-row">
          <div class="col-md-12">
            <label for="name" >Name</label>
            <input type="text" placeholder="Enter Your name" name="comment[author]" id="CommentAuthor" class="form-control " value="">
          </div>
          <div class="col-md-12">
            <label for="email" >Email</label>
            <input type="email" placeholder="Email" name="comment[email]" id="CommentEmail" class="form-control" value="" autocorrect="off" autocapitalize="off">
          </div>
          <div class="col-md-12">
            <label for="exampleFormControlTextarea1" >Message</label>
            <textarea name="comment[body]" id="CommentBody" placeholder="Write Your Comment" rows="6" class="form-control "></textarea>
          </div>
          <div class="col-md-12">
            <button class="btn btn-solid" type="submit" >Post comment</button>
          </div>
        </div>
        </form>
      </div>
    </div> -->
  </div>
</section>
<!--Section ends-->






</div>

            
<?php
   include_once('include/footer.php'); 
?>