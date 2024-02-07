@extends('main')

@section('pageTitle', 'Корзина')

@section('content')
<div class="container">
    <h1 class="text-center mt-5">Корзина</h1>
    <div class="row mb-4">
        <div class="col-12 col-lg-8">
            <article class="card mt-4 overflow-hidden">
                <div class="row">
                    <div class="col-12 col-sm-4">
                        <div class="img-wrap">
                            <img class="w-100" src="/images/pic-1.webp" alt="Изображение товара">
                        </div>
                    </div>
                    <div class="col-12 col-sm-8 d-flex align-items-center">
                        <div class="p-3">
                            <h3 class="fs-6 mb-2">
                                Шоссейный велосипед BMC Roadmachine 01 Five Ultegra Di2 (2023)
                            </h3>
                            <p>Кол-во - 3 шт.
                            </p>
                            <p class="fw-bold fs-6 m-0">
                                цена без скидки - 773 280 ₽ / шт.
                            </p>
                            <p class="fw-bold fs-6 m-0">
                                с учётом скидки <span>5%</span> - 734 616 ₽ / шт.
                            </p>
                        </div>
                    </div>
                </div>
            </article>

            <article class="card mt-4 overflow-hidden">
                <div class="row">
                    <div class="col-12 col-sm-4">
                        <div class="img-wrap">
                            <img class="w-100" src="/images/pic-2.webp" alt="Изображение товара">
                        </div>
                    </div>
                    <div class="col-12 col-sm-8 d-flex align-items-center">
                        <div class="p-3">
                            <h3 class="fs-6 mb-2">
                                Шоссейный велосипед BMC Roadmachine 01 Five Ultegra Di2 (2023)
                            </h3>
                            <p>Кол-во - 3 шт.
                            </p>
                            <p class="fw-bold fs-6 m-0">
                                цена без скидки - 773 280 ₽ / шт.
                            </p>
                            <p class="fw-bold fs-6 m-0">
                                с учётом скидки <span>5%</span> - 734 616 ₽ / шт.
                            </p>
                        </div>
                    </div>
                </div>
            </article>

        </div>
        <div class="col-12 col-lg-4">
            <div class="card p-3 mt-4">
                <p class="fs-4">Общая сумма заказа:</p>
                <p class="fw-bold">773 280 ₽</p>
                <p class="fs-4">Общая сумма заказа c учётом скидки <span>5%</span>:</p>
                <p class="fw-bold">734 616 ₽</p>
                <button class="btn btn-primary">Заказать</button>
            </div>
        </div>
    </div>
</div>
@endsection
