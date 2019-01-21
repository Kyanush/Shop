<?php Helper::generateVisitNumber(); ?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">

    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords"    content="@yield('keywords')">

    @yield('start_styles')

    <!--
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    --->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property="og:title" content="@yield('title')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ env('APP_URL') }}">
    <meta property="og:image" content="{{ env('APP_URL') }}/site/images/logo_firm.png">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:site_name" content="@yield('title')">

    <meta name="viewport" content="initial-scale=1.0,width=device-width">
    <script type="text/javascript" src="/site/js/jquery-3.3.1.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/site/css/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="/site/css/stylesheet_adaptive.css">
    <link rel="stylesheet" type="text/css" href="/site/css/style.css">



    @yield('end_styles')
    @yield('start_scripts')


    <!---- es  ----->
    <script type="text/javascript" src="/site/js/es.js"></script>
    <!---- es  ----->


    <!---- sweetalert2  ----->
    <script src="/site/sweetalert2/sweetalert2.all.min.js"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
    <link rel="stylesheet" type="text/css" href="/site/sweetalert2/sweetalert2.min.css">
    <!---- sweetalert2  ----->


    <!-- carousel --->
    <link rel="stylesheet" type="text/css" href="/site/carousel/owl.carousel.css"/>
    <script type="text/javascript" src="/site/carousel/owl.carousel-min.js"></script>
    <!-- carousel --->


    <!-- slick js --->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="http://kenwheeler.github.io/slick/slick/slick-theme.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- slick js --->


</head>


<body>


<div class="grey_bg" style="display: none;"></div>
<div id="card-success-popup" style="display: none"></div>
<div class="background_adaptive_filter" style="display: none;"></div>



<div id="header">
    <div class="container">
        <div class="header_top_adaptive_menu">
            <span>Меню</span>
        </div>
        <div class="header_top_adaptive_menu_inner">
            <div class="header_top_adaptive_menu_closed">
                <span>Меню</span>
                <div class="header_top_adaptive_menu_go_close"></div>
            </div>
            <div class="header_top_adaptive_menu_inner_links">
                <div class="as_a">
                    @guest
                        <a class="header_login_enter" href="/login">Войти</a>
                        <a class="header_login_register" href="/register">Регистрация</a>
                    @endguest
                    @auth
                        Вы вошли как
                        <a href="/my-account" class="login_link">{{ Auth::user()->name }}</a>
                        <b>(</b> <a href="/logout">Выйти</a> <b>)</b>
                    @endauth
                </div>
                <a href="/about">Магазины</a>
                <a href="/contact">Контакты</a>
                <a href="/delivery-payment">Доставка и оплата</a>
                <a href="/guaranty">Гарантия</a>
                <a href="/">Скидки</a>
                <a href="/about">О компании</a>
            </div>
        </div>
    </div>
    <div class="header_top_adaptive">,
    </div>
    <div id="header_top">
        <div class="container">
            <div id="welcome">
                @guest
                    <a class="header_login_enter" href="/login">Войти</a>
                    <a class="header_login_register" href="/register">Регистрация</a>
                @endguest
                @auth
                    Вы вошли как <a href="/my-account" class="login_link">{{ Auth::user()->name }}</a>
                    <b>(</b>
                    <a href="/logout">Выйти</a>
                    <b>)</b>
                @endauth
            </div>
        </div>
    </div>
    <div id="header_middle">
        <div class="container">
            <a id="logo" href="/">
                <img src="/site/images/logo_firm.png" title="{{ env('APP_NAME') }}" alt="{{ env('APP_NAME') }}">
            </a>
            <a class="rumi_shops_link" href="/contact">
                <span>Магазины</span>
            </a>
            <div id="search">
                <div class="button-search"></div>
                <div class="search-close"></div>
                <input type="search" name="search" placeholder="Поиск по товарам, например Xiaomi" class="product-search-desktop" autocomplete="off">
            </div>
            <div id="search_adaptive_icon"></div>
            <div id="header_phones">
                <a href="tel:84951202325"><span class="phone_top">+7 (495) <span>120 23 25</span></span></a>
                <div class="everyday_text">Круглосуточно
                    <span class="callback_button"><span>Обратный звонок</span></span>
                </div>
            </div>
        </div>
    </div>
    <div class="search_adaptive_line">
        <div class="container">
            <div id="search_adaptive">
                <div class="button-search2"></div>
                <div class="search-close2"></div>
                <input type="text" name="search2" placeholder="Поиск по товарам, например Xiaomi" class="product-search-mobile" autocomplete="off">
            </div>
        </div>
    </div>
    <div id="header_menu">
        <div class="container">
            <div id="menu_categories">
                <div id="menu_categories_selector">
                    <span>Каталог товаров</span>
                </div>
                <div id="menu" style="display: none;" class="">
                    <ul>

                        <?php $categories = \App\Models\Category::orderBy('sort')->where('parent_id', 0)->get();?>

                        @foreach($categories as $category)
                            <li>
                                <a href="/catalog/{{ $category->url }}" class="{{ $category->class }} main_menu">
                                    <span>{{ $category->name }}</span>
                                </a>

                                <?php
                                $categories = [];
                                $category_childrens = \App\Models\Category::orderBy('sort')->where('parent_id', $category->id)->get();
                                foreach($category_childrens as $category_children){
                                    $categories[] = $category_children;
                                    $serviceCategory = new \App\Services\ServiceCategory();

                                    $childrens_all = \App\Models\Category::orderBy('sort')->whereIn('id', $serviceCategory->categoryChildIds($category_children->id, false))->get();
                                    foreach ($childrens_all as $item)
                                        $categories[] = $item;
                                }

                                $row_br = 18;
                                ?>

                                <div class="children" style="width: <?=ceil(count($categories) / $row_br) * 300;?>px;">
                                        <?php $row = 0; ?>
                                    @foreach($categories as $key => $item)
                                        <?php $row++; ?>
                                        @if($row == 1)
                                            <ul class="children-list">
                                            @endif
                                                <li>
                                                        @if($category->id == $item->parent_id)
                                                        <a class="link main_menu_sub" href="/catalog/{{ $item->url }}">
                                                                <span class="text">
                                                                    {{ $item->name }}
                                                                    @if($item->type)
                                                                        <div class="icon_{{ $item->type }}">
                                                                            {{ $item->typeValueDescription() }}
                                                                        </div>
                                                                    @endif
                                                                </span>
                                                            </a>
                                                    @else
                                                        <div class="subchildren">
                                                                <ul>
                                                                    <li>
                                                                        <a href="/catalog/{{ $item->url }}">
                                                                            <span>
                                                                                  {{ $item->name }}
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                    @endif
                                                    </li>
                                                @if($row == $row_br or count($categories) == $key + 1)
                                                </ul>
                                            <?php $row = 0; ?>
                                        @endif
                                    @endforeach
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <div id="header_middle_menu">
                <a href="/specials">Скидки</a>
                <a href="/delivery-payment">Доставка, оплата</a>
                <a href="/guaranty">Гарантия</a>
                <a href="/contact">Контакты</a>
            </div>

            <?php
                $servicePFC  = new \App\Services\ServiceProductFeaturesCompare();
                $servicePFW  = new \App\Services\ServiceProductFeaturesWishlist();
                $serviceCart = new \App\Services\ServiceCart();

                $servicePFCCount  = $servicePFC->count();
                $servicePFWCount  = $servicePFW->count();
                $serviceCartTotal = $serviceCart->cartTotal();
            ?>
            <a class="header_wishlist <?=$servicePFWCount == 0 ? 'non_active' : ''?>" href="/wishlist">
                <span>{{ $servicePFWCount }}</span>
            </a>
            <a class="header_compare <?=$servicePFCCount == 0 ? 'non_active' : ''?>" href="/compare-products">
                <span>{{ $servicePFCCount }}</span>
            </a>
            <div id="cart">
                <div class="heading {{ $serviceCartTotal['quantity'] > 0 ? 'heading_active' : '' }}">
                    <a title="Корзина покупок">
                        <span id="cart-total">
                            <span class="cart_counter">
                                {{ $serviceCartTotal['quantity'] }}
                            </span>
                            на сумму:
                            <span class="cart_sum">{{ \App\Tools\Helpers::priceFormat($serviceCartTotal['sum']) }}</span>
                        </span>
                    </a>
                </div>
                <div class="content">

                </div>
            </div>
        </div>
    </div>
</div>



    @yield('content')


    <div class="advantages_bottom_rumi">
    <div class="container">
        <div class="advantages_bottom_container_rumi">
            <a class="advantages_bottom_element_rumi advantage_1_rumi" href="https://market.yandex.ru/shop/273957/reviews?sort_by=date" target="_blank">
                <div class="advantages_bottom_element_rumi_header">Супер<br>репутация</div>
                <div class="advantages_bottom_element_rumi_text">Более 6 000 положительных<br>отзывов на Яндекс.Маркете</div>
                <div class="advantages_bottom_element_rumi_image"></div>
            </a>
            <a class="advantages_bottom_element_rumi advantage_2_rumi" href="/dostavka">
                <div class="advantages_bottom_element_rumi_header">Удобная<br>доставка</div>
                <div class="advantages_bottom_element_rumi_text">Более 3 500 пунктов<br>самовывоза по всей России</div>
                <div class="advantages_bottom_element_rumi_image"></div>
            </a>
            <a class="advantages_bottom_element_rumi advantage_3_rumi" href="/mibonus">
                <div class="advantages_bottom_element_rumi_header">Экономия<br>с MI-бонусами</div>
                <div class="advantages_bottom_element_rumi_text">Оплата от 10 до 100% заказа<br>специальными Mi-бонусами</div>
                <div class="advantages_bottom_element_rumi_image"></div>
            </a>
            <a class="advantages_bottom_element_rumi advantage_4_rumi" href="https://vk.com/rumicomrussia" target="_blank">
                <div class="advantages_bottom_element_rumi_header">Много<br>фанатов</div>
                <div class="advantages_bottom_element_rumi_text">Живые обсуждения<br>в наших группах</div>
                <div class="advantages_bottom_element_rumi_image"></div>
            </a>
            <a class="advantages_bottom_element_rumi advantage_5_rumi" href="/guaranty">
                <div class="advantages_bottom_element_rumi_header">Надёжный<br>сервисный центр</div>
                <div class="advantages_bottom_element_rumi_text">Собственный гарантийный<br>центр, если что-то сломается</div>
                <div class="advantages_bottom_element_rumi_image"></div>
            </a>
        </div>
    </div>
</div>




<div class="mail_bottom">
    <div class="mail_bottom_bg"></div>
    <div class="mail_bottom_content">
        <form action="javascript:void(null);" onsubmit="subscribe(this); return false;" method="post" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="mail_footer_logo"></div>
                <div class="mail_footer_text">
                    <span class="mail_footer_text_main">Будь в курсе последних предложений</span>
                    <span class="mail_footer_text_sub">Подпишись и получай информацию об акциях и скидках</span>
                </div>
                <div class="mail_footer_inputspace">
                    <input type="email"
                           name="email"
                           id="mail_footer_button"
                           placeholder="Введите ваш e-mail"/>
                </div>
                <div class="mail_footer_button" onclick="$(this).parents('form').submit()">
                    <span>Подписаться</span>
                </div>
            </div>
        </form>
    </div>
    <div class="mail_bottom_bg"></div>
</div>


<div id="footer">
    <div class="footer_line"></div>
    <div class="container">
        <div class="footer_column footer_column_1">
            <div id="footer_logo">
                <img class="footer_normal_logo"   src="/site/images/logo_firm.png" title="{{ env('APP_NAME') }}" alt="{{ env('APP_NAME') }}">
                <img class="footer_adaptive_logo" src="/site/images/logo_firm.png" title="{{ env('APP_NAME') }}" alt="{{ env('APP_NAME') }}">
            </div>
        </div>
        <div class="footer_column footer_column_2">
            <div class="footer_column_header">Покупателям</div>
            <ul>
                <li><a href="/delivery-payment">Доставка</a></li>
                <li><a href="/delivery-payment">Оплата</a></li>
                <li><a href="/specials">Акции</a></li>
                <li><a href="/guaranty">Гарантия</a></li>
                <li><a href="/publicoferta">Оферта</a></li>
            </ul>
        </div>
        <div class="footer_column footer_column_3">
            <div class="footer_column_header">Каталог</div>
            <ul>
                <li><a href="/smartphones/">Смартфоны Xiaomi</a></li>
                <li><a href="/device/">Гаджеты и устройства</a></li>
                <li><a href="/transport/">Электронный транспорт</a></li>
                <li><a href="/naushniki-i-kolonki/">Наушники и колонки</a></li>
                <li><a href="/accessories/">Аксессуары</a></li>
                <li><a href="/brands/">Бренды</a></li>
            </ul>
        </div>
        <div class="footer_column footer_column_4">
            <div class="footer_column_header">О компании</div>
            <ul>
                <li><a href="/contact/">Контакты</a></li>
                <li><a href="/about">О нас</a></li>
            </ul>
        </div>
        <div class="footer_bottom">
            <div class="footer_bottom_copyright">
                Copyright © 2018–{{ date('Y') }} {{ env('APP_NO_URL') }}<br>
                Все права защищены.			</div>
            <div class="footer_bottom_social">
                <div class="contact_block_social" style="padding: 0;">
                    <a href="https://www.instagram.com/rumicomrussia/" class="contact_in" target="_blank"></a>
                    <!--
                    <a href="https://vk.com/rumicomrussia" class="contact_vk" target="_blank"></a>
                    <a href="https://www.youtube.com/channel/UCvK29FNCSg46Eik86viJtjQ" class="contact_yt" target="_blank"></a>
                    <a href="https://t.me/joinchat/AAAAAEQXBI2_KCqGAIEV-Q" class="contact_tg" target="_blank"></a>
                    <a href="https://ok.ru/group/52288056197276" class="contact_ok" target="_blank"></a>
                    --->
                </div>
            </div>
            <div class="footer_bottom_text">
                Любое использование либо копирование материалов или подборки материалов сайта,<br>
                элементов дизайна и оформления может осуществляться лишь с разрешения автора<br>
                (правообладателя) и только при наличии ссылки на {{ env('APP_URL') }}
            </div>
        </div>
    </div>
</div>






<div id="callback" style="display: none;">
    <form action="javascript:void(null);" onsubmit="callback(this); return false;" method="post" enctype="multipart/form-data">
        @csrf
        <div class="callback_popup">
            <div class="callback_popup_line"></div>
            <div class="callback_popup_header">Обратный звонок
                <div class="callback_popup_close"></div>
            </div>
            <div class="callback_show_info">
                <div class="callback_show_text">
                    Введите номер телефона <span class="required">*</span>:
                </div>
                <div class="callback_show_input">
                    <input type="text" name="phone" class="phone-mask" placeholder="+7 (___) ___-__-__"/>
                    <span class="callback_phone_error"></span>
                </div>
            </div>
            <div class="callback_button" onclick="$(this).parents('form').submit()">
                <a href="#" class="callback_one_click button">
                    <span>Заказать</span>
                </a>
            </div>
        </div>
    </form>
</div>







<!-- product slider --->
<link rel="stylesheet" type="text/css" href="/site/product_slider/style.css"/>
<script type="text/javascript" src="/site/product_slider/script.js"></script>
<!-- product slider --->

<script src="/site/js/script.js"></script>

@yield('end_scripts')

<!-- Mask --->
<script type="text/javascript" src="/site/js/jquery.maskedinput.min.js"></script>
<!-- Mask --->

<!-- jquery-ui --->
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
<!-- jquery-ui --->


</body>
</html>
