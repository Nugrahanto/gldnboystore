<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <?php 
    $alert = $this->session->userdata('alert');
    if ($alert) { ?>
    <div style="position: relative;z-index:1">
      <div style="position: absolute; top: 0; right: 0;">
        <div class="toast bg-<?php echo $alert ?>" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <strong class="mr-auto">Ouch.</strong>
          </div>
          <div class="toast-body text-white">
            Oh snap! Maybe you got a failure, check again.
          </div>
        </div>
      </div>
    </div>
  <?php $this->session->set_userdata('alert', ''); } ?>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"> Product</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item text-primary">Product</li>
      <li class="breadcrumb-item">New Product</li>
    </ol>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <!-- Form Basic -->
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Please, be careful.</h6>
        </div>
        <div class="card-body">
        <form method="post" role="form" id="form-goods" enctype="multipart/form-data" action="<?php echo base_url();?>admin/product/insert">
            <div class="row">
              <div class="form-group col-lg-8">
                <label for="productName">Product Name</label>
                <input type="text" class="form-control" id="productName" placeholder="Enter name" name="name_goods" required>
              </div>
              <div class="form-group col-lg-4">
                <label for="productPrice">Product Price</label>
                <input type="text" class="form-control" id="productPrice" placeholder="Enter price" name="price_goods" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-6 form-group">
                <div class="form-group">
                  <label for="customFile">Product Images</label>
                  <br>
                  <input type="file" id="customFile" name="gambar[]" multiple="multiple" required>
                </div>
                <div class="row">
                  <div class="form-group col-lg-6">
                    <label for="productCategory">Category</label>
                    <select class="form-control" onchange="get_subCat(this.value)" id="id_category" name="id_category" required>
                      <option value="" selected="true" disabled="disabled">-- Category --</option>
                      <?php 
                        if($category != null){
                          foreach ($category as $data) {
                            $str = ucwords(str_replace("-"," ",$data->name_category));
                            if($str == "T Shirt"){
                              $str = "T-Shirt";
                            }
                            echo '<option value="'.$data->id_category.'">'.$str.'</option>';
                          }
                        } else {
                          echo '<option value="" disabled="disabled">No Category Available</option>';
                        }
                      ?>
                    </select>
                    <input type="text" name="name_category" id="text_content" value="" hidden/>
                  </div>
                  <div class="form-group col-lg-6">
                    <label for="productSubCat">Sub Category</label>
                    <select class="form-control" id="productSubCat" name="id_subCat">
                      <option value="" selected="true" disabled="disabled">-- Sub Cat --</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="productPromo">Product Promo</label>
                  <select class="form-control" id="productPromo" name="id_promo" required>
                    <option value="" selected="true" disabled="disabled">-- Promo --</option>
                    <?php 
                    if($promo != null){
                      foreach ($promo as $data) {
                        echo '<option value="'.$data->id_promo.'">'.$data->name_promo.' - '.$data->value_promo.'</option>';
                      }
                    } else {
                      echo '<option value="" disabled="disabled">No Promo Available</option>';
                    }
                    ?>
                  </select>
                </div>
                <div>
                  <label>Product Stock</label>
                </div>
                <div class="row">
                  <div class="form-group col-lg-2 regular">
                    <label for="stockS">S</label>
                    <input id="touchSpin1" type="text" id="stockS" class="form-control" name="sizeS">
                  </div>
                  <div class="form-group col-lg-2 regular">
                    <label for="stockM">M</label>
                    <input id="touchSpin2" type="text" id="stockM" class="form-control" name="sizeM">
                  </div>
                  <div class="form-group col-lg-2 regular">
                    <label for="stockL">L</label>
                    <input id="touchSpin3" type="text" id="stockL" class="form-control" name="sizeL">
                  </div>
                  <div class="form-group col-lg-2 regular">
                    <label for="stockXL">XL</label>
                    <input id="touchSpin4" type="text" id="stockXL" class="form-control" name="sizeXL">
                  </div>
                  <div class="form-group col-lg-2 other">
                    <label for="stockOther">Stock</label>
                    <input id="touchSpin5" type="text" id="stockOther" class="form-control" name="stockOther">
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <label for="productDesc">Product Desc</label>
                <textarea class="form-control" id="productDesc" rows="12" name="desc_goods" required></textarea>
              </div>
            </div>
            <div class="form-group">
              <input type="submit" name="submit" class="form-control btn btn-primary" value="SUBMIT">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12 text-center">
      <p>Do you like this template ? you can download from <a href="https://github.com/indrijunanda/RuangAdmin"
          class="btn btn-primary btn-sm" target="_blank"><i class="fab fa-fw fa-github"></i>&nbsp;GitHub</a></p>
    </div>
  </div>
</div>

<script type="text/javascript">
    function get_subCat(id_category)
    {
        $('#productSubCat').empty();

        $.getJSON('<?php echo base_url(); ?>admin/product/getSubCat/'+id_category, function(data){
          console.log(data);
          
          if (data != ""){
            $.each(data, function(index, value){
              $('#productSubCat').append('<option value="'+value.id_subCategory+'">'+value.name_subCategory+'</option>');
            })
          } else {
            $('#productSubCat').append('<option value="0">-- Sub Cat --</option>');
          }
        })

        var conceptName = $('#id_category').find(":selected").text();
        document.getElementById("text_content").value = conceptName;

        if ( id_category == 3)
        {
          $(".other").show();
          $(".regular").hide();
        } else if ( id_category == 99) {
          $(".other").show();
          $(".regular").show();
        } else {
          $(".other").hide();
          $(".regular").show();
        }

    }
</script>