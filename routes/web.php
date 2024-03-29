<?php

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

use Facades\App\Http\Routes\Register;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'MainController@index');

Auth::routes();

Register::seoRoutes();

Route::get('oauth/{provider}', 'Auth\SocialAuthController@redirectToProvider')
    ->name('oauth');

Route::get('oauth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback')
    ->name('callback');

Route::get('/locale/{locale}', 'MainController@set_Session');

Route::get('currency/{value}', 'MainController@set_Session');

Route::get('/home', 'HomeController@index');

Route::get('/aboutus', 'MainController@aboutus');

Route::get('/fullrepuesto', 'MainController@index');

Route::get('/contacts', 'MainController@contacts');

Route::get('/welcome', 'MainController@welcome');

// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset.token');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('user/activation/{token}', 'Auth\LoginController@userActivation');

Route::get('/frame/{id}', 'MainController@frame');

Route::get('/search', 'MainController@mainSearch'); 

Route::get('items/search/{id}', 'MainController@search');

Route::get('search/autocomplete', 'MainController@autocomplete');

Route::get('/filter/{slug}/{id}', 'MainController@filter');

Route::get('/roles', 'MainController@getRoles');

Route::get('/{slug}/{id}/question', 'QuestionController@index');
Route::get('/{slug}/{id}/question/reply/{questionId}', 'ReplyController@index');
Route::get('/isAdmin', 'MainController@isAdmin');

Route::get('conversations', 'ConversationController@index');
Route::get('conversations/{conversation}/users', 'ConversationController@participants');
Route::get('conversations/{conversation}/messages', 'ConversationController@getMessages');

Route::get('/conversations/{conversation}/show', 'ConversationController@show');

Route::post('conversations/{productName}', 'ConversationController@store');
Route::post('conversations/{conversation}/users', 'ConversationController@join');
Route::post('conversations/{conversation}/messages', 'ConversationController@sendMessage');

Route::delete('conversations/{conversation}/users', 'ConversationController@leaveConversation');
Route::delete('conversations/{conversation}/messages', 'ConversationController@deleteMessages');

Route::get('/order-product/{product_id}', 'BackendController@orderData');

Route::get('/backend/order/{orderId}', 'BackendController@orderDetails');

Route::get('/rating/{productId}', 'ArticlesController@getRating');
Route::post('/rating/{productId}/{rating}', 'ArticlesController@setRating');


Route::middleware('admin:user')
    ->prefix('/{slug}/{id}')
    ->group(function(){
        Route::get('/question/delete/{questionId}', 'QuestionController@destroy');
        Route::get('/question/{questionId}/reply/delete', 'ReplyController@destroy');
        Route::post('/question', 'QuestionController@store');
        Route::post('/question/{questionId}/reply', 'ReplyController@store');    
        Route::put('/question/update', 'QuestionController@update');
        Route::put('/question/{questionId}/reply/update', 'ReplyController@update');
    });


Route::middleware('admin:user')
    ->group(function () {
        Route::get('cart', 'ShoppingController@index');
        
        Route::put('cart/update', 'ShoppingController@updateItem');
        Route::get('cart/remove/{id}', 'ShoppingController@removeItem');
        Route::get('/cart/delete', 'ShoppingController@delete');
        Route::post('cart/store', 'ShoppingController@storeItem');
    });

Route::middleware('admin:user')
    ->prefix('checkout')
    ->group(function () {
        Route::get('/shipping', 'CheckoutController@checkout');
        Route::post('/store', 'ShoppingController@customerStore');
        Route::get('/show', 'CheckoutController@checkoutShow');
        Route::get('/create', 'ShoppingController@createOrder');
        Route::get('/order', 'ShoppingController@finalOrder');
    });

Route::middleware('admin:user')
    ->prefix('payment')
    ->group(function () {
        Route::get('/alert', 'PaymentController@getAlert');
        Route::get('/checkout', 'PaymentController@getCheckout');
        Route::get('/done', 'PaymentController@getDone');
        Route::get('/cancel', 'PaymentController@getCancel');
    });


Route::middleware('admin:user')
    ->prefix('backend')
    ->group(function () {
        Route::get('/user', 'BackendController@dashboard');
        Route::get('user-orders', 'BackendController@userOrders');
        Route::get('user-orders/{orderId}', 'BackendController@orderDetails');
        Route::get('user-orders/{orderId}', 'BackendController@orderDetails');
        Route::get('order/delete/{orderId}', 'BackendController@deleteOrder');
        Route::get('user-messages', 'BackendController@userMessages');
        Route::get('my-questions', 'BackendController@myQuestions'); 
        Route::get('conversationsUser', 'ConversationController@conversationsUser');
        Route::get('replies-user/{questionId}', 'ReplyController@indexBackend');
        Route::get('questionsUser', 'QuestionController@index'); 
        Route::get('questionUser/delete/{questionId}', 'QuestionController@destroy'); 
        Route::get('replies/{questionId}', 'ReplyController@indexBackend');
        Route::any('user-orders/edit', 'BackendController@userOrdersEdit');
        Route::get('profile', 'BackendController@profile');
        Route::group(['middleware' => 'user'], function () {
            Route::any('profile/edit', 'BackendController@profileEdit');
        });

    });

Route::middleware('admin:admin')
    ->prefix('backend')
    ->group(function () {
        Route::get('brands', 'BackendController@brand');
        Route::any('brands/edit', 'BackendController@brandsEdit');
        Route::get('category', 'BackendController@category');
        Route::any('category/edit', 'BackendController@CategoryEdit');
        Route::get('products', 'BackendController@products');
        Route::get('product/delete/{productId}', 'ArticlesController@destroy');
        Route::get('products/{productId}', 'BackendController@productDetails');
        Route::get('products/edit/{productId}', 'BackendController@productEdit');
        Route::put('product/update/{productId}', 'ArticlesController@update');
        Route::put('product/{cat_id}/{porcentaje}', 'ArticlesController@updatePrice');
        Route::get('questions', 'BackendController@questions');
        Route::get('replies', 'BackendController@replies');
        Route::get('messages', 'BackendController@messages');
        // Route::get('product/{id}', 'MainController@getProducts');
        Route::get('product/addProduct', 'BackendController@addProduct');
        // Route::any('products/edit', 'BackendController@productsEdit');
        Route::any('product/create', 'ArticlesController@store');
        Route::get('orders', 'BackendController@orders');
        Route::get('order-details/{orderId}', 'BackendController@orderDetails');
        Route::any('orders/edit', 'BackendController@ordersEdit');
        Route::get('order/delete/{orderId}', 'BackendController@deleteOrder');
        Route::get('/admin', 'BackendController@dashboard');
        Route::get('roles', 'UsersController@role');
        Route::get('/question', 'QuestionController@index'); 
        Route::get('reply/{questionId}', 'ReplyController@indexBackend');
        Route::get('/question/delete/{id}', 'QuestionController@destroy');
        Route::post('roles', 'UsersController@createRole');
        Route::get('subcategory', 'BackendController@category');
        Route::any('subcategory/edit', 'BackendController@CategoryEdit');
        Route::resource('users', 'UsersController');
        Route::get('articles/search', 'ArticlesController@search');
        Route::resource('articles', 'ArticlesController');
        Route::post('reply/{questionId}', 'ReplyController@store');
       


    });