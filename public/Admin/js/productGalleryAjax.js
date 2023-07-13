function addImageToProductGalleries(event, id,name,price,image) {
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
