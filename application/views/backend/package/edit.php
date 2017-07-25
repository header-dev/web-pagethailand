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
            <li class="active">Manage Product</li>
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
            <div class="row">
            <div class="col-md-12">
    <form id="frmPackage" name="frmPackage" method="POST"
        action="<?php echo base_url(); ?>package/update" class="form-horizontal"
        role="form">
        <fieldset>
        <legend>Edit Package</legend>
        <input type="hidden" name="package_id" id="package_id" value="<?php echo $package[0]['package_id']; ?>">
        <div class="form-group">
            <label for="lang"  class="col-lg-3 control-label">Language : </label>
            <div class="col-lg-4">
                <select name="lang" id="lang" class="form-control" required="required">
                    <option value="" selected>Please Select</option>
                    <?php foreach ($lang as $l) : ?>
                        <option value="<?php echo strtolower($l['name']); ?>" <?php if(strtolower($package[0]['lang'])==strtolower($l['name'])){ echo "selected"; } ?>><?php echo $l["name"]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="program_id"  class="col-lg-3 control-label">Program : </label>
            <div class="col-lg-4">
                <select name="program_id" id="program_id" class="form-control" required="required">
                    <option value="" selected>Please Select</option>
                    <?php foreach ($program as $p) : ?>
                        <option value="<?php echo $p['program_id']; ?>" <?php if($package[0]['program_id']==$p['program_id']){ echo "selected"; } ?>><?php echo $p["name"]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="name"  class="col-lg-3 control-label">Province : </label>
            <div class="col-lg-4">
                <select name="province_id" id="province_id" class="form-control" required="required">
                    <option value="" selected>Please Select</option>
                    <?php foreach ($province as $p) : ?>
                        <option value="<?php echo $p['province_id']; ?>" <?php if($package[0]['province_id']==$p['province_id']){ echo "selected"; } ?>><?php echo $p["name"]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="name"  class="col-lg-3 control-label">Name : </label>
            <div class="col-lg-8">
                <input type="text" name="name" id="name" value="<?php echo $package[0]['name']; ?>" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label for="description"  class="col-lg-3 control-label">Description : </label>
            <div class="col-lg-8">
            <textarea cols="70" required="true"  rows="5" name="description" id="description" class="form-control"><?php echo $package[0]['description']; ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="detail"  class="col-lg-3 control-label">Detail : </label>
            <div class="col-lg-8">
            <textarea cols="70" required="true"  rows="5" name="detail" id="detail" class="form-control"><?php echo $package[0]['detail']; ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="period_detail"  class="col-lg-3 control-label">Period Detail: </label>
            <div class="col-lg-8">
            <textarea cols="70" required="true"  rows="5" name="period_detail" id="period_detail" class="form-control"><?php echo $package[0]['period_detail']; ?></textarea>
            </div>
        </div>
        <div class="form-group">
        <label for="thumbnail"  class="col-lg-3 control-label">Thumbnail : </label>
        <div class="col-lg-6">
            <input type="text" name="thumbnail" class="form-control img-clouddrive" id="thumbnail" value="<?php echo $package[0]['thumbnail']; ?>">
            <div class="img-clouddrive-view">
                <img src="<?php echo $package[0]['thumbnail']; ?>" width = "500" height="450" class="img-responsive" alt="Responsive image">
            </div>
        </div>
        </div>
        <div class="form-group">
            <label for="remark"  class="col-lg-3 control-label">Remark : </label>
            <div class="col-lg-8">
            <textarea cols="70" required="true"  rows="5" name="remark" id="remark" class="form-control"><?php echo $package[0]['remark']; ?></textarea>
            </div>
        </div>
        <legend></legend>
        <div class="form-group">
      <div class="col-lg-6 col-lg-offset-3">
        <button type="submit" class="btn btn-primary"><span class="fa fa-save"></span> Update Package</button>
        <a href="<?php echo base_url(); ?>package"  class="btn btn-danger"><span class="fa fa-backward"></span> Cancel</a>
      </div>
    </div>
  </fieldset>
  </form>
            </div><!-- /.col (LEFT) -->
          </div><!-- /.row -->
        </section>
</div><!-- /.content-wrapper -->
<?php $this->load->view('temp/footer'); ?>
<script src="<?php echo JS; ?>package.js"></script>
<script src="<?php echo JS; ?>image-clouddrive.js"></script>