<?php $this->load->view('temp/header'); ?>
<?php $this->load->view('temp/menu_top'); ?>
<?php $this->load->view('temp/menu_left'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url(); ?>newsgroup"><i class="fa fa-dashboard"></i> News Group</a></li>
      <li class="active">Show News Group</li>
    </ol>
  </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
      <div class="col-md-12">
        <div class="box box-solid">
          <div class="box-header with-border">
            <i class="fa fa-cubes"></i>
            <h3 class="box-title"><?php echo $data[0]['news_group'][$this->session->userdata("lang")]; ?></h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <dl class="dl-horizontal">
              <dt><?php echo label("label-description"); ?></dt>
              <dd><?php echo $data[0]['description'][$this->session->userdata("lang")]; ?></dd>
              <br>
              <dt><?php echo label("create-date"); ?></dt>
              <dd><span class="label label-success"><?php echo $data[0]['created_at'];?></span></dd>
              <br>
              <dt><?php echo label('label-thumbnail'); ?></dt>
              <dd>
              <a id="preview" href="<?php echo IMG; ?>news_group/thumbnail/<?php echo $data[0]['thumbnail']; ?>">
                <img src="<?php echo IMG; ?>news_group/thumbnail/<?php echo $data[0]['thumbnail']; ?>" class="img-responsive" alt="Image" height="300" width="300">
              </a>
              </dd>
            </dl>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- ./col -->
      </div>
    </section>
</div>
<?php $this->load->view('temp/footer'); ?>
<!-- Add mousewheel plugin (this is optional) -->
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