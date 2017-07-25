<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo IMG; ?>icon/user-ok.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('name') . ' ' . $this->session->userdata('surname'); ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Product</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="<?php echo base_url(); ?>package"><i class="fa fa-circle-o"></i>All Package</a></li>
              <li><a href="<?php echo base_url(); ?>package/add"><i class="fa fa-circle-o"></i>Add New Package</a></li>
              <li><a href="<?php echo base_url(); ?>program"><i class="fa fa-circle-o"></i>Program</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Reference</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="<?php echo base_url(); ?>packageinc"><i class="fa fa-circle-o"></i>Package Include</a></li>
              <li><a href="<?php echo base_url(); ?>packageinc/add"><i class="fa fa-circle-o"></i>Add New Package Include</a></li>
              <li><a href="<?php echo base_url(); ?>institution"><i class="fa fa-circle-o"></i>Institution</a></li>
              <li><a href="<?php echo base_url(); ?>institution/add"><i class="fa fa-circle-o"></i>Add New Institution</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Products / Service</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <!-- <li><a href="<?php echo base_url(); ?>productsgroup"><i class="fa fa-circle-o"></i>Product Group</a></li> -->
                <li><a href="<?php echo base_url(); ?>products"><i class="fa fa-circle-o"></i>Products</a></li>
                <!-- <li><a href="<?php echo base_url(); ?>servicesgroup"><i class="fa fa-circle-o"></i> Service Group</a></li> -->
                <li><a href="<?php echo base_url(); ?>services"><i class="fa fa-circle-o"></i> Service</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-file-image-o"></i>
                <span>Picture</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>picture/getslide"><i class="fa fa-circle-o"></i> Slide Picture</a></li>
                <li><a href="<?php echo base_url(); ?>picture/customers"><i class="fa fa-circle-o"></i> Customers Picture</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>News</span>
                <span class="label label-primary pull-right"></span><i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <!-- <li><a href="<?php echo base_url(); ?>newsgroup"><i class="fa fa-circle-o"></i> News Group</a></li> -->
                <li><a href="<?php echo base_url(); ?>news"><i class="fa fa-circle-o"></i> News</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-paperclip"></i>
                <span>Career</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>jobs"><i class="fa fa-circle-o"></i> Create Career</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Web Information</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>information/about"><i class="fa fa-circle-o"></i> About</a></li>
                <li><a href="<?php echo base_url(); ?>information/contact"><i class="fa fa-circle-o"></i> Contact</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i>
                <span>Users</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>users"><i class="fa fa-circle-o"></i>Users Management</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-gear"></i> <span>Configuration</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="<?php echo base_url(); ?>configure/language"><i class="fa fa-circle-o"></i>Language</a></li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>