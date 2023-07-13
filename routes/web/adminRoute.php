<?php


use App\Http\Controllers\Admin\Brand\BrandController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Comment\CommentController;
use App\Http\Controllers\Admin\Discount\DiscountController;
use App\Http\Controllers\Admin\Gallery\GalleryController;
use App\Http\Controllers\Admin\Order\OrderController;
use App\Http\Controllers\Admin\Order\PaymentHistory\PaymentHistoryController;
use App\Http\Controllers\Admin\Payment\PaymentGatewayController;
use App\Http\Controllers\Admin\Product\Gallery\ProductGalleryController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Slider\SliderController;
use App\Http\Controllers\Admin\Transportation\TransportationsController;
use App\Http\Controllers\Admin\User\Address\AddressController;
use App\Http\Controllers\Admin\User\PermissionController as UserPermissionController;
use App\Http\Controllers\Admin\User\Role\PermissionController;
use App\Http\Controllers\Admin\User\Role\RoleController;
use App\Http\Controllers\Admin\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




//hello


Route::domain(parse_url(config('app.url'),PHP_URL_HOST))->group(function (){
   // session()->forget('errors');

        Route::get('/', function () {
            //dd(\Illuminate\Support\Facades\Gate::raw('show-categories',[]));
            return view('Admin.Dashboard');
        })->name('DashboardPanel');
        //Brands
        Route::prefix('brands')->middleware('can:show-brands')->group(function () {
            Route::post('/', [BrandController::class, 'index']);
            Route::get('/', [BrandController::class, 'index'])->name('brands.index');
            Route::get('create', [BrandController::class, 'create'])->name('brands.create')->middleware('can:create-brand');
            Route::post('store', [BrandController::class, 'store'])->name('brands.store')->middleware('can:create-brand');
            Route::patch('{brand}', [BrandController::class, 'update'])->name('brands.update')->middleware('can:edit-brand');
            Route::delete('{brand}', [BrandController::class, 'destroy'])->name('brands.destroy')->middleware('can:delete-brand');
            Route::delete('/', [BrandController::class, 'multiDestroy'])->name('brands.multiDestroy')->middleware('can:delete-brand');
        });
    Route::prefix('financial')->group(function () {
    Route::get('/payment/history', [PaymentHistoryController::class, 'index'])->name('financial.paymentsHistory.index')->middleware('can:show-paymentHistories');
    Route::post('/payment/history', [PaymentHistoryController::class, 'index'])->middleware('can:show-paymentHistories');

        Route::post('/payment/history/success', [PaymentHistoryController::class, 'successIndex'])->name('PaymentHistory.index.success');
    Route::post('/payment/history/failed', [PaymentHistoryController::class, 'failedIndex'])->name('PaymentHistory.index.failed');
    Route::get('/payment/history/success', [PaymentHistoryController::class, 'successIndex']);
    Route::get('/payment/history/failed', [PaymentHistoryController::class, 'failedIndex']);

        });

    //orders
    Route::prefix('orders')->middleware('can:show-orders')->group(function () {
        Route::post('/', [OrderController::class, 'index']);
        Route::get('/', [OrderController::class, 'index'])->name('orders.index');
        Route::get('create', [OrderController::class, 'create'])->name('orders.create')->middleware('can:create-order');
        Route::get('detail/{order}', [OrderController::class, 'detail'])->name('orders.detail')->middleware('can:show-orders');
        Route::get('edit/{order}', [OrderController::class, 'edit'])->name('orders.edit')->middleware('can:edit-order');
        Route::post('store', [OrderController::class, 'store'])->name('orders.store')->middleware('can:create-orders');
        Route::patch('{order}', [OrderController::class, 'update'])->name('orders.update')->middleware('can:edit-order');
        Route::delete('{order}', [OrderController::class, 'destroy'])->name('orders.destroy')->middleware('can:delete-order');
        Route::delete('/', [OrderController::class, 'multiDestroy'])->name('orders.multiDestroy')->middleware('can:delete-order');
        Route::patch('change/status/payment', [OrderController::class, 'changeStatusPaymentAdmin'])->name('orders.changeStatusPaymentAdmin')->middleware('can:edit-order');
        Route::patch('change/ts', [OrderController::class, 'changeTrackingSerial'])->name('orders.changeTrackingSerial')->middleware('can:edit-order');
        Route::get('invoice/{order}', [OrderController::class, 'invoice'])->name('orders.invoice')->middleware('can:edit-order');

            //Payment history

    });
        //Users
        Route::prefix('users')->middleware('can:show-users')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('users.index');
            Route::post('/', [UserController::class, 'index']);
            Route::get('create', [UserController::class, 'create'])->name('users.create')->middleware('can:create-user');
            Route::post('store', [UserController::class, 'store'])->name('users.store')->middleware('can:create-user');
            Route::get('edit/{user}', [UserController::class, 'edit'])->name('users.edit')->middleware('can:edit-user');
            Route::patch('{user}', [UserController::class, 'update'])->name('users.update')->middleware('can:edit-user');
            Route::delete('{user}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('can:delete-user');
            Route::delete('/', [UserController::class, 'multiDestroy'])->name('users.multiDestroy')->middleware('can:delete-user');
            Route::get('/{user}/permissions',[UserPermissionController::class,'create'])->name('users.permissions');
            Route::post('/{user}/permissions',[UserPermissionController::class,'store'])->name('users.permissions.store');
            Route::post('{user}', [UserController::class, 'imageUpdate'])->name('users.imageUpdate')->middleware('can:edit-user');

        });
    //Gallery
    Route::prefix('galleries')->group(function () {
        Route::get('/', [GalleryController::class, 'index'])->name('galleries.index');
        Route::post('/', [GalleryController::class, 'index']);
        Route::post('store', [GalleryController::class, 'store'])->name('galleries.store');
        Route::patch('{gallery}', [GalleryController::class, 'update'])->name('galleries.update');
        Route::delete('{gallery}', [GalleryController::class, 'destroy'])->name('galleries.destroy');

    });
    Route::prefix('sliders')->group(function () {
        Route::get('/', [SliderController::class, 'index'])->name('sliders.index');
        Route::post('/', [SliderController::class, 'index']);
        Route::get('create', [SliderController::class, 'create'])->name('sliders.create');
        Route::get('edit/{slider}', [SliderController::class, 'edit'])->name('sliders.edit');
        Route::post('store', [SliderController::class, 'store'])->name('sliders.store');
        Route::patch('{slider}', [SliderController::class, 'update'])->name('sliders.update');
        Route::delete('{slider}', [SliderController::class, 'destroy'])->name('sliders.destroy');
        Route::post('select/{slider}', [SliderController::class, 'select'])->name('sliders.select');

    });
    //Discount
    Route::prefix('discounts')->group(function () {
        Route::get('/', [DiscountController::class, 'index'])->name('discounts.index');
        Route::post('/', [DiscountController::class, 'index']);
        Route::get('create', [DiscountController::class, 'create'])->name('discounts.create')->middleware('can:create-discount');
        Route::post('store', [DiscountController::class, 'store'])->name('discounts.store')->middleware('can:create-discount');
        Route::get('edit/{discount}', [DiscountController::class, 'edit'])->name('discounts.edit')->middleware('can:edit-discount');
        Route::patch('{discount}', [DiscountController::class, 'update'])->name('discounts.update');
        Route::delete('{discount}', [DiscountController::class, 'destroy'])->name('discounts.destroy');
        Route::post('delete/user', [DiscountController::class, 'deleteUserDiscount']);
        Route::post('delete/product', [DiscountController::class, 'deleteProductDiscount']);
        Route::post('delete/category', [DiscountController::class, 'deleteCategoryDiscount']);
        Route::post('delete/brand', [DiscountController::class, 'deleteBrandDiscount']);
        Route::post('delete/transportation', [DiscountController::class, 'deleteTransportationDiscount']);


    });


    //Products
    Route::prefix('products')->middleware('can:show-products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('products.index');
        Route::post('/', [ProductController::class, 'index']);
        Route::get('create', [ProductController::class, 'create'])->name('products.create')->middleware('can:create-product');
        Route::post('store', [ProductController::class, 'store'])->name('products.store')->middleware('can:create-product');
        Route::get('edit/{product}', [ProductController::class, 'edit'])->name('products.edit')->middleware('can:edit-product');
        Route::patch('{product}', [ProductController::class, 'update'])->name('products.update')->middleware('can:edit-product');
        Route::delete('{product}', [ProductController::class, 'destroy'])->name('products.destroy')->middleware('can:delete-product');
        Route::delete('/', [ProductController::class, 'multiDestroy'])->name('products.multiDestroy')->middleware('can:delete-product');
        Route::post('/attribute/values', [ProductController::class,'getValues']);
        //Product Gallery
        Route::get('{product}/gallery', [ProductGalleryController::class, 'index'])->name('product.gallery.index');
        Route::post('{product}/gallery', [ProductGalleryController::class, 'index']);
        Route::post('/gallery/addimage/{product}',[ProductGalleryController::class, 'addImage'])->name('product.gallery.addImage');
        Route::delete('/gallery/deleteimage/{product}/{gallery}',[ProductGalleryController::class, 'deleteimage'])->name('product.gallery.deleteimage');
        Route::patch('/gallery/editimage/{gallery   }',[ProductGalleryController::class, 'update'])->name('product.gallery.update');
        Route::post('/gallery/default/{product}/{gallery}',[ProductGalleryController::class, 'defaultImage'])->name('product.gallery.default');

    });

        //
        Route::resource('categories', CategoryController::class);
//        Route::resource('products', ProductController::class);
        /*Route::resource('permissions', PermissionController::class);*/
        ////Addresses
        Route::resource('address',AddressController::class)->except('update');
        Route::post('address/update2', [AddressController::class, 'update2'])->name('address.update2');

    Route::prefix('permissions')->middleware('can:show-permissions')->group(function () {
        Route::post('/', [PermissionController::class, 'index']);
        Route::get('/', [PermissionController::class, 'index'])->name('permissions.index');
        Route::get('create', [PermissionController::class, 'create'])->name('permissions.create')->middleware('can:create-permission');
        Route::post('store', [PermissionController::class, 'store'])->name('permissions.store')->middleware('can:create-permission');
        Route::get('edit/{permission}', [PermissionController::class, 'edit'])->name('permissions.edit')->middleware('can:edit-permission');
        Route::patch('{permission}', [PermissionController::class, 'update'])->name('permissions.update')->middleware('can:edit-permission');
        Route::delete('{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy')->middleware('can:delete-permission');

    });
    Route::prefix('roles')->group(function () {
        Route::post('/', [RoleController::class, 'index']);
        Route::get('/', [RoleController::class, 'index'])->name('roles.index');
        Route::get('create', [RoleController::class, 'create'])->name('roles.create');
        Route::get('edit/{role}', [RoleController::class, 'edit'])->name('roles.edit');
        Route::post('store', [RoleController::class, 'store'])->name('roles.store');
        Route::patch('{role}', [RoleController::class, 'update'])->name('roles.update');
        Route::delete('{role}', [RoleController::class, 'destroy'])->name('roles.destroy');

    });

    Route::prefix('comments')->group(function () {
        Route::post('/', [CommentController::class, 'index']);
        Route::get('/', [CommentController::class, 'index'])->name('comments.index');
        Route::post('/approved', [CommentController::class, 'ApprovedIndex'])->name('comments.index.approved');
        Route::post('/unapproved', [CommentController::class, 'unApprovedIndex'])->name('comments.index.unapproved');
        Route::get('/approved', [CommentController::class, 'ApprovedIndex']);
        Route::get('/unapproved', [CommentController::class, 'unApprovedIndex']);
        Route::get('create', [CommentController::class, 'create'])->name('comments.create');
        Route::post('store', [CommentController::class, 'store'])->name('comments.store');
        Route::patch('/approved/{comment}', [CommentController::class, 'updateApproved'])->name('comments.update.approved');
    });
    Route::patch('comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::resource('transportations',TransportationsController::class);
    Route::post('transportations',[TransportationsController::class,'index']);
    //payment Gateway
    Route::resource('paymentgateways',PaymentGatewayController::class);
    Route::post('paymentgateways',[PaymentGatewayController::class,'index']);

    Route::get('login', function () {

            return view('Admin.Users.Login');
            //return view('dashboard');
        })->middleware(['auth'])->name('dashboard');
    Route::get('/reports/users',[\App\Http\Controllers\Admin\Reports\UsersReportController::class,'index'])->name('reports.users');




});
