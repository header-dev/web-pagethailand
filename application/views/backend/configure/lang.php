<?php $this->load->view('temp/header');?>
<?php $this->load->view('temp/menu_top');?>
<?php $this->load->view('temp/menu_left');?>
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
        <?php if ($this->session->flashdata('error')): ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $this->session->flashdata('error'); ?>
            </div>
            </div>
        </div>
        <?php endif;?>
        <?php if ($this->session->flashdata('message')): ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $this->session->flashdata('message'); ?>
            </div>
            </div>
        </div>
        <?php endif;?>
            <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">Language</div>
                    <div class="panel-body">
                        <form action="<?php echo base_url(); ?>configure/savelang" method="POST" class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label for="" class="control-label col-sm-2">Enable Langauge</label>
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <?php $i = 0;?>
                                        <?php foreach ($lang as $l): ?>
                                        <a href="<?php echo base_url(); ?>configure/enablelang?language_id=<?php echo $l['language_id']; ?>&enable=<?php echo $l['enable']; ?>" class="btn btn-default btn-lg <?php if($l['enable']=='on'){echo 'active';} ?>" role="button"><?php echo $l['name']; ?></a>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-4">
                                        <select name="default" id="default" class="form-control" required="required">
                                        <?php foreach ($lang as $l): ?>
                                            <option value="<?php echo $l['language_id']; ?>" <?php if ($l["set_default"] == 1) {echo "selected";}?>><?php echo $l['name']; ?></option>
                                        <?php endforeach;?>
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-10 col-sm-offset-2">
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.col (LEFT) -->
          </div><!-- /.row -->
        </section>
</div><!-- /.content-wrapper -->
<?php $this->load->view('temp/footer');?>
