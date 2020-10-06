
function previewImage(input){
		var id = $(input).attr('data-id');
		if(input.files && input.files[0]){
			var reader = new FileReader();
			reader.onload = function(e){
				$("#preview_"+id).attr('src',e.target.result);
					$("#preview_"+id).parent().attr('href',e.target.result);
			};
			reader.readAsDataURL(input.files[0]);
		}
}









/**
 * selectpicker,data-table,datepicker
 */

$(function () {
    "use strict";





    /**
     * Bootstrap select picker
     */
    $('.selectpicker').selectpicker();



    /*Data Table*/
    $('.data-table').DataTable({});

    //Default datepicker example
    $('.datepicker').datepicker({
    format: "yyyy/mm/dd",
        weekStart: 1,
        todayBtn: "linked",
        todayHighlight: true
});

    $('.summernote').summernote();





    //MAGNIFIC POPUP GALLERY
    $('.gallery-wrap').magnificPopup({
        delegate: 'a',
        type: 'image',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1]
        },
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-with-zoom',
        zoom: {
            enabled: true,
            duration: 300
        }
    });

});




/**
 *
 * @type {string}
 */
const site_url = "http://localhost/edeck/";

$('body').on('change', "#brandStatus", function () {
    var id = $(this).attr('data-id');
    if (this.checked) {
        var status = 'active';
    } else {
        status = 'inactive';
    }
    $('.loader__').show();
    $.ajax({
        url: "brands/update-status/" + id + '/' + status,
        method: 'get',
        success: function (result) {
            $('.loader__').hide();
        }
    });

});



//hot deals
$('body').on('change', "#hotDeals", function () {
    var id = $(this).attr('data-id');
    if (this.checked) {
        var hot_deals = 1;
    } else {
        hot_deals = 0;
    }
    $('.loader__').show();
    $.ajax({
        url: site_url+"products/hot-deals/" + id + '/' + hot_deals,
        method: 'get',
        success: function (result) {
            $('.loader__').hide();
        }
    });

});




//f_products
$('body').on('change', "#fProducts", function () {
    var id = $(this).attr('data-id');
    if (this.checked) {
        var f_products = 1;
    } else {
        f_products = 0;
    }
    $('.loader__').show();
    $.ajax({
        url: site_url+"products/f_products/" + id + '/' + f_products,
        method: 'get',
        success: function (result) {
            $('.loader__').hide();
        }
    });

});




/**
 * Top Brand Status
 */

$('body').on('change', "#topbrandStatus", function () {
    var id = $(this).attr('data-id');
    if (this.checked) {
        var top_brand = 'active';
    } else {
        top_brand = 'inactive';
    }
    $('.loader__').show();
    $.ajax({
        url: "brands/update-top-brand/" + id + '/' + top_brand,
        method: 'get',
        success: function (result) {
            $('.loader__').hide();
        }
    });

});


/**
 * categorystatus
 */
$('body').on('change', "#categoryStatus", function () {
    var id = $(this).attr('data-id');
    if (this.checked) {
        var status = 'active';
    } else {
        status = 'inactive';
    }
    $('.loader__').show();
    $.ajax({
        url: "categories/update-status/" + id + '/' + status,
        method: 'get',
        success: function (result) {
            $('.loader__').hide();
        }
    });

});





/**
 *
 * @type {string}
 */
$('body').on('change', "#subCategoryStatus", function () {
    var id = $(this).attr('data-id');
    if (this.checked) {
        var status = 'active';
    } else {
        status = 'inactive';
    }
    $('.loader__').show();
    $.ajax({
        url: "subcategories/update-status/" + id + '/' + status,
        method: 'get',
        success: function (result) {
            $('.loader__').hide();
        }
    });
});




/**
 *PRODUCT REVIEW STATUS
 */

$('body').on('change', "#reviewStatus", function () {
    var id = $(this).attr('data-id');
    if (this.checked) {
        var status = 'visible';
    } else {
        status = 'hidden';
    }
    $('.loader__').show();
    $.ajax({
        url: site_url+"review/review-status/" + id + '/' + status,
        method: 'get',
        success: function (result) {
            $('.loader__').hide();
        }
    });

});



/**
 * sliderStatus
 */
$('body').on('change', "#sliderStatus", function () {
    var id = $(this).attr('data-id');
    if (this.checked) {
        var status = 'active';
    } else {
        status = 'inactive';
    }
    $('.loader__').show();
    $.ajax({
        url: "sliders/update-status/" + id + '/' + status,
        method: 'get',
        success: function (result) {
            $('.loader__').hide();
        }
    });
});




/**
 * productStatus
 */
$('body').on('change', "#productStatus", function () {
    var id = $(this).attr('data-id');
    if (this.checked) {
        var status = 'active';
    } else {
        status = 'inactive';
    }
    $('.loader__').show();
    $.ajax({
        url: site_url+"products/update-status/" + id + '/' + status,
        method: 'get',
        success: function (result) {
            $('.loader__').hide();
        }
    });
});


/**
 * AfterSliderStatus
 */
$('body').on('change', "#AfterSliderStatus", function () {
    var id = $(this).attr('data-id');
    if (this.checked) {
        var status = 'active';
    } else {
        status = 'inactive';
    }
    $('.loader__').show();
    $.ajax({
        url: "aftersliders/update-status/" + id + '/' + status,
        method: 'get',
        success: function (result) {
            $('.loader__').hide();
        }
    });
});





/*
warranty show hide
 */
$('body').on('change', 'input[name="warranty"]', function () {
    var n = $(this).val();

  if (n==1){
     $('.warranty_box').slideDown();
  }else {
      $('.warranty_box').slideUp();
  }

});




/*
Profile Create Sectionm
 */
$('body').on('change', 'input[name="create"]', function () {
    var n = $(this).val();

    if (n==1){
        $('.create_section').slideDown();
    }else {
        $('.create_section').slideUp();
    }

});





/*
sub category filtering
 */
$('body').on('change', "#cat_id", function () {
    var id = $(this).val();
    if (id !== '') {
        $('.loader__').show();
        $.ajax({
            url: "find-categories/" + id,
            method: 'get',
            success: function (result) {
                $("#subcat_id").html(result);
                $('.loader__').hide();
            }
        });
    }
});




/*
buying_price
 */
$('body').on('change', ".buying_price", function () {
    var price = $(this).val();
    var id = $(this).attr('data-id');

    $('.loader__').show();
        $.ajax({
            url: "products/updateBuyingPrice/" + id + '/' +price,
            method: 'get',
            success: function (result) {

                $('.loader__').hide();
            }
        });
});






/*
selling_price
 */

$('body').on('change', ".selling_price", function () {
    var price = $(this).val();
    var id = $(this).attr('data-id');

    $('.loader__').show();
    $.ajax({
        data:{ id: id, price: price },
        url: "products/update-selling-Price" ,
        method: 'post',
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
        },
        success: function (result) {
            $('.loader__').hide();
        }
    });
});





/*
special_price
 */

$('body').on('change', ".special_price", function () {
    var price = $(this).val();
    var id = $(this).attr('data-id');

    $('.loader__').show();
    $.ajax({
        data:{ id: id, price: price },
        url: "products/update-special-Price" ,
        method: 'post',
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
        },
        success: function (result) {
            $('.loader__').hide();
        }
    });
});







/**
 * fileClick
 */
$('body').on('click', ".fileClick", function () {

	var id = $(this).attr('data-id');
	$('#' + id).click();
});




/**
 *
 * edit order section
 */
$('body').on('click', "#editOrder", function () {

	let id = $(this).data('id');
	let order = $(this).data('order-status');
	let payment = $(this).data('payment-status');
    //console.log(id);
    //console.log(order);
    //console.log(payment);

    $("#order_id").val(id);
    $("#viewOrderStatus").val(order);
    $("#viewPaymentStatus").val(payment);

});





/**
 *
 * view order change status
 */
 $('body').on('change', "#order_status", function () {
    let id = $(this).data('id');
    let status = $(this).val();
    //console.log(id);

    $('.loader__').show();
    $.ajax({
        data:{ id: id, status: status },
        url: site_url + "view/orders/update-status" ,
        method: 'post',
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
        },
        success: function (result) {
            $('.loader__').hide();
        }
    });
    $("#order_id").val(id);


});




 /**
 *
 * view Payment change status
 */
 $('body').on('change', "#PaymentViewStatus", function () {
    let id = $(this).data('id');
    let status = $(this).val();
    //console.log(id);

    $('.loader__').show();
    $.ajax({
        data:{ id: id, status: status },
        url: site_url + "view/payments/update-status" ,
        method: 'post',
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
        },
        success: function (result) {
            $('.loader__').hide();
        }
    });
    $("#order_id").val(id);


});



/*
shipping Charge change
*/

$('body').on('change', "#shipping_charge", function () {
    let id = $(this).data('id');
    let shipping_charge = $(this).val();


    $('.loader__').show();
    $.ajax({
        data:{ id: id, shipping_charge: shipping_charge },
        url: site_url + "shipping/shipping-charge" ,
        method: 'post',
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
        },
        success: function (result) {
            $('.loader__').hide();
        }
    });
    $("#order_id").val(id);
});




/**
 * multiple file
 */

function handleFileSelect(event) {
    //Check File API support
    if (window.File && window.FileList && window.FileReader) {

        var files = event.target.files; //FileList object
        var output = document.getElementById("result");

        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            //Only pics
            if (!file.type.match('image')) continue;

            var picReader = new FileReader();
            picReader.addEventListener("load", function (event) {
                var picFile = event.target;
                var div = document.createElement("div");
                div.innerHTML = "<img style='width: 100px; height: 90px; border: 1px solid #FF0000; margin: 5px; float: left;' src='" + picFile.result + "'" + "title='" + file.name + "'/>";
                output.insertBefore(div, null);
            });
            //Read the image
            picReader.readAsDataURL(file);
        }
    } else {
        console.log("Your browser does not support File API");
    }
}

document.getElementById('files').addEventListener('change', handleFileSelect, false);




/*
Profile Name
 */

$('body').on('change', ".name", function () {
    var name = $(this).val();
    var id = $(this).attr('data-id');

    $('.loader__').show();
    $.ajax({
        url: site_url+"profiles/change-profile-Name/" + id + '/' +name,
        method: 'get',
        success: function (result) {

            $('.loader__').hide();
        }
    });
});






