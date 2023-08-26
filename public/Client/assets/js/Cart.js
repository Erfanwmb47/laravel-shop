
function changeQuantity(event, id = null , cartName = null) {
    //
    // if (id == null && $(event).)
    var x = $(this);
    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
            'Content-Type' : 'application/json'
        }
    })
    //
    $.ajax({
        type : 'POST',
        url : '/cart/quantity/change',
        data : JSON.stringify({
            id : id ,
            quantity : event.target.value,
            // cart : cartName,
            _method : 'patch'
        }),
        beforeSend:function (){
            $(".quantity-price"+id).hide();
            $("#loader"+id).show();
        },
        complete:function (){
            $(".quantity-price"+id).show();
            $("#loader"+id).hide();
        },
        success : function(res) {
             $("#summery-contain").load(" .summery-contain");
             $("#summery-total").load(" .summery-total");
            $(".subtotal"+id).load(" #subtotaldetail"+id);
            //TODO event listener baraye dokmee ha
            //  location.reload();


        }
    });
}
function changeQuantityCartNav(event, id , cartName = null) {
    //
    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
            'Content-Type' : 'application/json'
        }
    })


    //
    $.ajax({
        type : 'POST',
        url : '/cart/quantity/change',
        data : JSON.stringify({
            id : id ,
            quantity : event.target.value,
            // cart : cartName,
            _method : 'patch'
        }),
        success : function(res) {
            $("#cartChangeNav"+id);
            document.getElementById('cartChangeNav'+id).innerText =res.newPriceProduct + "تومان" ;
            document.getElementById('finalCostNav').innerText = res.totalPrice + " تومان" ;
            $("#finalCostNav").load(" #finalCostNav");
            //  location.reload();
        }
    });
}
function changeQuantityShop(event, id = null , cartName = null){

    var x = $(this);
    if(event.target.value <= 1){
        $(event.target).closest('div').find('button[class="qty-left-minus"]').children().removeClass('fa-minus').addClass('fa-trash');
    }
    else{
        $(event.target).closest('div').find('button[class="qty-left-minus"]').children().removeClass('fa-trash').addClass('fa-minus');
    }
    if(event.target.value <= 0){
        $(event.target).closest('div').find('button[class="qty-left-minus"]').on("click",deleteItemFromCartNav(event,$(event.target).attr('data-cart')));
    }
    else {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json'
            }
        })
        //
        $.ajax({
            type: 'POST',
            url: '/cart/quantity/change',
            data: JSON.stringify({
                id: $(event.target).attr('data-cart'),
                quantity: event.target.value,
                // cart : cartName,
                _method: 'patch'
            }),
            success: function (res) {
                document.getElementById('valueOf' +id).innerHTML = event.target.value;
                $("#finalCostNav").load(" #finalCostNav");
            }
        });
    }


}
// delete from Cart

function deleteItemFromCart(event, id , cartName = null) {
    //
    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
            'Content-Type' : 'application/json'
        }
    })


    //
    $.ajax({
        type : 'POST',
        url : '/cart/delete',
        data : JSON.stringify({
            id : id ,
            // quantity : event.target.value,
            // cart : cartName,
            _method : 'delete'
        }),
        success : function(res) {

        }
    });
}

function deleteItemFromCartNav(event, id , cartName = null) {
    //
    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
            'Content-Type' : 'application/json'
        }
    })


    //
    $.ajax({
        type : 'POST',
        url : '/cart/delete',
        data : JSON.stringify({
            id : id ,
            // quantity : event.target.value,
            // cart : cartName,
            _method : 'delete'
        }),
        success : function(res) {
            $('#cart'+id).fadeOut("slow", function () {
                $('#cart'+id).remove();
            });
            document.getElementById('finalCostNav').innerText = res.totalPrice + " تومان" ;

            document.getElementById('cartcounter1').innerHTML = Number(document.getElementById('cartcounter1').innerHTML)-1;
            if($('#cartBox li').length == 0){
                document.getElementById('cartBox').innerHTML = "<li id=\"cartEmpty\" class=\"emptyCart cart-list items-center \">\n" +
                    "                                                            سبد خرید شما خالی است\n" +
                    "                                                        </li>";
            }
            if($('[data-cart='+id+']')){
                $('[data-cart='+id+']').val(0);
                // $('[data-cart='+id+']').change();
                $('[data-cart='+id+']').closest('.cart_qty').removeClass('open');

            }

        }
    });
}

function addCartlistShop(event, id,quantity,plus = false) {
    //
    // console.log($(".product-box-contain").attr('data-productId'));

    if (quantity == null && document.getElementById('valueSingleProduct'+id)){
        quantity = document.getElementById('valueSingleProduct'+id).value;
    }
    if (quantity < 1 ){
        $(".cart-list li").each(function (item){
            // console.log($(this));
            if($(this).attr('data-productId') == id){
                cartId  = $(this).attr('id');
                deleteItemFromCartNav(event,cartId.replace(cartId.substring(0,4),''));
                $(this).closest(".product-box-contain").fadeOut("slow", function () {
                    $(this).closest(".product-box-contain").remove();
                });
            }
        });
    }
    else {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json'
            }
        })
        //
        $.ajax({
            type: 'POST',
            url: '/cart/add/',
            data: JSON.stringify({
                id: id,
                quantity: quantity,
                plus: plus,
                // cart : cartName,
                _method: 'post'
            }),
            success: function (res) {
                var k = '<li class="product-box-contain" id="cart' + res.cart_id + '">\n' +
                    '                                                            <div class="drop-cart">\n' +
                    '                                                                <a href="/product/' + res.id + '" class="drop-image">\n' +
                    '                                                                    <img src="' + res.image + '"\n' +
                    '                                                                         class="blur-up lazyload" alt="' + res.name + '">\n' +
                    '                                                                </a>\n' +
                    '\n' +
                    '                                                                <div class="drop-contain">\n' +
                    '                                                                    <a href="/product/' + res.id + '">\n' +
                    '                                                                        <h5>' + res.name + '</h5>\n' +
                    '                                                                    </a>\n' +
                    '                                                                    <h6 id="cartChangeNav' + res.cart_id + '"><span>\n' + '<span id="valueOf' + res.id + '">\n' + res.quantity + '</span>\n' + ' x</span>\n' + res.price + ' تومان </h6>\n' +
                    '                                                                    <button class="close-button close_button" onclick="deleteItemFromCartNav(event,'+"'"+ res.cart_id +"'"+ ')">\n' +
                    '                                                                        <i class="fa-solid fa-xmark"></i>\n' +
                    '                                                                    </button>\n' +
                    '                                                                </div>\n' +
                    '                                                            </div>\n' +
                    '                                                        </li>';
                // var children = document.getElementById('cartBox').childNodes;
                // let children = document.querySelectorAll('#cartBox li');
                // children.forEach(function(item){
                //     console.log(item.id);
                //     if ( item.id != 'cart'+res.cart_id ) {
                //         $('#cartBox').append(k);
                //         document.getElementById('cartcounter1').innerHTML = Number(document.getElementById('cartcounter1').innerHTML)+1;
                //         // document.getElementById('cartcounter2').innerHTML = Number(document.getElementById('cartcounter2').innerHTML)+1;
                //     }
                //     else {
                //         document.getElementById('valueOf'+res.id).innerHTML = res.quantity;
                //     }            });
                if (!document.getElementById('cart' + res.cart_id)) {
                    $('#cartBox').append(k);
                    document.getElementById('cartcounter1').innerHTML = Number(document.getElementById('cartcounter1').innerHTML) + 1;
                } else {
                    document.getElementById('valueOf' + res.id).innerHTML = res.quantity;
                }

                if (!!document.getElementById('cartEmpty')) document.getElementById('cartEmpty').remove();
                //TODO moshkel taghir quantity bad az ezafe kardan

                if(document.getElementById('valueSingleProductFloating'+res.id))
                    document.getElementById('valueSingleProductFloating'+res.id).setAttribute('data-cart',res.cart_id);

                $("#finalCostNav").load(" #finalCostNav");
            }
        });
    }
}
