 /**=====================
     Quantity 2 js
==========================**/
 $(".addcart-button").click(function () {
     $(this).next().addClass("open");
     // $(".add-to-cart-box .qty-input").val('1');
     $(this).parent().children().find("input[type='text']:first").val(1);
 });

 $('.add-to-cart-box').on('click', function () {
     var $qty = $(this).siblings(".qty-input");
     var currentVal = parseInt($qty.val());
     if (!isNaN(currentVal)) {
         $qty.val(currentVal + 1);
     }
 });

 $('.qty-left-minus').on('click', function () {
     var $qty = $(this).siblings(".qty-input");
     var _val = $($qty).val();
     if (_val == '1') {
         var _removeCls = $(this).parents('.cart_qty');
         $(_removeCls).removeClass("open");
     }
     var currentVal = parseInt($qty.val());
     if (!isNaN(currentVal) && currentVal > 0) {
         $qty.val(currentVal - 1);
         $qty.attr('value', currentVal - 1)
        // exstra added by admin
         if ($(this).siblings(".qty-input").hasClass('ProductQuantity')){
             $(".ProductQuantity").val(currentVal - 1);
             $(".ProductQuantity").attr('value', currentVal - 1)
         }
     }
     $(this).next().change();

 });

 $('.qty-right-plus').click(function () {
     if (Number($(this).prev().val()) < Number($(this).prev().attr('data-maxOrder'))) {
         $(this).prev().val(+$(this).prev().val() + 1);
         $(this).prev().attr('value', +$(this).prev().val());
      // exstra added by admin
         if ($(this).prev().hasClass('ProductQuantity')){
             $(".ProductQuantity").val(+$(this).prev().val())
             $(".ProductQuantity").attr('value', +$(this).prev().val())
         }
     }
     else {
         var title = 'دیگه بیشتر نمیشه '
         var massage = 'سقف سفارش این محصول بیشتر از این نیست'
         $.notify({
             icon: "fa fa-check",
             title: title,
             message: massage,
         }, {
             element: "body",
             position: null,
             type: "warning",
             allow_dismiss: true,
             newest_on_top: false,
             showProgressbar: true,
             placement: {
                 from: "top",
                 align: "right",
             },
             offset: 20,
             spacing: 10,
             z_index: 1031,
             delay: 5000,
             animate: {
                 enter: "animated fadeInDown",
                 exit: "animated fadeOutUp",
             },
             icon_type: "class",
             template: '<div data-notify="container" class="col-xxl-3 col-lg-5 col-md-6 col-sm-7 col-12 alert alert-{0}" role="alert">' +
                 '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                 '<span data-notify="icon"></span> ' +
                 '<span  data-notify="title">{1}</span> ' +
                 '<span data-notify="message" class="text-black-50">{2}</span>' +
                 '<div class="progress" data-notify="progressbar">' +
                 '<div class="progress-bar progress-bar-info progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                 "</div>" +
                 '<a href="{3}" target="{4}" data-notify="url"></a>' +
                 "</div>",
         });
     }

     $(this).prev().change();
 });
