@extends('layouts.site')

<?php $title = 'Сравнение товаров';?>
@section('title', $title)
@section('description', $title)
@section('keywords', $title)

@section('content')

   <div class="container">

       <?php $breadcrumb = [
           [
               'title' => 'Главная',
               'link'  => '/'
           ],
           [
               'title' => $title,
               'link'  => ''
           ]
       ];?>
      @include('includes.breadcrumb', ['breadcrumb' => $breadcrumb])


          <div id="content">
              <h1>{{ $title }}</h1>

              @if(count($productFeaturesCompareList) == 0)
                  <div class="content">Вы не выбрали ни одного товара для сравнения.</div>
              @else



             <table class="compare-info">

                <thead>
                <tr>
                   <td class="compare-product" colspan="5">Описание</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                   <td>Наименование</td>
                   @foreach($productFeaturesCompareList as $item)
                      <td class="name">
                         <a href="{{ $item->product->detailUrlProduct() }}">
                            <span>
                               {{ $item->product->name }}
                            </span>
                         </a>
                      </td>
                   @endforeach
                </tr>
                <tr>
                   <td>Изображение</td>
                      @foreach($productFeaturesCompareList as $item)
                         <td>
                            <img width="90"
                                 src="{{ $item->product->pathPhoto(true) }}"
                                 alt="{{ $item->product->name }}">
                         </td>
                      @endforeach
                </tr>
                <tr>
                   <td>Цена</td>
                   @foreach($productFeaturesCompareList as $item)
                      <td>
                         @if($item->product->specificPrice)
                           <span class="price-old">
                              {{ \App\Tools\Helpers::priceFormat($item->product->price) }}
                           </span>
                         @endif
                         <span class="price-new">
                              {{ \App\Tools\Helpers::priceFormat($item->product->getReducedPrice()) }}
                         </span>
                      </td>
                   @endforeach
                </tr>
                <tr>
                   <td>Артикул</td>
                   @foreach($productFeaturesCompareList as $item)
                     <td>{{ $item->product->sku }}</td>
                   @endforeach
                </tr>

                <tr>
                   <td>Наличие</td>
                   @foreach($productFeaturesCompareList as $item)
                      <td>{{ $item->product->stock > 0 ? 'В наличии' : 'Есть на складе' }}</td>
                   @endforeach
                </tr>
                <tr>
                   <td>Рейтинг</td>
                   @foreach($productFeaturesCompareList as $item)
                      <?php $reviews_count = $item->product->reviews_count;
                      ?>
                      <td>
                         <img src="/site/images/stars-{{ $item->product->avgRating->avg_rating ?? 0 }}.png" alt="На основе {{ $reviews_count }} отзывов.">
                         <br>
                         На основе {{ $reviews_count }} отзывов.
                      </td>
                   @endforeach
                </tr>
                <tr>
                   <td>Краткое описание</td>
                   @foreach($productFeaturesCompareList as $item)
                        <td class="description">
                            {!! preg_replace("/<img[^>]+>/", "",  \App\Tools\Helpers::closeTags(\App\Tools\Helpers::limitWords($item->product->description, 22))) !!}
                        </td>
                   @endforeach
                </tr>
                </tbody>

                @foreach($attributeGroups as $group)
                   <thead>
                      <tr>
                         <td class="compare-product" colspan="5">{{ $group->name }}</td>
                      </tr>
                   </thead>
                   <tbody>
                      @foreach($group->attributes as $attribute)
                         <tr>
                            <td>{{ $attribute->name }}</td>

                            @foreach($productFeaturesCompareList as $item)
                                <td>
                                   @foreach($item->product->attributes as $product_attribute)
                                        @if($product_attribute->id == $attribute->id)
                                              {{ $product_attribute->pivot->value }}<br/>
                                        @endif
                                   @endforeach
                               </td>
                            @endforeach

                         </tr>
                      @endforeach
                   </tbody>
                @endforeach
                 <tbody><tr>
                     <td></td>
                     @foreach($productFeaturesCompareList as $item)
                         <td class="remove">
                             <a href="/compare-product-delete/{{ $item->product_id }}" class="button">
                                 <span>Удалить</span>
                             </a>
                         </td>
                     @endforeach
                 </tr>
                 </tbody>

            </table>
            @endif

            <div class="buttons">
                <div class="right">
                   <a href="/" class="button">
                      <span>Продолжить</span>
                   </a>
                </div>
            </div>

          </div>

   </div>

@endsection