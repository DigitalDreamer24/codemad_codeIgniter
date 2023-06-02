<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="javascript:void(0);" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!-- <li class="nav-item has-treeview">
            <a href="<?=base_url();?>admin/dashboard" class="nav-link <?= isset($menu) ? $menu : "" ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li> -->
          <!-- Banner -->
          <li class="nav-item has-treeview <?= isset($bannerMo) ? $bannerMo : "" ?>">
            <a href="#" class="nav-link <?= isset($bannerActive) ? $bannerActive : "" ?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Banner
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url();?>admin/dashboard/add_banner" class="nav-link <?= isset($addbannerActive) ? $addbannerActive : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Banner</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url();?>admin/dashboard/list_banner" class="nav-link <?= isset($listbannerActive) ? $listbannerActive : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Banner</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- About Us -->
          <li class="nav-item has-treeview">
            <a href="<?=base_url();?>admin/dashboard/about_us" class="nav-link <?= isset($aboutMo) ? $aboutMo : "" ?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                About Us
              </p>
            </a>
          </li>
          
          <!-- Category -->
          <li class="nav-item has-treeview <?= isset($catMo) ? $catMo : "" ?>">
            <a href="#" class="nav-link <?= isset($catActive) ? $catActive : "" ?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Category
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url();?>admin/dashboard/add_category" class="nav-link <?= isset($addcatActive) ? $addcatActive : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url();?>admin/dashboard/list_category" class="nav-link <?= isset($listcatActive) ? $listcatActive : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Category</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Subcategory -->
          <!-- <li class="nav-item has-treeview <?= isset($subcatMo) ? $subcatMo : "" ?>">
            <a href="#" class="nav-link <?= isset($subcatActive) ? $subcatActive : "" ?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                SubCategory
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url();?>admin/dashboard/add_subcategory" class="nav-link <?= isset($addsubcatActive) ? $addsubcatActive : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add SubCategory</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url();?>admin/dashboard/list_subcategory" class="nav-link <?= isset($listsubcatActive) ? $listsubcatActive : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List SubCategory</p>
                </a>
              </li>
            </ul>
          </li> -->

          

          <!-- Product -->
          <li class="nav-item has-treeview <?= isset($productMo) ? $productMo : "" ?>">
            <a href="#" class="nav-link <?= isset($productActive) ? $productActive : "" ?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Product
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url();?>admin/dashboard/add_product" class="nav-link <?= isset($addproductActive) ? $addproductActive : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url();?>admin/dashboard/list_product" class="nav-link <?= isset($productListActive) ? $productListActive : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Product</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Testimonials -->
          <li class="nav-item has-treeview <?= isset($testimonialMo) ? $testimonialMo : "" ?>">
            <a href="#" class="nav-link <?= isset($testimonialActive) ? $testimonialActive : "" ?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Testimonials
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url();?>admin/dashboard/add_testimonial" class="nav-link <?= isset($addtestimonialActive) ? $addtestimonialActive : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Testimonials</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url();?>admin/dashboard/list_testimonial" class="nav-link <?= isset($listtestimonialActive) ? $listtestimonialActive : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Testimonials</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Team -->
          <li class="nav-item has-treeview <?= isset($teamMo) ? $teamMo : "" ?>">
            <a href="#" class="nav-link <?= isset($teamActive) ? $teamActive : "" ?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Team
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                <a href="<?=base_url();?>admin/dashboard/add_team" class="nav-link <?= isset($addteamActive) ? $addteamActive : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Team</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="<?=base_url();?>admin/dashboard/list_team" class="nav-link <?= isset($listteamActive) ? $listteamActive : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Team</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Division -->
          <li class="nav-item has-treeview <?= isset($divisionMo) ? $divisionMo : "" ?>">
            <a href="#" class="nav-link <?= isset($divisionActive) ? $divisionActive : "" ?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Our Division
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url();?>admin/dashboard/add_division" class="nav-link <?= isset($adddivisionActive) ? $adddivisionActive : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Division</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url();?>admin/dashboard/list_division" class="nav-link <?= isset($listdivisionActive) ? $listdivisionActive : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Division</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Blog -->
          <li class="nav-item has-treeview <?= isset($blogMo) ? $blogMo : "" ?>">
            <a href="#" class="nav-link <?= isset($blogActive) ? $blogActive : "" ?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Blog
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url();?>admin/dashboard/add_blog" class="nav-link <?= isset($addblogActive) ? $addblogActive : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Blog</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url();?>admin/dashboard/list_blog" class="nav-link <?= isset($listblogActive) ? $listblogActive : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Blog</p>
                </a>
              </li>
            </ul>
          </li>


          


          <!-- Settings -->
          <li class="nav-item has-treeview">
            <a href="<?=base_url();?>admin/dashboard/settings" class="nav-link <?= isset($settingsMo) ? $settingsMo : "" ?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Settings
              </p>
            </a>
          </li>

          <!-- Settings -->
          <li class="nav-item has-treeview">
            <a href="<?=base_url();?>admin/dashboard/seo_tags" class="nav-link <?= isset($seoTags) ? $seoTags : "" ?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                SEO Tags
              </p>
            </a>
          </li>


          <!-- <li class="nav-item has-treeview">
            <a href="<?=base_url();?>admin/dashboard/add_category" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Category
              </p>
            </a>
          </li> -->
          
        
         
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
