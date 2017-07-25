<!-- Page Content -->
<div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $services[0]['service'][$this->session->userdata('lang')]; ?>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>"><?php echo label('home'); ?></a>
                    </li>
                    <li class="active"><?php echo $services[0]['service'][$this->session->userdata('lang')]; ?></li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-8">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <?php for ($i=0; $i < count($imgs) ; $i++): ?>
                            <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>" class="<?php if($i==0){echo "active";} ?>"></li>
                        <?php endfor; ?>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <?php if(!empty($imgs)): ?>
                            <?php for ($i=0; $i < count($imgs) ; $i++):  ?>
                                <div class="item <?php if($i==0){echo "active";} ?>">
                                    <img class="img-responsive" src="<?php echo IMG ?>service/<?php echo $imgs[$i]['image']; ?>" width="100%" alt="">
                                </div>
                            <?php endfor; ?>
                        <?php endif; ?>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <h3><?php echo label('service-detail'); ?></h3>
                <p><?php echo $services[0]['service_detail'][$this->session->userdata('lang')]; ?></p>
            </div>

        </div>
        <!-- /.row -->

        <!-- Related Projects Row -->
        <div class="row">

            <div class="col-lg-12">
                <h3 class="page-header"><?php echo label('picture-service'); ?></h3>
            </div>
            <?php if(!empty($imgs)): ?>
                <?php for ($i=0; $i < count($imgs) ; $i++):  ?>
            <div class="col-sm-3 col-xs-6 picture-service">
                <a id="preview" href="<?php echo IMG ?>service/<?php echo $imgs[$i]['image']; ?>">
                    <img src="<?php echo IMG ?>service/<?php echo $imgs[$i]['image']; ?>" width="500%" height="300px" class="img-responsive img-hover img-related" alt="Image">
                </a>
            </div>
                <?php endfor; ?>
            <?php endif; ?>
        </div>
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
