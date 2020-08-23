<?php 
   include_once('include/header.php'); 
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Product<small>Management</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Product</li>
    </ol>
  </section>
   
  <!-- Main content -->
  <section class="content">
   <?=$this->session->flashdata('msg'); ?>
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Product</h3>
            <div class="pull-right">
              
              <a  class="btn btn-info pull-right"  href="<?=site_url().'admin/add-product';?>">Add <i class="fa fa-plus"></i></a>
            </div>
          </div>
   
          <div class="box-body">
            <div class="table-responsive">
            <table class="table DataTable table-hover">
              <thead>
                <tr>
                  <th>S.NO.</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Reguler Price</th>
                  <th>Quantity</th>
                  <th>Category</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  if(!empty($products)){
                    foreach($products as $key => $value){
                ?>
                      <tr>
                        <td><?=$key + 1;?></td>
                        <td><?=$value['title'];?></td>
                        <td><?=html_entity_decode($value['description'], ENT_QUOTES);?></td>
                        <td><?=$value['price'];?></td>
                        <td><?=$value['reguler_price'];?></td>
                        <td><?=$value['quantity'];?></td>
                        <?php
                        $category = $this->common_model->GetColumnName('category',array('id'=>$value['category']),array('cat_name'));
                        

                        ?>
                        <td><?=$category['cat_name'];?></td>
                        <td><img class="image-in-table" height="50px" src="<?=site_url().'assets/img/product_image/'.$value['image'];?>" alt="<?=$value['title'];?>" ></td>
                        
                        <td>
                          <a class="btn btn-danger btn-xs"  href="<?=site_url().'admin/edit-product/'.$value['id']; ?>"><i class="fa fa-edit"></i></a>
                           <a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this product?')" href="<?=site_url().'Admin/Products/delete_product/'.$value['id']; ?>"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                      
                <?php
                    }
                  }else{
                ?>
                      <tr>
                        <td colspan="8" class="text-center">No Record Found! Click here to add one.</td>
                      </tr>
                <?php
                  }
                ?>
              </tbody>
            </table>
         </div>
          </div>
        </div>
      </div>
    </div>
      <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include_once('include/footer.php'); ?>


