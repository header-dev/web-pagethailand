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
            <li><a href="<?php echo base_url(); ?>productsgroup"><i class="fa fa-dashboard"></i> Product Group</a></li>
            <li class="active">Form Users</li>
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
        <form id="frmProductGroup" name="frmProductGroup" method="POST" onsubmit="return checkSize(2097152)"
        action="<?php echo base_url(); ?>users/saveusers" class="form-horizontal"
        role="form" enctype="multipart/form-data">
        <fieldset>
        <div class="form-group">
            <label for="name"  class="col-lg-3 control-label"><?php echo label("name"); ?> : </label>
            <div class="col-lg-6">
            <input type="text" name="name" id="name" value="" required="true" class="form-control" placeholder="<?php echo label("name"); ?>"/>
            </div>
        </div>
        <div class="form-group">
            <label for="description"  class="col-lg-3 control-label">User Name : </label>
            <div class="col-lg-6">
            <input type="text" name="username" id="username" required="true" class="form-control" placeholder="<?php echo label("username"); ?>"/>
            </div>
        </div>
        <div class="form-group">
            <label for="description"  class="col-lg-3 control-label">Password : </label>
            <div class="col-lg-6">
            <input type="password" name="password" id="password" required="true" class="form-control" placeholder="Password"/>
            </div>
        </div>
        <legend></legend>
        <div class="form-group">
      <div class="col-lg-6 col-lg-offset-3">
        <button type="submit" class="btn btn-primary"><span class="fa fa-save"></span> Save</button>
        <a href="<?php echo base_url(); ?>users"  class="btn btn-danger"><span class="fa fa-backward"></span> Back</a>
      </div>
    </div>
  </fieldset>
  </form>
</section>

</div>
<?php $this->load->view('temp/footer'); ?>


