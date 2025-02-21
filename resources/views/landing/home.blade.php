@extends('landing.index')

@section('content')
<div class="content container mt-2">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" style="border-radius: 5px;">
            @foreach (['slide1.jpg', 'slide2.jpg', 'slide3.jpg'] as $index => $slide)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                <img src="{{ asset('file/gambar_buku/' . $slide) }}"
                     class="d-block w-100"
                      style="height: 480px; max-width: 100%; max-height: 100%;"
                     alt="Slide {{ $index + 1 }}">
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>

    <section class="container mt-4 mb-4">
        <h4>Kategori</h4>
        <div class="row">
            @for ($i=0; $i < 4; $i++ )
            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body pt-4 pb-4">
                        <h4 class="text-center">
                            UMUM
                        </h4>
                    </div>
                </div>
            </div>
            @endfor
        </div>
        <h4>Buku Paling Banyak Pembelinya</h4>
        <div class="row row-cols-2 row-cols-md-4 row-cols-lg-4 g-3">
            @for ($i = 0; $i < 8; $i++)
                <div class="col text-center mt-2 mb-2">
                    <img src="{{ asset('file/gambar_buku/book.jpg') }}" class="img-fluid" style="width: 140px; border-radius: 10px;" alt="buku">
                    <p class="text-bold mt-2">Lorem15</p>
                    <p class="fw-bold">Rp. 90.000</p>
                    <button class="btn btn-primary btn-sm">
                        <em class="fas fa-shopping-cart"></em> Beli
                    </button>
                </div>
            @endfor
        </div>
    </section>
</div>
@endsection
