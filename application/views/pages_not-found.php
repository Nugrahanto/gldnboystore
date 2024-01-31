<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="<?php echo base_url(); ?>assets/images/logo.png" rel="icon">
    <title>GLDNBOY STORE | 404</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/aos.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.timepicker.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" type="text/css">
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/icomoon.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">

  </head>
  <body class="goto-here">
	<div class="py-1 bg-black">
    	<div class="container">
    		<div class="row d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
                    <div class="d-flex topper align-items-center text-center">
                        <span class="text w-100">POPULAR CULTURE</span>
                    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="<?php echo base_url(); ?>">gldnboy.</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item <?php if($this->uri->segment(1) == ''){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>" class="nav-link">Home</a></li>
	          <li class="nav-item dropdown <?php if($this->uri->segment(1) == 'collections' && $this->uri->segment(2) != 'sale' || $this->uri->segment(1) == 'products' && $this->uri->segment(2) != 'sale'){ echo 'active'; } ?>">
              <a class="nav-link dropdown-toggle" href="" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Collections</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <?php 
                foreach ($category as $data) {
                  $str = strtolower($data->name_category);
                  $strView = ucwords(str_replace("-"," ",$data->name_category));
                  echo '
                    <a class="dropdown-item" href="'. base_url().'collections/'.$str.'">'.$strView.'</a>
                  ';
                }
                ?>
              </div>
            </li>
            <li class="nav-item <?php if($this->uri->segment(1) == 'collections' && $this->uri->segment(2) == 'sale' ){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>collections/sale" class="nav-link">Sale</a></li>
	          <li class="nav-item <?php if($this->uri->segment(2) == 'contact-us'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>pages/contact-us" class="nav-link">Contact</a></li>
	          <li class="nav-item cta cta-colored"><a href="https://www.instagram.com/gldnboystore/" target="_blank" class="nav-link"><span class="icon-instagram"></span></a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <section class="ftco-section">
        <div class="container">
            <div class="mt-5 text-center">
                <div class="boxImage">
                    <img class="img-responsive" alt="GUTEN INC" src="//placehold.it/762x219" />
                </div>
                <div class="mt-5">
                    <h3 class="page404Title">PAGE NOT FOUND</h3>
                    <div class="page404Des">You may have mis-typed the URL. Or the page you are looking for might have been removed had its name changed or is temporarily unavailable.<br>
        Actually, there is nothing to see here....</div>
                </div>
            </div>
        </div>
    </section>

    <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">GLDNBOY STORE</h2>
              <p>Started from a hobby of making t-shirt using their own brand and for their own use. In 2020 this brand was finally announced to public. "GLDNBOY" is defined like most of you know, people who always get special privileges in their lives. - POP IS OUR CULTURE</p>
            </div>
          </div>
          <div class="col-md-3">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="<?php echo base_url(); ?>pages/how-to-order" class="pb-2 d-block">How to Order</a></li>
                  <li><a href="<?php echo base_url(); ?>pages/contact-us" class="pb-2 d-block">Contact Us</a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
                  <li><a><span class="icon icon-map-marker"></span><span class="text">Offline store? will be announced later.</span></a></li>
	                <li><a><span class="icon icon-phone"></span><span class="text">Phone Number: 082 257883916</span></a></li>
	                <li><a><span class="icon icon-envelope"></span><span class="text">Email: gldnboystore@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> - GLDNBOYSTORE</a>
						</p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#383838"/></svg></div>

  <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery.easing.1.3.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery.waypoints.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery.stellar.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/aos.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery.animateNumber.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/scrollax.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
    
  </body>
</html>