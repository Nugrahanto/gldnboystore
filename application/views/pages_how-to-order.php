    <div class="hero-wrap hero-bread" style="background-image: url('<?= base_url();?>assets/images/bg_contact2.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">How to Order</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section contact-section bg-light">
      <div class="container">
        <div class="block-12">
            <h3>How to Order</h3>
        </div>
        <p>We're sorry, at this time order from website is under construction, please order via <a href="https://www.instagram.com/gldnboystore/">instagram</a> or check our <a href="<?= base_url(); ?>pages/contact-us">contact.</a></p>
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
