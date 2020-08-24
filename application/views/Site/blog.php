<?php
   include_once('include/header.php'); 
   
?>


<div class="breadcrumb-section">
  <div class="container">
    <div class="row">
      

      <div class="col-sm-6">
        <div class="page-title">

          
          
          
          <h2 >
            Blog
          </h2>
          

        </div>
      </div>
      <div class="col-sm-6">
        <nav aria-label="breadcrumb" class="theme-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=site_url();?>" >Home</a></li>

            
            
            <li class="breadcrumb-item active " >
              Blog
            </li>
            

          </ol>
        </nav>
      </div>

            
    </div>
  </div>
</div>

<div id="shopify-section-1581942173709" class="shopify-section">
   <!-- blog section -->
   <section class="blog section-b-space blog_miuuus
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
               <div class="slick_carousel" data-slick='{"slidesToShow": 1,"slidesToScroll": 1, "autoplay": true, "autoplaySpeed": 6000, "infinite": true, "arrows": true,"dots": false, "responsive":[{"breakpoint": 1367,"settings":{"slidesToShow": 1 }},{"breakpoint": 1024,"settings":{"slidesToShow": 1 }},{"breakpoint": 768,"settings":{"slidesToShow": 1 }},{"breakpoint": 480,"settings":{"slidesToShow": 1 }} ]}'>
                  <?php
                  if(count($blogs_limited) > 0){
                  foreach($blogs_limited as $key => $blog_limited){
                     ?>
                     <div class="col-md-12">
                     <div class="outer-blog">
                        <div class="classic-effect">
                           <figure class="m-0">
                              <img src="<?=site_url();?>/assets/img/blog_image/<?=$blog_limited['blog_image']; ?>" 
                                 data-widths="[157, 270, 303, 370, 377, 670, 570, 720, 900, 1080, 1296, 1512, 1728, 2048]" 
                                 data-aspectratio="1.55" 
                                 data-sizes="auto" 
                                 class="lazyload  img-fluid  w-100" alt="<?=$blog_limited['title']?>" >
                              <div class="ovrly"></div>
                              <div class="buttons search">
                                 <a href="<?=site_url();?>blog_detail/<?=$blog_limited['id']?>" class="fa fa-search search-botton"></a>
                              </div>
                              <div class="inner-option">
                                 <h4><time datetime="2020-03-24T13:03:00Z"><?=date("d", strtotime($blog_limited['cdate'])); ?></time></h4>
                                 <h5><time datetime="2020-03-24T13:03:00Z"><?=date("F", strtotime($blog_limited['cdate'])); ?></time></h5>
                              </div>
                           </figure>
                        </div>
                        <div class="blog-details">
                           <a href="<?=site_url();?>blog_detail/<?=$blog_limited['id']?>">
                              <p >
                                 <?=$blog_limited['title']?>
                              </p>
                           </a>
                           <div class="dattet">
                           	<p>
                           	<?=html_entity_decode($blog_limited['content'], ENT_QUOTES)?>
                           </p>
                           </div>
                           <h6>
                              Posted By:
                              <?php

                              $admin= $this->common_model->GetSingleData('admin',array('id'=>$blog_limited['added_by']));
                              echo $admin['fname'].' '.$admin['lname'];
                              ?>
                              
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
                        
                        No Blog Found
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
<div id="shopify-section-blog-template" class="shopify-section"><!-- section start -->





<section class="section-b-space  blog-page">
  <div class="container">

    <div class="row">
      
      <!--Blog sidebar start-->
      
      <!--Blog sidebar end-->
      
      <!--Blog List start-->
      <div class="col-xl-12 col-lg-12 col-md-12 ">
        <?php
                  if(count($blogs) > 0){
                  foreach($blogs as  $blog){
                     ?>

                     <div class="row blog-media">
  <div class="col-xl-6">
    <div class="blog-left">
      <a href="<?=site_url();?>blog_detail/<?=$blog['id']?>">
                
        
        
        
          <img src="<?=site_url();?>/assets/img/blog_image/<?=$blog['blog_image']; ?>" 
               data-widths="[157, 270, 303, 370, 377, 670, 570, 720, 900, 1080, 1296, 1512, 1728, 2048]" 
               data-aspectratio="1.55" 
               data-sizes="auto" 
               class="lazyload  img-fluid  w-100" alt="<?=$blog['title']?>" >
        
        
      </a>
    </div>
  </div>
  <div class="col-xl-6">
    <div class="blog-right">
      <div>
        <h6><?=date("F d, Y", strtotime($blog['cdate'])); ?></h6>
        <a href="<?=site_url();?>blog_detail/<?=$blog['id']?>">
          
          
          <h4 >
            <?=$blog['title']?>
          </h4>
          
        </a>
        <ul class="post-social">
          
          <li>Posted By : 
            <?php

            $admin_blog= $this->common_model->GetSingleData('admin',array('id'=>$blog['added_by']));
            echo $admin_blog['fname'].' '.$admin_blog['lname'];
            ?>
          </li>
          
          
          
          
        </ul>
        <p>
          <p><?=html_entity_decode($blog['content'], ENT_QUOTES)?>
        </p>
      </div>
    </div>
  </div>
</div>

                     
                     <?php
                   }
                 }
    ?>
        
        
        
       
        
       
                

        <div class="pagination-class">
				<?= $this->pagination->create_links() ?>
        <!-- <ul class="pagination">
          <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
          <li class="page-item"><a class="page-link paginate_btn_cls" href="/blogs/news?page=2">2</a></li>
          <li class="page-item"><a class="page-link paginate_btn_cls" href="/blogs/news?page=3">3</a></li>
          <li class="page-item">
            <a class="page-link paginate_btn_cls" href="/blogs/news?page=2" aria-label="Next">
              <span aria-hidden="true"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
            </a>
          </li>
          
        </ul> -->



        </div>
        
      </div>
      <!--Blog List end-->

      <!--Blog sidebar start-->
      
      <!--Blog sidebar end-->
      
    </div>
  </div>
</section>

<!-- Section ends -->






</div>

<?php
   include_once('include/footer.php'); 
?>
