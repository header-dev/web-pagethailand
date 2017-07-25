<header class="masthead">
  <div class="container">
  <div class="row">
    <div class="col-sm-12" align="center">
      <a href="<?php echo base_url(); ?>"><img src="<?php echo IMG; ?>logo/logo.png" width="200" class="img-responsive" ></a>
        <h2><?php echo label("company"); ?></h2>
        <h4><?php echo label('hot-line'); ?> : <?php echo $contacts[0]['hot_line']; ?></h4>
    </div>
  </div>
  </div>
</header>
<!-- Begin Navbar -->
<div id="nav">
  <div class="navbar navbar-inverse navbar-static">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
          <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
      <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li>
            <a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i>  <?php echo label("home"); ?></a>
          </li>
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cubes"></i>  <?php echo label('product-service') ?> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li align="center" class="text-success"><i class="fa fa-cubes"></i> <?php echo label('product') ?></li>
            <?php if(!empty($products)): ?>
            <?php foreach($products as $product): ?>
                <li><a href="<?php echo base_url(); ?>front/viewproduct?product_id=<?php echo $product['product_id']; ?>"><?php echo $product['product_name'][$this->session->userdata('lang')] ?></a></li>
            <?php endforeach; ?>
            <?php endif; ?>
            <li align="center" class="text-success"><i class="fa fa-briefcase"></i> <?php echo label('service') ?></li>
            <?php if(!empty($services)): ?>
            <?php foreach($services as $service): ?>
                <li><a href="<?php echo base_url(); ?>front/viewservice?service_id=<?php echo $service['service_id']; ?>"><?php echo $service['service'][$this->session->userdata('lang')] ?></a></li>
            <?php endforeach; ?>
            <?php endif; ?>
          </ul>
          </li>
          <li>
              <a href="<?php echo base_url(); ?>front/about_us"><i class="fa fa-sitemap"></i>  <?php echo label("about"); ?></a>
          </li>
          <li>
              <a href="<?php echo base_url(); ?>front/contact_us"><i class="fa fa-phone"></i> <?php echo label('contact-us'); ?></a>
          </li>
          <li>
              <a href="<?php echo base_url(); ?>front/career"><i class="fa fa-group"></i> <?php echo label('career'); ?></a>
          </li>
        </ul>
        <ul class="nav pull-right navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo label("language"); ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="<?php echo base_url(); ?>front/change/english">
                    <div class="widget-user-image">
                        <img class="img-circle" src="<?php echo IMG; ?>icon/eng.png" alt="User Avatar">
                          English (EN)
                    </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>front/change/thai">
                    <div class="widget-user-image">
                        <img class="img-circle" src="<?php echo IMG; ?>icon/thai.png" alt="User Avatar">
                          Thailand (TH)
                    </div>
                    </a>
                </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div><!-- /.navbar -->
</div>