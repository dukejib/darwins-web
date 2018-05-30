<?php


Route::get('updates','FrontEndController@updates')->name('updates');
/** Cart Related Routes */
Route::get('/cart','CartController@cart')->name('cart'); //Show Cart
Route::get('/cart/clear','CartController@clear_cart')->name('cart.clear'); //Clear Cart
Route::get('/cart/order_product/{option}/{bitcoin}','CartController@cart_order_product')->name('cart.order.product'); //Checkout Cart
Route::get('/cart/order_book/{option}/{bitcoin}','CartController@cart_order_book')->name('cart.order.book'); //Checkout Cart
Route::get('/cart/paynow/{orderid}/{paymentoptions}','CartController@paynow')->name('cart.paynow'); //Pay Now Process
Route::get('/cart/add_to_cart/{id}','CartController@add_to_cart')->name('cart.add');
Route::get('/cart/decrease_item/{id}{qty}','CartController@decrease_item')->name('cart.decrease');
Route::get('/cart/increase_item/{id}{qty}','CartController@increase_item')->name('cart.increase');
/** Bitcoin Related Routes */
Route::get('/gap','BitcoinController@get_gap');
Route::get('/response/{orderid}','BitcoinController@get_response')->name('get_response');
Route::get('/receive_payment','BitcoinController@receive_payment'); 
Route::get('/get_btc_address/{orderid}','BitcointController@get_btc_address')->name('get_btc_address'); //This gets the Btc QR Code and save it in database

/** Common Routes */
Route::get('/','FrontEndController@index')->name('home');    //Show Index Page with Products
Route::get('/aboutus','FrontEndController@aboutUs')->name('aboutus');
Route::get('/aboutbusiness','FrontEndController@aboutBusiness')->name('aboutbusiness');
Route::get('/originsofqr','FrontEndController@originsOfQR')->name('originsQR');
Route::get('/howitworks','FrontEndController@howItWorks')->name('howItWorks');
Route::get('/theapp','FrontEndController@aboutTheApp')->name('theApp');
Route::get('/privacypolicy','FrontEndController@privacyPolicy')->name('privacyPolicy');
Route::get('/affiliate/document','FrontEndController@affiliates')->name('affiliate.document');
Route::get('/termsofservice','FrontEndController@termsOfService')->name('termsOfService');
Route::get('/termsofservice/getpdf','FrontEndController@tos_getpdf')->name('getpdf');
Route::get('/brochure/page','FrontEndController@brochure')->name('show_brochure');
Route::get('/brochure/getpdf','FrontEndController@brochure_getpdf')->name('getbrochure');
Route::get('/newsletter','FrontEndController@newsLetter')->name('newsLetter'); //Show page with form
Route::post('/newsletter','FrontEndController@postNewsLetter')->name('newsLetter'); //Submit form
Route::get('/newsletter/confirm/{email}/{confirm}','FrontEndController@confirmNewsLetter')->name('newsletter.confirm');
Route::get('/article/{id}','FrontEndController@article')->name('article.show');
Route::get('/faqs','FrontEndController@faqs')->name('faqs');
Route::get('/contactus','FrontEndController@contactus')->name('contactus'); //Contact Form
Route::post('/contactus','FrontEndController@storeContactUs')->name('contactus'); //Contact Form
Route::get('/dropdown/{id}','FrontEndController@drop_down')->name('dropdown'); //Get the specific category
Route::get('/product/selected/{id}','FrontEndController@get_item')->name('show.product');
Route::get('/service/selected/{id}','FrontEndController@get_item')->name('show.service');
Route::get('/referred','UserController@getRefferal'); //This reroute the refferal proparly
// Resource COntroller
Route::resource('testimony', 'TestimonyController');

//============================//
//   Authenticated Routes     // 
//============================//
/** User related routes - SignIn etc */
Route::group(['prefix' => 'user'],function(){
    Route::get('/signin','UserController@getUserSignIn')->name('signin');
    Route::post('/signin','UserController@postUserSignIn')->name('signin');
    Route::get('/signup','UserController@getUserSignUp')->name('signup');
    Route::post('/signup','UserController@postUserSignUp')->name('signup');
    Route::get('/signout','UserController@getUserSignOut')->name('signout')->middleware('auth');
    Route::get('/affiliate/{id}','UserController@user_affiliate')->name('user.affiliate')->middleware('auth');
    Route::get('/delete/{id}','UserController@user_delete')->name('user.delete')->middleware('auth');
    
    Route::get('/profile','UserController@user_profile')->name('user.profile')->middleware('auth'); // Get The Page
    Route::get('/orders','UserController@user_orders')->name('user.orders')->middleware('auth'); // Get The Page
    Route::get('/referals','UserController@user_referals')->name('user.referals')->middleware('auth'); // Get The Page
    Route::get('/groups','UserController@user_groups')->name('user.groups')->middleware('auth'); // Get The Page
    Route::get('/banners','UserController@user_banners')->name('user.banners')->middleware('auth'); // Get The Page

    Route::post('/basic','UserController@user_basic')->name('user.profile.basic')->middleware('auth'); 
    Route::post('/password','UserController@user_password')->name('user.profile.account')->middleware('auth'); 
    Route::post('/contact','UserController@user_contact')->name('user.profile.contact')->middleware('auth');
    Route::get('/becomeaffiliate','UserController@become_affiliate')->name('user.profile.become_affiliate')->middleware('auth');
    Route::get('/checkout/vpc/{orderid}','UserController@checkout_vpc')->name('cart.checkout.vpc')->middleware('auth');
    Route::get('/checkout/usps/{orderid}','UserController@checkout_usps')->name('cart.checkout.usps')->middleware('auth');
    Route::get('/checkout/btc/{orderid}','UserController@checkout_btc')->name('cart.checkout.btc')->middleware('auth');
    //Groups & Group_Users
    Route::post('/group/create','UserController@create_group')->name('user.group.create')->middleware('auth');
    Route::post('/group/add_to_group','UserController@add_to_group')->name('user.group.add_to')->middleware('auth');
});

/** Admin related routes -  */
Route::group(['prefix' => 'admin'],function(){
    
    /** Dashboard */
    Route::get('/dashboard','AdminController@dashboard')->name('dashboard');
    /** Website Settings */
    Route::get('/settings','SettingsController@index')->name('settings');
    Route::post('/settings/update','SettingsController@update')->name('setting.update');
    
    Route::get('/refill','SettingsController@refill_statement')->name('refill.show');
    Route::post('/refill/update','SettingsController@refill_update')->name('refill.update');
    
    Route::get('/app','SettingsController@app_statement')->name('app.show');
    Route::post('/app/update','SettingsController@app_update')->name('app.update');
    
    Route::get('/datafile','SettingsController@datafile')->name('datafile.show');
    Route::post('/datafile/update','SettingsController@datafile_update')->name('datafile.update');

    /** Terms of Service */
    Route::get('/tos', 'SettingsController@show_tos')->name('tos');
    Route::post('/tos/update','SettingsController@update_tos')->name('tos.update');
    /** Brochure */
    Route::get('/brochure', 'SettingsController@show_brochure')->name('brochure');
    Route::post('/brochure/update','SettingsController@update_brochure')->name('brochure.update');
    /** Carousel */
    Route::resource('carousel', 'CarouselController');
    /** Item - Product / Service  */
    Route::resource('product', 'ProductController');
    Route::resource('service', 'ServiceController');
    /** Global Category */
    Route::resource('global','GlobalCategoriesController');
    /** Sub Category */
    Route::resource('sub', 'SubCategoriesController');
    /** Local Category */
    Route::resource('local','LocalCategoriesController');
    /** Subscription */
    Route::get('/subscriptions','AdminController@newsLetters')->name('subscriptions');
    Route::get('/subscription/edit/{id}','AdminController@editNewsLetter')->name('subscription.edit');
    Route::post('/subscription/update/{id}','AdminController@updateNewsLetter')->name('subscription.update');
    Route::get('/subscription/delete/{id}','AdminController@deleteNewsLetter')->name('subscription.delete');
    /** Articles */
    Route::resource('article', 'ArticleController');
    Route::get('article/publish/{id}','ArticleController@publish')->name('admin.article.publish');
    Route::get('article/unpublish/{id}','ArticleController@unpublish')->name('admin.article.unpublish');
    /** Others */
    Route::get('/photos','AdminController@photos')->name('admin.photo.index');
    Route::post('/photos/store','AdminController@store_photo')->name('admin.photo.store');
    Route::get('/photos/destroy/{id}','AdminController@destroy_photo')->name('admin.photo.destroy');
    Route::get('/web_banner','AdminController@web_banners')->name('admin.web_banner.index');
    Route::get('/web_banner/edit/{id}','AdminController@web_banner_edit')->name('admin.web_banner.edit');
    Route::get('/web_banner/publish/{id}','AdminController@web_banner_publish')->name('admin.web_banner.publish');
    Route::post('/web_banners/update/{id}','AdminController@web_banner_update')->name('admin.web_banner.update');
    Route::get('/affiliates','AdminController@affiliates')->name('affiliates');
    Route::get('/customers','AdminController@customers')->name('customers');
    Route::get('/testimonials','AdminController@get_testimonials')->name('admin.testimonials');
    Route::get('/testimonials/approve/{id}','AdminController@approve_testimonial')->name('admin.testimonial.approve');
    Route::get('/testimonials/delete/{id}','AdminController@delete_testimonial')->name('admin.testimonial.delete');

    /** Orders */
    Route::get('/orders','AdminController@orders')->name('orders');
});
