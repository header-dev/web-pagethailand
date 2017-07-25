<div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo label('about'); ?>
                    <small><?php echo label('company'); ?></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>"><?php echo label('home'); ?></a>
                    </li>
                    <li class="active"><?php echo label('about'); ?></li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Intro Content -->
        <div class="row">
            <div class="col-md-6">
            <a id="preview" href="<?php echo IMG; ?>about/thumbnail/<?php echo $abouts[0]['thumbnail']; ?>">
                <img src="<?php echo IMG; ?>about/thumbnail/<?php echo $abouts[0]['thumbnail']; ?>" class="img-responsive" alt="Image">
              </a>
                <!-- <img class="img-responsive" src="<?php echo IMG; ?>about/thumbnail/<?php echo $abouts[0]['thumbnail']; ?>" alt=""> -->
            </div>
            <div class="col-md-6">
                <h2><?php echo label('company'); ?></h2>
                <p><?php echo $abouts[0]['about'][$this->session->userdata('lang')]; ?></p>
            </div>
        </div>
        <!-- /.row -->

        <!-- Our Customers -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header"><?php echo label('our-customers'); ?></h2>
            </div>
            <?php if(!empty($customers)): ?>
            <?php foreach($customers as $customer): ?>
            <div class="col-md-2 col-sm-4 col-xs-6" style="margin:10px;">
                <img class="img-responsive customer-img" src="<?php echo IMG; ?>customers/<?php echo $customer['image']; ?>" alt="">
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <!-- /.row -->
        <?php $this->load->view('temp_front/display_footer',$contacts[0]); ?>
    </div>
<?php $this->load->view('temp_front/footer'); ?>
<script type="text/javascript" src="fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="<?php echo LIB; ?>fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
<script type="text/javascript" src="<?php echo LIB; ?>fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="<?php echo LIB; ?>fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

    <!-- Add Media helper (this is optional) -->
<script type="text/javascript" src="<?php echo LIB; ?>fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
<script type="text/javascript">
    $("#preview").fancybox({
      helpers : {
        title : {
          type : 'over'
        }
      }
    });
</script>