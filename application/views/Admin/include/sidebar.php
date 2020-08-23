<aside class="main-sidebar">
	<section class="sidebar" style="height: auto;">
		<!-- Sidebar user panel -->
		<div class="user-panel" style="height: 63px;">
			<div class="text-center info">
				<p class="admin_name"><?=ucfirst($userdata['fname']).' '.ucfirst($userdata['lname']); ?><br><br> admin</p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MAIN NAVIGATION</li>
			<li class="active">
				<a href="<?=site_url().'Admin/home';?>">
					<i class="fa fa-dashboard"></i> <span>Dashboard</span>
				</a>
			</li>
			<li class="	">
				<a href="<?php echo site_url().'admin/blog-management';?>">
					<i class="fa fa-newspaper-o"></i> <span>Blog management</span>
				</a>
			</li>

			<li class="	">
				<a href="<?=site_url().'admin/users-management';?>">
					<i class="fa fa-user"></i> <span>Users management</span>
				</a>
		    </li>
			
			

			<li class="	">
				<a href="<?=site_url().'admin/category-management';?>">
					<i class="fa fa-tag"></i> <span>Category management</span>
				</a>
			</li>

			<li class="	">
				<a href="<?php echo site_url().'admin/subcategory-management';?>">
					<i class="fa fa-list-alt"></i> <span>Subcategory management</span>
				</a>
			</li>

			<li class="	">
				<a href="<?=site_url().'admin/coupon-management';?>">
					<i class="fa fa-gift"></i> <span>Coupon management</span>
				</a>
			</li>
			
		  <li class="treeview">
            <a href="#">
              <i class="fa fa-cart-arrow-down"></i><span> Products management</span>
              <span class="pull-right-container">
                <i class="fa fa-medkit-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
			  <li><a href="<?=site_url().'Admin/options';?>"><i class="fa fa-circle-o"></i> Options</a></li>
              <li><a href="<?=site_url().'admin/all-products';?>"><i class="fa fa-list-alt"></i>All Product</a></li>
              <li><a href="<?=site_url().'admin/add-product';?>"><i class="fa fa-product-hunt"></i>Add Product</a></li>
            </ul>
          </li>

          
          	
		  <li class="treeview">
            <a href="#">
              <i class="fa fa-cog"></i><span>All Setting</span>
              <span class="pull-right-container">
                <i class="fa fa-medkit-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?=site_url().'admin/default-setting';?>"><i class="fa fa-sun-o"></i>Defualt Setting</a></li>
              <li><a href="<?=site_url().'admin/default-color-setting';?>"><i class="fa fa-paint-brush"></i>Defualt Colors Setting</a></li>
              
             
          
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-adjust"></i><span>All Pages Setting</span>
              <span class="pull-right-container">
                <i class="fa fa-medkit-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?=site_url().'admin/home-setting';?>"><i class="fa fa-circle-o"></i>Home Page</a></li>
              <li><a href="<?=site_url().'admin/slider-setting';?>"><i class="fa fa-circle-o"></i>Slider Setting</a></li>
              
             
          
            </ul>
          </li>
			
			
          
			
		</ul>
	</section>
</aside>
