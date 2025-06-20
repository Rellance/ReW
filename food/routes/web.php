<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Client\RestaurantController;
use App\Http\Controllers\Client\CouponController;
use App\Http\Controllers\Admin\ManageController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Admin\ManageOrderController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Frontend\FilterController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Admin\RoleController;

Route::get('/', [UserController::class, 'Index'])->name('index');


Route::get('/dashboard', function () {
    return view('frontend.dashboard.profile');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::post('/profile/store', [UserController::class, 'ProfileStore'])->name('profile.store');
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
    Route::get('/change/password', [UserController::class, 'UserChangePassword'])->name('change.password');
    Route::post('/user/password/update', [UserController::class, 'UserPasswordUpdate'])->name('user.password.update');
    //Get wishlist
    Route::get('/all/favourites', [HomeController::class, 'AllFavourites'])->name('all.favourites');
    Route::get('/remove/favourites/{id}', [HomeController::class, 'RemoveFavourites'])->name('remove.favourite');

    Route::controller(ManageOrderController::class)->group(function () {
        Route::get('/user/order/list', 'UserOrderList')->name('user.order.list');
        Route::get('/user/order/details/{id}', 'UserOrderDetails')->name('user.order.details');
        Route::get('/user/invoice/download/{id}', 'UserInvoiceDownload')->name('user.invoice.download');
    });
});


require __DIR__ . '/auth.php';

Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/password/update', [AdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update');
});


Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
Route::post('/admin/login_submit', [AdminController::class, 'AdminLoginSubmit'])->name('admin.login_submit');
Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
Route::get('/admin/forget_password', [AdminController::class, 'AdminForgetPassword'])->name('admin.forget_password');

Route::post('/admin/password_submit', [AdminController::class, 'AdminPasswordSubmit'])->name('admin.password_submit');

Route::get('/admin/reset-password/{token}/{email}', [AdminController::class, 'AdminResetPassword']);
Route::post('/admin/reset_password_submit', [AdminController::class, 'AdminResetPasswordSubmit'])->name('admin.reset_password_submit');

/// ALL ROUTE FOR CLIENT 

Route::middleware('client')->group(function () {
    Route::get('/client/dashboard', [ClientController::class, 'ClientDashboard'])->name('client.dashboard');
    Route::get('/client/profile', [ClientController::class, 'ClientProfile'])->name('client.profile');
    Route::post('/client/profile/store', [ClientController::class, 'ClientProfileStore'])->name('client.profile.store');
    Route::get('/client/change/password', [ClientController::class, 'ClientChangePassword'])->name('client.change.password');
    Route::post('/client/password/update', [ClientController::class, 'ClientPasswordUpdate'])->name('client.password.update');
});

Route::get('/client/login', [ClientController::class, 'ClientLogin'])->name('client.login');
Route::get('/client/register', [ClientController::class, 'ClientRegister'])->name('client.register');
Route::post('/client/register/submit', [ClientController::class, 'ClientRegisterSubmit'])->name('client.register.submit');
Route::post('/client/login_submit', [ClientController::class, 'ClientLoginSubmit'])->name('client.login_submit');
Route::get('/client/logout', [ClientController::class, 'ClientLogout'])->name('client.logout');

/// All Admin Category 
Route::middleware('admin')->group(function () {

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/all/category', 'AllCategory')->name('all.category')->middleware('permission:category.all');
        Route::get('/add/category', 'AddCategory')->name('add.category');
        Route::post('/store/category', 'StoreCategory')->name('category.store');
        Route::get('/edit/category/{id}', 'EditCategory')->name('edit.category');
        Route::post('/update/category', 'UpdateCategory')->name('category.update');
        Route::get('/delete/category/{id}', 'DeleteCategory')->name('delete.category');
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/all/city', 'AllCity')->name('all.city');
        Route::get('/add/category', 'AddCategory')->name('add.category');
        Route::post('/store/city', 'StoreCity')->name('city.store');
        Route::get('/edit/city/{id}', 'EditCity');
        Route::post('/update/city', 'UpdateCity')->name('city.update');
        Route::get('/delete/city/{id}', 'DeleteCity')->name('delete.city');
    });

    Route::controller(ManageController::class)->group(function () {
        Route::get('/admin/all/product', 'AdminAllProduct')->name('admin.all.product');
        Route::get('/admin/add/product', 'AdminAddProduct')->name('admin.add.product');
        Route::post('/admin/store/product', 'AdminStoreProduct')->name('admin.product.store');
        Route::get('/admin/edit/product/{id}', 'AdminEditProduct')->name('admin.edit.product');
        Route::post('/admin/update/product', 'AdminUpdateProduct')->name('admin.product.update');
        Route::get('/admin/delete/product/{id}', 'AdminDeleteProduct')->name('admin.delete.product');
    });

    Route::controller(ManageController::class)->group(function () {
        Route::get('/pending/restaurant', 'PendingRestaurant')->name('pending.restaurant');
        Route::get('/clientChangeStatus', 'ClientChangeStatus');
        Route::get('/approve/restaurant', 'ApproveRestaurant')->name('approve.restaurant');
    });

    Route::controller(ManageController::class)->group(function () {
        Route::get('/banner/all', 'AllBanner')->name('all.banner');
        Route::post('/banner/store', 'StoreBanner')->name('banner.store');
        Route::get('/banner/delete/{id}', 'DeleteBanner')->name('delete.banner');
        Route::get('/banner/edit/{id}', 'EditBanner')->name('edit.banner');
        Route::post('/banner/update', 'BannerUpdate')->name('banner.update');
    });

    Route::controller(ManageOrderController::class)->group(function () {
        Route::get('/pending/order', 'PendingOrder')->name('pending.order');
        Route::get('/confirm/order', 'ConfirmOrder')->name('confirm.order');
        Route::get('/processing/order', 'ProcessingOrder')->name('processing.order');
        Route::get('/delivered/order', 'DeliveredOrder')->name('delivered.order');
        Route::get('/admin/order/details/{id}', 'OrderDetails')->name('admin.order.details');
    });

    Route::controller(ManageOrderController::class)->group(function () {
        Route::get('/pending_to_confirm/{id}', 'PendingToConfirm')->name('pending_to_confirm');
        Route::get('/confirm_to_processing/{id}', 'ConfirmToProcessing')->name('confirm_to_processing');
        Route::get('/processing_to_delivered/{id}', 'ProcessingToDelivered')->name('processing_to_delivered');
    });
    Route::controller(ReportController::class)->group(function () {
        Route::get('/admin/all/reports', 'AdminAllReports')->name('admin.all.reports');
        Route::post('/admin/search/bydate', 'AdminSearchByDate')->name('admin.search.bydate');
        Route::post('/admin/search/bymonth', 'AdminSearchByMonth')->name('admin.search.bymonth');
        Route::post('/admin/search/byyear', 'AdminSearchByYear')->name('admin.search.byyear');
    });

    Route::controller(ReviewController::class)->group(function () {
        Route::get('/admin/pending/review', 'AdminPendingReview')->name('admin.pending.review');
        Route::get('/admin/store/review', 'AdminApproveReview')->name('admin.approved.review');
        Route::get('/reviewChangeStatus', 'ReviewChangeStatus');
    });

    Route::controller(RoleController::class)->group(function () {
        Route::get('/all/permission', 'RolePermission')->name('all.permission');
        Route::get('/add/permission', 'AddPermission')->name('add.permission');
        Route::post('/store/permission', 'StorePermission')->name('permission.store');
        Route::get('/edit/permission/{id}', 'EditPermission')->name('edit.permission');
        Route::post('/update/permission', 'UpdatePermission')->name('permission.update');
        Route::get('/delete/permission/{id}', 'DeletePermission')->name('delete.permission');
        Route::get('/import/permission/', 'ImportPermission')->name('import.permission');
        Route::post('/import', 'Import')->name('import');
        Route::get('/export/permission', 'Export')->name('export');
    });
    Route::controller(RoleController::class)->group(function () {
        Route::get('/all/roles', 'AllRoles')->name('all.roles');
        Route::get('/add/roles', 'AddRoles')->name('add.roles');
        Route::post('/store/roles', 'StoreRole')->name('store.role');
        Route::get('/edit/roles/{id}', 'EditRoles')->name('edit.roles');
        Route::post('/update/roles', 'RoleUpdate')->name('roles.update');
        Route::get('/delete/roles/{id}', 'DeleteRoles')->name('delete.roles');

    });

    Route::controller(RoleController::class)->group(function () {
        Route::get('/add/role-permission', 'AddRolePermission')->name('add.roles.permission');
        Route::post('/store/roles/permission', 'StoreRolesPermission')->name('role.permission.store');
        Route::get('/all/roles/permission', 'AllRolePermission')->name('all.roles.permission');
        Route::get('/admin/edit/roles/{id}', 'AdminEditRoles')->name('admin.edit.roles');
        Route::post('/admin/roles/update/{id}', 'AdminUpdateRoles')->name('admin.update.roles');
        Route::get('/admin/delete/roles/{id}', 'AdminDeleteRoles')->name('admin.delete.permissions');
    });
    Route::controller(RoleController::class)->group(function () {
        Route::get('/all/admin', 'AllAdmin')->name('all.admin');
        Route::get('/add/admin', 'AddAdmin')->name('add.admin');
        Route::post('/store/admin', 'StoreAdmin')->name('admin.store');
        Route::get('/edit/admin/{id}', 'EditAdmin')->name('edit.admin');
        Route::post('/update/admin/{id}', 'UpdateAdmin')->name('admin.update');
        Route::get('/delete/admin/{id}', 'DeleteAdmin')->name('delete.admin');
    });
}); // End Admin Middleware

Route::middleware(['status', 'client'])->group(function () {

    Route::controller(RestaurantController::class)->group(function () {
        Route::get('/all/menu', 'AllMenu')->name('all.menu');
        Route::get('/add/menu', 'AddMenu')->name('add.menu');
        Route::post('/store/menu', 'StoreMenu')->name('menu.store');
        Route::get('/edit/menu/{id}', 'EditMenu')->name('edit.menu');
        Route::post('/update/menu', 'UpdateMenu')->name('menu.update');
        Route::get('/delete/menu/{id}', 'DeleteMenu')->name('delete.menu');
    });

    Route::controller(RestaurantController::class)->group(function () {
        Route::get('/all/product', 'AllProduct')->name('all.product');
        Route::get('/add/product', 'AddProduct')->name('add.product');
        Route::post('/store/product', 'StoreProduct')->name('product.store');
        Route::get('/edit/product/{id}', 'EditProduct')->name('edit.product');
        Route::post('/update/product', 'UpdateProduct')->name('product.update');
        Route::get('/delete/product/{id}', 'DeleteProduct')->name('delete.product');
    });

    Route::controller(RestaurantController::class)->group(function () {
        Route::get('/all/gallery', 'AllGallery')->name('all.gallery');
        Route::get('/add/gallery', 'AddGallery')->name('add.gallery');
        Route::post('/store/gallery', 'StoreGallery')->name('gallery.store');
        Route::get('/edit/gallery/{id}', 'EditGallery')->name('edit.gallery');
        Route::post('/update/gallery', 'UpdateGallery')->name('gallery.update');
        Route::get('/delete/gallery/{id}', 'DeleteGallery')->name('delete.gallery');
    });

    Route::controller(CouponController::class)->group(function () {
        Route::get('/all/coupon', 'AllCoupon')->name('all.coupon');
        Route::get('/add/coupon', 'AddCoupon')->name('add.coupon');
        Route::post('/store/coupon', 'StoreCoupon')->name('coupon.store');
        Route::get('/edit/coupon/{id}', 'EditCoupon')->name('edit.coupon');
        Route::post('/update/coupon', 'UpdateCoupon')->name('coupon.update');
        Route::get('/delete/coupon/{id}', 'DeleteCoupon')->name('delete.coupon');
    });

    Route::controller(ManageOrderController::class)->group(function () {
        Route::get('/all/client/orders', 'AllClientOrders')->name('all.client.orders');
        Route::get('/client/order/details/{id}', 'ClientOrderDetails')->name('client.order.details');
    });
    Route::controller(ReportController::class)->group(function () {
        Route::get('/client/all/reports', 'ClientAllReports')->name('client.all.report');
        Route::post('/client/search/bydate', 'ClientSearchByDate')->name('client.search.bydate');
        Route::post('/client/search/bymonth', 'ClientSearchByMonth')->name('client.search.bymonth');
        Route::post('/client/search/byyear', 'ClientSearchByYear')->name('client.search.byyear');
    });

    Route::controller(ReviewController::class)->group(function () {
        Route::get('/client/allreviews', 'ClientAllReviews')->name('client.all.reviews');
    });
});
// End Client Middleware

/// ALL ROUTE FOR USER
Route::get('/changeStatus', [RestaurantController::class, 'ChangeStatus']);

Route::controller(HomeController::class)->group(function () {
    Route::get('/restaurant/details/{id}', 'RestaurantDetails')->name('res.detail');
    Route::post('/add-favourite/{id}', 'AddFavourite');
});

Route::controller(CartController::class)->group(function () {
    Route::get('/add_to_cart/{id}', 'AddToCart')->name('add_to_cart');
    Route::post('/cart/update', 'UpdateCart')->name('cart.update');
    Route::post('/cart/remove', 'RemoveCart')->name('cart.remove');
    Route::post('/apply-coupon', 'ApplyCoupon');
    Route::get('/remove-coupon', 'RemoveCoupon');
    Route::get('/checkout', 'Checkout')->name('checkout');
});

Route::controller(OrderController::class)->group(function(){
    Route::post('/cash_order', 'CashOrder')->name('cash_order');
    Route::post('/stripe_order', 'StripeOrder')->name('stripe_order');
    Route::post('/mark-notification-as-read/{notification}', 'MarkAsRead');

    

});
Route::controller(ReviewController::class)->group(function () {
    Route::post('/store/review', 'StoreReview')->name('store.review');
});

Route::controller(FilterController::class)->group(function () {
    Route::get('/list/restaurant', 'ListRestaurant')->name('list.restaurant');
    Route::get('/filter/products', 'FilterProducts')->name('filter.products');
});

Route::get('/thanks', function () {
    return view('frontend.checkout.thanks');
})->name('frontend.checkout.thanks');
