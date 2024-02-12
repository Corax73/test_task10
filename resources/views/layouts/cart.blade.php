@extends('main')

@section('pageTitle', 'Корзина')

@section('content')
<div class="container">
    <h1 class="text-center mt-5">Корзина</h1>
    <div class="row mb-4">
        <div class="col-12 col-lg-8">
            @if (isset($products))
            @foreach ($products as $product)
            <article class="card mt-4 overflow-hidden">
                <div class="row">
                    <div class="col-12 col-sm-4">
                        <div class="img-wrap">
                            <img class="w-100" src="{{Storage::url($product->cover) }}" alt="Изображение товара">
                        </div>
                    </div>
                    <div class="col-12 col-sm-8 d-flex align-items-center">
                        <div class="p-3">
                            <h3 class="fs-6 mb-2">
                                {{ $product->title }}
                            </h3>
                            <p>Кол-во - {{ $quantity[$product->id] }} шт.
                            </p>
                            <p class="fw-bold fs-6 m-0">
                                цена без скидки - {{ $product->price }} ₽ / шт.
                            </p>
                            @if ($product->bonus_program && isset($discountOnSomeProducts))
                            <p class="fw-bold fs-6 m-0">
                                с учётом скидки <span>{{ $discountOnSomeProducts }}%</span> - {{ $product->price - $product->price * $discountOnSomeProducts / 100}} ₽ / шт.
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
            @endif
        </div>
        <div class="col-12 col-lg-4">
            <div class="card p-3 mt-4">
                <p class="fs-4">Общая сумма заказа:</p>
                <p class="fw-bold">{{ $totalFull ?? 0}} ₽</p>
                @if (isset($totalDiscount))
                <p class="fs-4">Общая сумма заказа c учётом скидки <span>{{ $totalDiscount }}%</span>:</p>
                <p class="fw-bold">{{ $discountedPrice }} ₽</p>
                @endif
                <button class="btn btn-primary">Заказать</button>
            </div>
        </div>
    </div>
</div>
@endsection
