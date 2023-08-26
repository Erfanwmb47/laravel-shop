

//in product shop

function addWishlistShop(event, id) {
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
        url : '/wishlist/add/',
        data : JSON.stringify({
            id : id ,
            // cart : cartName,
            _method : 'post'
        }),
        success : function(res) {
            event.target.classList.remove('fa-heart-o');
            event.target.classList.add('fa-heart');
            // $(event.target).closest('a').on('click',deleteWishlistShop(event,id))
            $(event.target).closest('a').attr('onclick','deleteWishlistShop(event,'+id+')');
        }
    });
}

function deleteWishlistShop(event, id) {

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
        url : '/wishlist/destroy/',
        data : JSON.stringify({
            id : id ,
            // cart : cartName,
            _method : 'delete'
        }),
        success : function(res) {
            event.target.classList.remove('fa-heart');
            event.target.classList.add('fa-heart-o');
            // $(event.target).closest('a').on('click',addWishlistShop(event,id))
            $(event.target).closest('a').attr('onclick','addWishlistShop(event,'+id+')');

            // if(document.getElementById('WishlistDiv').childElementCount == 0){
            //     document.getElementById('WishlistDiv').innerHTML = "<div  id=\"wishlistEmpty\">\n" +
            //         "                                <p class=\"text-center\"><i class=\"emptyWishlist w-full\"></i><br>لیست علاقه مندی  شما خالی است</p>\n" +
            //         "                            </div>";
            // }



            // location.reload();
        }
    });
}

// in single product page
function addWishlistSingle(event, id) {
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
        url : '/wishlist/add/',
        data : JSON.stringify({
            id : id ,
            // cart : cartName,
            _method : 'post'
        }),
        success : function(res) {
            document.getElementById('wishlistSingleProduct').firstElementChild.firstElementChild.classList.remove('fa-heart-o');
            document.getElementById('wishlistSingleProduct').firstElementChild.firstElementChild.classList.add('fa-heart');
            document.querySelector('#wishlistSingleProduct a span').innerText = 'موجود در علاقه مندی' ;
            // $(event.target).closest('a').on('click',deleteWishlistShop(event,id))
            $('#wishlistSingleProduct').attr('onclick','deleteWishlistSingle(event,'+id+')');
        }
    });
}
function deleteWishlistSingle(event, id) {

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
        url : '/wishlist/destroy/',
        data : JSON.stringify({
            id : id ,
            // cart : cartName,
            _method : 'delete'
        }),
        success : function(res) {
            document.getElementById('wishlistSingleProduct').firstElementChild.firstElementChild.classList.remove('fa-heart');
            document.getElementById('wishlistSingleProduct').firstElementChild.firstElementChild.classList.add('fa-heart-o');
            document.querySelector('#wishlistSingleProduct a span').innerText = 'افزودن به علاقه مندی' ;

            $('#wishlistSingleProduct').attr('onclick','addWishlistSingle(event,'+id+')');

        }
    });
}
