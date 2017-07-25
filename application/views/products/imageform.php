<?php $this->load->view('temp/header'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo LIB; ?>uploadify/uploadify.css">
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
      <li><a href="<?php echo base_url(); ?>products"><i class="fa fa-dashboard"></i>Manage Products</a></li>
      <li class="active">Picture Form</li>
    </ol>
  </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
      <div class="col-md-12">
        <div class="box box-solid">
          <div class="box-header with-border">
            <i class="fa fa-cubes"></i>
            <h3 class="box-title">Picture Form : <?php echo $products; ?></h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <form class="form-horizontal" role="form">
              <fieldset>
                <div class="form-group">
                  <label for="" class="col-lg-3"></label>
                  <div class="col-lg-4">
                    <div id="upload"></div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-8 col-lg-offset-3">
                    <button type="button" onclick="onupload();" class="btn btn-primary"><span class="fa fa-save"></span> Save</button>
                    <a href="<?php echo base_url(); ?>products" class="btn btn-danger"><span class="fa fa-backward"></span> Back</a>
                  </div>
                </div>
              </fieldset>
            </form>
            <hr>
            <div id="showimage">
              
            </div>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- ./col -->
      </div>
    </section>
</div>
<?php $this->load->view('temp/footer'); ?>
<script type="text/javascript" src="<?php echo LIB; ?>uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript">
  $(function() {
    getallpicture();
    $("#upload").uploadify({
          auto:false,
          'fileTypeDesc' : 'Image Files',
          'fileTypeExts' : ' *.jpg; *.jpeg; *.png',
          // 'fileSizeLimit' : '400KB',
          uploader:"<?php echo base_url(); ?>products/do_upload?product_id=<?php echo $product_id; ?>",
          swf:"<?php echo LIB; ?>uploadify/uploadify.swf",
          'onUploadComplete' : function(file) {
            getallpicture();
          }
    });
  });
  function onupload(){
      $('#upload').uploadify(
        'upload',
        '*'
      );
  }
  function getallpicture(){
    $('#showimage').load('<?php echo base_url(); ?>products/getpictureproduct?product_id=<?php echo $product_id; ?>');
  }

  function removeImage(id){
    $.ajax({
      url: '<?php echo base_url() ?>products/deleteimg',
      type: 'POST',
      data: {image_id: id},
      success:function(data){
          if(data=='success'){
            getallpicture();
          }else{
            alert('เกิดข้อผิดพลาดในการลบ !');
          }
      }
    });
  }
</script>