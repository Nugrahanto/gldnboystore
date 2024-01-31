        <!-- Container Fluid-->
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
                        $str = "Well done! Instagram has been updated.";
                    } else {
                        $str = "Oh snap! Update instagram failed.";
                    }
                    echo $str
                    ?>
                </div>
                </div>
            </div>
            </div>
        <?php $this->session->set_userdata('alert', ''); } ?>
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Images Instagram</h1>
            <ol class="breadcrumb">
              <!-- <li class="breadcrumb-item"><a href="./">Home</a></li> -->
              <li class="breadcrumb-item text-primary">Images</li>
              <li class="breadcrumb-item active" aria-current="page">Images Instagram</li>
            </ol>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-body">
                  <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                        <tr>
                            <th>Image</th>
                            <th>Link Instagram</th>
                            <th>Nomor</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                            foreach ($instagram as $data) {
                                echo '
                                <tr>
                                    <td><img style="width:50px;" src="'.$data->link_image.'"></td>
                                    <td>'.$data->link_instagram.'</td>
                                    <td>'.$data->nomor.'</td>
                                    <td><a href="'. base_url().'admin/images/instagramdetail/'.$data->id.'"><button class="btn btn-sm btn-secondary"><i class="fa fa-eye"></i> Detail</button></a></td>
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