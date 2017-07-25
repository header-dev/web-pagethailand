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
            <li><a href="<?php echo base_url(); ?>news"><i class="fa fa-dashboard"></i> Manage News</a></li>
            <li class="active">Add News</li>
          </ol>
        </section>
        <!-- Main content -->
      <section class="content">
        <div class="row">
        <form id="frmContent" action="<?php echo base_url(); ?>news/saveNews" method="POST">
        <input type="hidden" id="con1" name="content[english] value=''">
        <input type="hidden" id="con2" name="content[chinese] value=''">
        <input type="hidden" id="con3" name="content[japanese] value=''">
        <input type="hidden" name="news_id" id="news_id" value="<?php echo $data[0]['news_id']; ?>">
        <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">News Content</h3>
              <div class="box-tools pull-right">
                    <!-- <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
              </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
          <div class="box-body">
            <button class="btn btn-warning" type="button" id="list"><i class="fa fa-file-photo-o"></i> List / Upload Picture</button>
          </div><!-- /.box-body -->
        </div>
          <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">News (English)</h3>
                  <div class="box-tools pull-right">
                    <!-- <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                  <textarea id="editor1" required  rows="10" cols="80">
                  <?php echo $data[0]['content']['english']; ?>
                  </textarea>
                </div><!-- /.box-body -->
          </div>
          <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">News (Chinese)</h3>
                  <div class="box-tools pull-right">
                    <!-- <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                  <textarea id="editor2" required  rows="10" cols="80">
                  <?php echo $data[0]['content']['chinese']; ?>
                  </textarea>
                </div><!-- /.box-body -->
          </div>
          <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">News (Japanese)</h3>
                  <div class="box-tools pull-right">
                    <!-- <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                  <textarea id="editor3" required  rows="10" cols="80">
                  <?php echo $data[0]['content']['japanese']; ?>
                  </textarea>
                </div><!-- /.box-body -->
          </div>
          <div class="box box-warning">
                <div class="box-header with-border">
                  <div class="box-tools pull-right">
                    <!-- <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body" align="center">
                  <button type="button" onclick="saveContent();" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                  <a href="<?php echo base_url(); ?>news" class="btn btn-warning">Cancel</a>
                </div><!-- /.box-body -->
          </div>
          </form>
        </div>
      </section>
     <!--  <div class="modal fade " id="modal-list-picture">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">List Picture</h4>
            </div>
            <div class="modal-body" >
            <div class="col-lg-12" align="center">
            <div id="upload_other">
            </div>
            <a href="#" class="btn btn-success" onclick="onupload();return false;" id="onupload"><span class="glyphicon glyphicon-upload"></span> Upload</a>
            </div>
              <div id="list-picture">
                
              </div>
            </div>
          </div>
        </div>
      </div> -->

<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="modal-list-picture" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body" id="list-picture">
        
      </div>
    </div>
  </div>
</div>
</div>

<?php $this->load->view('temp/footer'); ?>
<script type="text/javascript" src="<?php echo JS; ?>jquery.form.js"></script>
<script src="//cdn.ckeditor.com/4.5.4/full/ckeditor.js"></script>
<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
    <!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="<?php echo LIB; ?>fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
<script type="text/javascript" src="<?php echo LIB; ?>fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="<?php echo LIB; ?>fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<script type="text/javascript" src="<?php echo LIB; ?>uploadify/jquery.uploadify.min.js"></script>


<script type="text/javascript">
  $(function() {
    $('#news_date').datepicker({
        dateFormat: "yy/mm/dd"
    });


    $("#list").click(function(event) {
      $("#modal-list-picture").modal('show');
      // listPicture();
      $("#list-picture").load('<?php echo base_url(); ?>picture/getallimage');
    });


    CKEDITOR.replace('editor1');
    CKEDITOR.replace('editor2');
    CKEDITOR.replace('editor3');
  });

  function copyLink(item){
    Copied = item.createTextRange();
    Copied.execCommand("Copy");
  }
  function saveContent(){

    $("#con1").val(CKEDITOR.instances['editor1'].getData());
    $("#con2").val(CKEDITOR.instances['editor2'].getData());
    $("#con3").val(CKEDITOR.instances['editor3'].getData());

    $.ajax({
      url: '<?php echo base_url(); ?>news/savecontent',
      type: 'POST',
      data: $("#frmContent").serialize(),
      success:function(data){
        if (data === 'success') {
          location.reload();
        }else{
          alert('Save fail!');
        }
      }
    })
    .done(function() {
      console.log("success");
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

  }

  function listPicture(){

    $.ajax({
        url: '<?php echo base_url(); ?>news/getlistpicture',
        type: 'GET',
        success:function(data){
          $("#list-picture").html(data);
          $("#upload_other").uploadify({
            auto:false,
            'fileTypeDesc' : 'Image Files',
            'fileTypeExts' : ' *.jpg; *.jpeg',
            uploader:"<?php echo base_url(); ?>picture/saveother",
            swf:"<?php echo LIB; ?>uploadify/uploadify.swf",
            'onQueueComplete' : function(uploads) {
              listPicture();
            }
          });
        }
      });
  }

  function showRequest(formData, jqForm, options) {
    var value1 = CKEDITOR.instances['editor1'].getData();
    var value2 = CKEDITOR.instances['editor2'].getData();
    var value3 = CKEDITOR.instances['editor3'].getData();
    $('#content1').val(value1);
    $('#content2').val(value2);
    $('#content3').val(value3);
    // $('#editor1').append(value1);
    // $('#editor2').append(value2);
    return true;
  }


  function onupload(){
      $('#upload_other').uploadify('upload','*');
  }

  function genData(){
    var value1 = CKEDITOR.instances['editor1'].getData();
    var value2 = CKEDITOR.instances['editor2'].getData();
    var value3 = CKEDITOR.instances['editor3'].getData();
    $("#editor1").val(value1);
    $("#editor2").val(value2);
    $("#editor3").val(value3);
  }
</script>