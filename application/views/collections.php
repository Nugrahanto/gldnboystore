    <div class="hero-wrap hero-bread" style="background-image: url('<?= base_url();?>assets/images/bg_collections.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">Collections</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-8 col-lg-10 order-md-last">
    				<div class="row">
                        <?php 
                        $cat = $this->uri->segment(2);
                        if ($goods != NULL) {
                            foreach($goods as $data) { ?>
                            <div class="col-sm-12 col-md-12 col-lg-4 ftco-animate d-flex">
                                <div class="product d-flex flex-column">
                                    <div class="parent">
                                        <?php 
                                        if ($data->name_category == "limited-edition" && $data->status_goods == 0){ ?>
                                            <img alt="overlay 1" src="<?= ''.base_url().'assets/images/soldout.png';?>">
                                        <?php } ?>
                                        <a href="<?php echo current_url(); ?>/products/<?php 
                                            $str = (str_replace(' ', '-', strtolower($data->name_goods)));
                                            echo $str; 
                                            ?>" class="img-prod">
                                            <img class="img-fluid" src="<?php echo ''.base_url().'uploads/goods/'.$data->name_images.'';?>" alt="Colorlib Template">
                                        <?php if ($data->id_promo != 0){ ?>
                                            <span class="status">Rp. <?= number_format($data->value_promo) ?> off</span>
                                        <?php } ?>
                                        <div class="overlay"></div>
                                        </a>
                                    </div>
                                    <div class="text py-3 pb-4 px-3">
                                        <h3><a href="<?php echo current_url(); ?>/products/<?php 
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
                            }  else { ?>
                             <div class="collNoProduct col-lg-12 col-md-12 col-xs-12 mt-5">
                                <div class="alert alert-warning text-secondary">
                                    <strong>Sorry, there are no products in this collection.</strong>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="row mt-5">
                        <div class="col text-center">
                            <div class="block-27">
                            <?php echo $pagination; ?>
                            <!-- <?php if (ceil($total_pages / $num_results_on_page) > 0): ?>
                            <ul>
                                <?php if ($page > 1): ?>
                                <li><a href="?page=<?php echo $page-1 ?>">
                                    <span class="asd" aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a></li>
                                <?php endif; ?>

                                <?php if ($page > 3): ?>
                                <li class="start"><a href="?page=1">1</a></li>
                                <li class="dots">...</li>
                                <?php endif; ?>

                                <?php if ($page-2 > 0): ?><li class="page"><a href="?page=<?php echo $page-2 ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
                                <?php if ($page-1 > 0): ?><li class="page"><a href="?page=<?php echo $page-1 ?>"><?php echo $page-1 ?></a></li><?php endif; ?>

                                <li class="active"><a href="?page=<?php echo $page ?>"><?php echo $page ?></a></li>

                                <?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="?page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
                                <?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="?page=<?php echo $page+2 ?>"><?php echo $page+2 ?></a></li><?php endif; ?>

                                <?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?>
                                <li class="dots">...</li>
                                <li class="end"><a href="?page=<?php echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
                                <?php endif; ?>

                                <?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
                                <li class="next"><a href="?page=<?php echo $page+1 ?>">
                                    <span class="asd" aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a></li>
                                <?php endif; ?>
                            </ul>
                            <?php endif; ?> -->
                            </div>
                        </div>
                    </div>
		    	</div>

		    	<div class="col-md-4 col-lg-2">
		    		<div class="sidebar">
                        <div class="sidebar-box-2">
                            <h2 class="heading">Categories</h2>
                            <div class="fancy-collapse-panel">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    
                                    <?php 
                                        foreach ($category_left as $data) { ?>
                                        <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="heading<?php echo $data->name_category ?>">
                                            <h4 class="panel-title">
                                                <?php if ($data->id_subCategory == NULL) { ?>
                                                    <a class="free" href="<?php echo base_url();?>collections/<?php echo $data->name_category; ?>"><?= $data->name_category ?></a>
                                                <?php } else { ?>
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $data->name_category ?>" aria-expanded="true" aria-controls="collapse<?php echo $data->name_category ?>"><?php echo $data->name_category ?>
                                                </a>
                                                <?php } ?>
                                            </h4>
                                        </div>
                                        <div id="collapse<?php echo $data->name_category ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $data->name_category ?>">
                                            <div class="panel-body">
                                                <ul>
                                                <?php 
                                                    foreach ($subcategory as $datasub) {
                                                        if ($data->id_category == $datasub->id_category) {
                                                            //$subCat = strtolower($datasub->name_subCategory);
                                                            $str = strtolower($datasub->name_subCategory);
                                                            $strShow = ucwords(str_replace("-"," ",$datasub->name_subCategory)); 
                                                            if($strShow == "T Shirts"){
                                                                $strShow = "T-Shirts";
                                                            }
                                                            echo '<li><a href="'.base_url().'collections/'.$data->name_category.'?cat='.$str.'">'.$strShow.'</a></li>';
                                                        }
                                                    }
                                                ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
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