
function changeQuantity(event, id , cartName = null) {
    //
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
    console.log('hi');
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
            // var x = event.target.parentNode.parentNode.parentNode;
            // $(x).fadeOut();
            // // console.log(x);
            // x.remove();
            $(this).closest(".product-box-contain").fadeOut("slow", function () {
                $(this).closest(".product-box-contain").remove();
            });
            document.getElementById('finalCostNav').innerText = res.totalPrice + " تومان" ;

            document.getElementById('cartcounter1').innerHTML = Number(document.getElementById('cartcounter1').innerHTML)-1;
            if($('#cartBox li').length == 0){
                document.getElementById('cartBox').innerHTML = "<li id=\"cartEmpty\" class=\"emptyCart cart-list items-center \">\n" +
                    "                                                            سبد خرید شما خالی است\n" +
                    "                                                        </li>";
            }
        }
    });
}

function addCartlistShop(event, id,quantity,plus = false) {
    //
    if (quantity == null && document.getElementById('valueSingleProduct'+id)){
        quantity = document.getElementById('valueSingleProduct'+id).value;
    }
    else if(quantity == null && document.getElementById('valueSingleProductFloating'+id)){
        quantity = Number(document.getElementById('valueSingleProductFloating'+id).value)+1;
        console.log(quantity);
    }
    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
            'Content-Type' : 'application/json'
        }
    })


    //
    $.ajax({
        type : 'POST',
        url : '/cart/add/',
        data : JSON.stringify({
            id : id ,
            quantity : quantity,
            plus:plus,
            // cart : cartName,
            _method : 'post'
        }),
        success : function(res) {
            var k = '<li class="product-box-contain">\n' +
                '                                                            <div class="drop-cart">\n' +
                '                                                                <a href="/product/'+res.id+'" class="drop-image">\n' +
                '                                                                    <img src="'+res.image+'"\n' +
                '                                                                         class="blur-up lazyload" alt="'+res.name+'">\n' +
                '                                                                </a>\n' +
                '\n' +
                '                                                                <div class="drop-contain">\n' +
                '                                                                    <a href="/product/'+res.id+'">\n' +
                '                                                                        <h5>'+res.name+'</h5>\n' +
                '                                                                    </a>\n' +
                '                                                                    <h6 id="cartChangeNav'+res.cart_id+'"><span>\n'+res.quantity+' x</span>\n'+res.price+' تومان </h6>\n' +
                '                                                                    <button class="close-button close_button">\n' +
                '                                                                        <i class="fa-solid fa-xmark"></i>\n' +
                '                                                                    </button>\n' +
                '                                                                </div>\n' +
                '                                                            </div>\n' +
                '                                                        </li>'
            // var k = '<tr id="cart'+id+'">\n' +
            //     '                            <th scope="row">\n' +
            //     '                                <img src="'+res.image+'" class="w-50" alt="Cart" />\n' +
            //     '                            </th>\n' +
            //     '                            <td>\n' +
            //     '                                <h3>\n'+res.name+' </h3>\n' +
            //     '                                <span class="rate" id="cartChangeNav'+res.cart_id+'">'+(res.price * res.quantity)+' تومان </span>\n' +
            //     '                            </td>\n' +
            //     '                            <td>\n' +
            //     '                                <ul class="number">\n'+
            //     '<li>\n'+
            //     '<span class="minus">-</span>\n'+
            //     '<input type="text" onchange="changeQuantityCartNav(event,\''+res.cart_id+'\')\" value=\"'+res.quantity+'\" data-maxOrder=\"'+res.maxOrder+'\" data-id=\"'+res.cart_id+'\" />\n'+
            //     '<span class="plus">+</span>\n'+
            //     ' </li>\n'+
            //     '</ul>\n' +
            //     '                            </td>\n' +
            //     '                            <td>\n' +
            //     '                                <a class="close" href="#" onclick="deleteItemFromCartNav(event,\''+res.cart_id+'\')">\n' +
            //     '                                    <i class="bx bx-x"></i>\n' +
            //     '                                </a>\n' +
            //     '                            </td>\n' +
            //     '                        </tr>';

            if ( ! document.getElementById('cart'+res.cart_id)) {
                $('#cartBox').append(k);
                document.getElementById('cartcounter1').innerHTML = Number(document.getElementById('cartcounter1').innerHTML)+1;
                // document.getElementById('cartcounter2').innerHTML = Number(document.getElementById('cartcounter2').innerHTML)+1;
            }
            else {
                console.log(document.getElementById('valueOf'+id));
                console.log(res.quantity);
                document.getElementById('valueOf'+res.id).innerHTML = res.quantity;
            }

            if (!! document.getElementById('cartEmpty')) document.getElementById('cartEmpty').remove();
            //TODO moshkel taghir quantity bad az ezafe kardan

            $("#finalCostNav").load(" #finalCostNav");
        }
    });
}
