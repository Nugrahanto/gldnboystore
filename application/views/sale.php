<div class="hero-wrap hero-bread" style="background-image: url('<?= base_url();?>assets/images/bg_sale.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">Collections on Sale</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h6 class="mb-4">Discover sales at gldnboystore. Shop the latest collection on sale.<h6>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
        <?php
        if ($goods != NULL) {
          foreach ($goods as $data) { ?>
            <div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
              <div class="product d-flex flex-column">
                <a href="<?php echo base_url(); ?>collections/sale/products/<?php 
                  $str = (str_replace(' ', '-', strtolower($data->name_goods)));
                  echo $str;
                  ?>" class="img-prod"><img class="img-fluid" src="<?php echo ''.base_url().'uploads/goods/'.$data->name_images.'';?>" alt="Colorlib Template">
                  <?php if ($data->id_promo != 0){ ?>
                  <span class="status">Rp. <?= number_format($data->value_promo) ?> off</span>
                  <?php } ?>
                  <div class="overlay"></div>
                </a>
                <div class="text py-3 pb-4 px-3">
                  <div class="d-flex">
                    <div class="cat">
                      <span><?= $data->name_category ?></span>
                    </div>
                  </div>
                  <h3><a href="<?php echo base_url(); ?>collections/sale/products/<?php 
                  $str = (str_replace(' ', '-', strtolower($data->name_goods)));
                  echo $str;
                  ?>"><?= $data->name_goods ?></a></h3>
                  <div class="pricing">
                      <?php 
                      $strprice = $data->price_goods - $data->value_promo;
                      if($data->id_promo == 0) { ?>
                      <p class="price"><span>Rp. <?= number_format($data->price_goods) ?></span></p>
                      <?php } else { ?>
                      <p class="price"><span class="mr-2 price-dc">Rp. <?= number_format($data->price_goods) ?></span><span class="price-sale">Rp. <?= number_format($strprice) ?></span></p>
                      <?php } ?>
                  </div>
                </div>
              </div>
            </div>
            <?php } 
            } else { ?>
              <div class="collNoProduct col-lg-12 col-md-12 col-xs-12 mt-5">
                <div class="alert alert-warning">
                    <strong>Sorry, there are no products in this collection.</strong>
                </div>
            </div>
        <?php } ?>
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                <?php echo $pagination; ?>
                </div>
            </div>
        </div>
      </div>
    </section>

    <section class="ftco-gallery">
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