@extends('layouts.guru')

@section('judul')
    <title>Kindergarten - Kegiatan Inti</title>
@endsection

<!-- Masthead2-->
<header class="masthead2">
    <div class="container">
        <div class="masthead2-subheading">Kindergarten</div>
        <div class="masthead2-heading text-uppercase">Kegiatan Inti</div>
    </div>
</header>

@section('main')
    <div class="container">
        <div class="row text-center mt-5 mb-5">
            @foreach ($siswas as $siswa)
                <div class="col-md-6">
                    <input type="radio" class="btn-check" name="image" id="image" value="{{ $siswa->image }}"
                        autocomplete="off">
                    <label class="btn" for="image">
                        <img class="img-fluid" src="{{ asset('/storage/images/' . $siswa->image) }}" alt="..."
                            width="150px" />
                    </label>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container mt-3">
        <form action="" method="POST">

            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="inti" name="inti"></textarea>
                <label for="inti">Kegiatan Inti</label>
            </div>

        </form>
    </div>

    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <a class="indikator" data-bs-toggle="modal" href="#portfolioModal1">
                <button class="btn btn-primary" type="submit">Indikator</button>
            </a>
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
                                <h2 class="text-uppercase">Bagaimana Kegiatan Inti Hari Ini?</h2>
                                <div class="row text-center mt-5 mb-5">
                                    <div class="col-md-6">
                                        <input type="radio" class="btn-check" name="breakfast" id="happy"
                                            autocomplete="off">
                                        <label class="btn" for="happy">
                                            <span class="fa-stack fa-4x">
                                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                                <i class="fas fa-face-smile fa-stack-1x fa-inverse"></i>
                                            </span>
                                            <h4 class="my-3" style="color: var(--bs-link-color);">Happy</h4>
                                        </label>
                                    </div>

                                    <div class="col-md-6">
                                        <input type="radio" class="btn-check" name="breakfast" id="sad"
                                            autocomplete="off">
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
