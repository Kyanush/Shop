@extends('layouts.mobile')

@section('title', 'Onepoint.kz - главная страница')
@section('description', 'Onepoint.kz - главная страница')
@section('keywords', 'Onepoint.kz - главная страница')

@section('content')

    <div class="topbar container _always-fixed">
        <a  class="topbar__icon icon icon_menu "><span></span></a>
        <h1 class="topbar__heading ">
            <a href="/" class="topbar__heading-link">
                <i class="topbar__heading-logo _icon"></i>
                OnePoint.kz
            </a>
        </h1>
        <a href="/login" class="topbar__icon icon icon_user"></a>
    </div>

    @include('mobile.includes.search-bar', ['class' => 'fixed-block _with-topbar _always-fixed'])

    @include('mobile.includes.space', ['style' => 'height: 17.073vw;'])

    <div class="catalog-items _grid">
        <?php $categories = \App\Models\Category::orderBy('sort')->where('parent_id', 0)->get();?>
        @foreach($categories as $category)
            <a href="/c/{{ $category->url }}" class="catalog-item container">
                            <span class="catalog-item__img">
                                <img width="24" src="{{ $category->pathImage(true) }}">
                            </span>
                <span class="catalog-item__title">
                            {{ $category->name }}
                        </span>
                <span class="catalog-item__icon icon icon_chevron"></span>
            </a>
        @endforeach
    </div>

    @include('mobile.includes.main-slider')

    @include('mobile.includes.product_slider', ['products' => $productsRecommend, 'title' => 'Рекомендуемое для вас', 'url' => ''])
    @include('mobile.includes.product_slider', ['products' => $productsDiscount,  'title' => 'Акции',                 'url' => ''])
    @include('mobile.includes.product_slider', ['products' => $productsHit,       'title' => 'Хиты продаж',           'url' => ''])
    @include('mobile.includes.product_slider', ['products' => $productsNew,       'title' => 'Новинки',               'url' => ''])


    <h2 class="container-title"></h2>
    <div class="container g-pa0 g-bb-thin _grid"></div>
    <div class="container g-pa0 g-bb-fat _list"></div>


    @include('mobile.includes.footer')






@endsection