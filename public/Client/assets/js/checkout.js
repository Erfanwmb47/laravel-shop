

function checkoutNewAddress(){
    const inputs = document.querySelectorAll('#myInputCountyRequest, #myInputProvinceRequest,#postalCode,#detail,#tel');
            inputs.forEach(input => {

            });
            $(".modal").modal("hide");
            $("#newAddressBox").remove();
            var temp = "<div class=\"col-xxl-6 col-lg-12 col-md-6 checkoutAddressSelect\" id=\"newAddressBox\" >\n" +
                "                                                    <div class=\"delivery-address-box\">\n" +
                "                                                        <div>\n" +
                "                                                            <div class=\"form-check\">\n" +
                "                                                                <input class=\"form-check-input\"  type=\"radio\" checked name=\"address\"\n" +
                "                                                                       id=\"newAddress\" value=\"newAddres\" onclick=\"computePriceTransportation(event,\'"+inputs[0].value+"\',\'"+inputs[1].value+"\')\">\n" +
                "                                                            </div>\n" +
                "\n" +
                "                                                            <div class=\"label\">\n" +
                "                                                                <div class=\"pointer\" data-bs-toggle=\"modal\" data-bs-target=\"#newAddressModal\" id=\"editAddressButton\">ویرایش</div>\n" +
                "                                                            </div>\n" +
                "\n" +
                "                                                            <ul class=\"delivery-address-detail\">\n" +
                "                                                                <li>\n" +
                "                                                                    <h4 class=\"fw-500\">\n"+$('#dropbtnProvince').text() +"-"+
                $('#dropbtnCounty').text()+"</h4>\n" +
                "                                                                </li>\n" +
                "\n" +
                "                                                                <li>\n" +
                "                                                                    <p class=\"text-content\"><span\n" +
                "                                                                            class=\"text-title\">آدرس\n" +
                "                                                                             :  </span>"+inputs[4].value+"</p>\n" +
                "                                                                </li>\n" +
                "\n" +
                "                                                                <li>\n" +
                "                                                                    <h6 class=\"text-content\"><span\n" +
                "                                                                            class=\"text-title\">کد پستی\n" +
                "                                                                            :</span>"+inputs[2].value+"</h6>\n" +
                "                                                                </li>\n" +
                "\n" +
                "                                                                <li>\n" +
                "                                                                    <h6 class=\"text-content mb-0\"><span\n" +
                "                                                                            class=\"text-title\">شماره ثابت\n" +
                "                                                                            :</span> "+inputs[3].value+"</h6>\n" +
                "                                                                </li>\n" +
                "                                                            </ul>\n" +
                "                                                        </div>\n" +
                "                                                    </div>\n" +
                "                                                </div>"
            document.getElementById('addressList').innerHTML += temp;

            $('#newAddressButton').remove();
            computePriceTransportation(event,inputs[0].value,inputs[1].value);


}
function computePriceTransportation(event,province_id,county_id) {
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
        url : '/checkout/cpt',
        data : JSON.stringify({
            province_id : province_id ,
            county_id : county_id,
            _method : 'post'
        }),
        success : function(res) {
            const formatter = new Intl.NumberFormat('en-US', {
                // These options are needed to round to whole numbers if that's what you want.
                //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
                //maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
            });

            // document.getElementById('finalTransportationCost').innerText = " ";
            // document.getElementById('finalCost').innerText = " ";

            document.getElementById('transportationsBox').innerHTML ="";
            res.transportations.forEach(function(transportation) {
                if(transportation.discountPrice){
                    console.log(Number(transportation.totalPrice) - Number(transportation.discountPrice))
                    var temp = "<div class=\"col-xxl-6\">\n" +
                        "                                                    <div class=\"delivery-option\">\n" +
                        "                                                        <div class=\"delivery-category\">\n" +
                        "                                                            <div class=\"shipment-detail\">\n" +
                        "                                                                <div\n" +
                        "                                                                    class=\"form-check custom-form-check hide-check-box\">\n" +
                        "                                                                    <input class=\"form-check-input\" type=\"radio\"\n" +
                        "                                                                           name=\"transportation\" id=\"transportation"+transportation.id+"\" data-price=\""+(Number(transportation.totalPrice) - Number(transportation.discountPrice))+"\" value=\""+transportation.id+"\" onchange=\"finalCost(this)\" >\n" +
                        "                                                                    <label class=\"form-check-label\"\n" +
                        "                                                                           for=\"standard\">\n"+transportation.name+"</label>\n" +
                        "                                                                    <img class=\"mx-2 rounded\" src=\""+transportation.image+"\" alt=\"transportation"+transportation.name+"\" style=\"width: 30px;\">\n" +
                        "                                                                </div>\n" +
                        "                                                            </div>\n" +
                        "                                                            <div><del class=\"text-danger\">\n"+formatter.format(transportation.totalPrice)+"</del><span>\n"+formatter.format((Number(transportation.totalPrice) - Number(transportation.discountPrice)))+" تومان</span></div>\n" +
                        "                                                        </div>\n" +
                        "                                                        <div class=\"mx-4 text-sm mt-2\">\n" +
                        "                                                            <p>"+transportation.description+"</p>\n" +
                        "                                                        </div>\n" +
                        "                                                    </div>\n" +
                        "                                                </div>";
                    document.getElementById('transportationsBox').innerHTML += temp;
                }
                else {
                    document.getElementById('transportationsBox').innerHTML += "<div class=\"col-xxl-6\">\n" +
                        "                                                    <div class=\"delivery-option\">\n" +
                        "                                                        <div class=\"delivery-category\">\n" +
                        "                                                            <div class=\"shipment-detail\">\n" +
                        "                                                                <div\n" +
                        "                                                                    class=\"form-check custom-form-check hide-check-box\">\n" +
                        "                                                                    <input class=\"form-check-input\" type=\"radio\"\n" +
                        "                                                                           name=\"transportation\" id=\"transportation"+transportation.id+"\" data-price=\""+(Number(transportation.totalPrice))+"\" value=\""+transportation.id+"\" onchange=\"finalCost(this)\" >\n" +
                        "                                                                    <label class=\"form-check-label\"\n" +
                        "                                                                           for=\"standard\">\n"+transportation.name+"</label>\n" +
                        "                                                                    <img class=\"mx-2 rounded\" src=\""+transportation.image+"\" alt=\"transportation"+transportation.name+"\" style=\"width: 30px;\">\n" +
                        "                                                                </div>\n" +
                        "                                                            </div>\n" +
                        "                                                            <div><span>\n"+formatter.format((Number(transportation.totalPrice)))+" تومان</span></div>\n" +
                        "                                                        </div>\n" +
                        "                                                        <div class=\"mx-4 text-sm mt-2\">\n" +
                        "                                                            <p>"+transportation.description+"</p>\n" +
                        "                                                        </div>\n" +
                        "                                                    </div>\n" +
                        "                                                </div>";
                }

            });
            // location.reload();
        }
    });
}

function finalCost(res){
    const formatter = new Intl.NumberFormat('fa-IR', {
        // These options are needed to round to whole numbers if that's what you want.
        //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
        //maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
    });

    // console.log(formatter.format($(res).attr('data-price')));

    var x = document.getElementById('totalPrice').getAttribute('data-price');
    if(res.checked) {
        document.getElementById('finalTransportationCost').innerText = formatter.format($(res).attr('data-price')) + " تومان ";
        document.getElementById('finalCost').innerText = formatter.format(Number($(res).attr('data-price')) + Number(x)) + "تومان";

    }
};

$('#dropdownCountyAddress').css('pointer-events','none');
// تایید شرایط و ضوابط
$("body").mouseover(function(){
    if ($('input[name=address]:checked').length > 0 &&
        $('input[name=paymentGateway]:checked').length > 0 &&
        $('input[name=transportation]:checked').length > 0 &&
        $('input[name=policyChecked]:checked').length == 1 &&
        $("input[name='recipient_name']").val() !== "" &&
        $("input[name='recipient_phone']").val() !== "") {
        document.getElementById('submitOrder').removeAttribute('style');
        document.getElementById('submitOrder').removeAttribute('disabled');
        document.getElementById('submitOrder').nextElementSibling.style.display = "none";
    }
    else {
        document.getElementById('submitOrder').style.backgroundColor = '#7f8a9a';
        document.getElementById('submitOrder').setAttribute('disabled','disabled');
        document.getElementById('submitOrder').nextElementSibling.style.display = "block";
    }
});

// مودال تغییر آدرس و آدرس جدید

$(document).on("click", function(event){
    var $trigger = $(".dropdownAddress");
    if($trigger !== event.target && !$trigger.has(event.target).length){
        $(".dropdown-content-address").removeClass("showProvince");
        $(".dropdown-content-address").removeClass("showCounty");
    }
});
document.getElementById('fq-address').style.display = "none";
document.getElementById('newAddressH3').classList.remove("active");
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







