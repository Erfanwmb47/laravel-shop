$('#commentSend').on('submit',function (e){
    e.preventDefault();


    var formData = new FormData(e.target)

    console.log(formData.get('title'))
   // formData.append('image',photo,'image');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
        }
    })
    $.ajax({
        type: "POST",
        contentType: false,
        url: '/comment/send',
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
             var star = feather.icons['star'].toSvg();
             var fillStar = feather.icons['star'];
             fillStar.attrs.class+=' fill'

            fillStar=fillStar.toSvg();

            var list1 = ""
            var rate = formData.get('rate');
            for (var i = 0 ;i<5;i++){
                if( rate > 0 )
                {
                    list1=list1.concat( "<li>\n" + star+
                    " </li>")
                }
                else {
                    list1=list1.concat( "<li>\n" + fillStar+
                        " </li>")
                }
                rate--;
            }
            var comm = "<li>\n" +
                "                                                                <div class=\"people-box bg-comment-status-0\">\n" +
                "                                                                    <div>\n" +
                "                                                                        <div class=\"people-image\">\n" +
                "                                                                            <img src=\""+data.userImage+"\"\n" +
                "                                                                                 class=\"img-fluid blur-up lazyload\"\n" +
                "                                                                                 alt=\"\">\n" +
                "                                                                        </div>\n" +
                "                                                                    </div>\n" +
                "\n" +
                "                                                                    <div class=\"people-comment\">\n" +
                "                                                                        <a class=\"name\"\n" +
                "                                                                           href=\"javascript:void(0)\">"+formData.get('title')+"</a>\n" +
                "                                                                        <div class=\"date-time\">\n" +
                "                                                                            <h6 class=\"text-content\">هم اکنون (درانتظار تایید نظر)</h6>\n" +
                "\n" +
                "                                                                            <div class=\"product-rating\">\n" +
                "                                                                                <ul class=\"rating\">\n" + list1+
                "                                                                                </ul>\n" +
                "                                                                            </div>\n" +
                "                                                                        </div>\n" +
                "\n" +
                "                                                                        <div class=\"reply\">\n" +
                "                                                                            <p>"+formData.get('text')+"<a\n" +
                "                                                                            </p>\n" +
                "                                                                        </div>\n" +
                "                                                                    </div>\n" +
                "                                                                </div>\n" +
                "                                                            </li>" ;

            $('.review-list').prepend(comm);
            document.getElementById('addComment').remove();

        }
    });
});



$(function () {

    var $range = $(".js-range-rate"),
        $inputFrom = $(".js-input-from"),
        $inputTo = 0,
        instance,
        min = 0,
        max = 5,
        from = 1,
        to = 5;

    $range.ionRangeSlider({
        type: "int",
        min: min,
        max: max,
        from: 1,
        to: 5,
        prefix: '',
        onStart: updateInputs,
        onChange: updateInputs,
        step: 1,
        prettify_enabled: false,
        prettify_separator: ".",
        values_separator: " - ",
        force_edges: true


    });

    instance = $range.data("ionRangeSlider");

    function updateInputs(data) {
        from = data.from;
        to = data.to;

        $inputFrom.prop("value", from);
        $inputTo.prop("value", to);
    }

    $inputFrom.on("input", function () {
        var val = $(this).prop("value");

        // validate
        if (val < min) {
            val = min;
        } else if (val > to) {
            val = to;
        }

        instance.update({
            from: val
        });
    });

    $inputTo.on("input", function () {
        var val = $(this).prop("value");

        // validate
        if (val < from) {
            val = from;
        } else if (val > max) {
            val = max;
        }

        instance.update({
            to: val
        });
    });

});



// نکات مثبت و منفی

let changeAttributeValues = (event , id) => {
    let valueBox = $(`select[name='attributes[${id}][value]']`);

    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
            'Content-Type' : 'application/json'
        }
    })

    $.ajax({
        type : 'POST',
        url : '/dashboard/products/attribute/values',
        data : JSON.stringify({
            name : event.target.value
        }),
        success : function(res) {
            valueBox.html(`
                            <option value="" selected>انتخاب کنید</option>
                            ${
                res.data.map(function (item) {
                    return `<option value="${item}">${item}</option>`
                })
            }
                        `);

            $('.attribute-select').select2({ tags : true });
        }
    });
}

let createNewAttr = ({ attributes , id }) => {
    return `
                    <div class="grid grid-cols-12" id="attribute-${id}">
                        <div class="sm:col-span-5 col-span-5 mr-2">
                            <div class="">
                                 <label>عنوان ویژگی</label>
                                 <select name="attributes[${id}][name]" onchange="changeAttributeValues(event, ${id});" class=" mt-2 w-full attribute-select ">
                                    <option value="">انتخاب کنید</option>
                                    ${
        attributes.map(function(item) {
            return `<option value="${item}">${item}</option>`
        })
    }
                                 </select>
                            </div>
                        </div>
                        <div class="sm:col-span-5 col-span-5 mr-2">
                            <div class="form-group">
                                 <label>مقدار ویژگی</label>
                                 <select name="attributes[${id}][value]" class="mt-2   attribute-select w-full">
                                        <option value="">انتخاب کنید</option>
                                 </select>
                            </div>
                        </div>
                         <div class="sm:col-span-2 col-span-2 ">

                                <button type="button" class="sm:w-full button text-white bg-theme-6 shadow-md mt-5 mr-2" onclick="document.getElementById('attribute-${id}').remove()">حذف</button>

                        </div>
                    </div>
                `
}

$('#add_product_attribute').click(function() {
    let attributesSection = $('#attribute_section');
    let id = attributesSection.children().length;
    let attributes = $('#attributes').data('attributes');
    console.log(attributes);


    attributesSection.append(
        createNewAttr({
            attributes,
            id
        })
    );

    $('.attribute-select').select2({ tags : true });
});
$('.attribute-select').select2({ tags : true });
