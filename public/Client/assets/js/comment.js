// نکات مثبت
const pbtnAdd = document.querySelector('#positiveBtnAdd');
// const pbtnRemove = document.querySelector('#positiveBtnRemove');
const plistbox = document.querySelector('#positiveList');
const pframework = document.querySelector('#positiveFramework');
var childShowPList = ''

pbtnAdd.onclick = (e) => {
    e.preventDefault();

    // validate the option
    if (pframework.value == '') {
        alert('لطفا یک مقدار وارد کنید');
        return;
    }
    // create a new option
    const option = new Option(pframework.value, pframework.value);
    // add it to the list
    option.setAttribute('selected','selected');
    option.setAttribute('data-positive',pframework.value);
    plistbox.add(option, undefined);
    childShowPList = '<div class="flex-space-between form-control mt-1" data-positive="'+pframework.value+'">\n' +
        '                                <span><i class="fa fa-plus text-success mx-2"></i>'+pframework.value+'</span>\n' +
        '                                <span><i class="fa fa-trash text-danger pointer" onclick="removeP(\''+pframework.value+'\')" ></i></span>\n' +
        '                            </div>'
    document.getElementById('ShowPList').innerHTML+= childShowPList;
    // reset the value of the input
    pframework.value = '';
    pframework.focus();
};

function removeP(val){
    var x   = $("[data-positive='"+val+"']")
    x.remove()
}

// pbtnRemove.onclick = (e) => {
//     e.preventDefault();
//
//     // save the selected options
//     let selected = [];
//
//     for (let i = 0; i < plistbox.options.length; i++) {
//         selected[i] = plistbox.options[i].selected;
//     }
//
//     // remove all selected option
//     let index = plistbox.options.length;
//     while (index--) {
//         if (selected[index]) {
//             plistbox.remove(index);
//         }
//     }
// };


// نکات منفی
const btnAdd = document.querySelector('#negativeBtnAdd');
// const btnRemove = document.querySelector('#negativeBtnRemove');
const listbox = document.querySelector('#negativeList');
const framework = document.querySelector('#negativeFramework');
var childShowNList = ''

btnAdd.onclick = (e) => {

    e.preventDefault();

    // validate the option
    if (framework.value == '') {
        alert('لطفا یک مقدار وارد کنید');
        return;
    }
    // create a new option
    const option = new Option(framework.value, framework.value);
    // add it to the list
    option.setAttribute('selected','selected');
    option.setAttribute('data-negative',framework.value);
    listbox.add(option, undefined);
    childShowNList = '<div class="flex-space-between form-control mt-1" data-negative="'+framework.value+'">\n' +
        '                                <span><i class="fa fa-minus text-danger mx-2"></i>'+framework.value+'</span>\n' +
        '                                <span><i class="fa fa-trash text-danger pointer" onclick="removeN(\''+framework.value+'\')" ></i></span>\n' +
        '                            </div>'
    document.getElementById('ShowNList').innerHTML+= childShowNList;

    // reset the value of the input
    framework.value = '';
    framework.focus();
};
function removeN(val){
    var x   = $("[data-negative='"+val+"']")
    x.remove()
}
// remove selected option
// btnRemove.onclick = (e) => {
//     e.preventDefault();
//
//     // save the selected options
//     let selected = [];
//
//     for (let i = 0; i < listbox.options.length; i++) {
//         selected[i] = listbox.options[i].selected;
//     }
//
//     // remove all selected option
//     let index = listbox.options.length;
//     while (index--) {
//         if (selected[index]) {
//             listbox.remove(index);
//         }
//     }
// };


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
            const formatter = new Intl.NumberFormat('fa-IR', {
            });
            var massage = 'نظر شما با موفقیت ثبت شد'
            var title = 'نظر جدید'

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
                    list1=list1.concat( "<li>\n" + fillStar+
                    " </li>")
                }
                else {
                    list1=list1.concat( "<li>\n" + star+
                        " </li>")
                }
                rate--;
            }
            var PositiveList = ''
            formData.getAll('positive[]').forEach(function (item){
                PositiveList += '<div class="col-6">\n' +
                    '            <div class="flex"><i class="fa fa-plus text-success mx-1"></i> <h6 class="text-black-50 text-sm-end">'+item+'</h6></div>\n' +
                    '            </div>'
            })
            var negativeList = ''
            formData.getAll('negative[]').forEach(function (item){
                negativeList += '<div class="col-6">\n' +
                    '    <div class="flex"><i class="fa fa-minus text-danger mx-1"></i> <h6 class="text-black-50 text-sm-end">'+item+'</h6></div>\n' +
                    '    </div>'
            })
            var comm = '<li class="rounded">\n' +
                '                                                                    <div class="people-box bg-comment-status-0">\n' +
                '                                                                        <div>\n' +
                '                                                                            <div class="people-image">\n' +
                '                                                                                <img src="'+data.userImage+'"\n' +
                '                                                                                     class="img-fluid blur-up lazyload"\n' +
                '                                                                                     alt="">\n' +
                '                                                                            </div>\n' +
                '                                                                        </div>\n' +
                '\n' +
                '                                                                        <div class="people-comment">\n' +
                '                                                                            <a class="name"\n' +
                '                                                                               href="javascript:void(0)"><span class=" float-start '+rateColor(Number(formData.get('rating')))+'">'+formatter.format(0)+'.'+formatter.format(formData.get('rating'))+'  </span>'+formData.get('title')+'</a>\n' +
                '                                                                            <div class="date-time">\n' +
                '                                                                                <div class="flex">\n' +
                '                                                                                    <h6 class="text-content">\n' +
                '                                                                                            <span class="">هم اکنون (درانتظار تایید نظر)  </span>\n' +
                '                                                                                    </h6>\n' +
                '                                                                                </div>\n' +
                '\n' +
                '                                                                            </div>\n' +
                '                                                                            <hr style="background: -webkit-gradient(linear, 0 0, 100% 0, from(transparent), to(transparent), color-stop(50%, black)); width: 100%;">\n' +
                '                                                                            <div class="reply">\n' +
                '                                                                                <p class="text-md-end">\n' + formData.get('text')+
                '                                                                                </p>\n' +
                '                                                                                <div class="row mt-2">\n' +
                '                                                                                <div class="col-6">\n' + PositiveList +
                '                                                                                </div>\n' +
                '                                                                                <div class="col-6">\n' + negativeList +
                '                                                                                </div>\n' +
                '                                                                                </div>\n' +
                '                                                                            </div>\n' +
                '                                                                            <hr style="background: -webkit-gradient(linear, 0 0, 100% 0, from(transparent), to(transparent), color-stop(50%, black)); width: 100%;">\n' +
                '                                                                            <div class="me-auto mx-0 align-content-start float-start">\n' +
                '                                                                                    <p class="opacity-100">\n' +
                '                                                                                        <i class="fa fa-thumbs-o-up " id="like"></i>\n' +
                '                                                                                        <span ></span>\n' +
                '                                                                                        <i class="me-3 fa fa-thumbs-o-down" id="dislike" ></i>\n' +
                '                                                                                        <span></span>\n' +
                '                                                                                    </a>\n' +
                '                                                                            </div>\n' +
                '                                                                        </div>\n' +
                '                                                                    </div>\n' +
                '                                                                </li>'

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
        from = 5,
        to = 1;

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

function rateColor(value){
    if(value == 5) return 'comment-rating-excellent'
    else if(value <5 && value>=4) return 'comment-rating-very-good'
    else if (value<4 && value>=3) return 'comment-rating-good'
    else if (value<3 && value>=2) return 'comment-rating-poor'
    else if (value<2) return 'comment-rating-very-poor'
    else return ''
}

$('#editCommentBtn').on('click',function(e){
    var id = $(this).attr('comment-id')
    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
            'Content-Type' : 'application/json'
        }
    })


    //
    $.ajax({
        type : 'POST',
        url : '/comments/get-comment-details',
        data : JSON.stringify({
            id : id ,
            _method : 'post'
        }),
        success : function(res) {
            const formatter = new Intl.NumberFormat('en-US', {
                // These options are needed to round to whole numbers if that's what you want.
                //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
                //maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
            });
            var positive = JSON.parse(res.comment.positive)
            var negative = JSON.parse(res.comment.negative)
            var pTemp = ''
            var nTemp = ''
            $('.ratingComment input[value="'+res.comment.rate+'"]').prop( "checked", true )
            $('.ratingComment input[value="'+res.comment.rate+'"]').change()
            // $('#commentDetailTable input[name="title"]').val(res.comment.title)
            $('#commentDetailTable input[name="title"]').attr('value',res.comment.title)
            $('#commentDetailTable input[name="title"]').change()
            $('#commentDetailTable textarea[name="text"]').text(res.comment.text)
            $('#commentDetailTable textarea[name="text"]').change()

            positive.forEach(function (item){
                pTemp += '<div class="flex-space-between form-control mt-1" data-positive="'+item+'">\n' +
                    '                                <span><i class="fa fa-plus text-success mx-2"></i>'+item+'</span>\n' +
                    '                                <span><i class="fa fa-trash text-danger pointer" onclick="removeP(\''+item+'\')"></i></span>\n' +
                    '                            </div>'
            })
            negative.forEach(function (item){
                nTemp += '<div class="flex-space-between form-control mt-1" data-positive="'+item+'">\n' +
                    '                                <span><i class="fa fa-plus text-success mx-2"></i>'+item+'</span>\n' +
                    '                                <span><i class="fa fa-trash text-danger pointer" onclick="removeP(\''+item+'\')"></i></span>\n' +
                    '                            </div>'
            })
            $('#ShowPList').html(pTemp);
            $('#ShowNList').html(nTemp);
        }
    });
})

$('#commentEdit').on('submit',function (e){
    e.preventDefault();
    var id = $('#editCommentBtn').attr('comment-id')
    var formData = new FormData(e.target)
    var url = '/comments/edit-comment/'+id
    console.log(formData.get('title'))
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
        }
    })
    $.ajax({
        type: "POST",
        contentType: false,
        url: url,
        data: formData,
        cache: false,
        processData: false,
        success: function(data)
        {
            const formatter = new Intl.NumberFormat('fa-IR', {
            });
            var massage = 'نظر شما با موفقیت ویرایش شد '
            var title = 'ویرایش'

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
})



