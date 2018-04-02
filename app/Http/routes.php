<?php

Route::get('updates', function () {
    return view('updates');
});

Route::get('pro',function(){
    return \App\User::with(['orders','orders.order_details'])->where('role','=',1)->get();
});

/** Cart Related Routes */
Route::get('/cart','CartController@cart')->name('cart'); //Show Cart
Route::get('/cart/clear','CartController@clearCart')->name('cart.clear'); //Clear Cart
Route::get('/cart/checkout/{toggle}/{paymentoptions}','CartController@checkoutCart')->name('cart.checkout'); //Checkout Cart
Route::get('/cart/add_to_cart/{id}','CartController@add_to_cart')->name('cart.add');
Route::get('/cart/decrease_item/{id}{qty}','CartController@decrease_item')->name('cart.decrease');
Route::get('/cart/increase_item/{id}{qty}','CartController@increase_item')->name('cart.increase');
Route::get('/receive_payment','CartController@receive_payment');

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
Route::get('/newsletter','FrontEndController@newsLetter')->name('newsLetter'); //Show page with form
Route::post('/newsletter','FrontEndController@postNewsLetter')->name('newsLetter'); //Submit form
Route::get('/newsletter/confirm/{email}/{confirm}','FrontEndController@confirmNewsLetter')->name('newsletter.confirm');
Route::get('/article/{id}','FrontEndController@article')->name('article.show');
Route::get('/contactus','FrontEndController@contactus')->name('contactus'); //Contact Form
Route::post('/contactus','FrontEndController@storeContactUs')->name('contactus'); //Contact Form
Route::get('/dropdown/{id}','FrontEndController@drop_down')->name('dropdown'); //Get the specific category
Route::get('/product/selected/{id}','FrontEndController@get_item')->name('show.product');
Route::get('/service/selected/{id}','FrontEndController@get_item')->name('show.service');
Route::get('/referred','UserController@getRefferal'); //This reroute the refferal proparly
Route::get('/clearsession',function(){
    Session::flush();
    return redirect()->route('home');
});
/** Authenticated Routes */


/** User related routes - SignIn etc */
Route::group(['prefix' => 'user'],function(){
    Route::get('/signin','UserController@getUserSignIn')->name('signin');
    Route::post('/signin','UserController@postUserSignIn')->name('signin');
    Route::get('/signup','UserController@getUserSignUp')->name('signup');
    Route::post('/signup','UserController@postUserSignUp')->name('signup');
    Route::get('/signout','UserController@getUserSignOut')->name('signout')->middleware('auth');
    Route::get('/profile','ProfileController@index')->name('user.profile')->middleware('auth'); // User Profile
    Route::post('/profile/basic','ProfileController@basic')->name('user.profile.basic')->middleware('auth'); 
    Route::post('/profile/account','ProfileController@account')->name('user.profile.account')->middleware('auth'); 
    Route::post('/profile/contact','ProfileController@contact')->name('user.profile.contact')->middleware('auth');
    Route::get('/profile/becomeaffiliate','ProfileController@become_affiliate')->name('user.profile.become_affiliate')->middleware('auth');
    Route::get('/affiliate/{id}','UserController@user_affiliate')->name('user.affiliate')->middleware('auth');
    Route::get('/unaffiliate/{id}','UserController@user_unaffiliate')->name('user.unaffiliate')->middleware('auth');
    Route::get('/user/delete/{id}','UserController@user_delete')->name('user.delete')->middleware('auth');
    
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
    Route::post('/web_banners/update/{id}','AdminController@web_banner_update')->name('admin.web_banner.update');
    Route::get('/affiliates','AdminController@affiliates')->name('affiliates');
    Route::get('/customers','AdminController@customers')->name('customers');
    Route::get('/orders','AdminController@orders')->name('orders');
});
