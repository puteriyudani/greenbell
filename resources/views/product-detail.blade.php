@extends('layout.layout')

@section('title')
    <title>Bie Leaf</title>

    <style>
        .product__details__button a {
            text-decoration: none;
        }
    </style>
@endsection

@section('header')
    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('assets') }}/img/logo.png" height="50px" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active"><a href="{{ route('store') }}">Store</a></li>
                            <li><a href="#" id="komunitas-link">Komunitas</a></li>
                            <li><a href="#" id="contact-link">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                        <div class="header__right__auth">
                            <a href="{{ route('login') }}" target="_blank">Login</a>
                            <a href="{{ route('register') }}" target="_blank">Register</a>
                        </div>
                        {{-- <ul class="header__right__widget">
                            <li><span class="icon_search search-switch"></span></li>
                        </ul> --}}
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
@endsection

@section('main')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('store') }}"><i class="fa fa-shopping-bag"></i> Store</a>
                        <a>{{ $productDetail->menu }}</a>
                        <span>{{ $productDetail->nama }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__pic">
                        @if ($productDetail->images->isNotEmpty())
                            <div class="product__details__pic">
                                <div class="product__details__pic__left product__thumb nice-scroll">
                                    @foreach ($productImages as $index => $item)
                                        <a class="pt {{ $index == 0 ? 'active' : '' }}"
                                            href="#product-{{ $index + 1 }}">
                                            <img src="{{ asset('storage/images/' . $item->image) }}" alt="">
                                        </a>
                                    @endforeach
                                </div>
                                <div class="product__details__slider__content">
                                    <div class="product__details__pic__slider owl-carousel">
                                        @foreach ($productImages as $index => $item)
                                            <img data-hash="product-{{ $index + 1 }}" class="product__big__img"
                                                src="{{ asset('storage/images/' . $item->image) }}" alt="">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="product__details__pic__left product__thumb nice-scroll">
                                <a class="pt active" href="#product-1">
                                    <img src="{{ asset('assets/img/product/details/thumb-2.jpg') }}" alt="">
                                </a>
                                <a class="pt" href="#product-2">
                                    <img src="{{ asset('assets/img/product/details/thumb-1.jpg') }}" alt="">
                                </a>
                                <a class="pt" href="#product-3">
                                    <img src="{{ asset('assets/img/product/details/thumb-3.jpg') }}" alt="">
                                </a>
                                <a class="pt" href="#product-4">
                                    <img src="{{ asset('assets/img/product/details/thumb-4.jpg') }}" alt="">
                                </a>
                            </div>
                            <div class="product__details__slider__content">
                                <div class="product__details__pic__slider owl-carousel">
                                    <img data-hash="product-1" class="product__big__img"
                                        src="{{ asset('assets/img/product/details/product-1.jpg') }}" alt="">
                                    <img data-hash="product-2" class="product__big__img"
                                        src="{{ asset('assets/img/product/details/product-3.jpg') }}" alt="">
                                    <img data-hash="product-3" class="product__big__img"
                                        src="{{ asset('assets/img/product/details/product-2.jpg') }}" alt="">
                                    <img data-hash="product-4" class="product__big__img"
                                        src="{{ asset('assets/img/product/details/product-4.jpg') }}" alt="">
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <h3>{{ $productDetail->nama }} <span>Kode: {{ $productDetail->kode }}</span></h3>
                        <div class="product__details__price">Rp. {{ number_format($productDetail->harga, 0, ',', '.') }}
                        </div>
                        <p>{{ $productDetail->detail }}</p>
                        <div class="product__details__container" style="display: flex;">
                            <div class="product__details__button">
                                <a href="https://wa.me/6282268081212" class="cart-btn" target="_blank" style="background: #25D366">
                                    <span style="margin-right: 10px;"><i class="bi bi-whatsapp"></i></span>WhatsApp
                                </a>
                            </div>
                            <div class="product__details__button">
                                <a href="" class="cart-btn" target="_blank" style="background: #EE4D2D">
                                    <span style="margin-right: 10px;"><i class="bi bi-bag-fill"></i></span>Shopee
                                </a>
                            </div>
                            <div class="product__details__button">
                                <a href="" class="cart-btn" target="_blank" style="background: #000000">
                                    <span style="margin-right: 10px;"><i class="bi bi-tiktok"></i></span>Tiktok
                                </a>
                            </div>
                        </div>

                        <div class="product__details__widget">
                            <ul>
                                <li>
                                <li>
                                    <span>Kategori:</span>
                                    <p style="color: blue">{{ $productDetail->kategori }}</p>
                                </li>
                                </li>
                                <li>
                                    <span>Stock:</span>
                                    <p style="color: rgb(0, 0, 0)">{{ $productDetail->stok }}</p>
                                </li>
                                <li>
                                    <span>Kondisi:</span>
                                    <p style="color: green">{{ $productDetail->kondisi }}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <script>
        document.getElementById('komunitas-link').addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah tautan dari mengikuti URL
            alert('Halaman sedang dalam pengembangan');
        });
        document.getElementById('contact-link').addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah tautan dari mengikuti URL
            alert('Halaman sedang dalam pengembangan');
        });
    </script>
@endsection
