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
                            <li class="active"><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="#" id="store-link">Store</a></li>
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
    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="categories__item categories__large__item set-bg"
                        data-setbg="{{ asset('assets') }}/img/categories/category-1.jpg">
                        <div class="categories__text">
                            <h1>Women’s fashion</h1>
                            <p>Sitamet, consectetur adipiscing elit, sed do eiusmod tempor incidid-unt labore
                                edolore magna aliquapendisse ultrices gravida.</p>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="categories__item set-bg"
                                data-setbg="{{ asset('assets') }}/img/categories/category-2.jpg">
                                <div class="categories__text">
                                    <h4>Men’s fashion</h4>
                                    <p>358 items</p>
                                    <a href="#">Shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="categories__item set-bg"
                                data-setbg="{{ asset('assets') }}/img/categories/category-3.jpg">
                                <div class="categories__text">
                                    <h4>Kid’s fashion</h4>
                                    <p>273 items</p>
                                    <a href="#">Shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="categories__item set-bg"
                                data-setbg="{{ asset('assets') }}/img/categories/category-4.jpg">
                                <div class="categories__text">
                                    <h4>Cosmetics</h4>
                                    <p>159 items</p>
                                    <a href="#">Shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="categories__item set-bg"
                                data-setbg="{{ asset('assets') }}/img/categories/category-5.jpg">
                                <div class="categories__text">
                                    <h4>Accessories</h4>
                                    <p>792 items</p>
                                    <a href="#">Shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="section-title">
                        <h4>All Products</h4>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">All</li>
                        <li data-filter=".BeLeaf">Be Leaf</li>
                        <li data-filter=".PreLoved">Pre Loved</li>
                        <li data-filter=".General">General</li>
                    </ul>
                </div>
            </div>
            <div class="row property__gallery">
                <!-- Be Leaf -->
                @foreach ($beleafs as $beleaf)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix BeLeaf">
                        <div class="product__item">
                            @if ($beleaf->images->isNotEmpty())
                                <div class="product__item__pic set-bg"
                                    data-setbg="{{ asset('storage/images/' . $beleaf->images->first()->image) }}">
                                    <div class="label new">{{ $beleaf->kondisi }}</div>
                                    <ul class="product__hover">
                                        <li><a href="https://wa.me/6282268081212"><span class="icon_headphones"></span></a></li>
                                        <li>
                                            <a href="{{ asset('storage/images/' . $beleaf->images->first()->image) }}"
                                                class="image-popup">
                                                <span class="arrow_expand"></span></a>
                                        </li>
                                    </ul>
                                </div>
                            @else
                                <div class="product__item__pic set-bg"
                                    data-setbg="{{ asset('assets/img/product/product-1.jpg') }}">
                                    <div class="label new">{{ $beleaf->kondisi }}</div>
                                    <ul class="product__hover">
                                        <li><a href="https://wa.me/6282268081212"><span class="icon_headphones"></span></a></li>
                                        <li>
                                            <a href="{{ asset('assets/img/product/product-1.jpg') }}" class="image-popup">
                                                <span class="arrow_expand"></span></a>
                                        </li>
                                    </ul>
                                </div>
                            @endif

                            <div class="product__item__text">
                                <h6><a href="#">{{ $beleaf->nama }}</a></h6>
                                <div class="product__price">Rp. {{ number_format($beleaf->harga, 0, ',', '.') }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Pre Loved -->
                @foreach ($preloveds as $preloved)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix PreLoved">
                        <div class="product__item">
                            @if ($preloved->images->isNotEmpty())
                                <div class="product__item__pic set-bg"
                                    data-setbg="{{ asset('storage/images/' . $preloved->images->first()->image) }}">
                                    <div class="label new">{{ $preloved->kondisi }}</div>
                                    <ul class="product__hover">
                                        <li><a href="https://wa.me/6282268081212"><span class="icon_headphones"></span></a></li>
                                        <li>
                                            <a href="{{ asset('storage/images/' . $preloved->images->first()->image) }}"
                                                class="image-popup">
                                                <span class="arrow_expand"></span></a>
                                        </li>
                                    </ul>
                                </div>
                            @else
                                <div class="product__item__pic set-bg"
                                    data-setbg="{{ asset('assets/img/product/product-1.jpg') }}">
                                    <div class="label new">{{ $preloved->kondisi }}</div>
                                    <ul class="product__hover">
                                        <li><a href="https://wa.me/6282268081212"><span class="icon_headphones"></span></a></li>
                                        <li>
                                            <a href="{{ asset('assets/img/product/product-1.jpg') }}" class="image-popup">
                                                <span class="arrow_expand"></span></a>
                                        </li>
                                    </ul>
                                </div>
                            @endif

                            <div class="product__item__text">
                                <h6><a href="#">{{ $preloved->nama }}</a></h6>
                                <div class="product__price">Rp. {{ number_format($preloved->harga, 0, ',', '.') }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- General -->
                @foreach ($generals as $general)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix General">
                        <div class="product__item">
                            @if ($general->images->isNotEmpty())
                                <div class="product__item__pic set-bg"
                                    data-setbg="{{ asset('storage/images/' . $general->images->first()->image) }}">
                                    <div class="label new">{{ $general->kondisi }}</div>
                                    <ul class="product__hover">
                                        <li><a href="https://wa.me/6282268081212"><span class="icon_headphones"></span></a></li>
                                        <li>
                                            <a href="{{ asset('storage/images/' . $general->images->first()->image) }}"
                                                class="image-popup">
                                                <span class="arrow_expand"></span></a>
                                        </li>
                                    </ul>
                                </div>
                            @else
                                <div class="product__item__pic set-bg"
                                    data-setbg="{{ asset('assets/img/product/product-1.jpg') }}">
                                    <div class="label new">{{ $general->kondisi }}</div>
                                    <ul class="product__hover">
                                        <li><a href="https://wa.me/6282268081212"><span class="icon_headphones"></span></a></li>
                                        <li>
                                            <a href="{{ asset('assets/img/product/product-1.jpg') }}" class="image-popup">
                                                <span class="arrow_expand"></span></a>
                                        </li>
                                    </ul>
                                </div>
                            @endif

                            <div class="product__item__text">
                                <h6><a href="#">{{ $general->nama }}</a></h6>
                                <div class="product__price">Rp. {{ number_format($general->harga, 0, ',', '.') }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Banner Section Begin -->
    <section class="banner set-bg" data-setbg="{{ asset('assets') }}/img/banner/banner-1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-8 m-auto">
                    <div class="banner__slider owl-carousel">
                        <div class="banner__item">
                            <div class="banner__text">
                                <span>The Chloe Collection</span>
                                <h1>The Project Jacket</h1>
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                        <div class="banner__item">
                            <div class="banner__text">
                                <span>The Chloe Collection</span>
                                <h1>The Project Jacket</h1>
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                        <div class="banner__item">
                            <div class="banner__text">
                                <span>The Chloe Collection</span>
                                <h1>The Project Jacket</h1>
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Services Section Begin -->
    <section class="services spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-car"></i>
                        <h6>Free Shipping</h6>
                        <p>For all oder over $99</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-money"></i>
                        <h6>Money Back Guarantee</h6>
                        <p>If good have Problems</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-support"></i>
                        <h6>Online Support 24/7</h6>
                        <p>Dedicated support</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-headphones"></i>
                        <h6>Payment Secure</h6>
                        <p>100% secure payment</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <script>
        document.getElementById('store-link').addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah tautan dari mengikuti URL
            alert('Halaman sedang dalam pengembangan');
        });
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
