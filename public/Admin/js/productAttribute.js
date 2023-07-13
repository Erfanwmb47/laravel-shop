$('#categories').select2({
    'placeholder' : 'دسترسی مورد نظر را انتخاب کنید'
})


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
