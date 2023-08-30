
const loaderHomePage = document.getElementsByClassName("fullpage-skleton-loader")[0];
document.addEventListener("readystatechange", (event) => {
    const readyState = "complete";
    if (document.readyState == readyState) {
        loaderHomePage.classList.add("fullpage-skleton-loader-invisible");

        setTimeout(() => {
            loaderHomePage.parentNode.removeChild(loaderHomePage);
        }, 100);
    }
});






function viewproduct(event, id) {


    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
            'Content-Type' : 'application/json'
        }
    })

    $.ajax({
        type : 'POST',
        url : '/product/view/summery',
        data : JSON.stringify({
            id : id ,
            _method : 'POST'
        }),

        beforeSend : function (){
            var temp = "<div class=\"row g-sm-4 g-2 loading\">\n" +
                "                        <div class=\"col-lg-6\">\n" +
                "                            <div class=\"slider-image imageLoading\" id=\"modal_product_image\">\n" +

                "                            </div>\n" +
                "                        </div>\n" +
                "                        <div class=\"col-lg-6\">\n" +
                "                            <div class=\"right-sidebar-modal\">\n" +
                "                                <h4 class=\"title-name\" id=\"modal_product_name\"></h4>\n" +
                "                                <h4 class=\"price\"  id=\"modal_product_price\"></h4>\n" +
                "                                <div class=\"product-rating\">\n" +
                "                                    <ul class=\"rating\">\n" +
                "                                        <li>\n" +
                "                                            <i data-feather=\"star\" class=\"fill\"></i>\n" +
                "                                        </li>\n" +
                "                                        <li>\n" +
                "                                            <i data-feather=\"star\" class=\"fill\"></i>\n" +
                "                                        </li>\n" +
                "                                        <li>\n" +
                "                                            <i data-feather=\"star\" class=\"fill\"></i>\n" +
                "                                        </li>\n" +
                "                                        <li>\n" +
                "                                            <i data-feather=\"star\" class=\"fill\"></i>\n" +
                "                                        </li>\n" +
                "                                        <li>\n" +
                "                                            <i data-feather=\"star\"></i>\n" +
                "                                        </li>\n" +
                "                                    </ul>\n" +
                "                                    <span class=\"ms-2\">8 Reviews</span>\n" +
                "                                    <span class=\"ms-2 text-danger\">6 sold in last 16 hours</span>\n" +
                "                                </div>\n" +
                "\n" +
                "                                <div class=\"product-detail\" id=\"modal_product_detail\">\n" +
                "                                    <h4></h4>\n" +
                "                                    <p class=\"\"></p>\n" +
                "                                </div>\n" +
                "\n" +
                "                                <ul class=\"brand-list\" id=\"modal_attribute_list\">\n" +
                "                                </ul>\n" +
                "\n" +
                "                                <div class=\"modal-button\">\n" +
                "                                    <a id=\"modal_product_link\" " +
                "                                            class=\"btn theme-bg-color view-button icon text-white fw-bold btn-md\">\n" +
                "                                        مشاهده محصول</a>\n" +
                "                                </div>\n" +
                "                            </div>\n" +
                "                        </div>\n" +
                "                    </div>";
            document.getElementById('modal-body-view').innerHTML = temp;
        },
        success : function(res) {
          setTimeout(function (){
              const formatter = new Intl.NumberFormat('fa-IR');
              document.getElementById('modal_product_name').parentElement.parentElement.parentElement.classList.remove('loading')
              document.getElementById('modal_product_name').innerText =res.product.name
              document.getElementById('modal_product_price').innerText =formatter.format(res.product.price)+ ' تومان'
              document.getElementById('modal_product_detail').firstElementChild.innerHTML = 'مشخصات محصول'
              document.getElementById('modal_product_detail').firstElementChild.nextElementSibling.innerHTML = res.product.abstract
              document.getElementById('modal_product_link').href=window.location.origin + "/products/" +
                  res.product.id

              var img=document.createElement('img')

              img.src=res.image
              img.classList.add('img-fluid')
              img.classList.add('blur-up')
              img.classList.add('lazyload')
              img.alt= 'عکس محصول ' + res.product.name

              document.getElementById('modal_product_image').appendChild(img)
              var modal_attribute_list=document.getElementById('modal_attribute_list');

              for (const [key, value] of Object.entries(res.attribute)) {
                  var li=document.createElement('li');
                  var div=document.createElement('div');
                  div.classList.add('brand-box')
                  var h5=document.createElement('h5');
                  h5.innerText=key + " : ";
                  var h6=document.createElement('h6');
                  h6.innerText=value[0];

                  for(var i=1;i< value.length;i++){
                      h6.innerText=h6.innerText + " , " + value[i];

                  }
                  div.appendChild(h5)
                  div.appendChild(h6)
                  li.appendChild(div)
                  modal_attribute_list.appendChild(li)



              }



          },1000)


        }
    });
}

var page = 1;
var canSendAjax=true;
// var site_url = "{{ url('/') }}";
function load_more(page){
    $.ajax({
        url:"/search?page=" + page,
        type: "get",
        datatype: "html",
        beforeSend: function()
        {
            if(canSendAjax){
                for (var i=0;i<5;i++){
                    var product='<div class="beforsend">\n' +
                        '                            <div class="product-box-3 h-100 wow fadeInUp loading">\n' +
                        '                                <div class="product-header">\n' +
                        '                                    <div class="product-image">\n' +
                        '                                        <a href="product-left-thumbnail.html">\n' +
                        '                                            <div class="imageLoading"\n' +
                        '                                                class="img-fluid blur-up lazyload" alt="">\n' +
                        '                                        </a>\n' +
                        '\n' +
                        '                                        <ul class="product-option">\n' +
                        '                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">\n' +
                        '                                                <a href="javascript:void(0)" data-bs-toggle="modal"\n' +
                        '                                                    data-bs-target="#view">\n' +
                        '                                                    <i data-feather="eye"></i>\n' +
                        '                                                </a>\n' +
                        '                                            </li>\n' +
                        '\n' +
                        '                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">\n' +
                        '                                                <a href="compare.html">\n' +
                        '                                                    <i data-feather="refresh-cw"></i>\n' +
                        '                                                </a>\n' +
                        '                                            </li>\n' +
                        '\n' +
                        '                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">\n' +
                        '                                                <a href="wishlist.html" class="notifi-wishlist">\n' +
                        '                                                    <i data-feather="heart"></i>\n' +
                        '                                                </a>\n' +
                        '                                            </li>\n' +
                        '                                        </ul>\n' +
                        '                                    </div>\n' +
                        '                                </div>\n' +
                        '                                <div class="product-footer">\n' +
                        '                                    <div class="product-detail">\n' +
                        '                                        <span class="span-name"></span>\n' +
                        '                                        <a href="product-left-thumbnail.html">\n' +
                        '                                            <h5 class="name"></h5>\n' +
                        '                                        </a>\n' +
                        '                                        <p class="text-content mt-1 mb-2 product-content"></p>\n' +
                        '                                        <div class="product-rating mt-2">\n' +
                        '                                            <span></span>\n' +
                        '                                        </div>\n' +
                        '                                        <h6 class="unit"></h6>\n' +
                        '                                        <h5 class="price"><span class="theme-color"></span> <del></del>\n' +
                        '                                        </h5>\n' +
                        '                                        <div class="add-to-cart-box bg-white">\n' +
                        '                                            <button class="btn btn-add-cart addcart-button">\n' +
                        '                                                <span class="add-icon bg-light-gray">\n' +
                        '                                                    <i class="fa-solid fa-plus"></i>\n' +
                        '                                                </span>\n' +
                        '                                            </button>\n' +
                        '                                            <div class="cart_qty qty-box">\n' +
                        '                                                <div class="input-group bg-white">\n' +
                        '                                                    <button type="button" class="qty-left-minus bg-gray"\n' +
                        '                                                        data-type="minus" data-field="">\n' +
                        '                                                        <i class="fa fa-minus" aria-hidden="true"></i>\n' +
                        '                                                    </button>\n' +
                        '                                                    <input class="form-control input-number qty-input" type="text"\n' +
                        '                                                        name="quantity" value="0">\n' +
                        '                                                    <button type="button" class="qty-right-plus bg-gray"\n' +
                        '                                                        data-type="plus" data-field="">\n' +
                        '                                                        <i class="fa fa-plus" aria-hidden="true"></i>\n' +
                        '                                                    </button>\n' +
                        '                                                </div>\n' +
                        '                                            </div>\n' +
                        '                                        </div>\n' +
                        '                                    </div>\n' +
                        '                                </div>\n' +
                        '                            </div>\n' +
                        '                        </div>';
                    $('#product_list').append(product);
                }
            }
            // $('.ajax-loading').show();
        }
    })
        .done(function(data)
        {
            const formatter = new Intl.NumberFormat('fa-IR', {
            });
            const boxes = document.querySelectorAll('.beforsend');
            boxes.forEach(box => {
                box.remove();
            });
            if(data.length == 0){
                // $('.ajax-loading').html("No more records!");
                canSendAjax=false;
                return;
            }
            var rate = ''
            data.forEach(function (item){
                if (Number(item['product'].countRate) != 0){
                    rate = '('+Number(item['product'].sumRate) / Number(item['product'].countRate)+')';
                }
                else {
                    rate = '<br>'
                }
                var offer = ''
                if(item['product'].offer){
                    offer =

                        '                                                    <span class="theme-color price">'+formatter.format(item['product'].price - (item['product'].price*item['product'].offer/100))+'\n' +
                        '                                            <object data="/Client/assets/svg/toman.svg" width="20" height="20"> </object>\n' +
                        '                                        </span>\n' +
                        '                                                    <br>\n' +
                        '                                                    <del class="">'+formatter.format(item['product'].price)+'\n' +
                        '                                                    </del>\n'
                }
                else {
                    offer =
                        '                                                    <span class="theme-color price fa-num">'+formatter.format(item['product'].price)+'\n' +
                        '                                                <object data="/Client/assets/svg/toman.svg" width="20" height="20"> </object>\n' +
                        '                                                <br>\n' +
                        '                                                <del></del>\n' +
                        '                                            </span>\n'
                }
                var wl = ''
                if (item['inWishlist']){
                    wl =
                        '<a href="javascript:;" class="notifi-wishlist"   onclick="deleteWishlistShop(event,\''+item['product'].id+'\')" >\n' +
                        ' <i class="fa text-danger  fa-heart" aria-hidden="true"></i>\n' +
                        ' </a>\n'
                }
                else{
                    wl =
                        ' <a href="javascript:;" class="notifi-wishlist"   onclick="addWishlistShop(event,\''+item['product'].id+'\')" >\n' +
                        ' <i class="fa text-danger  fa-heart-o" aria-hidden="true"></i>\n' +
                        ' </a>\n'
                }
                var product='<div>\n' +
                    '                                <div class="product-box-3 h-100 wow fadeInUp">\n' +
                    '                                    <div class="product-header">\n' +
                    '                                        <div class="product-image">\n' +
                    '                                            <a href="/poducts/'+item['product'].id+'l">\n' +
                    '                                                <img src="'+item['product'].image+'"\n' +
                    '                                                     class="img-fluid blur-up lazyload" alt="">\n' +
                    '                                            </a>\n' +
                    '                                            <ul class="product-option">\n' +
                    '                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="مشاهده">\n' +
                    '                                                    <a href="javascript:;" onclick="viewproduct(event,'+item['product'].id+')" data-bs-toggle="modal" data-bs-target="#view">\n' +
                    '                                                        <i class="fa fa-eye"></i>\n' +
                    '                                                    </a>\n' +
                    '                                                </li>\n' +
                    '                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">\n' +
                    '                                                    <a href="compare.html">\n' +
                    '                                                        <i class="fa fa-refresh"></i>\n' +
                    '                                                    </a>\n' +
                    '                                                </li>\n' +
                    '                                                <li >\n' + wl +
                    '                                                </li>\n' +
                    '                                            </ul>\n' +
                    '                                        </div>\n' +
                    '                                    </div>\n' +
                    '                                    <div class="product-footer">\n' +
                    '                                        <div class="product-detail">\n' +
                    '                                            <a href="products/'+item['product'].id+'">\n' +
                    '                                                <h5 class="name">'+item['product'].name+'</h5>\n' +
                    '                                            </a>\n' +
                    '                                            <p class="text-content mt-1 mb-2 product-content">'+item['product'].abstract+'</p>\n' +
                    '                                            <div class="product-rating mt-2">\n' +
                    '                                                <span>'+rate+'</span>\n' +
                    '                                            </div>\n' +
                    '                                            <h5 class="price">\n' + offer +
                    '                                            </h5>\n' +
                    '                                            <div class="add-to-cart-box bg-white">\n' +
                    '                                                <button class="btn btn-add-cart addcart-button" onclick="addCartlistShop(event,'+item['product'].id+',1,true)">افزودن\n' +
                    '                                                    <span class="add-icon bg-light-orange">\n' +
                    '                                                <i class="fa-solid fa-plus"></i>\n' +
                    '                                            </span>\n' +
                    '                                                </button>\n' +
                    '                                                <div class="cart_qty qty-box '+checkProductInCart(item['productInCart'])[0]+'">\n' +
                    '                                                    <div class="input-group bg-white">\n' +
                    '                                                        <button type="button" class="qty-left-minus" data-type="minus"\n' +
                    '                                                                data-field="" >\n' +
                    '                                                            <i class="fa fa-minus" aria-hidden="true"></i>\n' +
                    '                                                        </button>\n' +
                    '                                                        <input class="form-control input-number qty-input" readonly="readonly" type="text" min="1" max="'+item['product'].maxOrder+'"\n' +
                    '                                                               name="quantity" value="'+checkProductInCart(item['productInCart'])[1]+'" id="valueSingleProductFloating'+item['product'].id+'"  data-maxOrder="'+item['product'].maxOrder+'" '+checkProductInCart(item['productInCart'])[2]+' onchange="changeQuantityShop(event,\''+item['product'].id+'\')">\n' +
                    '                                                        <button type="button" class="qty-right-plus" data-type="plus"\n' +
                    '                                                                data-field="" >\n' +
                    '                                                            <i class="fa fa-plus" aria-hidden="true"></i>\n' +
                    '                                                        </button>\n' +
                    '                                                    </div>\n' +
                    '                                                </div>\n' +
                    '                                            </div>\n' +
                    '                                        </div>\n' +
                    '                                    </div>\n' +
                    '                                </div>\n' +
                    '                            </div>';
                $('#product_list').append(product);


            })

        })
        .fail(function(jqXHR, ajaxOptions, thrownError)
        {
            // alert('No response from server');
        });
}
$(window).scroll(function() {
    var foot = $('footer').css('height').replace('px','')
    if($(window).scrollTop() + $(window).height() > $(document).height() - foot) {
        // ajax call get data from server and append to the div
        // for(let i=0;i<1;i++)
        //             $('#product_list').append(product);
        page++;
        load_more(page);
    }
});

function checkProductInCart(item){
    if(item.length === 0 ){
        return ['',1,'']
    }
    else {
        return ['open',item.quantity,'data-cart="'+item.id+'"']
    }
}

