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
				<a href="package/add" class="btn btn-success">Add New Package</a>
                <hr>
                <table id="tb_package" class="table table-striped table-hover">
                    <thead>
                        <th>Package ID </th>
                        <th>Name</th>
                        <th>Language</th>
                        <th>Package Date</th>
                        <th>Menu</th>
                    </thead>
                    <tbody>
                    <?php foreach ($package as $p) : ?>
                        <tr>
                            <td><?php echo $p['package_id']; ?></td>
                            <td><?php echo $p['name']; ?></td>
                            <td><?php echo $p['lang']; ?></td>
                            <td><?php echo $p['createdat']; ?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>package/edit?package_id=<?php echo $p['package_id']; ?>" class="btn btn-warning">Edit</a>
                                <a href="<?php echo base_url(); ?>package/remove?package_id=<?php echo $p['package_id']; ?>" onclick="return confirmation(); false;" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div><!-- /.col (LEFT) -->
          </div><!-- /.row -->
        </section>
</div><!-- /.content-wrapper -->
<?php $this->load->view('temp/footer'); ?>
<script src="<?php echo THEME; ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo THEME; ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$(function() {
		$("#tb_package").DataTable();
	});
    function confirmation(){
        if (confirm('Are you sure you wish to remove this record ?')) {
             return true;
        }else{
            return false;
        }
    }
</script>