function changeStatusPaymentAdmin(event,order_id,status){
    console.log(order_id);

    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
            'Content-Type' : 'application/json'
        }
    })


    //
    $.ajax({
        type : 'POST',
        url : 'orders/change/status/payment',
        data : JSON.stringify({
            order_id : order_id ,
            status: status,
            _method : 'patch'
        }),
        success : function(res) {

            if(status =='unpaid'){
                document.getElementById('payment_status'+order_id).innerHTML = 'در انتظار پرداخت';
                document.getElementById('payment_status'+order_id).setAttribute('class',' dropdown-toggle button inline-block bg-theme-17 text-theme-11');
            }
            else if (status =='paid'){
                document.getElementById('payment_status'+order_id).innerHTML = 'پرداخت شده';
                document.getElementById('payment_status'+order_id).setAttribute('class','dropdown-toggle button inline-block bg-theme-14 text-theme-10');
            }
            else if (status =='preparation'){
                document.getElementById('payment_status'+order_id).innerHTML = 'در حال آماده سازی';
                document.getElementById('payment_status'+order_id).setAttribute('class','dropdown-toggle button inline-block bg-theme-7 text-theme-2');
            }
            else if (status =='posted'){
                document.getElementById('payment_status'+order_id).innerHTML = 'ارسال شده';
                document.getElementById('payment_status'+order_id).setAttribute('class','dropdown-toggle button inline-block bg-theme-18 text-theme-32');
            }
            else if (status =='received'){
                document.getElementById('payment_status'+order_id).innerHTML = 'دریافت شده';
                document.getElementById('payment_status'+order_id).setAttribute('class','dropdown-toggle button inline-block bg-theme-33 text-theme-2');
            }
            else if (status =='canceled'){
                document.getElementById('payment_status'+order_id).innerHTML = 'لغو شده';
                document.getElementById('payment_status'+order_id).setAttribute('class','dropdown-toggle button inline-block bg-theme-31 text-theme-6');
            }
            // location.reload();
        }
    });
}

$('#myInputCountyRequest').on('change',function (){
    console.log(document.getElementById('provinceCountyOrder').innerText);
   document.getElementById('provinceCountyOrder').innerText =
       document.getElementById('myInputProvincRequest').innerText + '/' +
       document.getElementById('myInputCountyRequest').innerText;
});

function changeTrackingSerial(event,order_id){
    // console.log(order_id);
    console.log(document.getElementById('tracking_serialInput'+order_id).value);
    let tr = document.getElementById('tracking_serialInput'+order_id).value;
    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
            'Content-Type' : 'application/json'
        }
    })
    //
    $.ajax({
        type : 'POST',
        url : 'orders/change/ts',
        data : JSON.stringify({
            order_id : order_id ,
            tracking_serial: tr,
            _method : 'patch'
        }),
        success : function(res) {
            // location.reload();
            document.getElementById('trackingSerialSpan'+order_id).innerHTML = tr;
        }
    });
}
