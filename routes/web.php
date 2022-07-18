<?php

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


//SUDAH
Route::get('/','User\PagesController@home')->name('home');
Route::get('/about-us','User\PagesController@aboutUs')->name('about-us');
Route::get('/contact-us','User\PagesController@contactUs')->name('contact-us');
Route::post('/send-message', 'User\SendMessageController')->name('contact.store');

Route::group(['prefix' => 'product', 'as' => 'product-'], function(){
    Route::get('/', 'User\ProductIndexController')->name('index');
    Route::get('/{slug}', 'User\ProductDetailController')->name('detail');
});

Auth::routes(['register' => false]);
Route::group(['prefix' => 'user'], function(){
    Route::group(['as' => 'login.'], function(){
        Route::get('login','User\LoginController@loginForm')->name('form');
        Route::post('login','User\LoginController@loginSubmit')->name('submit');
    });
    Route::group(['as' => 'register.'], function(){
        Route::get('register','User\RegisterController@registerForm')->name('form');
        Route::post('register','User\RegisterController@registerSubmit')->name('submit');
    });
    Route::get('logout','User\LogoutController')->name('user.logout');
});
// Route::post('password-reset', 'FrontendController@showResetForm')->name('password.reset');


Route::group(['prefix'=>'admin', 'as' => 'admin.', 'middleware'=> ['auth', 'admin']],function(){
    //DASHBOARD
    Route::get('/', 'Admin\DashboardController')->name('dashboard');
    //MESSAGES
    Route::resource('message', 'Admin\MessageController')->only(['index', 'show', 'delete']);

    //ORDER
    Route::get('/order-new', 'Admin\OrderNewController')->name('order-new');
    //PRODUCT
    Route::resource('product', 'Admin\ProductController')->except(['show']);
    Route::resource('category', 'Admin\ProductCategoryController')->except(['show']);
    Route::resource('shipping', 'Admin\ShippingController')->except(['show']);
    //ACCOUNT
    Route::resource('users', 'Admin\UserController')->except(['show']);
    Route::resource('admins', 'Admin\UserAdminController')->except(['show']);
    //WEBSITE
    Route::resource('banner','Admin\BannerController');
    Route::resource('settings','Admin\SettingController')->only(['index', 'update']);
    //PROFILE
    Route::resource('profile', 'Admin\ProfileController')->only(['edit', 'update']);
    Route::post('password-update/{id}', 'Admin\ChangePasswordController')->name('password-update');
    //
    Route::get('/clustering', 'Admin\ClusteringController@index')->name('clustering.index');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


//CEK
Route::group(['prefix' => 'product', 'as' => 'product-'], function(){
    // Route::get('/detail/{slug}','FrontendController@productDetail')->name('detail');
    Route::post('/search','FrontendController@productSearch')->name('search');
    Route::get('/cat/{slug}','FrontendController@productCat')->name('cat');
    Route::get('/sub-cat/{slug}/{sub_slug}','FrontendController@productSubCat')->name('sub-cat');
    Route::get('/brand/{slug}','FrontendController@productBrand')->name('brand');
});

//USER LOGGED IN
Route::group(['middleware' => 'user'], function() {
    //CART
    Route::get('/add-to-cart/{slug}', 'User\AddToCartController')->name('add-to-cart');
    Route::get('/proses-order', 'User\CartProcessController')->name('process-order');
    Route::resource('cart', 'User\CartController');
    Route::get('/checkout','CartController@checkout')->name('checkout');
    //USER
    Route::get('/pesanan', 'User\MyOrderController')->name('pesanan');
    // Route::resource('profile', 'User\ProfileController')->name('profile');

    // CEK
    Route::group(['prefix' => 'user'], function() {
        Route::get('/','HomeController@index')->name('user');
        //PROFILE
        Route::get('/profile','HomeController@profile')->name('user-profile');
        Route::post('/profile/{id}','HomeController@profileUpdate')->name('user-profile-update');
        //ORDER
        Route::get('/order',"HomeController@orderIndex")->name('user.order.index');
        Route::get('/order/show/{id}',"HomeController@orderShow")->name('user.order.show');
        Route::delete('/order/delete/{id}','HomeController@userOrderDelete')->name('user.order.delete');
        //CHANGE PASSWORD
        Route::get('change-password', 'HomeController@changePassword')->name('user.change.password.form');
        Route::post('change-password', 'HomeController@changPasswordStore')->name('change.password');
    });
});

Route::post('cart/order','OrderController@store')->name('cart.order');