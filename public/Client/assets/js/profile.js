$('#changeProfileImage:input').on('change', function (uploader) {
    $('.update_img').attr('src',
        window.URL.createObjectURL(this.files[0]));
    $('#upload_img').submit();
});

$('#upload_img').on('submit',function (e){
    e.preventDefault();
    var form =e.target
    var actionUrl = form.getAttribute('action');
    var photo = $('#changeProfileImage').prop('files')[0];
    var formData = new FormData(form)
    formData.append('image',photo,'image');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
        }
    })
    $.ajax({
        type: "POST",
        contentType: false,
        url: actionUrl,
        data: formData,
        cache: false,
        processData: false,
        success: function(data)
        {
                var massage = 'چه خوشگل شدی امشب :)'
                var title = 'ژوووون'

                $.notify({
                    icon: "fa fa-check",
                    title: title,
                    message: massage,
                }, {
                    element: "body",
                    position: null,
                    type: "info",
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
    });
});

function showOrderDetail(event,id){
    const formatter = new Intl.NumberFormat('fa-IR', {
    });
    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
            'Content-Type' : 'application/json'
        }
    })

    $.ajax({
        type : 'POST',
        url : '/orders/detail',
        data : JSON.stringify({
            id : id ,
            _method : 'POST'
        }),

        beforeSend : function (){
                        document.getElementById('orderDetailTable').innerHTML = " <div class=\"row g-sm-4 g-3 loading\">\n" +
                            "                                <div class=\"col-xxl-9 col-lg-8\">\n" +
                            "                                    <div class=\"cart-table order-table order-table-2\">\n" +
                            "                                        <div class=\"table-responsive\">\n" +
                            "                                            <table class=\"table mb-0\">\n" +
                            "                                                <tbody >\n" +
                            "                                                <tr>\n" +
                            "                                                    <td class=\"product-detail\">\n" +
                            "\n" +
                            "                                                    </td>\n" +
                            "\n" +
                            "                                                    <td class=\"price\">\n" +
                            "                                                        <h4 class=\"table-title text-content\"></h4>\n" +
                            "                                                        <h6 class=\"theme-color\"></h6>\n" +
                            "                                                    </td>\n" +
                            "\n" +
                            "                                                    <td class=\"quantity\">\n" +
                            "                                                        <h4 class=\"table-title text-content\"></h4>\n" +
                            "                                                        <h4 class=\"text-title\"></h4>\n" +
                            "                                                    </td>\n" +
                            "                                                </tr>\n" +
                            "                                                </tbody>\n" +
                            "                                            </table>\n" +
                            "                                        </div>\n" +
                            "                                    </div>\n" +
                            "                                    <div class=\"col-12 mt-2\">\n" +
                            "                                        <div class=\"summery-box\">\n" +
                            "                                            <div class=\"summery-header d-block\">\n" +
                            "                                                <h3>توضیحات سفارش</h3>\n" +
                            "                                            </div>\n" +
                            "\n" +
                            "                                            <ul class=\"summery-contain pb-0 border-bottom-0\">\n" +
                            "                                                <li class=\"d-block pt-0\">\n" +
                            "                                                    <p class=\"text-content\"></p>\n" +
                            "                                                </li>\n" +
                            "                                            </ul>\n" +
                            "                                        </div>\n" +
                            "                                    </div>\n" +
                            "                                </div>\n" +
                            "\n" +
                            "                                <div class=\"col-xxl-3 col-lg-4\">\n" +
                            "                                    <div class=\"row g-4\">\n" +
                            "                                        <div class=\"col-lg-12 col-sm-6\">\n" +
                            "                                            <div class=\"summery-box\">\n" +
                            "                                                <div class=\"summery-header\">\n" +
                            "                                                    <h3>جزئیات سفارش</h3>\n" +
                            "                                                    <h5 class=\"ms-auto theme-color\"></h5>\n" +
                            "                                                </div>\n" +
                            "\n" +
                            "                                                <ul class=\"summery-contain\">\n" +
                            "                                                    <li>\n" +
                            "                                                        <h4></h4>\n" +
                            "                                                        <h4 class=\"price\"></h4>\n" +
                            "                                                    </li>\n" +
                            "\n" +
                            "                                                    <li>\n" +
                            "                                                        <h4></h4>\n" +
                            "                                                        <h4 class=\"price theme-color\"></h4>\n" +
                            "                                                    </li>\n" +
                            "\n" +
                            "                                                    <li>\n" +
                            "                                                        <h4></h4>\n" +
                            "                                                        <h4 class=\"price text-danger\"></h4>\n" +
                            "                                                    </li>\n" +
                            "                                                </ul>\n" +
                            "\n" +
                            "                                                <ul class=\"summery-total\">\n" +
                            "                                                    <li class=\"list-total\">\n" +
                            "                                                        <h4></h4>\n" +
                            "                                                        <h4 class=\"price\"></h4>\n" +
                            "                                                    </li>\n" +
                            "                                                </ul>\n" +
                            "                                            </div>\n" +
                            "                                        </div>\n" +
                            "                                        <div class=\"col-lg-12 col-sm-6\">\n" +
                            "                                            <div class=\"summery-box\">\n" +
                            "                                                <div class=\"summery-header d-block\">\n" +
                            "                                                    <h3>آدرس</h3>\n" +
                            "                                                </div>\n" +
                            "\n" +
                            "                                                <ul class=\"summery-contain pb-0 border-bottom-0\">\n" +
                            "                                                    <li class=\"d-block\">\n" +
                            "                                                        <h4></h4>\n" +
                            "                                                        <h4 class=\"mt-2\"></h4>\n" +
                            "                                                    </li>\n" +
                            "\n" +
                            "\n" +
                            "                                                </ul>\n" +
                            "\n" +
                            "                                                <ul class=\"summery-total\">\n" +
                            "                                                    <li class=\"list-total border-top-0 pt-2\">\n" +
                            "                                                        <h4 class=\"fw-bold\"></h4>\n" +
                            "                                                    </li>\n" +
                            "                                                </ul>\n" +
                            "                                            </div>\n" +
                            "                                        </div>\n" +
                            "                                    </div>\n" +
                            "                                </div>\n" +
                            "\n" +
                            "                            </div>"
        },
        success : function(res) {
            var productList = ""
            res.products.forEach(function (product){

                 productList += "<tr>\n" +
                    "                                                    <td class=\"product-detail\">\n" +
                    "                                                        <div class=\"product border-0\">\n" +
                    "                                                            <a href=\"product.left-sidebar.html\" class=\"product-image\">\n" +
                    "                                                                <img src=\""+product.image+"\"\n" +
                    "                                                                     class=\"img-fluid blur-up lazyload\" alt=\"\">\n" +
                    "                                                            </a>\n" +
                    "                                                            <div class=\"product-detail\">\n" +
                    "                                                                <ul>\n" +
                    "                                                                    <li class=\"name\">\n" +
                    "                                                                        <a href=\"product-left-thumbnail.html\">"+product.name+"</a>\n" +
                    "                                                                    </li>\n" +
                    "\n" +
                    "                                                                    <li class=\"text-content\">برند:"+product.brand.name+"</li>\n" +
                    "\n" +
                    "                                                                </ul>\n" +
                    "                                                            </div>\n" +
                    "                                                        </div>\n" +
                    "                                                    </td>\n" +
                    "\n" +
                    "                                                    <td class=\"price\">\n" +
                    "                                                        <h4 class=\"table-title text-content\">قیمت واحد</h4>\n" +
                    "                                                        <h6 class=\"theme-color\"> "+formatter.format(Number(product.pivot.price))+" تومان </h6>\n" +
                    "                                                    </td>\n" +
                    "\n" +
                    "                                                    <td class=\"quantity\">\n" +
                    "                                                        <h4 class=\"table-title text-content\">تعداد</h4>\n" +
                    "                                                        <h4 class=\"text-title\">"+product.pivot.quantity+"</h4>\n" +
                    "                                                    </td>\n" +
                    "\n" +
                    "                                                    <td class=\"subtotal\">\n" +
                    "                                                        <h4 class=\"table-title text-content\">قیمت کل</h4>\n" +
                    "                                                        <del>"+formatter.format(Number(product.pivot.price))+"</del>\n" +
                    "                                                        <h5>"+formatter.format(Number(product.pivot.PriceWithDiscount))+"</h5>\n" +
                    "                                                    </td>\n" +
                    "                                                </tr>"
            });
            var description = (res.order.description != null) ? res.order.description : 'بدون توضیحات'
            var x = "<div class=\"row g-sm-4 g-3\">\n" +
                "                                <div class=\"col-xxl-9 col-lg-8\">\n" +
                "                                    <div class=\"cart-table order-table order-table-2\">\n" +
                "                                        <div class=\"table-responsive\">\n" +
                "                                            <table class=\"table mb-0\">\n" +
                "                                                <tbody>\n" +productList+
                "                                                </tbody>\n" +
                "                                            </table>\n" +
                "                                        </div>\n" +
                "                                    </div>\n" +
                "                                    <div class=\"col-12 mt-2\">\n" +
                "                                        <div class=\"summery-box\">\n" +
                "                                            <div class=\"summery-header d-block\">\n" +
                "                                                <h3>آدرس</h3>\n" +
                "                                            </div>\n" +
                "\n" +
                "                                            <ul class=\"summery-contain pb-0 border-bottom-0\">\n" +
                "                                                <li class=\"d-block pt-0\">\n" +
                "                                                    <p class=\"text-content\">"+res.province+" "+res.county+" "+res.address.detail+"</p>\n" +
                "                                                </li>\n" +
                "                                            </ul>\n" +
                "                                        </div>\n" +
                "                                    </div>\n" +
                "                                </div>\n" +
                "\n" +
                "                                <div class=\"col-xxl-3 col-lg-4\">\n" +
                "                                    <div class=\"row g-4\">\n" +
                "                                        <div class=\"col-lg-12 col-sm-6\">\n" +
                "                                            <div class=\"summery-box\">\n" +
                "                                                <div class=\"summery-header\">\n" +
                "                                                    <h3>جزئیات سفارش</h3>\n" +
                "                                                    <h6 class=\"ms-auto theme-color\">("+res.order.amount+" محصول)</h6>\n" +
                "                                                </div>\n" +
                "\n" +
                "                                                <ul class=\"summery-contain\">\n" +
                "                                                    <li>\n" +
                "                                                        <h4>قیمت کل </h4>\n" +
                "                                                        <h4 class=\"price\">"+formatter.format(Number(res.order.cart_cost))+" تومان </h4>\n" +
                "                                                    </li>\n" +
                "\n" +
                "                                                    <li>\n" +
                "                                                        <h4>هزینه ارسال</h4>\n" +
                "                                                        <h4 class=\"price theme-color\">"+formatter.format(Number(res.order.transportation_cost))+" تومان </h4>\n" +
                "                                                    </li>\n" +
                "\n" +
                "                                                    <li>\n" +
                "                                                        <h4>امتیاز شما از سفارش</h4>\n" +
                "                                                        <h4 class=\"price text-danger\">"+formatter.format(Number(res.order.score))+"</h4>\n" +
                "                                                    </li>\n" +
                "                                                </ul>\n" +
                "\n" +
                "                                                <ul class=\"summery-total\">\n" +
                "                                                    <li class=\"list-total flex \">\n" +
                "                                                        <h3>مجموع </h3>\n" +
                "                                                        <h4 class=\"price\">"+formatter.format(Number(res.order.final_cost))+" تومان </h4>\n" +
                "                                                    </li>\n" +
                "                                                </ul>\n" +
                "                                            </div>\n" +
                "                                        </div>\n" +
                "                                        <div class=\"col-lg-12 col-sm-6\">\n" +
                "                                            <div class=\"summery-box\">\n" +
                "                                                <div class=\"summery-header d-block\">\n" +
                "                                                    <h3>توضیحات</h3>\n" +
                "                                                </div>\n" +
                "\n" +
                "                                                <ul class=\"summery-contain pb-0 border-bottom-0\">\n" +
                "                                                    <li class=\"d-block\">\n" +
                "                                                        <h4 class=\"mt-2\">"+description+"</h4>\n" +
                "                                                    </li>\n" +
                "\n" +
                "                                                </ul>\n" +
                "\n" +
                "                                            </div>\n" +
                "                                        </div>\n" +
                "                                    </div>\n" +
                "                                </div>\n" +
                "\n" +
                "                            </div>";
            document.getElementById('orderDetailTable').innerHTML = x;
        }
    });
}

// ویرایش کاربری

$('#usernameSubmitButton').on('click',function (){
    $('#editProfileForm').submit();
})
$('#editProfileForm').on('submit',function (e){
    e.preventDefault();
    var form =e.target
    var actionUrl = form.getAttribute('action');
    // var photo = $('#changeProfileImage').prop('files')[0];
    var formData = new FormData(form)
    // formData.append('image',photo,'image');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
        }
    })
    $.ajax({
        type: "POST",
        contentType: false,
        url: actionUrl,
        data: formData,
        cache: false,
        processData: false,
        success: function(res)
        {
            var massage = 'پروفایل شما با موفقیت ویرایش شد'
            var title = ''

            $.notify({
                icon: "fa fa-check",
                title: title,
                message: massage,
            }, {
                element: "body",
                position: null,
                type: "info",
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
        },
        error :function (jqXHR, exception){
            text = ''
            Object.keys(jqXHR.responseJSON.errors).forEach(key => {
               text += jqXHR.responseJSON.errors[key][0] + '<br>';
            });
            var massage = text
            var title = ''

            $.notify({
                icon: "fa fa-xmark",
                title: title,
                message: massage,
            }, {
                element: "body",
                position: null,
                type: "danger",
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
    });
});

$('#setUsernameForm').on('submit',function (e){
    e.preventDefault();
    var form =e.target
    var actionUrl = form.getAttribute('action');
    // var photo = $('#changeProfileImage').prop('files')[0];
    var formData = new FormData(form)
    // formData.append('image',photo,'image');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
        }
    })
    $.ajax({
        type: "POST",
        contentType: false,
        url: actionUrl,
        data: formData,
        cache: false,
        processData: false,

        success: function(res)
        {
            $('#setUsernameBtn').parent().remove();
            var massage = 'نام کاربری شما با موفقیت ویرایش شد '
            var title = ''

            $.notify({
                icon: "fa fa-check",
                title: title,
                message: massage,
            }, {
                element: "body",
                position: null,
                type: "success",
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
        },
        error :function (jqXHR, exception){
            text = ''
            Object.keys(jqXHR.responseJSON.errors).forEach(key => {
                text += jqXHR.responseJSON.errors[key][0] + '<br>';
            });
            var massage = text
            var title = ''

            $.notify({
                icon: "fa fa-xmark",
                title: title,
                message: massage,
            }, {
                element: "body",
                position: null,
                type: "danger",
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
    });
})

