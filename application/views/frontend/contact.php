<div class="pagethai_contact_area_s">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="heading_about">
						<h1 class="page-title">
						<!-- <small>We believe in us and </small>
							Education is Power  -->
						</h1>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="contact_area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title">
						<p class="lead">
							We are always here to hear from you.
						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<!-- start  blog left -->
				<div class="col-md-4 col-sm-4">
					<div class="contact-address">
						<div class="media">
							<div class="media-left">
								<i class="fa fa-phone"></i>
							</div>
							<div class="media-body">
								<h4 class="media-heading">Telephone</h4>
								<p>
									<span class="contact-emailto">+66 <?php echo $data[0]['tel']; ?></span>
								</p>
							</div>
						</div>
						<div class="media">
							<div class="media-left">
								<i class="fa fa-mobile"></i>
							</div>
							<div class="media-body">
								<h4 class="media-heading">Mobile</h4>
								<p>
									<span class="contact-emailto">+66 <?php echo $data[0]['mobile']; ?></span>
								</p>
							</div>
						</div>
						<div class="media">
							<div class="media-left">
								<i class="fa fa-envelope"></i>
							</div>
							<div class="media-body">
								<h4 class="media-heading">Email</h4>
								<p>
									<span class="contact-emailto"><a href="#"><?php echo $data[0]['email']; ?></a></span>
								</p>
							</div>
						</div>
						<div class="media">
							<div class="media-left">
								<i class="fa fa-map-marker"></i>
							</div>
							<div class="media-body">
								<h4 class="media-heading">Address</h4>
								<p>
									<span class="contact-emailto">
										<?php echo $data[0]['address'][$this->session->userdata('lang')]; ?>
									</span>
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8 col-sm-8">
					<div class="contact_us">
					<form action="mail.php" method="post">
						<div class="form-group">
							<div class="col-md-4 col-sm-4">
								<p class="fnone"><label class="" for="Name">Name <em>*</em></label></p>
							</div>
							<div class="col-md-8 col-sm-8">
								<div class="i_box">
									<input type="text" name="name" id="Name"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-4 col-sm-4">
								<p class="fnone"><label class="" for="Email">Email <em>*</em></label></p>
							</div>
							<div class="col-md-8 col-sm-8">
								<div class="i_box">									
									<input type="email" name="email" id="Email"/>							
								</div>						
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-4 col-sm-4">
								<p class="fnone"><label class="" for="mes">Message <em>*</em></label></p>
							</div>
							<div class="col-md-8 col-sm-8">
								<div class="i_box">									
									<textarea name="comment" id="mes" cols="30" rows="10"></textarea>							
								</div>						
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-4 col-sm-4"></div>
							<div class="col-md-8 col-sm-8">
								<p class=""><button type="submit" name="ok" class="read_more buttonc">submit</button></p>
							</div>							
						</div>
					</form>
					</div>
				</div>			
			</div>
		</div>
	</div>
	<!--end courses  area -->
<?php $this->load->view('layouts_front/footer');?>