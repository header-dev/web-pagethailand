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
            <li class="active">Form News Group</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
        <?php if ($this->session->flashdata('error')) : ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $this->session->flashdata('error');?>
            </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if($this->session->flashdata('message')): ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $this->session->flashdata('message');?>
            </div>
            </div>
        </div>
        <?php endif; ?>
        <form id="frmNewsGroup" name="frmNewsGroup" method="POST" onsubmit="return checkSize(2097152)"
        action="<?php echo base_url(); ?>newsgroup/saveNewsGroup" class="form-horizontal"
        role="form" enctype="multipart/form-data">
        <fieldset>
        <div class="form-group">
            <label for="name"  class="col-lg-3 control-label">Group Name (English) : </label>
            <div class="col-lg-8">
            <input type="text" name="news_group[english] value=''" id="name" required="true" class="form-control" placeholder="News Group"/>
            </div>
        </div>
        <div class="form-group">
            <label for="description"  class="col-lg-3 control-label">Description (English) : </label>
            <div class="col-lg-8">
            <textarea cols="70" required="true" rows="5" name="description[english]" id="description" class="form-control"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="name"  class="col-lg-3 control-label">Group Name (Chinese) : </label>
            <div class="col-lg-8">
            <input type="text" name="news_group[chinese] value=''" id="name" required="true" class="form-control" placeholder="News Group"/>
            </div>
        </div>
        <div class="form-group">
            <label for="description"  class="col-lg-3 control-label">Description (Chinese) : </label>
            <div class="col-lg-8">
            <textarea cols="70" required="true" rows="5" name="description[chinese]" id="description" class="form-control"></textarea>
            </div>
        </div>
        <legend><b>Thumbnail News Group</b></legend>
        <div class="form-group">
        <label for="thumbnail"  class="col-lg-3 control-label">Thumbnail : </label>
        <div class="col-lg-4">
            <input type="file" required="true" name="thumbnail" accept=".jpg,.jpeg" class="form-control" id="thumbnail" >
        </div >
        </div>
        <legend></legend>
        <div class="form-group">
      <div class="col-lg-6 col-lg-offset-3">
        <button type="submit" class="btn btn-primary"><span class="fa fa-save"></span> Save</button>
        <a href="<?php echo base_url(); ?>newsgroup"  class="btn btn-danger"><span class="fa fa-backward"></span> Back</a>
      </div>
    </div>
  </fieldset>
  </form>
        </section>

</div>
<?php $this->load->view('temp/footer'); ?>
<script type="text/javascript">
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


