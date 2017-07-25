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
            <li class="active">Manage Contact</li>
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
        <form id="frmProductGroup" name="frmProductGroup" method="POST" action="<?php echo base_url(); ?>information/savecontact" onsubmit="return checkSize(2097152);" class="form-horizontal"
        role="form" enctype="multipart/form-data">
        <fieldset>
        <input type="hidden" name="contact_id" value="<?php if(!empty($data[0]['contact_id'])){ echo $data[0]['contact_id']; } ?>">
        <div class="form-group">
            <label for="name"  class="col-lg-3 control-label">ชื่อบริษัท (ไทย) : </label>
            <div class="col-lg-8">
            <input type="text" name="company_name[thai] value=''" value="<?php if(!empty($data[0]['company_name']['thai'])){ echo $data[0]['company_name']['thai']; } ?>" id="company_name" required="true" class="form-control" placeholder="ชื่อบริษัท"/>
            </div>
        </div>
        <div class="form-group">
            <label for="name"  class="col-lg-3 control-label">ชื่อบริษัท (English) : </label>
            <div class="col-lg-8">
            <input type="text" name="company_name[english] value=''" id="company_name" required="true" class="form-control" value="<?php if(!empty($data[0]['company_name']['english'])){ echo $data[0]['company_name']['english']; } ?>" placeholder="Company Name"/>
            </div>
        </div>
        <div class="form-group">
            <label for="name"  class="col-lg-3 control-label">ที่อยู่ (ไทย) : </label>
            <div class="col-lg-8">
            <textarea cols="70" required="true"  rows="5" name="address[thai] value=''" id="address" class="form-control"><?php if(!empty($data[0]['address']['thai'])){ echo $data[0]['address']['thai']; } ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="name"  class="col-lg-3 control-label">ที่อยู่ (English) : </label>
            <div class="col-lg-8">
            <textarea cols="70" required="true"  rows="5" name="address[english] value=''" id="description" class="form-control"><?php if(!empty($data[0]['address']['english'])){ echo $data[0]['address']['english']; } ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="name"  class="col-lg-3 control-label">โทรศัพท์ : </label>
            <div class="col-lg-8">
            <input type="text" name="tel" id="tel" required="true" class="form-control" placeholder="โทรศัพท์" value="<?php if(!empty($data[0]['tel'])){ echo $data[0]['tel']; } ?>" />
            </div>
        </div>
        <div class="form-group">
            <label for="name"  class="col-lg-3 control-label">มือถือ : </label>
            <div class="col-lg-8">
            <input type="text" name="mobile" id="mobile" required="true" class="form-control" placeholder="มือถือ" value="<?php if(!empty($data[0]['mobile'])){ echo $data[0]['mobile']; } ?>" />
            </div>
        </div>
        <div class="form-group">
            <label for="name"  class="col-lg-3 control-label">สายด่วน (Hot line) : </label>
            <div class="col-lg-8">
            <input type="text" name="hot_line" id="hot_line" required="true" class="form-control" placeholder="สายด่วน (Hot line)" value="<?php if(!empty($data[0]['hot_line'])){ echo $data[0]['hot_line']; } ?>" />
            </div>
        </div>
        <div class="form-group">
            <label for="name"  class="col-lg-3 control-label">Fax : </label>
            <div class="col-lg-8">
            <input type="text" name="fax" id="fax" required="true" class="form-control" placeholder="Fax" value="<?php if(!empty($data[0]['fax'])){ echo $data[0]['fax']; } ?>" />
            </div>
        </div>
        <div class="form-group">
            <label for="name"  class="col-lg-3 control-label">Email Address : </label>
            <div class="col-lg-8">
            <input type="email" name="email" id="email" required="true" class="form-control" placeholder="Email Address" value="<?php if(!empty($data[0]['email'])){ echo $data[0]['email']; } ?>" />
            </div>
        </div>
        <div class="form-group">
            <label for="facebook"  class="col-lg-3 control-label"><i class="fa fa-facebook"></i> Facebook : </label>
            <div class="col-lg-8">
            <input type="url" name="facebook" id="facebook"  class="form-control" placeholder="Facebook" value="<?php if(!empty($data[0]['facebook'])){ echo $data[0]['facebook']; } ?>" />
            </div>
        </div>
        <div class="form-group">
            <label for="twitter"  class="col-lg-3 control-label"><i class="fa fa-twitter"></i> Twitter : </label>
            <div class="col-lg-8">
            <input type="url" name="twitter" id="twitter"  class="form-control" placeholder="Twitter" value="<?php if(!empty($data[0]['twitter'])){ echo $data[0]['twitter']; } ?>" />
            </div>
        </div>
        <div class="form-group">
            <label for="instagram"  class="col-lg-3 control-label"><i class="fa fa-instagram"></i> Instagram : </label>
            <div class="col-lg-8">
            <input type="url" name="instagram" id="instagram"  class="form-control" placeholder="Instagram" value="<?php if(!empty($data[0]['instagram'])){ echo $data[0]['instagram']; } ?>" />
            </div>
        </div>
        <div class="form-group">
            <label for="description"  class="col-lg-3 control-label">API MAP : </label>
            <div class="col-lg-8">
            <textarea cols="70" required="true"  rows="5" name="api_map" id="api_map" class="form-control"><?php if(!empty($data[0]['api_map'])){ echo $data[0]['api_map']; } ?></textarea>
            </div>
        </div>
        <div class="form-group">
        <label for="thumbnail"  class="col-lg-3 control-label">MAP Picture : </label>
        <?php if(!empty($data[0]['image_map'])): ?>
            <div class="col-lg-4">
            <div class="pre-img">
                <a id="preview" href="<?php echo IMG; ?>map/<?php echo $data[0]['image_map']; ?>">
                <img src="<?php echo IMG; ?>map/<?php echo $data[0]['image_map']; ?>" class="img-responsive" alt="Image" height="300" width="300">
                </a>
            </div>
            <input type="file" name="image_map" accept=".jpg,.jpeg" onchange="replaceImg('<?php echo $data[0]['image_map']; ?>');" class="form-control" id="image_map" >
            </div>
        <?php else : ?>
            <div class="col-lg-4">
            <input type="file" required="true" name="image_map" accept=".jpg,.jpeg" class="form-control" id="image_map">
            </div >
        <?php endif; ?>
        </div>
        <legend></legend>
        <div class="form-group">
      <div class="col-lg-6 col-lg-offset-3">
        <button type="submit" class="btn btn-primary"><span class="fa fa-save"></span> Save</button>
      </div>
    </div>
  </fieldset>
  </form>
</section>
</div>
<?php $this->load->view('temp/footer'); ?>
<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
    <!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="<?php echo LIB; ?>fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
<script type="text/javascript" src="<?php echo LIB; ?>fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="<?php echo LIB; ?>fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

    <!-- Add Media helper (this is optional) -->
<script type="text/javascript" src="<?php echo LIB; ?>fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
<script type="text/javascript">
    function checkSize(max_img_size){
        var input = document.getElementById("image_map");
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
    function replaceImg(img){
        if (confirm('Comfirm change and replace image map ?')) {
            if (checkSize(2097152)) {
                $('.pre-img').hide('slow');
                return true;
            }else{
                document.getElementById('image_map').value= null;
                return false;
            }
        }else{
            document.getElementById('image_map').value= null;
            return false;
        }
    }
    $("#preview").fancybox({
      helpers : {
        title : {
          type : 'over'
        }
      }
    });
</script>


