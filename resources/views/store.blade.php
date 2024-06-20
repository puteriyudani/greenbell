@extends('layout.layout')

@section('title')
    <title>Green Bell</title>
@endsection

@section('header')
    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('assets') }}/img/logo.png" alt=""></a>
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
                        <a><i class="fa fa-shopping-bag"></i> Store</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">
                        <div class="sidebar__categories">
                            <div class="section-title">
                                <h4>Categories</h4>
                            </div>
                            <div class="categories__accordion">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <a href="{{ route('store.beleaf') }}">Be Leaf</a>
                                    </div>
                                    <div class="card">
                                        <a href="{{ route('store.preloved') }}">Pre Loved</a>
                                    </div>
                                    <div class="card">
                                        <a href="{{ route('store.general') }}">General</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-lg-4 col-md-6">
                                <div class="product__item">
                                    @if ($product->images->isNotEmpty())
                                        <div class="product__item__pic set-bg"
                                            data-setbg="{{ asset('storage/images/' . $product->images->first()->image) }}">
                                            <div class="label new">{{ $product->kondisi }}</div>
                                            <ul class="product__hover">
                                                <li><a href="https://wa.me/6282268081212" target="_blank"><span
                                                            class="icon_headphones"></span></a></li>
                                                <li>
                                                    <a href="{{ asset('storage/images/' . $product->images->first()->image) }}"
                                                        class="image-popup">
                                                        <span class="arrow_expand"></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    @else
                                        <div class="product__item__pic set-bg"
                                            data-setbg="{{ asset('assets/img/product/details/product-1.jpg') }}">
                                            <div class="label new">{{ $product->kondisi }}</div>
                                            <ul class="product__hover">
                                                <li><a href="https://wa.me/6282268081212" target="_blank"><span
                                                            class="icon_headphones"></span></a></li>
                                                <li>
                                                    <a href="{{ asset('assets/img/product/details/product-1.jpg') }}"
                                                        class="image-popup">
                                                        <span class="arrow_expand"></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="product__item__text">
                                        <h6><a href="{{ route('product-detail', $product->id) }}">{{ $product->nama }}</a></h6>
                                        <div class="product__price">Rp. {{ number_format($product->harga, 0, ',', '.') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

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
