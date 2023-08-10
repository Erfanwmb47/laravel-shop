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
     if ($(this).prev().val() < 9) {
         $(this).prev().val(+$(this).prev().val() + 1);
         $(this).prev().attr('value', +$(this).prev().val());
      // exstra added by admin
         if ($(this).prev().hasClass('ProductQuantity')){
             $(".ProductQuantity").val(+$(this).prev().val())
             $(".ProductQuantity").attr('value', +$(this).prev().val())
         }
     }
     $(this).prev().change();
 });
