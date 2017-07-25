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
            <li><a href="<?php echo base_url(); ?>services"><i class="fa fa-dashboard"></i> Manage Service</a></li>
            <li class="active">Form Service</li>
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
        <form id="frmService" name="frmService" method="POST" onsubmit="return checkSize(2097152)"
        action="<?php echo base_url(); ?>services/saveService" class="form-horizontal"
        role="form" enctype="multipart/form-data">
        <fieldset>
       <!--  <div class="form-group">
            <label for="name"  class="col-lg-3 control-label">กลุ่มบริการ (Service Group) : </label>
            <div class="col-lg-4">
            <select class="form-control select2" required="true" name="service_group_id" style="width: 100%;">
                <?php if(count($data)!=0): ?>
                    <?php foreach ($data as $r) :?>
                        <option value="<?php echo $r['service_group_id']; ?>"><?php echo $r['service_group'][$this->session->userdata("lang")]; ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
        </div> -->
        <legend></legend>
        <legend>
            <div class="widget-user-image">
                <img class="img-circle" src="<?php echo IMG; ?>icon/thai.png" alt="User Avatar">
                <b>Thai</b>
            </div>
        </legend>

        <div class="form-group">
            <label for="name"  class="col-lg-3 control-label">ชื่อ บริการ : </label>
            <div class="col-lg-8">
            <input type="text" name="service[thai] value=''" id="service" required="true" class="form-control" placeholder="ชื่อ บริการ"/>
            </div>
        </div>
        <div class="form-group">
            <label for="description"  class="col-lg-3 control-label">รายละเอียด : </label>
            <div class="col-lg-8">
            <textarea cols="70" required="true"  rows="5" name="service_detail[thai]" id="service_detail" class="form-control"></textarea>
            </div>
        </div>
    <legend>
        <div class="widget-user-image">
            <img class="img-circle" src="<?php echo IMG; ?>icon/eng.png" alt="User Avatar">
            <b>English</b>
        </div>
    </legend>
        <div class="form-group">
            <label for="name"  class="col-lg-3 control-label">Service Name : </label>
            <div class="col-lg-8">
            <input type="text" name="service[english] value=''" id="service" required="true" class="form-control" placeholder="Service Name"/>
            </div>
        </div>
        <div class="form-group">
            <label for="description"  class="col-lg-3 control-label">Detail : </label>
            <div class="col-lg-8">
            <textarea cols="70" required="true" rows="5" name="service_detail[english]" id="service_detail" class="form-control"></textarea>
            </div>
        </div>
        <legend><span class="fa fa-file-picture-o"></span><b>  Thumbnail Product</b></legend>
        <div class="form-group">
        <label for="thumbnail"  class="col-lg-3 control-label">Thumbnail : </label>
        <div class="col-lg-4">
            <input type="file" required="true" name="thumbnail" accept=".jpg,.jpeg ,.png" class="form-control" id="thumbnail" >
        </div >
        </div>
        <legend></legend>
        <div class="form-group">
        <div class="col-lg-6 col-lg-offset-3">
        <button type="submit" class="btn btn-primary"><span class="fa fa-save"></span> Save</button>
        <a href="<?php echo base_url(); ?>services"  class="btn btn-danger"><span class="fa fa-backward"></span> Back</a>
        </div>
    </div>
  </fieldset>
  </form>
        </section>

</div>
<?php $this->load->view('temp/footer'); ?>
<script src="<?php echo THEME; ?>plugins/select2/select2.full.min.js"></script>
<script type="text/javascript">
    $(function() {
        $(".select2").select2();
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


