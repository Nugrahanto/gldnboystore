    <section class="ftco-section">
    	<div class="container">
    		<div class="row mt-5">
    			<div class="col-lg-6 mb-5 ftco-animate">
					<div class="container-fluid px-sm-1 py-5 mx-auto">
						<div class="row justify-content-center">
							<div class="d-flex">
								<div class="d-flex flex-column thumbnails">
								<?php 
								$first = true;
								$index = 1;
								foreach ($goods_images as $data) {
									if ($first) { ?>
										<div id="f<?= $index ?>" class="tb tb-active"> <img class="thumbnail-img fit-image" src="<?= base_url(); ?>uploads/goods/<?= $data->name_images ?>"> </div>
									<?php $first = false; ?>
									<?php } else { ?>
										<div id="f<?= $index ?>" class="tb"> <img class="thumbnail-img fit-image" src="<?= base_url(); ?>uploads/goods/<?= $data->name_images ?>"> </div>
									<?php }?>
								<?php $index++; } ?>
								</div>
								<?php 
								$first = true;
								$index = 1;
								foreach ($goods_images as $data) {
									if ($first) { ?>
										<fieldset id="f<?= $index ?>1" class="active ml-5">
											<div class="product-pic"> 
												<?php 
												if ($data->name_category == "limited-edition" && $data->status_goods == 0){ ?>
												<div class="parent ml-5">
													<img alt="overlay 1" src="<?= ''.base_url().'assets/images/soldout.png';?>">
													<img class="pic0" src="<?= base_url(); ?>uploads/goods/<?= $data->name_images ?>"> 
												</div>
												<?php } else {?>	
												<img class="pic0" src="<?= base_url(); ?>uploads/goods/<?= $data->name_images ?>"> 
												<?php } ?>	
											</div>
										</fieldset>
									<?php $first = false; ?>
									<?php } else { ?>
										<fieldset id="f<?= $index ?>1" class="ml-5">
											<div class="product-pic"> 
												<?php 
												if ($data->name_category == "limited-edition" && $data->status_goods == 0){ ?>
												<div class="parent ml-5">
													<img alt="overlay 1" src="<?= ''.base_url().'assets/images/soldout.png';?>">
													<img class="pic0" src="<?= base_url(); ?>uploads/goods/<?= $data->name_images ?>"> 
												</div>
												<?php } else {?>	
												<img class="pic0" src="<?= base_url(); ?>uploads/goods/<?= $data->name_images ?>"> 
												<?php } ?>
											</div>
										</fieldset>
									<?php }?>
								<?php $index++; } ?>
							</div>
						</div>
					</div>

    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3><?= $goods->name_goods ?></h3>
						<?php 
						$strprice = $goods->price_goods - $goods->value_promo;
						if($goods->id_promo == 0) { ?>
						<p class="price"><span>Rp. <?= number_format($goods->price_goods) ?></span></p>
						<?php } else { ?>
						<p class="price"><span class="mr-2 price-line-through">Rp. <?= number_format($goods->price_goods) ?></span><span class="price-sale">Rp. <?= number_format($strprice) ?></span></p>
						<?php } ?>
					</span></p>
					<div class="row">
						<div class="col-md-12 nav-link-wrap">
							<div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
								<a class="nav-link ftco-animate active mr-lg-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Description</a>
								<?php if($goods->id_category != 3) { ?>
									<a class="nav-link ftco-animate mr-lg-1" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Other</a>
								<?php } ?>
							</div>
						</div>
						<div class="col-md-12 tab-wrap">
							<div class="tab-content bg-light" id="v-pills-tabContent">
								<div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="day-1-tab">
									<div class="p-4">
										<p class="text-justify">
											<?php 
											$str = $goods->desc_goods;
											$descMain = substr($str, 0, strpos($str, ".") + 1);
											$descOther = substr($str, strpos($str, ":") + 1);
											$descBahan = substr($descOther, strpos($descOther, "Bahan :"), strpos($descOther, "Lainnya") - 5);
											$descSablon = substr($str, strpos($str, "Lainnya :"));
											$attachment = "\r\n";
											echo ''.$descMain.' <br /><br /> Material : <br />'.$descBahan.' <br /> '.$descSablon.'';
											?>
										</p>
									</div>
								</div>

								<div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-day-2-tab">
										<?php 
											$cat = $goods->name_category;
											$subcat = $goods->name_subCategory;
											$name = $goods->name_goods;
											if($cat == "men")  { 
												if ($subcat == "t-shirts") { ?>
													<img class="img-other img-fluid fit-image" src="<?php echo base_url();?>assets/images/size_tshirt.png">
												<?php } else if ($subcat == "jackets") { ?>
													<img class="img-other img-fluid fit-image" src="<?php echo base_url();?>assets/images/size_crewneck.png">
												<?php } 
											} else if($cat == "women")  { 
												if ($subcat == "t-shirts") { ?>
													<img class="img-other img-fluid fit-image" src="<?php echo base_url();?>assets/images/size_tshirt.png">
												<?php } else if ($subcat == "sweatshirts") { ?>
													<img class="img-other img-fluid fit-image" src="<?php echo base_url();?>assets/images/size_crewneck.png">
												<?php } 
											} else if ($cat == "limited-edition" && stristr($name, "crewneck")) { ?> 
												<img class="img-other img-fluid fit-image" src="<?php echo base_url();?>assets/images/size_crewneck.png">
											<?php } else if ($cat == "limited-edition" && stristr($name, "denim")) { ?> 
												<img class="img-other img-fluid fit-image" src="<?php echo base_url();?>assets/images/size_denim.png">
											<?php } else if ($cat == "limited-edition" && stristr($name, "shirt")) { ?> 
												<img class="img-other img-fluid fit-image" src="<?php echo base_url();?>assets/images/size_tshirt.png">
										<?php } ?> 
									<!-- </div> -->
								</div>
							</div>
						</div>
					</div>
					<?php if ($data->name_category != "limited-edition" || $data->status_goods != 0) { 
						if ($data->name_category != "women") { ?>
						<div class="row mt-4">
							<div class="input-group col-md-4 d-flex mb-3">
								<span class="input-group-btn mr-2">
									<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
										<i class="ion-ios-remove"></i>
									</button>
								</span>
								<input type="text" id="quantity" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
								<span class="input-group-btn ml-2">
									<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
										<i class="ion-ios-add"></i>
									</button>
								</span>
							</div>
							<div class="col-md-8">
								<div class="form-group d-flex">
									<?php
									if($goods->other != 0) { ?>
										<p style="color: #000;" class="mt-1 ml-2">
										<?php
											$str = $goods->other;
											$int = (int)$str;
											if($int == 0) {
												echo 'Out of stock';
											}
											else if ($int == 1) {
												echo 'The one last stock';
											}
											else if ($int <= 4) {
												echo 'Stock is running out';
											} else {
												echo 'Stock: '.$str.'  available';
											} ?>
										</p>
									<?php } else { ?>
									<div class="select-wrap">
										<div class="icon"><span class="ion-ios-arrow-down"></span></div>
										<select name="stock" id="stock" class="form-control">
											<option value="S">Small</option>
											<option value="M">Medium</option>
											<option value="L">Large</option>
											<option value="XL">Extra Large</option>
										</select>
									</div>
									<p style="color: #000;" id="stock_s" class="mt-1 ml-2" >
									<?php
										$str = $goods->S;
										$int = (int)$str;
										if($int == 0) {
											echo 'Out of stock';
										}
										else if ($int == 1) {
											echo 'The one last stock';
										}
										else if ($int == 2) {
											echo 'Stock is running out';
										} else {
											echo ''.$str.' piece available';
										} ?>
									</p>
									<p style="color: #000;" id="stock_m" class="mt-1 ml-2 stock_hide">
									<?php
										$str = $goods->M;
										$int = (int)$str;
										if($int == 0) {
											echo 'Out of stock';
										}
										else if ($int == 1) {
											echo 'The one last stock';
										}
										else if ($int == 2) {
											echo 'Stock is running out';
										} else {
											echo ''.$str.' piece available';
										} ?>
									</p>
									<p style="color: #000;" id="stock_l" class="mt-1 ml-2 stock_hide">
									<?php
										$str = $goods->L;
										$int = (int)$str;
										if($int == 0) {
											echo 'Out of stock';
										}
										else if ($int == 1) {
											echo 'The one last stock';
										}
										else if ($int == 2) {
											echo 'Stock is running out';
										} else {
											echo ''.$str.' piece available';
										} ?>
									</p>
									<p style="color: #000;" id="stock_xl" class="mt-1 ml-2 stock_hide">
									<?php
										$str = $goods->XL;
										$int = (int)$str;
										if($int == 0) {
											echo 'Out of stock';
										}
										else if ($int == 1) {
											echo 'The one last stock';
										}
										else if ($int == 2) {
											echo 'Stock is running out';
										} else {
											echo ''.$str.' piece available';
										} ?>
									</p>
									<?php } ?>
								</div>
							</div>
							<div class="w-100"></div>
						</div>
						<a href="" data-toggle="modal" data-target="#shopnow" class="btn btn-black py-3 px-5 mr-2 mb-1">Shop Now !</a>
						<?php } else { ?>
							<a href="" data-toggle="modal" data-target="#ordernow" class="btn btn-black py-3 px-5 mr-2 mb-3 mt-4 order">Order Now !</a>
							<p>*Process by Order</p>
						<?php } ?>
					<?php } ?>
    			</div>
    		</div>
		</div>
		
		<?php 
		if ($goods_other != NULL){ ?>
		<div class="ftco-section bg-light mt-5">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-12 heading-section text-center ftco-animate">
						<h3 class="velaTitle velaHomeTitle clearfix">
							<span class="groupTitle">
								<span class="title">Product Related</span>
							</span>
						</h3>
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<div id="carousel-example" class="carousel slide" data-ride="carousel">
					<?php 
					$a = count($goods_other);
					if($a > 4) { ?>
					<div class="ml-3">
						<a class="carousel-control prev" href="#carousel-example" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control next" href="#carousel-example" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
					<?php } else if ($a == 4) { ?>
						<a class="carousel-control prev empat" href="#carousel-example" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control next empat" href="#carousel-example" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					<?php } else if ($a == 3) { ?>
						<a class="carousel-control prev tiga" href="#carousel-example" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control next tiga" href="#carousel-example" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					<?php } else if ($a == 2) { ?>
						<a class="carousel-control prev dua" href="#carousel-example" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control next dua" href="#carousel-example" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					<?php } else if ($a == 1) { ?>
						<a class="carousel-control prev satu" href="#carousel-example" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control next satu" href="#carousel-example" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					<?php } ?>
					<div class="carousel-inner row w-100 mx-auto mt-3" role="listbox" id="countme">
						<?php 
							$first = true;
							foreach($goods_other as $data) { 
								if ( $first ) { ?>
									<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 active">
										<div class="product d-flex flex-column">
											<div class="parent">
												<?php 
												if ($data->name_category == "limited-edition" && $data->status_goods == 0){ ?>
													<img alt="overlay 1" src="<?= ''.base_url().'assets/images/soldout.png';?>">
												<?php } ?>
												<?php 
												$dua = $this->uri->segment(1);
												$tiga = $this->uri->segment(2);
												if ($dua == "products") { ?>
													<a href="<?php echo base_url(); ?>products/<?php 
														$str = (str_replace(' ', '-', strtolower($data->name_goods)));
														echo $str;
														?>" class="img-prod">
												<?php } else { ?>
													<a href="<?php echo base_url(); ?>collections/<?= $tiga; ?>/products/<?php 
														$str = (str_replace(' ', '-', strtolower($data->name_goods)));
														echo $str;
														?>" class="img-prod">
												<?php } ?>
													<img class="img-fluid" src="<?php echo ''.base_url().'uploads/goods/'.$data->name_images.'';?>" alt="Colorlib Template">
												<?php if ($data->id_promo != 0){ ?>
													<span class="status">Rp. <?= number_format($data->value_promo) ?> off</span>
												<?php } ?>
												<div class="overlay"></div>
												</a>
											</div>
											<div class="text py-3 pb-4 px-3">
												<div class="d-flex">
													<div class="cat">
														<span><?= $data->name_category ?></span>
													</div>
												</div>
												<h3>
												<?php 
												$dua = $this->uri->segment(1);
												$tiga = $this->uri->segment(2);
												if ($dua == "products") { ?>
													<a href="<?php echo base_url(); ?>products/<?php 
														$str = (str_replace(' ', '-', strtolower($data->name_goods)));
														echo $str;
														?>">
												<?php } else { ?>
													<a href="<?php echo base_url(); ?>collections/<?= $tiga; ?>/products/<?php 
														$str = (str_replace(' ', '-', strtolower($data->name_goods)));
														echo $str;
														?>">
												<?php } ?><?= $data->name_goods ?></a></h3>
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
									<?php $first = false; ?>
								<?php } else { ?>
									<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
										<div class="product d-flex flex-column">
											<div class="parent">
												<?php 
												if ($data->name_category == "limited-edition" && $data->status_goods == 0){ ?>
													<img alt="overlay 1" src="<?= ''.base_url().'assets/images/soldout.png';?>">
												<?php } ?>
												<?php 
												$dua = $this->uri->segment(1);
												$tiga = $this->uri->segment(2);
												if ($dua == "products") { ?>
													<a href="<?php echo base_url(); ?>products/<?php 
														$str = (str_replace(' ', '-', strtolower($data->name_goods)));
														echo $str;
														?>" class="img-prod">
												<?php } else { ?>
													<a href="<?php echo base_url(); ?>collections/<?= $tiga; ?>/products/<?php 
														$str = (str_replace(' ', '-', strtolower($data->name_goods)));
														echo $str;
														?>" class="img-prod">
												<?php } ?>
													<img class="img-fluid" src="<?php echo ''.base_url().'uploads/goods/'.$data->name_images.'';?>" alt="Colorlib Template">
												<?php if ($data->id_promo != 0){ ?>
													<span class="status">Rp. <?= number_format($data->value_promo) ?> off</span>
												<?php } ?>
												<div class="overlay"></div>
												</a>
											</div>
											<div class="text py-3 pb-4 px-3">
												<div class="d-flex">
													<div class="cat">
														<span><?= $data->name_category ?></span>
													</div>
												</div>
												<h3>
												<?php 
												$dua = $this->uri->segment(1);
												$tiga = $this->uri->segment(2);
												if ($dua == "products") { ?>
													<a href="<?php echo base_url(); ?>products/<?php 
														$str = (str_replace(' ', '-', strtolower($data->name_goods)));
														echo $str;
														?>">
												<?php } else { ?>
													<a href="<?php echo base_url(); ?>collections/<?= $tiga; ?>/products/<?php 
														$str = (str_replace(' ', '-', strtolower($data->name_goods)));
														echo $str;
														?>">
												<?php } ?><?= $data->name_goods ?></a></h3>
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
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
    </section>

	<div class="modal fade" id="shopnow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
	aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabelLogout">Upsss..</h5>
				</div>
				<div class="modal-body">
					<p>Sorry buddy, online order is under construction. <a href="<?= base_url(); ?>pages/contact-us" target="_blank">Contact us</a> to grab your product :) or u can click <a href="https://wa.me/6282257883916?text=I%20want%20to%20order%20<?= $goods->name_goods; ?>" target="_blank">me.</a></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Alright.</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="ordernow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
	aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabelLogout">Hi Ladies..</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
				<div class="modal-body">
					<p>We're sorry, online order is under construction. Click the button, order will be redirect to our whatsapp. r u got it?</p>
				</div>
				<div class="modal-footer">
					<a href="https://wa.me/6282257883916?text=It's%20me,%20from%20website.%20I%20want%20to%20order%20<?= $goods->name_goods; ?>" target="_blank"><button class="btn btn-secondary">Send text, please.</a>
				</div>
			</div>
		</div>
	</div>