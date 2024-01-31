<div class="container-fluid" id="container-wrapper">
  <?php 
    $alert = $this->session->userdata('alert');
    $alert_status = $this->session->userdata('alert_status');
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
                $str = "Well done! Promo was created.";
              } else {
                $str = "Oh snap! Insert promo failed.";
              }
              echo $str
            ?>
          </div>
        </div>
      </div>
    </div>
  <?php $this->session->set_userdata('alert', ''); }  else if ($alert_status) { ?>
    <div style="position: relative;z-index:1">
      <div style="position: absolute; top: 0; right: 0;">
        <div class="toast bg-<?php echo $alert ?>" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
          <strong class="mr-auto">
              <?php 
              $str = "";
              if ($alert == "success"){
                $str = "Succes.";
              }
              echo $str
              ?>
            </strong>
          </div>
          <div class="toast-body text-white">
            <?php 
              $str = "";
              if ($alert == "success"){
                $str = "Well done! Status updated.";
              }
              echo $str
            ?>
          </div>
        </div>
      </div>
    </div>
  <?php $this->session->set_userdata('alert_status', '');} ?>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Promo</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item text-primary"><a href="<?php echo ''.base_url().'admin/promo' ?>">Promo</a></li>
      <li class="breadcrumb-item active" aria-current="page">List</li>
    </ol>
  </div>

  <!-- Row -->
  <div class="row">
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Promo Data List</h6>
          <button data-toggle="modal" data-target="#addPromo" data-id="" class="btn btn-secondary"><i class="fa fa-plus-circle"></i> Add Promo</button>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Value</th>
                <th>Status</th>
                <th>Start</th>
                <th>End</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php 
                if ($promo != NULL){
                  $no = 1;
                  foreach ($promo as $data) {
                    $str = "";
                    if ($data->status_promo == 1){
                      $str = "Active";
                      $strBtn = "Non Active";
                    } else {
                      $str = "Not Active";
                      $strBtn = "Active";
                    }
                    ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td><?= $data->name_promo ?></td>
                        <td>Rp. <?= number_format($data->value_promo) ?></td>
                        <td><?= $str ?></td>
                        <td><?=  date('d-m-Y', strtotime($data->start_promo)) ?></td>
                        <td><?=  date('d-m-Y', strtotime($data->end_promo)) ?></td>
                        <td class="text-right">
                            <?php 
                            if ($str == "Not Active"){ ?>
                              <a href="javascript:void(0);" data-toggle="modal" data-target="#activePromo" data-id="<?php echo $data->id_promo; ?>" class="btn btn-sm btn-success passingIDactive"><i class="fa fa-check"></i> <?= $strBtn ?></button></a>
                            <?php } else { ?>
                              <a href="javascript:void(0);" data-toggle="modal" data-target="#nonactivePromo" data-id="<?php echo $data->id_promo; ?>" class="btn btn-sm btn-warning passingIDnon"><i class="fa fa-trash"></i> <?= $strBtn ?></button></a>
                            <?php } ?>
                        </td>
                      </tr>
                    <?php
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

<div class="modal fade" id="nonactivePromo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" role="form" id="form-goods" enctype="multipart/form-data" action="<?php echo base_url();?>admin/promo/statusPromo">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabelLogout">Upsss!</h5>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to non-active this promo?</p>
          <input class="form-control" type="text" name="id_promo" id="id_non" value="" hidden>
          <input class="form-control" type="text" name="status_promo" value="1" hidden>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <input type="submit" name="submit" class="btn btn-primary" value="Yes, please!">
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="activePromo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" role="form" id="form-goods" enctype="multipart/form-data" action="<?php echo base_url();?>admin/promo/statusPromo">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabelLogout">Glad to hear.</h5>
        </div>
        <div class="modal-body">
          <p>Do you want to activate this promo?</p>
          <input class="form-control" type="text" name="id_promo" id="id_active" value="" hidden>
          <input class="form-control" type="text" name="status_promo" value="0" hidden>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <input type="submit" name="submit" class="btn btn-success" value="Sure.">
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="addPromo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" role="form" id="form-goods" enctype="multipart/form-data" action="<?php echo base_url();?>admin/promo/newpromo">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabelLogout">Add New Promo</h5>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="form-group col-lg-7">
                <label for="promoName">Promo Name</label>
                <input type="text" class="form-control" id="promoName" placeholder="Enter Promo Name" name="name_promo" required>
            </div>
            <div class="form-group col-lg-5">
                <label for="promoValue">Promo Value</label>
                <input type="text" class="form-control" id="promoValue" placeholder="Enter value" name="value_promo" required>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-lg-6" id="simple-date1">
              <label for="startDate">Start Date</label>
              <div class="input-group date">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                </div>
                <input type="text" name="start_promo" class="form-control" value="<?php 
                date_default_timezone_set('Asia/Jakarta');
                echo date('d-m-Y');
                ?>" id="startDate">
              </div>
            </div>
            <div class="form-group col-lg-6" id="simple-date1">
              <label for="endDate">End Date</label>
              <div class="input-group date">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                </div>
                <input type="text" name="end_promo" class="form-control" value="<?php 
                date_default_timezone_set('Asia/Jakarta');
                if( date('d') == 31 || (date('m') == 1 && date('d') > 28)){
                    $date = strtotime('last day of next month');
                } else {
                    $date = strtotime('+1 months');
                }
                echo date('d-m-Y', $date); 
                ?>" id="endDate">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <input type="submit" name="submit" class="btn btn-success" value="Save">
        </div>
      </form>
    </div>
  </div>
</div>