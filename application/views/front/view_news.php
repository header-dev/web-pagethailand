<!-- Page Content -->
<div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-success"><?php echo $news[0]['topic'][$this->session->userdata('lang')]; ?>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>"><?php echo label('home'); ?></a>
                    </li>
                    <li class="active"><?php echo $news[0]['topic'][$this->session->userdata('lang')]; ?></li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <?php echo $news[0]['content'][$this->session->userdata('lang')]; ?>
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
