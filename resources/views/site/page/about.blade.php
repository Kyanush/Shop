@extends('layouts.site')

<?php $title = 'О нас';?>
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

        <div id="content" style="overflow: visible;font-size:14px;">

            <h2 style="text-align: center;    font-size: 30px;">Про интернет-магазин «OnePoint»</h2>
            <h3 style="text-align: center;">OnePoint.kz – интернет-магазин мобильной и цифровой техники в Казахстане.</h3>

                <div>&nbsp;</div>
                <div><strong>Что можно приобрести в интернет-магазине «OnePoint»:&nbsp;</strong></div>
                <div>&nbsp;</div>
                <div>
                    <ul>
                        <li style="margin-bottom: 1rem;">мобильные телефоны и смартфоны;</li>
                        <li style="margin-bottom: 1rem;">«умные» часы;</li>
                        <li style="margin-bottom: 1rem;">планшетные компьютеры;</li>
                        <li style="margin-bottom: 1rem;">гаджеты для активного образа жизни (фитнес-трекеры, браслеты и т.д.);</li>
                        <li style="margin-bottom: 1rem;">аксессуары для мобильной и цифровой техники;</li>
                        <li style="margin-bottom: 1rem;">электронные книги и игровые консоли;</li>
                        <li style="margin-bottom: 1rem;">автомобильную электронику (навигаторы, видеорегистраторы и т.п.);</li>
                        <li style="margin-bottom: 1rem;">запчасти для мобильных телефонов и наушники;</li>
                        <li style="margin-bottom: 1rem;">роутеры, модемы и прочие сетевые устройства;</li>
                        <li style="margin-bottom: 1rem;">и многое другое.</li>
                    </ul>
                </div>
                <div>&nbsp;</div>
                <div>Интернет-магазин «OnePoint» – это удобство оплаты и доставки.&nbsp;</div>
                <div>&nbsp;</div>
                <div>&nbsp;</div>
                <div><strong>Оплатить заказ можно:&nbsp;</strong></div>
                <div>&nbsp;</div>
                <div>
                    <ul>
                        <li style="margin-bottom: 1rem;">наличными (курьеру или сотруднику магазина при самовывозе);</li>
                        <li style="margin-bottom: 1rem;">пластиковой картой Visa или MasterCard при заказе или при его получении;</li>
                        <li style="margin-bottom: 1rem;">безналичными переводами по выставленному счету;</li>
                        <li style="margin-bottom: 1rem;">подарочным сертификатом (сегодня доступны сертификаты номиналом 5000 тенге, 10 000 тенге, 15 000 тенге и 20 000 тенге).</li>
                    </ul>
                </div>
                <div>&nbsp;</div>
                <div>Заказанный товар будет доставлен в кратчайшие сроки и в удобное время. Мы ценим скорость – например, телефон из Алматы в Актау «OnePoint» доставляет всего за 2 дня!&nbsp;</div>
                <div>&nbsp;</div>
                <div>&nbsp;</div>
                <div><strong>Варианты доставки:&nbsp;</strong></div>
                <div>&nbsp;</div>
                <div>
                    <ul>
                        <li style="margin-bottom: 1rem;">мы доставим заказ домой или в офис ;</li>
                        <li style="margin-bottom: 1rem;">доставка в день заказа. При желании покупателя мы можем доставить товар в тот же день, когда был оформлен заказ;</li>
                        <li style="margin-bottom: 1rem;">заказ можно забрать самостоятельно в нашем магазине;</li>
                    </ul>
                </div>
                <div>&nbsp;</div>
                <div>Интернет-магазин «OnePoint» – любимые товары по удивительным ценам!&nbsp;</div>
                <div>&nbsp;</div>
                <div>
                    <ul>
                        <li style="margin-bottom: 1rem;">Консультация по любому товару при заказе по телефону.&nbsp;</li>
                        <li style="margin-bottom: 1rem;">Скидки и акции каждый день – покупай тысячи товаров по лучшим ценам!</li>
                        <li style="margin-bottom: 1rem;">Заказ любым удобным способом: на сайте, по номеру 8 (707) 551-19-79 .</li>
                    </ul>
                </div>
                <div>&nbsp;</div>
                <div><strong>Чем еще интересен сайт <a href="http://www.gomarket.kz">www.onepoint.kz:&nbsp;</a></strong></div>
                <div>&nbsp;</div>
                <div>
                    <ul>
                        <li style="margin-bottom: 1rem;">мы часто проводим конкурсы с отличными призами;</li>
                        <li style="margin-bottom: 1rem;">скидки для постоянных покупателей;</li>
                        <li style="margin-bottom: 1rem;">полезные видео- и текстовые обзоры устройств, аксессуаров и услуг от наших экспертов;</li>
                        <li style="margin-bottom: 1rem;">сервис «Вопрос-ответ». При сомнениях в выборе продукта всегда помогут наши консультанты – можно задать свой вопрос прямо на странице товара;</li>
                        <li style="margin-bottom: 1rem;">единый номер 8 (707) 551-19-79 . Звони, чтобы оформить заказ, уточнить наличие товара, выяснить все характеристики нужного устройства или узнать о наших акциях!</li>
                    </ul>
                </div>

        </div>

    </div>

@endsection