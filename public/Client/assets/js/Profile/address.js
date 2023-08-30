$('#newAddressForm').on('submit',function(e){
    e.preventDefault()
    var formData = new FormData(e.target)
    var url = e.target.getAttribute('action')
    console.log(formData.entries())
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
        // dataType:'JSON',
        cache: false,
        processData: false,
        success: function(data)
        {
            const formatter = new Intl.NumberFormat('fa-IR', {
            });
            var massage = 'آدرس جدید با موفقیت ثبت شد'
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
        }
    });
})


$('#dropdownCountyAddress').css('pointer-events','none');
$(document).on("click", function(event){
    var $trigger = $(".dropdownAddress");
    if($trigger !== event.target && !$trigger.has(event.target).length){
        $(".dropdown-content-address").removeClass("showProvince");
        $(".dropdown-content-address").removeClass("showCounty");
    }
});
// document.getElementById('fq-address').style.display = "none";
// document.getElementById('newAddressH3').classList.remove("active");
function changeAddress() {
    if (document.getElementById('newAddressH3').classList[1] == 'active') {
        // $('#NewAddress').check()
        document.getElementById('newAddress').checked = 'true';
    }
    else {
        document.getElementById('newAddress').checked = 'false';

    }
}
/* When the user clicks on the button,
        toggle between hiding and showing the dropdown content */

function showProvince() {
    document.getElementById("myDropdownProvince").classList.toggle("showProvince");
}
function showCounty() {
    document.getElementById("myDropdownCounty").classList.toggle("showCounty");

}
function selectProvince(id,name){
    document.getElementById('dropbtnProvince').innerHTML = name;
    document.getElementById('myInputProvince').setAttribute('value',name);
    document.getElementById('myInputProvinceRequest').setAttribute('value',id);
    document.getElementById("myDropdownProvince").classList.toggle("showProvince");
    document.getElementById('dropbtnCounty').innerHTML = "انتخاب شهر";
    document.getElementById('myInputCountyRequest').setAttribute('value','');
    document.getElementById('myInputCounty').setAttribute('value','');

    if (! document.getElementById('myInputCountyRequest').value){
        document.getElementById('dropbtnCounty').classList.add('border');
        document.getElementById('dropbtnCounty').classList.add('border-danger');
        document.getElementById('submitAddress').disabled = true;

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
        url : '/getprovince_setcounties',
        data : JSON.stringify({
            id : id ,
            name : name,
            _method : 'post'
        }),
        success : function(res) {
            // $("#cartChange"+id).load(" #cartChange"+id);
            // $("#finalCost").load(" #finalCost");
            //  location.reload();
            document.getElementById('countiesList').innerHTML ="";
            res.counties.forEach(addCounty);
            $('#dropdownCountyAddress').removeAttr('style');

        }
    });
}

function addCounty(item){

    var counties = '<span onclick="selectCounty(\''+item.id+'\',\''+item.name+'\')" id="'+item.id+'">'+item.name+'</span>';
    document.getElementById('countiesList').innerHTML += counties;
}
function selectCounty(id,name){
    document.getElementById('dropbtnCounty').innerHTML = name;
    document.getElementById('myInputCounty').setAttribute('value',name);
    document.getElementById('myInputCountyRequest').setAttribute('value',id);
    document.getElementById("myDropdownCounty").classList.toggle("showCounty");

    document.getElementById('dropbtnCounty').classList.remove('border');
    document.getElementById('dropbtnCounty').classList.remove('border-danger');
    document.getElementById('submitAddress').disabled = false;
}
function filterFunctionProvince() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInputProvince");
    filter = input.value.toUpperCase();
    div = document.getElementById("myDropdownProvince");
    a = div.getElementsByTagName("span");
    for (i = 0; i < a.length; i++) {
        txtValue = a[i].textContent || a[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            a[i].style.display = "";
        } else {
            a[i].style.display = "none";
        }
    }
}
function filterFunctionCounty() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInputCounty");
    filter = input.value.toUpperCase();
    div = document.getElementById("myDropdownCounty");
    a = div.getElementsByTagName("span");
    for (i = 0; i < a.length; i++) {
        txtValue = a[i].textContent || a[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            a[i].style.display = "";
        } else {
            a[i].style.display = "none";
        }
    }
}



