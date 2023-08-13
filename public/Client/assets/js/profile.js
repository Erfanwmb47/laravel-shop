/*function changeProfileImage(uploader,id) {
    $('.update_img').attr('src',
        window.URL.createObjectURL(uploader.files[0]));
    // var file_data = $('#changeProfileImage').prop('files')[0];
    var form_data = new FormData();
    form_data.append('image', file_data);
    console.log(form_data)
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
            'Content-Type': 'application/json'
        }
    })

    //
    $.ajax({
        type: 'POST',
        url: '/changeprofileimage/',
        data: JSON.stringify({
            id: id,
            data : form_data,
            dataType: 'text',  // <-- what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            // cart : cartName,
            _method: 'post'
        }),
        beforeSend:function (){
            event.target.style.blur = '8px';
        },
        success: function (res) {
            console.log('hi');
        }
    });
}*/

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
            alert(data); // show response from the php script.
        }
    });
});
