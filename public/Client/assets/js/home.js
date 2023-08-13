
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
              const formatter = new Intl.NumberFormat('ar-EG');
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

// $('#xxx').on('scroll',function (res){
//    console.log('hi');
// });
// $(window).scroll(function(event) {
//     if($(window).scrollBottom() + $(window).height() > $(document).height() - 400) {
//         alert("near bottom!");
//     }
// });


var product='<div>\n' +
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
    '                                        <span class="span-name">Vegetable</span>\n' +
    '                                        <a href="product-left-thumbnail.html">\n' +
    '                                            <h5 class="name">Fresh Bread and Pastry Flour 200 g</h5>\n' +
    '                                        </a>\n' +
    '                                        <p class="text-content mt-1 mb-2 product-content">Cheesy feet cheesy grin brie.\n' +
    '                                            Mascarpone cheese and wine hard cheese the big cheese everyone loves smelly\n' +
    '                                            cheese macaroni cheese croque monsieur.</p>\n' +
    '                                        <div class="product-rating mt-2">\n' +
    '                                            <ul class="rating">\n' +
    '                                                <li>\n' +
    '                                                    <i data-feather="star" class="fill"></i>\n' +
    '                                                </li>\n' +
    '                                                <li>\n' +
    '                                                    <i data-feather="star" class="fill"></i>\n' +
    '                                                </li>\n' +
    '                                                <li>\n' +
    '                                                    <i data-feather="star" class="fill"></i>\n' +
    '                                                </li>\n' +
    '                                                <li>\n' +
    '                                                    <i data-feather="star" class="fill"></i>\n' +
    '                                                </li>\n' +
    '                                                <li>\n' +
    '                                                    <i data-feather="star"></i>\n' +
    '                                                </li>\n' +
    '                                            </ul>\n' +
    '                                            <span>(4.0)</span>\n' +
    '                                        </div>\n' +
    '                                        <h6 class="unit">250 ml</h6>\n' +
    '                                        <h5 class="price"><span class="theme-color">$08.02</span> <del>$15.15</del>\n' +
    '                                        </h5>\n' +
    '                                        <div class="add-to-cart-box bg-white">\n' +
    '                                            <button class="btn btn-add-cart addcart-button">Add\n' +
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


$(window).scroll(function() {
   /* setTimeout(() => {
        console.log("Delayed for 1 second.");
    }, 1000);*/
  //  console.log('height document : ' + $(document).height())
     //console.log('scroll top : ' + $(window).scrollTop())
   //  console.log('window height : ' + $(window).height())
    // console.log('------------------------------------------')

    if(Math.round(($(document).height())) - (Math.round($(window).scrollTop() + $(window).height() ) ) < 2) {
        console.log('event')
        for(let i=0;i<1;i++)
            $('#product_list').append(product);

    }
});

