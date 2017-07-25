    <div id="carousel-id" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php for ($i=0; $i < count($slide) ; $i++): ?>
            <li data-target="#carousel-id" data-slide-to="<?php echo $i; ?>" class="<?php if($i==0){echo "active";} ?>"></li>
            <?php endfor; ?>
        </ol>
        <div class="carousel-inner">
            <?php for ($i=0; $i < count($slide) ; $i++): ?>
            <div class="item <?php if($i==0){echo "active";} ?>">
                <img class="img-responsive" src="<?php echo IMG; ?>slide/<?php echo $slide[$i]['image']; ?>" >
            </div>
            <?php endfor; ?>
        </div>
        <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
        <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
    <!-- Page Content -->
    <div class="container">
        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header text-success">
                    <i class="fa fa-cubes"></i> <?php echo label("product"); ?>
                </h3>
            </div>
            <?php if(!empty($products)): ?>
                <?php foreach ($products as $product) : ?>
                <div class="col-md-4">
                <a href="#" onclick="viewmoreproduct(<?php echo $product['product_id']; ?>);">
                    <img class="img-responsive img-hover" src="<?php echo IMG; ?>product/thumbnail/<?php echo $product['thumbnail']; ?>" height="400" width="700">
                </a>
                <h4>
                    <a href="#" onclick="viewmoreproduct(<?php echo $product['product_id']; ?>);">
                    <?php echo $product['product_name'][$this->session->userdata("lang")]; ?>
                    </a>
                </h4>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header text-success">
                    <i class="fa fa-cubes"></i> <?php echo label("service"); ?>
                </h3>
            </div>
            <?php if(!empty($services)): ?>
                <?php foreach ($services as $service) : ?>
                <div class="col-md-4">
                <a href="#" onclick="viewmoreservice(<?php echo $service['service_id']; ?>);">
                    <img class="img-responsive img-hover" src="<?php echo IMG; ?>service/thumbnail/<?php echo $service['thumbnail']; ?>" height="400" width="700">
                </a>
                <h4>
                    <a href="#" onclick="viewmoreservice(<?php echo $service['service_id']; ?>);">
                    <?php echo $service['service'][$this->session->userdata("lang")]; ?>
                    </a>
                </h4>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <!-- /.row -->
        <!-- Portfolio Section -->
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header text-warning"><i class="fa fa-newspaper-o"></i> <?php echo label("news"); ?></h3>
            </div>
            <?php if(!empty($news)): ?>
                <?php foreach ($news as $new) : ?>
            <div class="col-md-4">
            	<div class="col-lg-8">
            		<img class="img-responsive img-portfolio img-hover" src="<?php echo IMG; ?>news/thumbnail/<?php echo $new['thumbnail']; ?>" alt="">
            	</div>
                <div class="col-lg-8" align="left">
                    <h4><?php echo $new['topic'][$this->session->userdata('lang')] ?></h4>
                    <p><?php echo $new['sub-topic'][$this->session->userdata('lang')] ?></p>
                </div>
            	<div class="col-lg-8" align="center">
            		<button class="btn btn-sm btn-success" onclick="readmore(<?php echo $new['news_id']; ?>);">read more</button>
            	</div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
            <div class="col-lg-12" align="center">
                <?php echo $pagination; ?>
            </div>
        </div>
        <!-- /.row -->
    <?php $this->load->view('temp_front/display_footer'); ?>
</div>
<?php $this->load->view('temp_front/footer'); ?>
<script type="text/javascript">
    function viewmoreproduct(id){
        location.href = "<?php echo base_url(); ?>front/viewproduct?product_id="+id;
    }

    function viewmoreservice(id){
        location.href = "<?php echo base_url(); ?>front/viewservice?service_id="+id;
    }

    function readmore(id){
        location.href = "<?php echo base_url(); ?>front/viewnews?news_id="+id;
    }
</script>
