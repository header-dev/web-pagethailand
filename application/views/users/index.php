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
            <li class="active">Users Management</li>
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
                  <h3 class="box-title"><?php echo label('users'); ?></h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <a href="<?php echo base_url(); ?>users/addusers" class="btn btn-success"><span class="fa fa-plus-circle"></span>  <?php echo label("button-add"); ?></a>
                  <hr>
                  <table id="tb_productgroup" class="table table-striped table-hover">
                  	<thead>
					<tr>
						<th><?php echo label("name"); ?></th>
            <th><?php echo label("username"); ?></th>
            <th><?php echo label("create-date"); ?></th>
						<th><?php echo label("menu"); ?></th>
					</tr>
					</thead>
					<tbody>
					<?php if(count($data)!=0): ?>
					<?php foreach ($data as $r) :?>
						<tr>
							<td>
                <?php echo $r['name']; ?>
                <?php if($r['member_id']==$this->session->userdata('member_id')): ?>
                    <span class="label label-warning">current user</span>
                <?php endif; ?>
              </td>
              <td><?php echo $r['username']; ?></td>
              <td><?php echo $r['created_at']; ?></td>
							<td>
								<a href="<?php echo base_url(); ?>users/editusers?member_id=<?php echo $r['member_id']; ?>" class="btn btn-warning"><span class="fa fa-edit"></span></a>
							     <?php if($r['member_id']!=$this->session->userdata('member_id')): ?>
                <a href="#" onclick="removeUsers(<?php echo $r['member_id']; ?>);return false;" class="btn btn-danger"><span class="fa fa-remove"></span></a>
                  <?php endif; ?>
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
	function removeUsers(id){
		if (confirm('Confirm for remove user!')) {
			window.location.href = "<?php echo base_url() ?>users/deleteusers?member_id="+id;
		}
	}

</script>