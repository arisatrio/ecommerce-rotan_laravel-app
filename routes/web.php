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
    Route::get('/add-to-cart/{slug}', 'Admin\AddToCartController')->name('add-to-cart');
    // Route::get('/add-to-cart/{slug}','CartController@addToCart')->name('add-to-cart');
    // Route::post('/add-to-cart','CartController@singleAddToCart')->name('single-add-to-cart');
    Route::group(['prefix' => 'cart', 'as' => 'cart'], function() {
        Route::get('/', 'CartController@index');
        Route::get('/delete/{id}','CartController@cartDelete')->name('.delete');
        Route::post('/update','CartController@cartUpdate')->name('.update');
    });
    Route::get('/checkout','CartController@checkout')->name('checkout');
    //USER

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
        //PRODUCT REVIEW
        Route::get('/user-review','HomeController@productReviewIndex')->name('user.productreview.index');
        Route::delete('/user-review/delete/{id}','HomeController@productReviewDelete')->name('user.productreview.delete');
        Route::get('/user-review/edit/{id}','HomeController@productReviewEdit')->name('user.productreview.edit');
        Route::patch('/user-review/update/{id}','HomeController@productReviewUpdate')->name('user.productreview.update');
        //POST COMMENT
        Route::get('user-post/comment','HomeController@userComment')->name('user.post-comment.index');
        Route::delete('user-post/comment/delete/{id}','HomeController@userCommentDelete')->name('user.post-comment.delete');
        Route::get('user-post/comment/edit/{id}','HomeController@userCommentEdit')->name('user.post-comment.edit');
        Route::patch('user-post/comment/udpate/{id}','HomeController@userCommentUpdate')->name('user.post-comment.update');
        //CHANGE PASSWORD
        Route::get('change-password', 'HomeController@changePassword')->name('user.change.password.form');
        Route::post('change-password', 'HomeController@changPasswordStore')->name('change.password');
    });
});

Route::post('cart/order','OrderController@store')->name('cart.order');
Route::get('order/pdf/{id}','OrderController@pdf')->name('order.pdf');
Route::get('/income','OrderController@incomeChart')->name('product.order.income');

// Product Review
Route::resource('/review','ProductReviewController');
Route::post('product/{slug}/review','ProductReviewController@store')->name('review.store');

// Payment
Route::get('payment', 'PayPalController@payment')->name('payment');
Route::get('cancel', 'PayPalController@cancel')->name('payment.cancel');
Route::get('payment/success', 'PayPalController@success')->name('payment.success');
//
