$(document).ready(function () {
    var quantitiy=0;
    $('.quantity-right-plus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        // If is not undefined
        $('#quantity').val(quantity + 1);
        // Increment
    });

    $('.quantity-left-minus').click(function(e){
    // Stop acting like a button
    e.preventDefault();
    // Get the field name
    var quantity = parseInt($('#quantity').val());
    // If is not undefined
        // Increment
        if(quantity>1){
            $('#quantity').val(quantity - 1);
        }
    });

    $(".tb").click(function(){
        $(".tb").removeClass("tb-active");
        $(this).addClass("tb-active");
        current_fs = $(".active");
        next_fs = $(this).attr('id');
        next_fs = "#" + next_fs + "1";
        $("fieldset").removeClass("active");
        $(next_fs).addClass("active");
        
        current_fs.animate({}, {
            step: function() {
                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({
                    'display': 'block'
                });
            }
        });
    });
    
    $('#carousel-example').on('slide.bs.carousel', function (e) {
        /*
        CC 2.0 License Iatek LLC 2018 – Attribution required
        */
        var $e = $(e.relatedTarget);
        var idx = $e.index();
        var itemsPerSlide = 4;
        var totalItems = $('.carousel-item').length;
        console.log('totalitems:'+totalItems);
        console.log('e:'+e);
        console.log('idx:'+idx);
        
        if (idx >= totalItems-(itemsPerSlide-1)) {
        var it = itemsPerSlide - (totalItems - idx);
        for (var i=0; i<it; i++) {
        // append slides to end
        if (e.direction=="prev") {
        $('.carousel-item').eq(i).appendTo('.carousel-inner');
        }
        else {
        $(".carousel-item").eq(0).appendTo(".carousel-inner");
        }
        }
        }
        });
        
});

$('.carousel').carousel({
    interval: false,
});

$("#stock").change(function() {
    var id = $('#stock').val();
    if (id == 'S') {
        $("#stock_s").show();
        $("#stock_m").hide();
        $("#stock_l").hide();
        $("#stock_xl").hide();
    } else if (id == 'M') {
        $("#stock_s").hide();
        $("#stock_m").show();
        $("#stock_l").hide();
        $("#stock_xl").hide();
    } else if (id == 'L') {
        $("#stock_s").hide();
        $("#stock_m").hide();
        $("#stock_l").show();
        $("#stock_xl").hide();
    } else if (id == 'XL') {
        $("#stock_s").hide();
        $("#stock_m").hide();
        $("#stock_l").hide();
        $("#stock_xl").show();
    }

});