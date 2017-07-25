	<div class="about_area_s">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="heading_about">
						<h1 class="page-title">
							
						</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!--Start about  area -->
	<div class="about_area page">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="content-inner">
						<div class="content-desc">
							<div class="">
								<p class="about_pra_top">PageThailand.com</p>
							</div>

							<div class="">
								<p><?php echo $abouts[0]['about'][$this->session->userdata('lang')]; ?></p>
							</div>
						  </div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="ab_thumb">
						<img src="<?php echo IMG; ?>about/thumbnail/<?php echo $abouts[0]['thumbnail']; ?>" alt="" class="img-thumbnail" />
					  </div>
				</div>
			</div>
		</div>
	</div>
	<!--end about  area -->

	<!-- breadcrumb-area start -->
	<div class="breadcrumb-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="breadcrumb">
						<ul>
							<li><a href="index.html">Home</a> <i class="fa fa-angle-right"></i></li>							
							<li>About Us</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $this->load->view('layouts_front/footer');?>