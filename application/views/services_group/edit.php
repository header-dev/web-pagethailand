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
            <li><a href="<?php echo base_url(); ?>servicesgroup"><i class="fa fa-dashboard"></i> Service Group</a></li>
            <li class="active">Form Service Group</li>
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
        <form id="frmServiceGroup" name="frmServiceGroup" method="POST" onsubmit="return checkSize(2097152)"
        action="<?php echo base_url(); ?>servicesgroup/updateServiceGroup" class="form-horizontal"
        role="form" enctype="multipart/form-data">
        <input type="hidden" name="service_group_id" value="<?php echo $data[0]['service_group_id']; ?>">
        <fieldset>
        <legend>
            <div class="widget-user-image">
                <img class="img-circle" src="<?php echo IMG; ?>icon/thai.png" alt="User Avatar">
                <b>Thai</b>
            </div>
        </legend>
        <div class="form-group">
            <label for="service_group"  class="col-lg-3 control-label">ชื่อกลุ่มบริการ : </label>
            <div class="col-lg-8">
            <input type="text" name="service_group[thai] value=''" value="<?php echo $data[0]['service_group']['thai']; ?>" id="service_group" required="true" class="form-control" placeholder="ชื่อกลุ่มบริการ"/>
            </div>
        </div>
        <div class="form-group">
            <label for="description"  class="col-lg-3 control-label">รายละเอียด : </label>
            <div class="col-lg-8">
            <textarea cols="70" required="true"  rows="5" name="description[thai]" id="description" class="form-control"><?php echo $data[0]['description']['thai']; ?></textarea>
            </div>
        </div>
        <legend>
        <div class="widget-user-image">
            <img class="img-circle" src="<?php echo IMG; ?>icon/eng.png" alt="User Avatar">
            <b>English</b>
        </div>
        </legend>
        <div class="form-group">
            <label for="service_group"  class="col-lg-3 control-label">Service Group Name : </label>
            <div class="col-lg-8">
            <input type="text" name="service_group[english] value=''" value="<?php echo $data[0]['service_group']['english']; ?>" id="service_group" required="true" class="form-control" placeholder="Service Group Name"/>
            </div>
        </div>
        <div class="form-group">
            <label for="description"  class="col-lg-3 control-label">Description : </label>
            <div class="col-lg-8">
            <textarea cols="70" required="true" rows="5" name="description[english]" id="description" class="form-control"><?php echo $data[0]['description']['english']; ?></textarea>
            </div>
        </div>
        <legend><b>Thumbnail Service Group</b></legend>
        <div class="form-group">
        <label for="thumbnail"  class="col-lg-3 control-label">Thumbnail : </label>
        <div class="col-lg-4">
            <div class="pre-img">
                <img src="<?php echo IMG; ?>services_group/thumbnail/<?php echo $data[0]['thumbnail']; ?>"  alt="" height="100" width="100">
            </div>
            <input type="file" name="thumbnail" accept=".jpg,.jpeg,.png" onchange="replaceImg('<?php echo $data[0]['thumbnail']; ?>');" class="form-control" id="thumbnail" >
        </div >
        </div>
        <legend></legend>
        <div class="form-group">
        <div class="col-lg-6 col-lg-offset-3">
            <button type="submit" class="btn btn-primary"><span class="fa fa-save"></span> Save</button>
            <a href="<?php echo base_url(); ?>servicesgroup"  class="btn btn-danger"><span class="fa fa-backward"></span> Back</a>
        </div>
    </div>
  </fieldset>
  </form>
</section>

</div>
<?php $this->load->view('temp/footer'); ?>
<script type="text/javascript">
    function replaceImg(img){
        if (confirm('Comfirm change and replace thumbnail ?')) {
            if (checkSize(2097152)) {
                $('.pre-img').hide('slow');
                return true;
            }else{
                document.getElementById('thumbnail').value= null;
                return false;
            }
        }else{
            document.getElementById('thumbnail').value= null;
            return false;
        }
    }

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