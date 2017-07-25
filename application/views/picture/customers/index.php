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
      <li class="active">Manage Customers</li>
    </ol>
  </section>
  <section class="content">
    <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title">Picture Customers</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
      </div><!-- /.box-header -->
      <div class="box-body">
        <div class="col-md-12" align="center">
          <div id="upload">
          </div>
          <a href="#" class="btn btn-success" onclick="onupload();return false;" id="onupload"><span class="glyphicon glyphicon-upload"></span> Upload</a>
        </div>
      </div><!-- /.box-body -->
    </div>
    <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title">Show Customers</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
      </div><!-- /.box-header -->
      <div class="box-body">
        <div class="col-md-12" id="showslide" align="center">
          
        </div>
      </div><!-- /.box-body -->
    </div>
  </section>
</div><!-- /.content-wrapper -->
<?php $this->load->view('temp/footer'); ?>
<script src="<?php echo THEME; ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo THEME; ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo LIB; ?>uploadify/jquery.uploadify.min.js"></script>

<script type="text/javascript" src="<?php echo LIB; ?>fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
<script type="text/javascript" src="<?php echo LIB; ?>fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="<?php echo LIB; ?>fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<!-- Add Media helper (this is optional) -->
<script type="text/javascript" src="<?php echo LIB; ?>fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
<script type="text/javascript">
  $(document).ready(function() {
    gettablecustomers();
    upload();
    $(".preview").fancybox({
      helpers : {
        title : {
          type : 'over'
        }
      }
    });

  });

  function gettablecustomers(){
    $("#showslide").load('<?php echo base_url(); ?>picture/getdatacustomers');
  }

  function upload(){
    $("#upload").uploadify({
          auto:false,
          'fileTypeDesc' : 'Image Files',
          'fileTypeExts' : ' *.jpg; *.jpeg; *.png;',
          uploader:"<?php echo base_url(); ?>picture/savecustomers",
          swf:"<?php echo LIB; ?>uploadify/uploadify.swf",
          'onUploadComplete' : function(file) {
            gettablecustomers();
          }
      });
  }

  function removeCustomers(id){
    if (confirm('Confirm for remove customers!')) {
      $.ajax({
         url: '<?php echo base_url(); ?>picture/deletecustomers',
         type: 'POST',
         data: {id: id},
         success:function(data){
          if (data==='success') {
            gettablecustomers();
          }else if(data === 'fail'){
            alert('remove slide fail!');
          }
         }
      });
    }
  }

  function onupload(){
      $('#upload').uploadify('upload','*');
  }

</script>