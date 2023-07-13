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
                        <div class="sm:col-span-12 col-span-12 mr-2">
                            <div class="">
                                 <label><i data-feather="edit-2" class=" mt-2 w-4 h-4 float-right ml-2 text-blue-400"></i>صفحه مورد نظر</label>
                                 <select name="flag" onchange="changeAttributeValues(event, ${id});" class=" mt-4 w-full attribute-select ">
                                    <option value="">انتخاب کنید</option>
                                    ${
        attributes.map(function(item) {
            return `<option value="${item}">${item}</option>`
        })
    }
                                 </select>
                            </div>
                        </div>

                    </div>
                `
}

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
