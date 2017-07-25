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
            <li class="active">Manage Product Group</li>
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
              <!-- AREA CHART -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php echo label('product-group'); ?></h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <a href="<?php echo base_url(); ?>productsgroup/addGroup" class="btn btn-success"><span class="fa fa-plus-circle"></span>  <?php echo label("button-add"); ?></a>
                  <hr>
                  <table id="tb_productgroup" class="table table-striped table-hover">
                  	<thead>
					<tr>
						<th><?php echo label("product-group"); ?></th>
            <th><?php echo label("label-description"); ?></th>
						<th><?php echo label("menu"); ?></th>
					</tr>
					</thead>
					<tbody>
					<?php if(count($data)!=0): ?>
					<?php foreach ($data as $r) :?>
						<tr>
							<td><?php echo $r['product_group'][$this->session->userdata("lang")]; ?></td>
              <td><?php echo $r['description'][$this->session->userdata("lang")]; ?></td>
							<td>
								<a href="<?php echo base_url(); ?>productsgroup/editGroup?product_group_id=<?php echo $r['product_group_id']; ?>" class="btn btn-warning"><span class="fa fa-edit"></span></a>
								<a href="<?php echo base_url(); ?>productsgroup/showGroup?product_group_id=<?php echo $r['product_group_id']; ?>" class="btn btn-info"><span class="fa fa-eye"></span></a>
								<a href="#" onclick="removeGroup(<?php echo $r['product_group_id']; ?>);return false;" class="btn btn-danger"><span class="fa fa-remove"></span></a>
							</td>
						</tr>
					<?php endforeach; ?>
					<?php endif; ?>
					</tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (LEFT) -->
          </div><!-- /.row -->
        </section>
</div><!-- /.content-wrapper -->
<?php $this->load->view('temp/footer'); ?>
<script src="<?php echo THEME; ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo THEME; ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$(function() {
		$("#tb_productgroup").DataTable();
	});
	function removeGroup(id){
		if (confirm('Confirm for remove product group!')) {
			window.location.href = "<?php echo base_url() ?>productsgroup/deleteGroup?product_group_id="+id;
		}
	}

</script>


