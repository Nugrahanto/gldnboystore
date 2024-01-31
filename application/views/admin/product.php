<div class="container-fluid" id="container-wrapper">
  <?php 
    $alert = $this->session->userdata('alert');
    if ($alert) { ?>
    <div style="position: relative;z-index:1">
      <div style="position: absolute; top: 0; right: 0;">
        <div class="toast bg-<?php echo $alert ?>" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <strong class="mr-auto">Great.</strong>
          </div>
          <div class="toast-body text-white">
            New product has been added.
          </div>
        </div>
      </div>
    </div>
  <?php $this->session->set_userdata('alert', ''); } ?>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
  <!-- <?php 
  if ($goods != NULL) { ?>
    <h1 class="h3 mb-0 text-gray-800"><?php echo $goods[0]->name_category ?></h1>
  <?php } else { ?>
    <h1 class="h3 mb-0 text-gray-800">No Product!</h1>
  <?php } ?> -->
  <!-- <h1 class="h3 mb-0 text-gray-800"><?php echo $this->uri->segment(3); ?></h1> -->
    <!-- <h1 class="h3 mb-0 text-gray-800"><?php echo $goods[0]->name_category ?></h1> -->
    <h1 class="h3 mb-0 text-gray-800">Product</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item text-primary">Product</li>
      <li class="breadcrumb-item active" aria-current="page">List</li>
    </ol>
  </div>

  <!-- Row -->
  <div class="row">
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <!-- <?php 
          if ($goods != NULL) { ?>
            <h6 class="m-0 font-weight-bold text-primary">There is your data.</h6>
          <?php } else { ?>
            <h6 class="m-0 font-weight-bold text-primary">Sorry, no data available for <?php echo $this->uri->segment(3); ?>.</h6>
          <?php } ?> -->
          <h6 class="m-0 font-weight-bold text-primary"><?php 
            $str = ucwords(str_replace("-"," ",$this->uri->segment(3))); 
            if($str == "T Shirt"){
              $str = "T-Shirt";
            }
            echo $str; ?> Data List</h6>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Status</th>
                <th>Desc</th>
                <th>Price</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php 
                if ($goods != NULL){
                  $no = 1;
                  foreach ($goods as $data) {
                    $str = "";
                    if ($data->status_goods == 1){
                      $str = "Ready Stock";
                    } else {
                      $str = "Out of Stock";
                    }

                    $price = $data->price_goods - $data->value_promo;
                    echo '
                      <tr>
                        <td>'.$no.'</td>
                        <td>'.$data->name_goods.'</td>
                        <td>'.$str.'</td>
                        <td style="width:300px;">'.word_limiter($data->desc_goods, 17).'</td>
                        <td style="text-align:right"">Rp. '.number_format($price).'</td>
                        <td><a href="'. base_url().'admin/product/'.$this->uri->segment(3).'/detail/'.$data->id_goods.'"><button class="btn btn-sm btn-secondary"><i class="fa fa-eye"></i> Detail</button></a></td>
                      </tr>
                    ';
                  $no++;
                  }
                } else {
                  echo '
                      <tr>
                        <td colspan="6" style="text-align:center">Upss!! No data available.</td>
                      </tr>
                    ';
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!--Row-->

  <!-- Documentation Link -->
  <div class="row">
    <div class="col-lg-12">
      <p>DataTables is a third party plugin that is used to generate the demo table below. For more information
        about DataTables, please visit the official <a href="https://datatables.net/" target="_blank">DataTables
          documentation.</a></p>
    </div>
  </div>
</div>