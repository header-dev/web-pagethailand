<div class="header_area home-2">
		<div class="div container">
			<div class="row">
				<div class="col-md-7">
					<div class="phone_address clear">
						<p class="no-margin">
						  <small>
							  <span class="text-msg">Have any questions?</span>
							  <span class="icon-set"><i class="fa fa-phone"></i> +66 <?php echo $contacts[0]['hot_line']; ?></span>
							  <span class="icon-set"><i class="fa fa-envelope"></i> <?php echo $contacts[0]['email']; ?></span>
						  </small>
						</p>
					</div>
				</div>
				<div class="col-md-5">
					<?php if(count($language) > 0): ?>
						<div class="form pull-right">
						<div class="language home-2" style="margin-top: 5px;">
							  <select class="form-lan">
							  	<?php foreach ($language as $l) : ?>
									<option value="<?php echo $l['code']; ?>" <?php if($l['set_default']==1){ echo "selected"; } ?>><?php echo $l["name"]; ?></option>
								<?php endforeach; ?>
							  </select>
						</div>
					</div>
					<?php endif; ?>
					<div class="social_icon pull-right">
						<p>
						   <?php if(!empty($contacts[0]['facebook'])) : ?>
						   		<a target="_blank" href="<?php echo $contacts[0]['facebook']; ?>" class="icon-set"><i class="fa fa-facebook"></i></a>
							<?php endif; ?>
							<?php if(!empty($contacts[0]['instagram'])) : ?>
						   		<a target="_blank" href="<?php echo $contacts[0]['instagram']; ?>" class="icon-set"><i class="fa fa-instagram"></i></a>
							<?php endif; ?>
							<?php if(!empty($contacts[0]['twitter'])) : ?>
						   		<a target="_blank" href="<?php echo $contacts[0]['twitter']; ?>" class="icon-set"><i class="fa fa-twitter"></i></a>
							<?php endif; ?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end header  area -->
	<!--Start mobile menu  area -->
	<div class="mobile_memu_area home-2">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="mobile_memu">
					<!--  nav menu-->
					<nav>
						<ul class="navid">
							<li><a href="index.html">Home</a></li>
							<li><a href="#">Program</a>
								<ul>
									<!-- <li><a href="courses-item-1.html">Courses List layout 1</a></li>
									<li><a href="courses-item-2.html">Courses List layout 2 </a></li>
									<li><a href="single-courses.html">Course Item </a></li> -->
									<li><a href="package-detail.html"> Summer in Thailand</a></li>
								</ul>
							</li>
							<!-- <li><a href="#">Pages</a>
								<ul>
									<li><a href="faq.html">FAQ </a></li>
									<li><a href="login.html">Login Page  </a></li>
									<li><a href="video.html">Video Gallery  </a></li>
									<li><a href="gellary.html">Image Gallery </a></li>
									<li><a href="about-page.html">About Page </a></li>
									<li><a href="news-bulletin.html">News Bulletin  </a></li>
									<li><a href="registration.html">Registration Form</a></li>
									<li><a href="contract.html">Contacts </a></li>
									<li><a href="404.html">404 </a></li>
								</ul>
							</li> -->
							<!-- <li><a href="#">Store</a></li>
							<li><a href="#">Blog</a></li> -->
							<li><a href="#">About Us</a></li>
							<li><a href="#">Contact</a></li>
						</ul>
					</nav>
					<!--end  nav menu-->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end mobile menu  area -->
	<div class="slide_wrap_area">
    <!--Start nav  area -->
	<div class="nav_area home-2">
		<div class="container">
			<div class="row">
				<!--nav item-->
				<div class="col-md-3 col-sm-3 col-xs-3">
					<div class="home2_logo"><a href="index.html"><img src="<?php echo FRONT_IMG; ?>custom-logo.png" alt="" /></a></div>
				</div>
				<div class="col-md-9 col-sm-9 col-xs-9">
					<!--  nav menu-->
					<nav class="menu">
						<ul class="navid pull-left">
							<li><li><a href="<?php echo base_url(); ?>">Home</a></li>
							<li><a href="#">Program <i class="fa fa-angle-down"></i></a>
								<ul>
									<li><a href="package-list.html"> Summer in Thailand</a></li>
									<!-- <li><a href="courses-item-1.html">Courses List layout 1</a></li>
									<li><a href="courses-item-2.html">Courses List layout 2 </a></li>
									<li><a href="single-courses.html">Course Item </a></li> -->
								</ul>
							</li>
							<!-- <li><a href="#">Pages <i class="fa fa-angle-down"></i></a>
								<ul>
									<li><a href="faq.html">FAQ </a></li>
									<li><a href="login.html">Login Page  </a></li>
									<li><a href="video.html">Video Gallery  </a></li>
									<li><a href="gellary.html">Image Gallery </a></li>
									<li><a href="about-page.html">About Page </a></li>
									<li><a href="news-bulletin.html">News Bulletin  </a></li>
									<li><a href="registration.html">Registration Form</a></li>
									<li><a href="contract.html">Contacts </a></li>
									<li><a href="404.html">404 </a></li>
								</ul>
							</li>
							<li><a href="store.html">Store</a></li>
							<li><a href="blog.html">Blog</a></li> -->
							<li><a href="<?php echo base_url(); ?>front/about_us">About Us</a></li>
							<li><a href="<?php echo base_url(); ?>front/contact_us">Contact</a></li>
						</ul>
					</nav>
					<!--end  nav menu-->
					<!-- <div class="search pull-right">
						<div class="search-box">
							<input type="text" class="form_control" placeholder="search..." />
							<span class="search-open"><i class="fa fa-search search"></i><i class="fa fa-close hidden close"></i></span>
						</div>
					</div> -->
				</div>
				<!--end nav item -->
			</div>
		</div>
	</div>
