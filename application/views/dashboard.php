<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
        <div class="slider-item js-fullheight">
            <div class="overlay"></div>
            <a href="<?php echo base_url(); ?>collections/sale">
                <img class="one-third order-md-last img-fluid" src="<?php echo base_url(); ?>assets/images/bg_1.jpg" alt="">
            </a>
        </div>

        <div class="slider-item js-fullheight">
            <div class="overlay"></div>
            <a href="https://www.instagram.com/gldnboystore/">
                <img class="one-third order-md-last img-fluid" src="<?php echo base_url(); ?>assets/images/bg_3.jpg" alt="">
            </a> 
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
        <div class="col-md-12 heading-section text-center ftco-animate">
        <h2 class="mb-4">Latest Collection<h2>
        <!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p> -->
        </div>
    </div>   		
    </div>
    <div class="container">
        <div class="row">
        <?php
        foreach ($goods as $data) { ?>
        <div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
                <div class="product d-flex flex-column">
                    <a href="<?php echo base_url(); ?>products/<?php 
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
                        <h3><a href="<?php echo base_url(); ?>products/<?php 
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
        <?php } ?>
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