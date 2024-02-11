@extends('main')

@section('pageTitle', 'Главная')

@section('content')
<div class="container">

    <div class="row">
        @if ($products)
        @foreach ($products as $product)
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <!-- TODO: добавлять синюю рамку карточке товара (класс border-primary), если на товар можно потратить баллы -->
            <article class="card mt-5 overflow-hidden{{ $product->bonus_program ? ' border-primary' : '' }}">
                <div class="img-wrap">
                    <img class="w-100" src="{{Storage::url($product->cover) }}" alt="Изображение товара">
                </div>
                <div class="p-3">
                    <h3 class="fs-6 mb-3">
                        {{ $product->title }}
                    </h3>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="fw-bold fs-5 m-0">
                            {{ $product->price }}
                        </p>
                        <!-- TODO: этот блок появлется после нажатия кнопки "В корзину" -->
                        @if (isset($addedProducts) && array_key_exists($product->id, $addedProducts))
                        <div class="d-flex align-items-center gap-3">
                                    <button class="btn btn-outline-primary del-product" data-id="{{ $product->id }}">-</button>
                                    <span>{{ $addedProducts[$product->id] }}</span>
                                    <button class="btn btn-outline-primary add-product" data-id="{{ $product->id }}">+</button>
                        </div>
                        @else
                        <button class="btn btn-primary add-product" data-id="{{ $product->id }}">
                            В корзину
                        </button>
                        @endif
                    </div>
                </div>
            </article>
        </div>
        @endforeach
        @endif
        {{ $products->links() }}
</div>
@endsection
