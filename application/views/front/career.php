<!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo label('career'); ?>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>"><?php echo label('home'); ?></a>
                    </li>
                    <li class="active"><?php echo label('career'); ?></li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12" align="center">
                <h3><?php echo label('company'); ?></h3>
                <p class="text-warning">เปิดรับสมัครงานพนักงานจำนวนมาก
เพื่อขยายกิจการและสาขาต่างๆ ของบริษัท</p>
                <p class="text-info">
                    <?php echo $contacts[0]['address'][$this->session->userdata('lang')]; ?>
                    <br>Email : <?php echo $contacts[0]['email']; ?>
                    <br>Tel : <?php echo $contacts[0]['tel']; ?>
                    <br>Mobile : <?php echo $contacts[0]['mobile']; ?>
                    <br>Fax : <?php echo $contacts[0]['fax']; ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
            <?php if(!empty($careers)): ?>
                <?php foreach($careers as $career): ?>
                <div class="panel panel-info">
                      <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-clipboard"></i>  <?php echo $career['position'][$this->session->userdata('lang')]; ?></h3>
                      </div>
                      <div class="panel-body">
                            <ul>
                            <?php
                            $res= array();
                            $res = explode("-",$career['responsibility'][$this->session->userdata('lang')]);
                            for($i=1; $i < count($res); $i++){
                                echo "<li>".$res[$i]."</li>";
                            }?>
                            </ul>
                            <p class="text-success"> * <?php echo $career['welfare'][$this->session->userdata('lang')]; ?></p><br>
                            <p class="text-danger"> *- <?php echo $career['remark'][$this->session->userdata('lang')]; ?></p>
                      </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <hr>
                <div align="center">
                    <h2 class="text-warning">ยังไม่มีตำแหน่งงานว่าง</h2>
                </div>
            <?php endif; ?>
            </div>
        </div>
        <!-- /.row -->
        <?php $this->load->view('temp_front/display_footer',$contacts[0]); ?>
</div>
<?php $this->load->view('temp_front/footer'); ?>