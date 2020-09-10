@extends('layout')

@section('content')
    <div class="container">
        <div class="navigation">
            <div class="breadcrumbs">
                <a href="/" class="breadcrumb">Главная</a>
                <a href="/categories" class="breadcrumb">Каталог товаров</a>
                <a href="" class="breadcrumb-last">{{$product->name}}</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="product__block">
            <div class="product__block-left">
                <div class="product__block-left-img">
                    <img src="/storage/images/{{$product->img}}">
                </div>
            </div>
            <div class="product__block-right">
                <div class="product__block-right-title">
                    <h1>{{$product->name}}</h1>
                </div>
                <div class="product__block-right-price">
                    <span class="product__block-price">{{$product->price}} руб.</span>
                    <span class="product-quantity-product">В наличии {{$product->quantity}}</span>
                </div>
                <div class="product__block-right-add">
                    <button class="product__add-to-cart">Купить</button>
                    <button class="product__add-to-like">В избранное</button>
                </div>
                <div class="product__block-right-product-info">
                    <p class="product__block-right-product-info-title">О товаре</p>
                    <div class="product__block-right-product-info-block">
                        <span>Материал</span>
                        <p>{{$product->material}}</p>
                    </div>
                    <div class="product__block-right-product-info-block">
                        <span>Сезон</span>
                        <p>{{$product->sezon}}</p>
                    </div>
                    <div class="product__block-right-product-info-block">
                        <span>Описание</span>
                        <p class="product__block-right-product-info-description">{{$product->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
