  <!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <?php 
    $alert = $this->session->userdata('alert');
    if ($alert) { ?>
    <div style="position: relative;z-index:1">
      <div style="position: absolute; top: 0; right: 0;">
        <div class="toast bg-<?php echo $alert ?>" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <!-- <img src="..." class="rounded mr-2" alt="..."> -->
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
                $str = "Well done! Data updated.";
              } else {
                $str = "Oh snap! Change a few things up and try submitting again.";
              }
              echo $str
            ?>
          </div>
        </div>
      </div>
    </div>
  <?php $this->session->set_userdata('alert', ''); } ?>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Edit</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item text-primary">Product</li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
      </ol>
    </div>

    <div class="row">
      <div class="col-lg-8">
        <!-- Form Basic -->
        <div class="card mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Basic Information.</h6>
          </div>
          <div class="card-body">  
            <form method="post" role="form" id="form-goods" enctype="multipart/form-data" action="<?php echo base_url();?>admin/product/doEdit">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                      <small class="text-primary font-weight-bold">Name</small>
                      <input type="text" class="form-control" name="name_goods" value="<?= $det_goods->name_goods ?>">
                  </div>
                  <div class="form-group">
                      <small class="text-primary font-weight-bold">Price</small>
                      <input type="text" class="form-control" name="price_goods" value="<?= $det_goods->price_goods ?>">
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <small class="text-primary font-weight-bold">Category</small>
                        <select class="form-control" id="id_category" name="id_category" onchange="get_subCat(this.value)">
                        <?php foreach ($category as $data) { 
                          $str = ucwords(str_replace("-"," ",$data->name_category)); 
                          if($str == "T Shirt"){
                            $str = "T-Shirt";
                          }?>
                          <option <?php if($data->id_category == $det_goods->id_category){ echo 'selected="selected"'; } ?> value="<?php echo $data->id_category ?>"><?php echo $str?></option>
                        <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                      <small class="text-primary font-weight-bold">Sub Category</small>
                        <select class="form-control" id="productSubCat" name="id_subCat">
                        <?php if($det_goods->id_subCategory != "") { 
                          foreach ($sub_cat as $data) { ?>
                          <option <?php if($data->id_subCategory == $det_goods->id_subCategory){ echo 'selected="selected"'; } ?> value="<?php echo $data->id_subCategory ?>"><?php echo $data->name_subCategory?></option>    
                        <?php } } else  { ?>
                          <option value="" selected="true" disabled="disabled">-- Sub Cat --</option>
                        <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <small class="text-primary font-weight-bold">Product Promo</small>
                    <select class="form-control" id="productPromo" name="id_promo">
                    <?php foreach ($promo as $data) { ?>
                      <option <?php if($data->id_promo == $det_goods->id_promo){ echo 'selected="selected"'; } ?> value="<?php echo $data->id_promo ?>"><?php echo $data->name_promo?> </option>    
                    <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <small class="text-primary font-weight-bold">Description</small>
                    <textarea class="form-control" id="productDesc" rows="11" name="desc_goods"><?= $det_goods->desc_goods ?></textarea>
                  </div>
                  <input class="form-control" type="text" name="id_goods" value="<?= $det_goods->id_goods ?>" hidden>
                  <input class="form-control" type="text" name="title_url" id="title_url" value="<?php $strShow = ucwords(str_replace("-"," ",$det_goods->name_category)); if($strShow == "T Shirt"){ $strShow = "T-Shirt";}echo $strShow?>" hidden>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <small class="text-primary font-weight-bold">Stock</small>
                    <div class="row">

                      <div class="form-group col-lg-2">
                        <label for="productName">S</label>
                        <input id="touchSpin1" type="text" value="<?= $det_goods->S ?>" class="form-control" name="sizeS" <?php if($det_goods->other != 0){ echo 'disabled="disabled"'; } ?>>
                      </div>
                      <div class="form-group col-lg-2">
                        <label for="productName">M</label>
                        <input id="touchSpin2" type="text" value="<?= $det_goods->M ?>" class="form-control" name="sizeM" <?php if($det_goods->other != 0){ echo 'disabled="disabled"'; } ?>>
                      </div>
                      <div class="form-group col-lg-2">
                        <label for="productName">L</label>
                        <input id="touchSpin3" type="text" value="<?= $det_goods->L ?>" class="form-control" name="sizeL" <?php if($det_goods->other != 0){ echo 'disabled="disabled"'; } ?>>
                      </div>
                      <div class="form-group col-lg-2">
                        <label for="productName">XL</label>
                        <input id="touchSpin4" type="text" value="<?= $det_goods->XL ?>" class="form-control" name="sizeXL" <?php if($det_goods->other != 0){ echo 'disabled="disabled"'; } ?>>
                      </div>
                    
                      <div class="form-group col-lg-2">
                        <label for="stockOther">Other</label>
                        <input id="touchSpin5" type="text" value="<?= $det_goods->other ?>" id="stockOther" class="form-control" name="stockOther" <?php if($det_goods->other == 0){ echo 'disabled="disabled"'; } ?>>
                      </div>
                    
                    </div>
                  </div>
                </div>
                <!-- <div class="row"> -->
                  <div class="col-lg-6">
                    <a href="<?php echo ''.base_url().'admin/product/'.$this->uri->segment(3).'/detail/'.$det_goods->id_goods.''; ?>"><button type="button" class="btn btn-block btn-secondary"> Back</button></a>
                  </div>
                  <div class="col-lg-6">
                    <input type="submit" name="submit" class="btn btn-aw btn-block btn-primary" value="Save">
                  </div>  
                <!-- </div> -->
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Images.</h6>
          </div>
          <div class="card-body">
          <div class="img-container">
        <?php 
          foreach ($image_goods as $data) {
              if ($data->status_images == 1) { ?>
              <div class="img-wrap">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#deleteImages" data-id="<?php echo $data->id_images; ?>" class="deleteImages">
              <?php } else { ?>
              <div class="img-wrap-disabled">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#activeImages" data-id="<?php echo $data->id_images; ?>" class="activeImages">
              <?php } ?>
                <button type="submit" class="close" aria-label="Close">
                <?php 
                if ($data->status_images == 1) { ?>
                  <span aria-hidden="true">&times;</span>
                <?php } else { ?>
                  <span aria-hidden="true">&radic;</span>
                <?php } ?>
                </button>
              </a>
            <img src="<?php echo base_url(); ?>uploads/goods/<?php echo $data->name_images; ?>">
            </div>
            <?php } ?>
            <div class="img-wrap">
              <a href="javascript:void(0);" data-toggle="modal" data-target="#addImages">
                <img src="<?php echo base_url(); ?>assets/admin/img/add.jpg" class="add">
              </a>
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

<div class="modal fade" id="deleteImages" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" role="form" id="form-goods" enctype="multipart/form-data" action="<?php echo base_url();?>admin/product/statusImage">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabelLogout">Upsss!</h5>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to hide this image?</p>
          <input class="form-control" type="text" name="id_goods" value="<?= $det_goods->id_goods ?>" hidden>
          <input class="form-control" type="text" name="status_images" value="1" hidden>
          <input class="form-control" type="text" name="id_images" id="id_imagesDelete" hidden>
          <input class="form-control" type="text" name="title_url" value="<?= $this->uri->segment(3)?>" hidden>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <input type="submit" name="submit" class="btn btn-primary" value="Hide Now!">
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="activeImages" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
  aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form method="post" role="form" id="form-goods" enctype="multipart/form-data" action="<?php echo base_url();?>admin/product/statusImage">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabelLogout">Yeay!</h5>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to show this image?</p>
          <input class="form-control" type="text" name="id_goods" value="<?= $det_goods->id_goods ?>" hidden>
          <input class="form-control" type="text" name="status_images" value="0" hidden>
          <input class="form-control" type="text" name="id_images" id="id_imagesActive" hidden>
          <input class="form-control" type="text" name="title_url" value="<?= $this->uri->segment(3) ?>" hidden>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <input type="submit" name="submit" class="btn btn-primary" value="Show, please!">
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="addImages" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
  aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelLogout">Upload images!</h5>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to show this image?</p>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a href="<?php echo base_url(); ?>" class="btn btn-primary">Upload.</a>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    function get_subCat(id_category)
    {
        $('#productSubCat').empty();

        $.getJSON('<?php echo base_url(); ?>admin/product/getSubCat/'+id_category, function(data){
          //console.log(data);
          
          if (data != ""){
            $.each(data, function(index, value){
              $('#productSubCat').append('<option value="'+value.id_subCategory+'">'+value.name_subCategory+'</option>');
            })
          } else {
            $('#productSubCat').append('<option value="0">-- Sub Cat --</option>');
          }
        })

        var conceptName = $('#id_category').find(":selected").text();
        document.getElementById("title_url").value = conceptName;

        if (id_category == 3)
        {
          $("#touchSpin5").prop( "disabled", false );
          $("#touchSpin1").prop( "disabled", true ).val(0);
          $("#touchSpin2").prop( "disabled", true ).val(0);
          $("#touchSpin3").prop( "disabled", true ).val(0);
          $("#touchSpin4").prop( "disabled", true ).val(0);
        } else if (id_category == 99) {
          $("#touchSpin5").prop( "disabled", false );
          $("#touchSpin1").prop( "disabled", false );
          $("#touchSpin2").prop( "disabled", false );
          $("#touchSpin3").prop( "disabled", false );
          $("#touchSpin4").prop( "disabled", false );
        } else {
          $("#touchSpin5").prop( "disabled", true ).val(0);
          $("#touchSpin1").prop( "disabled", false );
          $("#touchSpin2").prop( "disabled", false );
          $("#touchSpin3").prop( "disabled", false );
          $("#touchSpin4").prop( "disabled", false );
        }

    }
</script>