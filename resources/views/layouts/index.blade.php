@extends('main')

@section('pageTitle', 'Главная')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <!-- TODO: добавлять синюю рамку карточке товара (класс border-primary), если на товар можно потратить баллы -->
            <article class="card mt-5 overflow-hidden border-primary">
                <div class="img-wrap">
                    <img class="w-100" src="/images/pic-1.webp" alt="Изображение товара">
                </div>
                <div class="p-3">
                    <h3 class="fs-6 mb-3">
                        Шоссейный велосипед BMC Roadmachine 01 Five Ultegra Di2 (2023)
                    </h3>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="fw-bold fs-5 m-0">
                            773 280 ₽
                        </p>
                        <button class="btn btn-primary">
                            В корзину
                        </button>

                        <!-- TODO: этот блок появлется после нажатия кнопки "В корзину" -->
                        <!-- <div class="d-flex align-items-center gap-3">
                                    <button class="btn btn-outline-primary">-</button>
                                    <span>1</span>
                                    <button class="btn btn-outline-primary">+</button>
                                </div> -->
                    </div>
                </div>
            </article>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <article class="card mt-5 overflow-hidden">
                <div class="img-wrap">
                    <img class="w-100" src="/images/pic-2.webp" alt="Изображение товара">
                </div>
                <div class="p-3">
                    <h3 class="fs-6 mb-3">
                        Шоссейный велосипед BMC Roadmachine 01 Five Ultegra Di2 (2023)
                    </h3>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="fw-bold fs-5 m-0">
                            773 280 ₽
                        </p>
                        <!-- <button class="btn btn-primary">
                                    В корзину
                                </button> -->
                        <div class="d-flex align-items-center gap-3">
                            <button class="btn btn-outline-primary">-</button>
                            <span>1</span>
                            <button class="btn btn-outline-primary">+</button>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <article class="card mt-5 overflow-hidden">
                <div class="img-wrap">
                    <img class="w-100" src="/images/pic-1.webp" alt="Изображение товара">
                </div>
                <div class="p-3">
                    <h3 class="fs-6 mb-3">
                        Шоссейный велосипед BMC Roadmachine 01 Five Ultegra Di2 (2023)
                    </h3>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="fw-bold fs-5 m-0">
                            773 280 ₽
                        </p>
                        <button class="btn btn-primary">
                            В корзину
                        </button>
                        <!-- <div class="d-flex align-items-center gap-3">
                                    <button class="btn btn-outline-primary">-</button>
                                    <span>1</span>
                                    <button class="btn btn-outline-primary">+</button>
                                </div> -->
                    </div>
                </div>
            </article>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <article class="card mt-5 overflow-hidden">
                <div class="img-wrap">
                    <img class="w-100" src="/images/pic-1.webp" alt="Изображение товара">
                </div>
                <div class="p-3">
                    <h3 class="fs-6 mb-3">
                        Шоссейный велосипед BMC Roadmachine 01 Five Ultegra Di2 (2023)
                    </h3>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="fw-bold fs-5 m-0">
                            773 280 ₽
                        </p>
                        <button class="btn btn-primary">
                            В корзину
                        </button>
                        <!-- <div class="d-flex align-items-center gap-3">
                                    <button class="btn btn-outline-primary">-</button>
                                    <span>1</span>
                                    <button class="btn btn-outline-primary">+</button>
                                </div> -->
                    </div>
                </div>
            </article>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <article class="card mt-5 overflow-hidden">
                <div class="img-wrap">
                    <img class="w-100" src="/images/pic-1.webp" alt="Изображение товара">
                </div>
                <div class="p-3">
                    <h3 class="fs-6 mb-3">
                        Шоссейный велосипед BMC Roadmachine 01 Five Ultegra Di2 (2023)
                    </h3>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="fw-bold fs-5 m-0">
                            773 280 ₽
                        </p>
                        <button class="btn btn-primary">
                            В корзину
                        </button>
                        <!-- <div class="d-flex align-items-center gap-3">
                                    <button class="btn btn-outline-primary">-</button>
                                    <span>1</span>
                                    <button class="btn btn-outline-primary">+</button>
                                </div> -->
                    </div>
                </div>
            </article>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <article class="card mt-5 overflow-hidden">
                <div class="img-wrap">
                    <img class="w-100" src="/images/pic-1.webp" alt="Изображение товара">
                </div>
                <div class="p-3">
                    <h3 class="fs-6 mb-3">
                        Шоссейный велосипед BMC Roadmachine 01 Five Ultegra Di2 (2023)
                    </h3>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="fw-bold fs-5 m-0">
                            773 280 ₽
                        </p>
                        <button class="btn btn-primary">
                            В корзину
                        </button>
                        <!-- <div class="d-flex align-items-center gap-3">
                                    <button class="btn btn-outline-primary">-</button>
                                    <span>1</span>
                                    <button class="btn btn-outline-primary">+</button>
                                </div> -->
                    </div>
                </div>
            </article>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <article class="card mt-5 overflow-hidden">
                <div class="img-wrap">
                    <img class="w-100" src="/images/pic-1.webp" alt="Изображение товара">
                </div>
                <div class="p-3">
                    <h3 class="fs-6 mb-3">
                        Шоссейный велосипед BMC Roadmachine 01 Five Ultegra Di2 (2023)
                    </h3>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="fw-bold fs-5 m-0">
                            773 280 ₽
                        </p>
                        <button class="btn btn-primary">
                            В корзину
                        </button>
                        <!-- <div class="d-flex align-items-center gap-3">
                                    <button class="btn btn-outline-primary">-</button>
                                    <span>1</span>
                                    <button class="btn btn-outline-primary">+</button>
                                </div> -->
                    </div>
                </div>
            </article>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <article class="card mt-5 overflow-hidden">
                <div class="img-wrap">
                    <img class="w-100" src="/images/pic-1.webp" alt="Изображение товара">
                </div>
                <div class="p-3">
                    <h3 class="fs-6 mb-3">
                        Шоссейный велосипед BMC Roadmachine 01 Five Ultegra Di2 (2023)
                    </h3>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="fw-bold fs-5 m-0">
                            773 280 ₽
                        </p>
                        <button class="btn btn-primary">
                            В корзину
                        </button>
                        <!-- <div class="d-flex align-items-center gap-3">
                                    <button class="btn btn-outline-primary">-</button>
                                    <span>1</span>
                                    <button class="btn btn-outline-primary">+</button>
                                </div> -->
                    </div>
                </div>
            </article>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <article class="card mt-5 overflow-hidden">
                <div class="img-wrap">
                    <img class="w-100" src="/images/pic-1.webp" alt="Изображение товара">
                </div>
                <div class="p-3">
                    <h3 class="fs-6 mb-3">
                        Шоссейный велосипед BMC Roadmachine 01 Five Ultegra Di2 (2023)
                    </h3>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="fw-bold fs-5 m-0">
                            773 280 ₽
                        </p>
                        <button class="btn btn-primary">
                            В корзину
                        </button>
                        <!-- <div class="d-flex align-items-center gap-3">
                                    <button class="btn btn-outline-primary">-</button>
                                    <span>1</span>
                                    <button class="btn btn-outline-primary">+</button>
                                </div> -->
                    </div>
                </div>
            </article>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <article class="card mt-5 overflow-hidden">
                <div class="img-wrap">
                    <img class="w-100" src="/images/pic-1.webp" alt="Изображение товара">
                </div>
                <div class="p-3">
                    <h3 class="fs-6 mb-3">
                        Шоссейный велосипед BMC Roadmachine 01 Five Ultegra Di2 (2023)
                    </h3>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="fw-bold fs-5 m-0">
                            773 280 ₽
                        </p>
                        <button class="btn btn-primary">
                            В корзину
                        </button>
                        <!-- <div class="d-flex align-items-center gap-3">
                                    <button class="btn btn-outline-primary">-</button>
                                    <span>1</span>
                                    <button class="btn btn-outline-primary">+</button>
                                </div> -->
                    </div>
                </div>
            </article>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <article class="card mt-5 overflow-hidden">
                <div class="img-wrap">
                    <img class="w-100" src="/images/pic-1.webp" alt="Изображение товара">
                </div>
                <div class="p-3">
                    <h3 class="fs-6 mb-3">
                        Шоссейный велосипед BMC Roadmachine 01 Five Ultegra Di2 (2023)
                    </h3>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="fw-bold fs-5 m-0">
                            773 280 ₽
                        </p>
                        <button class="btn btn-primary">
                            В корзину
                        </button>
                        <!-- <div class="d-flex align-items-center gap-3">
                                    <button class="btn btn-outline-primary">-</button>
                                    <span>1</span>
                                    <button class="btn btn-outline-primary">+</button>
                                </div> -->
                    </div>
                </div>
            </article>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <article class="card mt-5 overflow-hidden">
                <div class="img-wrap">
                    <img class="w-100" src="/images/pic-1.webp" alt="Изображение товара">
                </div>
                <div class="p-3">
                    <h3 class="fs-6 mb-3">
                        Шоссейный велосипед BMC Roadmachine 01 Five Ultegra Di2 (2023)
                    </h3>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="fw-bold fs-5 m-0">
                            773 280 ₽
                        </p>
                        <button class="btn btn-primary">
                            В корзину
                        </button>
                        <!-- <div class="d-flex align-items-center gap-3">
                                    <button class="btn btn-outline-primary">-</button>
                                    <span>1</span>
                                    <button class="btn btn-outline-primary">+</button>
                                </div> -->
                    </div>
                </div>
            </article>
        </div>
    </div>

    <nav aria-label="Page navigation">
        <ul class="pagination my-5 d-flex justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">«</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">»</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
@endsection
