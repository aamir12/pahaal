<?php include_once('include/header.php'); ?> 
<div class="content-wrapper">
	<section class="content-header">
		<h1>Dashboard<small>Control panel</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Dashboard</li>
		</ol>
   </section>
   
   <!-- Main content -->
  <!--  <section class="content">
		<?php
		echo $this->session->flashdata('msg');
		?>
		
		<div class="row">
			<?php
			if($category!=""){
				?>
				<div class="col-lg-3 col-xs-6">
				
				<div class="small-box bg-green">
					<div class="inner">
						<h3><?=count($category)?></h3>
						<p>Category</p>
					</div>
					<div class="icon">
						<i class="ion ion-ios-pricetag"></i>
					</div>
						<a href="<?php echo site_url().'category-management';?>"  class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
			</div>
				<?php
			}

			if($subcategory!=""){
				?>
				<div class="col-lg-3 col-xs-6">
				
				<div class="small-box bg-red">
					<div class="inner">
						<h3><?=count($subcategory)?></h3>
						<p>Subcategory</p>
					</div>
					<div class="icon">
						<i class="ion ion-ios-pricetags-outline"></i>
					</div>
						<a href="<?php echo site_url().'subcategory-management';?>"  class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
			 </div>
				<?php
			}

			if($plan!=""){
				?>
				<div class="col-lg-3 col-xs-6">
				
				<div class="small-box bg-blue">
					<div class="inner">
						<h3><?=count($plan)?></h3>
						<p>Plan</p>
					</div>
					<div class="icon">
						<i class="ion ion-link"></i>
					</div>
						<a href="<?php echo site_url().'plan-management';?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
			</div>
				<?php
			}

			if($customer!=""){
				?>
				<div class="col-lg-3 col-xs-6">
			
				<div class="small-box bg-blue">
					<div class="inner">
						<h3><?=count($customer)?></h3>
						<p>Customer</p>
					</div>
					<div class="icon">
						<i class="ion ion-person-stalker"></i>
					</div>
					<a href="<?php echo site_url().'customer-management';?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
				<?php
			}

			if($tradesman!=""){
				?>
				<div class="col-lg-3 col-xs-6">
				
				<div class="small-box bg-red">
					<div class="inner">
						<h3><?=count($tradesman)?></h3>
						<p>Tradesman</p>
					</div>
					<div class="icon">
						<i class="ion ion-ios-people"></i>
					</div>
					<a href="<?php echo site_url().'tradesman-management';?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
				<?php
			}


			?>
			
			
			
			
			
			
		</div>
			
	</section> -->
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include_once('include/footer.php'); ?>