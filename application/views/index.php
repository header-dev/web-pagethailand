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
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

        </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<!-- <div class="splash" style="position: absolute; width: 100%; height: 100%; background-image:url(<?php echo IMG; ?>load/loading.GIF); background-repeat: repeat;">&nbsp;</div> -->
    <!-- All the things -->
<?php $this->load->view('temp/footer'); ?>
<script type="text/javascript">
	$(document).ready(function() {
    $('.splash').fadeTo(3000,0, function() {
        $(this).remove();
    });
});
</script>