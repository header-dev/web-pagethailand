<header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>administrator" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>B</b>ES</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Back End</b>  System</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo IMG; ?>icon/user-ok.png" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $this->session->userdata('name').' '.$this->session->userdata('surname'); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo IMG; ?>icon/user-ok.png" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $this->session->userdata('name').' '.$this->session->userdata('surname'); ?>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <a href="<?php echo base_url(); ?>authen/logout" class="btn btn-default btn-flat">Sign out</a>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <!-- <li>
                <a href="<?php echo base_url(); ?>administrator/change/thai">
                  <div class="widget-user-image">
                    <img class="img-circle" src="<?php echo IMG; ?>icon/thai.png" alt="User Avatar">
                  </div>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url(); ?>administrator/change/english">
                  <div class="widget-user-image">
                    <img class="img-circle" src="<?php echo IMG; ?>icon/eng.png" alt="User Avatar">
                  </div>
                </a>
              </li> -->
            </ul>
          </div>
  </nav>
</header>