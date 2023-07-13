

//in product shop

function addWishlistShop(event, id,name,price,image) {
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
            var k = '<tr id="wishlist'+id+'">\n' +
                '                            <th scope="row">\n' +
                '                                <img src="'+image+'" class="w-50" alt="Cart" />\n' +
                '                            </th>\n' +
                '                            <td>\n' +
                '                                <h3>\n'+name+' </h3>\n' +
                '                                <span class="rate">'+price+' تومان </span>\n' +
                '                            </td>\n' +
                '                            <td>\n' +
                '                                <a class="common-btn" href="shop.html">\n' +
                '                                    سبد خرید\n' +
                '                                    <img src="/Client/assets/images/shape1.png" alt="Shape" />\n' +
                '                                    <img src="/Client/assets/images/shape2.png" alt="Shape" />\n' +
                '                                </a>\n' +
                '                            </td>\n' +
                '                            <td>\n' +
                '                                <a class="close" href="#" onclick="deleteWishlistShop(event,\''+id+'\',\''+name+'\',\''+price+'\',\''+image+'\')">\n' +
                '                                    <i class="bx bx-x"></i>\n' +
                '                                </a>\n' +
                '                            </td>\n' +
                '                        </tr>';
            $('#tbodyWishlist').append(k);
            //location.reload();
            document.getElementById('wishlistcounter1').innerHTML = Number(document.getElementById('wishlistcounter1').innerHTML)+1;
            document.getElementById('wishlistcounter2').innerHTML = Number(document.getElementById('wishlistcounter2').innerHTML)+1;
            let a = document.getElementById('wishlistButton'+id);
            let onck= a.getAttributeNode("onclick");
            a.removeAttributeNode(onck);
            a.setAttribute("onclick", "deleteWishlistShop(event,'"+id+"','"+name+"','"+price+"','"+image+"')");
            var boxIcon = a.childNodes[1];
            // var attr =  boxIcon.getAttributeNode("");
            // boxIcon.removeAttributeNode(attr);
            boxIcon.setAttribute("type", "solid");
            if (!! document.getElementById('wishlistEmpty')) document.getElementById('wishlistEmpty').remove();

        }
    });
}

function deleteWishlistShop(event, id,name,price,image) {

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

            var x = document.getElementById('wishlist'+id);
            x.remove();
            document.getElementById('wishlistcounter1').innerHTML = document.getElementById('wishlistcounter1').innerHTML-1;
            document.getElementById('wishlistcounter2').innerHTML = document.getElementById('wishlistcounter2').innerHTML-1;

            let a = document.getElementById('wishlistButton'+id);
            let onck= a.getAttributeNode("onclick");
            a.removeAttributeNode(onck);
            a.setAttribute("onclick", "addWishlistShop(event,'"+id+"','"+name+"','"+price+"','"+image+"')");
            var boxIcon = a.childNodes[1];
            var attr =  boxIcon.getAttributeNode("type");
            boxIcon.removeAttributeNode(attr);
            boxIcon.setAttribute("type", "regular");
            if($('#tbodyWishlist tr').length == 0){
                document.getElementById('tbodyWishlist').innerHTML = "<div class=\"cart-list items-center \" id=\"wishlistEmpty\">\n" +
                    "                                <p class=\"text-center\"><i class=\"emptyWishlist w-full\"></i><br>لیست علاقه مندی  شما خالی است</p>\n" +
                    "                            </div>";
            }



            // location.reload();
        }
    });
}








//
// function addWishlistSingleProduct(event, id,name,price,image) {
//     console.log(id);
//     //
//     $.ajaxSetup({
//         headers : {
//             'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
//             'Content-Type' : 'application/json'
//         }
//     })
//
//
//     //
//     $.ajax({
//         type : 'POST',
//         url : '/wishlist/add/',
//         data : JSON.stringify({
//             id : id ,
//             // cart : cartName,
//             _method : 'post'
//         }),
//         success : function(res) {
//             var k = '<tr id="wishlist'+id+'">\n' +
//                 '                            <th scope="row">\n' +
//                 '                                <img src="'+image+'" alt="Cart" />\n' +
//                 '                            </th>\n' +
//                 '                            <td>\n' +
//                 '                                <h3>\n'+name+' </h3>\n' +
//                 '                                <span class="rate">'+price+' تومان </span>\n' +
//                 '                            </td>\n' +
//                 '                            <td>\n' +
//                 '                                <a class="common-btn" href="shop.html">\n' +
//                 '                                    سبد خرید\n' +
//                 '                                    <img src="/Client/assets/images/shape1.png" alt="Shape" />\n' +
//                 '                                    <img src="/Client/assets/images/shape2.png" alt="Shape" />\n' +
//                 '                                </a>\n' +
//                 '                            </td>\n' +
//                 '                            <td>\n' +
//                 '                                <a class="close" href="#" onclick="deleteWishlist(event,\''+id+'\',\''+name+'\',\''+price+'\',\''+image+'\')">\n' +
//                 '                                    <i class="bx bx-x"></i>\n' +
//                 '                                </a>\n' +
//                 '                            </td>\n' +
//                 '                        </tr>';
//             $('#tbodyWishlist').append(k);
//              //location.reload();
//             document.getElementById('wishlistcounter1').innerHTML = Number(document.getElementById('wishlistcounter1').innerHTML)+1;
//             document.getElementById('wishlistcounter2').innerHTML = Number(document.getElementById('wishlistcounter2').innerHTML)+1;
//
//             var parentwishbutton = document.getElementById('wishlistButton'+id).parentNode;
//             console.log(parentwishbutton);
//             var wishbutton = document.getElementById('wishlistButton'+id);
//             var newWishButton = '<a class="wishlist-btn" onclick="deleteWishlist(event,\''+id+'\',\''+name+'\',\''+price+'\',\''+image+'\')"  href="#wishlistButton" id="wishlistButton'+id+'">\n' +
//                 '                                    <box-icon  type="solid" name="heart" color="red"></box-icon>\n' +
//                 '                                    موجود در لیست مورد علاقه مندی ها\n' +
//                 '                                </a>';
//             $(parentwishbutton).append(newWishButton);
//             wishbutton.remove();
//
//
//
//         }
//     });
// }
//
// function deleteWishlistSingleProduct(event, id,name,price,image) {
//
//     //
//     $.ajaxSetup({
//         headers : {
//             'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
//             'Content-Type' : 'application/json'
//         }
//     })
//
//
//     //
//     $.ajax({
//         type : 'POST',
//         url : '/wishlist/destroy/',
//         data : JSON.stringify({
//             id : id ,
//             // cart : cartName,
//             _method : 'delete'
//         }),
//         success : function(res) {
//
//             var x = document.getElementById('wishlist'+id);
//             console.log(x);
//             x.remove();
//             document.getElementById('wishlistcounter1').innerHTML = document.getElementById('wishlistcounter1').innerHTML-1;
//             document.getElementById('wishlistcounter2').innerHTML = document.getElementById('wishlistcounter2').innerHTML-1;
//
//             var parentwishbutton = document.getElementById('wishlistButton'+id).parentNode;
//             console.log(parentwishbutton);
//             var wishbutton = document.getElementById('wishlistButton'+id);
//
//             var newWishButton = '<a class="wishlist-btn" onclick="addWishlist(event,\''+id+'\',\''+name+'\',\''+price+'\',\''+image+'\')"  href="#wishlistButton" id="wishlistButton'+id+'">\n' +
//                 '                                    <box-icon   name="heart" color="red"></box-icon>\n' +
//                 '                                   افزودن به علاقه مندی ها\n' +
//                 '                                </a>';
//             $(parentwishbutton).append(newWishButton);
//             wishbutton.remove();
//
//             // location.reload();
//         }
//     });
// }
