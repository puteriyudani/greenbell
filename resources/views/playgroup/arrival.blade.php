@extends('layouts.guru')

@section('judul')
    <title>Kindergarten - Arrival</title>
@endsection

<!-- Masthead2-->
<header class="masthead2">
    <div class="container">
        <div class="masthead2-subheading">Kindergarten</div>
        <div class="masthead2-heading text-uppercase">Arrival</div>
    </div>
</header>

@section('main')
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="row">
                @foreach ($siswas as $siswa)
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="{{ asset('/storage/images/' . $siswa->image) }}"
                                    alt="..." />
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Portfolio Modals-->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><i class="fas fa-xmark fa-3x"></i>
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">How are you this morning?</h2>
                                <div class="row text-center mt-5 mb-5">
                                    <div class="col-md-6">
                                        <input type="radio" class="btn-check" name="breakfast" id="happy" autocomplete="off">
                                        <label class="btn" for="happy">
                                            <span class="fa-stack fa-4x">
                                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                                <i class="fas fa-face-smile fa-stack-1x fa-inverse"></i>
                                            </span>
                                            <h4 class="my-3" style="color: var(--bs-link-color);">Happy</h4>
                                        </label>
                                    </div>
                    
                                    <div class="col-md-6">
                                        <input type="radio" class="btn-check" name="breakfast" id="sad" autocomplete="off">
                                        <label class="btn" for="sad">
                                            <span class="fa-stack fa-4x">
                                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                                <i class="fas fa-face-sad-tear fa-stack-1x fa-inverse"></i>
                                            </span>
                                            <h4 class="my-3" style="color: var(--bs-link-color);">Sad</h4>
                                        </label>
                                    </div>
                                </div>
                                {{-- <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                    type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
