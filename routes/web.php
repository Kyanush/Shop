<?php

//загрузить файл
Route::post('ckeditor-upload-image',   'UploadImageController@CkeditorUploadImage');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::group(['namespace'  => 'Site'], function () {
    Route::get('product-search', 'ProductController@productSearch');

    Route::get('/',          'MainController@main');
    Route::post('product-features-compare/{product_id}', 'ProductFeaturesCompareController@addAndDelete')->where(['product_id' => '[0-9]+']);

    //Корзина
    Route::post('cart-save',                'CartController@cartSave');
    Route::post('cart-delete/{product_id}', 'CartController@cartDelete')->where(['product_id' => '[0-9]+']);
    Route::get('cart-total/{carrier_id?}', 'CartController@cartTotal')->where(['carrier_id' => '[0-9]+']);;
    Route::get('header-cart-info',          'CartController@header_cart_info');

    Route::get('checkout',   'CartController@checkout');
    Route::post('checkout',  'CartController@saveCheckout');
    Route::post('one-click-order',  'CartController@oneClickOrder');

    Route::post('list-cart',                'CartController@listCart');

    Route::post('list-carriers',            'CarrierController@listCarriers');
    Route::post('list-payments',            'PaymentController@listPayments');

    Route::get('card-success-popup/{product_id}', 'ProductController@cardSuccessPopup')->where(['product_id' => '[0-9]+']);

    Route::get('product-features-compare-count',   'ProductFeaturesCompareController@count');
    Route::get('product-features-wishlist-count',  'ProductFeaturesWishlistController@count');

    Route::get('compare-products',                      'ProductFeaturesCompareController@compareProducts');
    Route::get('compare-product-delete/{product_id}',   'ProductFeaturesCompareController@compareProductDelete')->where(['product_id' => '[0-9]+']);

    Route::post('callback',  'CallbackController@callback');
    Route::post('contact',  'CallbackController@contact');

    Route::post('subscribe', 'SubscribeController@subscribe');


    $params = '';
    for ($i = 0; $i <= 100; $i++){
        $params .= "/{param$i?}";
    }

    Route::get('c/{category}',                   'CatalogController@c')->where(['category']);
    Route::get('catalog/{category?}' . $params,  'CatalogController@catalog')->where(['category']);
    Route::get('specials/{category?}' . $params, 'CatalogController@catalog')->where(['category']);

    Route::post('product-images/{product_id}',   'ProductController@productImages')->where(['product_id' => '[0-9]+']);

    Route::get('product/{category_url}/{product_url}/{product_tab?}',  'ProductController@productDetail')->where(['category_url'])
        ->where(['product_url'])
        ->where(['product_tab']);

    Route::post('product-review-set-like', 'ReviewController@setLike');

    Route::post('write-review',            'ReviewController@writeReview');
    Route::post('write-question',          'QuestionAnswerController@writeQuestion');

    Route::get('delivery-payment',          'PageController@deliveryPayment');
    Route::get('guaranty',          'PageController@guaranty');
    Route::get('contact',          'PageController@contact');
    Route::get('about',          'PageController@about');

});


//sitemap
Route::group(['namespace'  => 'Sitemap'], function () {
    Route::get('sitemap.xml', 'SitemapController@sitemap');
});


Route::group(['middleware' => 'auth', 'namespace'  => 'Site'], function () {

    Route::post('product-features-wishlist/{product_id}', 'ProductFeaturesWishlistController@addAndDelete')->where(['product_id' => '[0-9]+']);

    Route::get('my-account',    'UserController@myAccount');
    Route::get('account-edit',  'UserController@accountEdit');
    Route::post('account-edit', 'UserController@accountEditSave');

    Route::get('change-password',  'UserController@changePassword');
    Route::post('change-password', 'UserController@changePasswordSave');

    Route::get('order-history',             'OrderController@orderHistory');
    Route::get('order-history/{order_id}',  'OrderController@orderHistoryDetail')->where(['order_id' => '[0-9]+']);;

    Route::get('wishlist',               'ProductFeaturesWishlistController@wishlist');
    Route::get('wishlist-delete/{product_id}',  'ProductFeaturesWishlistController@delete')->where(['product_id' => '[0-9]+']);

});












// Admin Interface
Route::group(['middleware' => ['role:admin'], 'prefix'     => 'admin', 'namespace'  => 'Admin'], function () {


    if (!request()->ajax()){
        Route::get('/{any}', 'AdminController@index')->where('any', '.*');

        Route::get('/', function () {
            return redirect('/admin/main');
        });

    }else{

        Route::get('categories-list',          'CategoryController@list');
        Route::get('category-view/{id}',       'CategoryController@view')->where(['id' => '[0-9]+']);
        Route::get('catalogs-tree/{type}',     'CategoryController@catalogsTree')->where(['type' => '[0-9]+']);

        Route::post('category-save',          'CategoryController@save');
        Route::post('category-delete/{id}',    'CategoryController@delete')->where(['id' => '[0-9]+']);
        Route::post('reorder-save',            'CategoryController@reorderSave');

        Route::get('attributes-list',          'AttributeController@list');
        Route::post('attribute-save',          'AttributeController@save');
        Route::get('attribute-view/{id}',      'AttributeController@view')->where(['id' => '[0-9]+']);
        Route::post('attribute-delete/{id}',   'AttributeController@delete')->where(['id' => '[0-9]+']);

        Route::get('attributes-sets-list ',      'AttributeSetController@list');
        Route::post('attribute-set-save',        'AttributeSetController@save');
        Route::get('attribute-set-view/{id}',    'AttributeSetController@view')->where(['id' => '[0-9]+']);
        Route::post('attribute-set-delete/{id}', 'AttributeSetController@delete')->where(['id' => '[0-9]+']);

        Route::any('products-list',              'ProductController@list');
        Route::get('attribute-sets-more-info',   'ProductController@AttributeSetsMoreInfo');
        Route::post('product-save',              'ProductController@save');
        Route::get('product-view/{id}',          'ProductController@view')->where(['id' => '[0-9]+']);
        Route::post('product-delete/{id}',       'ProductController@delete')->where(['id' => '[0-9]+']);
        Route::post('product-price-min-max',     'ProductController@priceMinMax');
        Route::post('products-attributes-filters',   'ProductController@productsAttributesFilters');
        Route::get('group-products/{group_id}',  'ProductController@groupProducts')->where(['group_id' => '[0-9]+']);
        Route::post('clone-product',             'ProductController@cloneProduct');
        Route::get('all-products-select2',       'ProductController@allProductsSelect2');

        //отзывы
        Route::get('reviews-list',                'ReviewController@list');
        Route::post('review-delete/{review_id}',  'ReviewController@delete')->where(['review_id' => '[0-9]+']);
        Route::post('review-save',                'ReviewController@save');


        //Вопросы-ответы
        Route::get('questions-answers-list',               'QuestionAnswerController@list');
        Route::post('question-answer-delete/{review_id}',  'QuestionAnswerController@delete')->where(['review_id' => '[0-9]+']);
        Route::post('question-answer-save',                'QuestionAnswerController@save');

        //Пользователи
        Route::get('users-list',        'UserController@list');
        Route::get('user-view/{id}',    'UserController@view')->where(['id' => '[0-9]+']);
        Route::post('user-save',        'UserController@save');
        Route::post('user-delete/{id}', 'UserController@delete')->where(['id' => '[0-9]+']);

        //Роли
        Route::get('roles-list',        'RoleController@list');

        //Курьеры
        Route::get('carriers-list',              'CarrierController@list');
        Route::post('carrier-save',              'CarrierController@save');
        Route::get('carrier-view/{id}',          'CarrierController@view')->where(['id' => '[0-9]+']);
        Route::post('carrier-delete/{id}',       'CarrierController@delete')->where(['id' => '[0-9]+']);

        //Слайдер
        Route::get('sliders-list',              'SliderController@list');
        Route::post('slider-save',              'SliderController@save');
        Route::get('slider-view/{id}',          'SliderController@view')->where(['id' => '[0-9]+']);
        Route::post('slider-delete/{id}',       'SliderController@delete')->where(['id' => '[0-9]+']);

        //тип оплаты
        Route::get('payments-list',              'PaymentController@list');
        Route::post('payment-save',              'PaymentController@save');
        Route::get('payment-view/{id}',          'PaymentController@view')->where(['id' => '[0-9]+']);
        Route::post('payment-delete/{id}',       'PaymentController@delete')->where(['id' => '[0-9]+']);

        //Статусы заказов
        Route::get('order-statuses-list',             'OrderStatusController@list');
        Route::post('order-status-save',              'OrderStatusController@save');
        Route::get('order-status-view/{id}',          'OrderStatusController@view')->where(['id' => '[0-9]+']);
        Route::post('order-status-delete/{id}',       'OrderStatusController@delete')->where(['id' => '[0-9]+']);


        //Скидки
        Route::get('specific-prices-list',             'SpecificPriceController@list');
        Route::post('specific-price-delete/{id}',      'SpecificPriceController@delete')->where(['id' => '[0-9]+']);

        //Обратный звонок
        Route::get('callbacks-list',             'CallbackController@list');
        Route::post('callback-delete/{id}',      'CallbackController@delete')->where(['id' => '[0-9]+']);
        Route::post('callback-save',             'CallbackController@save');
        Route::get('callback-view/{id}',         'CallbackController@view')->where(['id' => '[0-9]+']);
        Route::get('new-callbacks-count',        'CallbackController@newCallbacksCount');


        //Заказы
        Route::get('orders-list',                'OrderController@list');
        Route::get('order/{id}',                 'OrderController@view')->where(['id' => '[0-9]+']);
        Route::get('order/users',                'OrderController@users');
        Route::post('order-save',                'OrderController@orderSave');
        Route::get('calendar-orders',            'OrderController@calendarOrders');
        Route::post('order-delete/{order_id}',   'OrderController@orderDelete')->where(['order_id' => '[0-9]+']);
        Route::get('new-orders-count',           'OrderController@newOrdersCount');

        //компания
        Route::get('addresses-list',        'AddressController@list');

        //Группа атрибутов
        Route::get('attribute-groups-list',        'AttributeGroupController@list');
    }
});

Auth::routes();