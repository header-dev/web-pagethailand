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
            <li><a href="<?php echo base_url(); ?>news"><i class="fa fa-dashboard"></i> Manage News</a></li>
            <li class="active">Add News</li>
          </ol>
        </section>
        <!-- Main content -->
      <section class="content">
        <div class="row">
        <form id="frmNews" action="<?php echo base_url(); ?>news/saveNews" onsubmit="return checkSize(2097152)" method="POST" enctype="multipart/form-data">
        <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Add News</h3>
                  <div class="box-tools pull-right">
                    <!-- <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
          <div class="box-body">
            <div class="form-group">
              <label for="" class="control-label col-lg-3">Topic (English) : </label>
              <div class="col-lg-6">
                <input type="text" required class="form-control" name="topic[english] value=''">
              </div>
            </div>
            <br>
            <br>
            <div class="form-group">
              <label for="" class="control-label col-lg-3">Topic (Chinese) : </label>
              <div class="col-lg-6">
                <input type="text" required class="form-control" name="topic[chinese] value=''">
              </div>
            </div>
            <br>
            <br>
            <div class="form-group">
              <label for="" class="control-label col-lg-3">Topic (Japanese) : </label>
              <div class="col-lg-6">
                <input type="text" required class="form-control" name="topic[japanese] value=''">
              </div>
            </div>
            <br>
            <br>
            <div class="form-group">
              <label for="" class="control-label col-lg-3">Sub-Topic (English) : </label>
              <div class="col-lg-6">
                <input type="text" required class="form-control" name="sub-topic[english] value=''">
              </div>
            </div>
            <br>
            <br>
            <div class="form-group">
              <label for="" class="control-label col-lg-3">Sub-Topic (Chinese) : </label>
              <div class="col-lg-6">
                <input type="text" required class="form-control" name="sub-topic[chinese] value=''">
              </div>
            </div>
            <br>
            <br>
            <div class="form-group">
              <label for="" class="control-label col-lg-3">Sub-Topic (Japanese) : </label>
              <div class="col-lg-6">
                <input type="text" required class="form-control" name="sub-topic[japanese] value=''">
              </div>
            </div>
            <br>
            <br>
            <div class="form-group">
              <label for="" class="control-label col-lg-3">Date : </label>
              <div class="col-lg-4">
                <input type="text" readonly class="form-control" name="news_date" id="news_date">
              </div>
            </div>
            <br><br>
          <div class="form-group">
          <label for="thumbnail"  class="col-lg-3 control-label">Thumbnail : </label>
          <div class="col-lg-4">
            <input type="file" required="true" name="thumbnail" accept=".jpg,.jpeg" class="form-control" id="thumbnail" >
          </div >
          </div>
          <br>
          <br>
          <div class="form-group">
          <label for="thumbnail"  class="col-lg-3 control-label"></label>
          <div class="col-lg-4">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
            <a href="<?php echo base_url(); ?>news" class="btn btn-warning">Cancel</a>
          </div >
          </div>
          </div><!-- /.box-body -->
        </div>
          </form>
        </div>
      </section>
</div>

<?php $this->load->view('temp/footer'); ?>
<script type="text/javascript" src="<?php echo JS; ?>jquery.form.js"></script>
<script src="//cdn.ckeditor.com/4.5.4/full/ckeditor.js"></script>
<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
    <!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="<?php echo LIB; ?>fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
<script type="text/javascript" src="<?php echo LIB; ?>fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="<?php echo LIB; ?>fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<script type="text/javascript" src="<?php echo LIB; ?>uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript">
  $(function() {
    $('#news_date').datepicker({
        dateFormat: "yy/mm/dd"
    });
  });
  function checkSize(max_img_size){
        var input = document.getElementById("thumbnail");
    // check for browser support (may need to be modified)
        if(input.files && input.files.length == 1)
        {
            if (input.files[0].size > max_img_size)
            {
            alert("The file must be less than " + (max_img_size/1024/1024) + "MB");
            return false;
            }
        }
        return true;
    }

</script>