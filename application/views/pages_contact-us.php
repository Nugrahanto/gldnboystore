    <div class="hero-wrap hero-bread" style="background-image: url('<?= base_url();?>assets/images/bg_contact2.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">Contact Us</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section contact-section bg-light">
      <div class="container">
      <?php 
        $alert = $this->session->flashdata('alert');
        if ($alert) { ?>
        <div style="position: relative;z-index:1">
          <div style="position: absolute; top: 0; right: 0;">
            <div class="toast bg-<?php echo $alert ?>" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="toast-header">
                <strong class="mr-auto">
                  <?php 
                  $str = "";
                  if ($alert == "success"){
                    $str = "Great.";
                  } else {
                    $str = "Ouch.";
                  }
                  echo $str
                  ?>
                </strong>
              </div>
              <div class="toast-body text-white">
                <?php 
                  $str = "";
                  if ($alert == "success"){
                    $str = "Well done! Mail has been sent.";
                  } else {
                    $str = "Oh no! Please, resend your email.";
                  }
                  echo $str
                ?>
              </div>
            </div>
          </div>
        </div>
      <?php $this->session->set_userdata('alert', ''); } ?>
        <div class="row block-9">
          <div class="col-md-8 order-md-last">
          <h3 class="ftco-heading-2 mb-4">Contact Us</h3>
            <form class="bg-white p-5 contact-form" method="post" role="form" id="form-goods" enctype="multipart/form-data" action="<?php echo base_url();?>pages/submitemail">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="contact-name" class="form-control" placeholder="Name" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="contact-email" class="form-control" placeholder="Email" required>
                    </div>
                </div>
            </div>
              <div class="form-group">
                <textarea name="contact-message" cols="30" rows="7" class="form-control" placeholder="Message" required></textarea>
              </div>
              <div class="form-group">
                <input type="submit" name="submit" value="Send Message" class="btn btn-primary py-3 px-5 mt-3">
              </div>
            </form>
          
          </div>

          <div class="col-md-4 d-flex">
            <div class="ftco-footer-widget mb-4">
            	<h3 class="ftco-heading-2 mb-5">Find Us Here.</h3>
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
      </div>
    </section> 
    <section class="ftco-gallery ftco-section ftco-no-pb">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-8 heading-section text-center mb-4 ftco-animate">
            <h3 class="mb-4">Follow Us On Instagram</h3>
          </div>
    		</div>
    	</div>
    	<div class="container-fluid px-0">
            <div class="row no-gutters">
            <?php 
            foreach($instagram as $data) { ?>
            <div class="col-md-4 col-lg-2 ftco-animate">
                <a href="<?= $data->link_instagram ?>" target="_blank" class="gallery img d-flex align-items-center" style="background-image: url('<?= $data->link_image ?>');">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-instagram"></span>
                    </div>
                </a>
            </div>
            <?php } ?>
            </div>
    	</div>
    </section>
