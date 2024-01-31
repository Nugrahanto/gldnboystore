        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail</h1>
            <ol class="breadcrumb">
              <!-- <li class="breadcrumb-item"><a href="./">Home</a></li> -->
              <li class="breadcrumb-item text-primary">Product</li>
              <li class="breadcrumb-item active" aria-current="page">Detail</li>
            </ol>
          </div>
          <div class="row">
            <div class="col-lg-8">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-body row">
                  <div class="col-lg-6">
                    <div class="form-group">
                        <small class="text-primary font-weight-bold">Name</small>
                        <p><?= $det_goods->name_goods?></p>
                    </div>
                    <div class="form-group">
                        <small class="text-primary font-weight-bold">Price</small>
                        <?php
                          $price = number_format($det_goods->price_goods);
                          $pricePromo = $det_goods->price_goods - $det_goods->value_promo;
                          
                          if ($det_goods->value_promo != 0) { ?>
                            <p><s class="text-danger">Rp. <?php echo $price;?></s> | Rp. <?= number_format($pricePromo) ?></p> 
                          <?php } else { ?>
                            <p>Rp. <?= number_format($pricePromo) ?></p> 
                          <?php } ?>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <small class="text-primary font-weight-bold">Category</small>
                          <p><?php 
                          $str = ucwords(str_replace("-"," ",$det_goods->name_category)); 
                          echo $str;
                          ?></p>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <small class="text-primary font-weight-bold">Sub Category</small>
                          <p><?php 
                          $str = ucwords(str_replace("-"," ",$det_goods->name_subCategory)); 
                          if($str == "T Shirts"){
                            $str = "T-Shirts";
                          } if($str == "") {
                            $str = "-";
                          }
                          echo $str; ?></p>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <small class="text-primary font-weight-bold">Status</small>
                        <?php 
                          $str = "";
                          if ($det_goods->status_goods == 1){
                            $str = "Ready Stock";
                          } else {
                            $str = "Out of Stock";
                          }
                          echo '
                            <p>'.$str.'</p>
                          ';
                        ?>
                    </div>
                    <div class="form-group">
                      <small class="text-primary font-weight-bold">Stock</small>
                      <?php
                        if($det_goods->other != 0) { ?>
                        <div class="table-responsive pt-1">
                          <table class="table align-items-center table-flush">
                            <thead class="thead-dark">
                              <tr>
                                <th>Stock</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><?= $det_goods->other?></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      <?php } else { ?>
                        <div class="table-responsive pt-1">
                          <table class="table align-items-center table-flush">
                            <thead class="thead-dark">
                              <tr>
                                <th>S</th>
                                <th>M</th>
                                <th>L</th>
                                <th>XL</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><?= $det_goods->S?></td>
                                <td><?= $det_goods->M?></td>
                                <td><?= $det_goods->L?></td>
                                <td><?= $det_goods->XL?></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      <?php } ?>
                      </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <small class="text-primary font-weight-bold">Description</small>
                      <p class="text-justify">
                        <?php 
                          $str = $det_goods->desc_goods;
                          $descMain = substr($str, 0, strpos($str, ".") + 1);
                          $descOther = substr($str, strpos($str, ":") + 1);
                          $descBahan = substr($descOther, strpos($descOther, "Bahan :"), strpos($descOther, "Lainnya") - 5);
                          $descSablon = substr($str, strpos($str, "Lainnya :"));
                          $attachment = "\r\n";
                          echo ''.$descMain.' <br /><br /> Material : <br />'.$descBahan.' <br /> '.$descSablon.'';
                        ?>
                      </p>
                    </div>
                    <div class="form-group">
                      <small class="text-primary font-weight-bold">Promo</small>
                      <p>
                        <?php 
                          if($det_goods->id_promo != 1){
                            echo '
                              '.$det_goods->name_promo.'
                            ';
                          } else {
                            echo '
                              '.$det_goods->name_promo.' (Rp. '.number_format($det_goods->value_promo).')
                            ';
                          }
                        ?>
                      </p>
                    </div>
                    <div class="form-group text-right">
                      <a href="<?php echo ''.base_url().'admin/product/'.$this->uri->segment(3); ?>"><button class="btn btn-secondary mt-4"> Back</button></a>
                      <a href="<?php echo ''.base_url().'admin/product/'.$this->uri->segment(3).'/edit/'.$det_goods->id_goods.''; ?>"><button class="btn btn-primary mt-4"><i class="fa fa-list"></i> Edit</button></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card mb-4">
                <div class="card-body">
                  <div class="img">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                      <ol class="carousel-indicators">
                      <?php 
                          $i = 0;
                          if($image_goods != null){
                            foreach ($image_goods as $data){
                              $i++;
                              $active = $i == 1 ? "active" : "";
                              $index = $i - 1;
                              echo '
                                <li data-target="#carouselExampleIndicators" data-slide-to="'.$index.'" class="'.$active.'"></li>
                              ';
                            } 
                          } else {
                            echo '';
                          }
                        ?>
                      </ol>
                      <div class="carousel-inner">
                        <?php 
                          $i = 0;
                          if($image_goods != null){
                            foreach ($image_goods as $data){
                              $i++;
                              $active = $i == 1 ? "active" : "";
                              echo '
                              <div class="carousel-item '.$active.'">
                                  <img class="img-responsive" src="'.base_url().'uploads/goods/'.$data->name_images.'">
                              </div>
                              ';
                            }
                          } else {
                            echo '
                              <p>No Image for this product.</p>
                            ';
                          }
                        ?>
                      </div>
                      <?php 
                        if($image_goods != null){ ?>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->

          <!-- Documentation Link -->
          <div class="row">
            <div class="col-lg-12 text-center">
              <p>For more documentations you can visit<a href="https://getbootstrap.com/docs/4.3/components/forms/"
                  target="_blank">
                  bootstrap forms documentations.</a> and <a
                  href="https://getbootstrap.com/docs/4.3/components/input-group/" target="_blank">bootstrap input
                  groups documentations</a></p>
            </div>
          </div>
        </div>
        <!---Container Fluid-->