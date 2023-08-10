
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

              console.log(res.image)
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

