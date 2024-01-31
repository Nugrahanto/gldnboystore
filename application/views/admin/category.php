<div class="container-fluid" id="container-wrapper">
  <?php 
    $alert = $this->session->userdata('alert');
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
              }
              echo $str
              ?>
            </strong>
          </div>
          <div class="toast-body text-white">
            <?php 
              $str = "";
              if ($alert == "success"){
                $str = "Well done! Data updated.";
              }
              echo $str
            ?>
          </div>
        </div>
      </div>
    </div>
  <?php $this->session->set_userdata('alert', ''); } ?>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Category</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item text-primary">Category</li>
      <li class="breadcrumb-item active" aria-current="page">List</li>
    </ol>
  </div>

  <!-- Row -->
  <div class="row">
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Category Data List</h6>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php 
                if ($all_category != NULL){
                  $no = 1;
                  foreach ($all_category as $data) {
                    $str = "";
                    if ($data->status_category == 1){
                      $str = "Active";
                      $strBtn = "Non Active";
                    } else {
                      $str = "Not Active";
                      $strBtn = "Active";
                    }
                    $strName = ucwords(str_replace("-"," ",$data->name_category)); 
                    if($strName == "T Shirt"){
                      $strName = "T-Shirt";
                    } 
                    ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td><?= $strName ?></td>
                        <td><?= $str ?></td>
                        <td class="text-right">
                            <?php 
                            if ($str == "Not Active"){ ?>
                              <a href="javascript:void(0);" data-toggle="modal" data-target="#activeCategory" data-id="<?php echo $data->id_category; ?>" class="btn btn-sm btn-success passingIDactive"><i class="fa fa-check"></i> <?= $strBtn ?></button></a>
                            <?php } else { ?>
                              <a href="javascript:void(0);" data-toggle="modal" data-target="#nonactiveCategory" data-id="<?php echo $data->id_category; ?>" class="btn btn-sm btn-warning passingIDnon"><i class="fa fa-trash"></i> <?= $strBtn ?></button></a>
                            <?php } ?>
                            <a href="<?php echo base_url(); ?>admin/category/detail/<?php echo $data->id_category; ?>"><button class="btn btn-sm btn-secondary"><i class="fa fa-eye"></i> Detail</button></a>
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

<div class="modal fade" id="nonactiveCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" role="form" id="form-goods" enctype="multipart/form-data" action="<?php echo base_url();?>admin/category/statusCategory">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabelLogout">Upsss!</h5>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to non-active this category?</p>
          <input class="form-control" type="text" name="id_category" id="id_non" value="" hidden>
          <input class="form-control" type="text" name="status_category" value="1" hidden>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <input type="submit" name="submit" class="btn btn-primary" value="Yes, please!">
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="activeCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" role="form" id="form-goods" enctype="multipart/form-data" action="<?php echo base_url();?>admin/category/statusCategory">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabelLogout">Glad to hear.</h5>
        </div>
        <div class="modal-body">
          <p>Do you want to activate this category?</p>
          <input class="form-control" type="text" name="id_category" id="id_active" value="" hidden>
          <input class="form-control" type="text" name="status_category" value="0" hidden>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <input type="submit" name="submit" class="btn btn-success" value="Sure.">
        </div>
      </form>
    </div>
  </div>
</div>