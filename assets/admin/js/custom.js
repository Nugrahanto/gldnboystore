  $(document).ready(function () {
    $('#dataTable').DataTable(); // ID From dataTable 
    $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    $(".deleteImages").click(function () {
        $('#id_imagesDelete').val($(this).data('id'));
        $('#deleteImages').modal('show');
    });
    $(".activeImages").click(function () {
        $('#id_imagesActive').val($(this).data('id'));
        $('#activeImages').modal('show');
    });
    $(".toast").toast({
      delay: 2000
    });
    $('.toast').toast('show');
    $(".passingIDactive").click(function () {
      $('#id_active').val($(this).data('id'));
    });
    $(".passingIDnon").click(function () {
      $('#id_non').val($(this).data('id'));
    });
  });
  
  $('#touchSpin1').TouchSpin({
    min: 0,
    max: 99,
    initval: 0,
    boostat: 5,
    maxboostedstep: 10,
    verticalbuttons: true,
  });

  $('#touchSpin2').TouchSpin({
    min: 0,
    max: 99,
    initval: 0,
    boostat: 5,
    maxboostedstep: 10,
    verticalbuttons: true,
  });

  $('#touchSpin3').TouchSpin({
    min: 0,
    max: 99,
    initval: 0,
    boostat: 5,
    maxboostedstep: 10,
    verticalbuttons: true,
  });

  $('#touchSpin4').TouchSpin({
    min: 0,
    max: 99,
    initval: 0,
    boostat: 5,
    maxboostedstep: 10,
    verticalbuttons: true,
  });

  $('#touchSpin5').TouchSpin({
    min: 0,
    max: 99,
    initval: 0,
    boostat: 5,
    maxboostedstep: 10,
    verticalbuttons: true,
  });

  $('#simple-date1 .input-group.date').datepicker({
    format: 'dd-mm-yyyy',
    todayBtn: 'linked',
    todayHighlight: true,
    autoclose: true,        
  });