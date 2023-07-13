function deleteUserDiscount(event,userId,discountId) {
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
        url : 'discounts/delete/user',
        data : JSON.stringify({
            userId : userId ,
            discountId :discountId,
            // cart : cartName,
            _method : 'post'
        }),
        success : function(res) {
            $('#userslist'+userId).fadeOut(1000);
            let x = document.getElementById('UsersCounter'+discountId).innerHTML;
            let par = document.getElementById('userslist'+userId).parentElement;
            let node = "<div class=\"intro-y col-span-12 md:col-span-12 items-center align-center text-center mb-2\">لیست خالی است</div>"
            console.log(x);
            if (x == 1){
                document.getElementById('usersbtn'+discountId).innerHTML = 'همه کاربران';
                par.insertAdjacentHTML('beforeend',node);
            }
            else {
                document.getElementById('UsersCounter' + discountId).innerText = Number(x) - 1;
            }
        }
    });
}

function deleteProductDiscount(event,productId,discountId) {
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
        url : 'discounts/delete/product',
        data : JSON.stringify({
            productId : productId ,
            discountId :discountId,
            // cart : cartName,
            _method : 'post'
        }),
        success : function(res) {
            $('#productslist'+productId).fadeOut(1000);
            let x = document.getElementById('ProductsCounter'+discountId).innerHTML;
            let par = document.getElementById('productslist'+productId).parentElement;
            let node = "<div class=\"intro-y col-span-12 md:col-span-12 items-center align-center text-center mb-2\">لیست خالی است</div>"
            console.log(x);
            if (x == 1){
                document.getElementById('productsbtn'+discountId).innerHTML = 'همه محصولات';
                par.insertAdjacentHTML('beforeend',node);
            }
            else {
                document.getElementById('ProductsCounter' + discountId).innerText = Number(x) - 1;
            }
        }
    });
}

function deleteCategoryDiscount(event,categoryId,discountId) {
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
        url : 'discounts/delete/category',
        data : JSON.stringify({
            categoryId : categoryId ,
            discountId :discountId,
            // cart : cartName,
            _method : 'post'
        }),
        success : function(res) {
             $('#categorieslist'+categoryId).fadeOut(1000);
             let x = document.getElementById('CategoriesCounter'+discountId).innerHTML;
             let par = document.getElementById('categorieslist'+categoryId).parentElement;
             let node = "<div class=\"intro-y col-span-12 md:col-span-12 items-center align-center text-center mb-2\">لیست خالی است</div>"
             console.log(par);
             if (x == 1){
                 document.getElementById('categoriesbtn'+discountId).innerHTML = 'همه دسته بندی';
                 par.insertAdjacentHTML('beforeend',node);

             }
             else {
                 document.getElementById('CategoriesCounter' + discountId).innerText = Number(x) - 1;

             }
        }
    });
}
function deleteBrandDiscount(event,brandId,discountId) {
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
        url : 'discounts/delete/brand',
        data : JSON.stringify({
            brandId : brandId ,
            discountId :discountId,
            // cart : cartName,
            _method : 'post'
        }),
        success : function(res) {
             $('#brandslist'+brandId).fadeOut(1000);
             let x = document.getElementById('BrandsCounter'+discountId).innerHTML;
             let par = document.getElementById('brandslist'+brandId).parentElement;
             let node = "<div class=\"intro-y col-span-12 md:col-span-12 items-center align-center text-center mb-2\">لیست خالی است</div>"
             console.log(par);
             if (x == 1){
                 document.getElementById('brandsbtn'+discountId).innerHTML = 'همه برندها';
                 par.insertAdjacentHTML('beforeend',node);

             }
             else {
                 document.getElementById('BrandsCounter' + discountId).innerText = Number(x) - 1;

             }
        }
    });
}

function deleteTransportationDiscount(event,transportationId,discountId) {
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
        url : 'discounts/delete/transportation',
        data : JSON.stringify({
            transportationId : transportationId ,
            discountId :discountId,
            // cart : cartName,
            _method : 'post'
        }),
        success : function(res) {
             $('#transportationslist'+transportationId).fadeOut(1000);
             let x = document.getElementById('TransportationsCounter'+discountId).innerHTML;
            let par = document.getElementById('transportationslist'+transportationId).parentElement;
            let node = "<div class=\"intro-y col-span-12 md:col-span-12 items-center align-center text-center mb-2\">لیست خالی است</div>"
             console.log(x);
             if (x == 1){
                 document.getElementById('transportationsbtn'+discountId).innerHTML = 'همه حمل و نقل';
                 par.insertAdjacentHTML('beforeend',node);
             }
             else {
                 document.getElementById('TransportationsCounter' + discountId).innerText = Number(x) - 1;
             }
        }
    });
}


