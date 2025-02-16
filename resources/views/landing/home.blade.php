@extends('landing.index')

@section('content')
<div class="content">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" style="height: n800px; max-width:100%;">
            <div class="carousel-item active">
                <img src="{{asset('file/gambar_buku/slide1.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('file/gambar_buku/slide2.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('file/gambar_buku/slide3.jpg')}}" class="d-block w-100" alt="...">
            </div>
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

    <section class="container-fluid">
        <div class="row mt-4">
            <div class="col-xl-3 col-sm-6 col-6 text-center">
                <p><img src="{{asset('file/gambar_buku/book.jpg')}}" style="width: 180px" alt="buku"></p>
                <p><b>Judul 1</b></p>
                <p><b>Rp. 90.000</b></p>
                <p><button class="btn btn-primary btn-sm">
                    <em class="fas fa-shopping-cart"></em> Beli
                </button></p>
            </div>
            <div class="col-xl-3 col-sm-6 col-6 text-center">
                <p><img src="{{asset('file/gambar_buku/book.jpg')}}" style="width: 180px" alt="buku"></p>
                <p><b>Judul 1</b></p>
                <p><b>Rp. 90.000</b></p>
                <p><button class="btn btn-primary btn-sm">
                    <em class="fas fa-shopping-cart"></em> Beli
                </button></p>
            </div>
            <div class="col-xl-3 col-sm-6 col-6 text-center">
                <p><img src="{{asset('file/gambar_buku/book.jpg')}}" style="width: 180px" alt="buku"></p>
                <p><b>Judul 1</b></p>
                <p><b>Rp. 90.000</b></p>
                <p><button class="btn btn-primary btn-sm">
                    <em class="fas fa-shopping-cart"></em> Beli
                </button></p>
            </div>
            <div class="col-xl-3 col-sm-6 col-6 text-center">
                <p><img src="{{asset('file/gambar_buku/book.jpg')}}" style="width: 180px" alt="buku"></p>
                <p><b>Judul 1</b></p>
                <p><b>Rp. 90.000</b></p>
                <p><button class="btn btn-primary btn-sm">
                    <em class="fas fa-shopping-cart"></em> Beli
                </button></p>
            </div>
            <div class="col-xl-3 col-sm-6 col-6 text-center">
                <p><img src="{{asset('file/gambar_buku/book.jpg')}}" style="width: 180px" alt="buku"></p>
                <p><b>Judul 1</b></p>
                <p><b>Rp. 90.000</b></p>
                <p><button class="btn btn-primary btn-sm">
                    <em class="fas fa-shopping-cart"></em> Beli
                </button></p>
            </div>
            <div class="col-xl-3 col-sm-6 col-6 text-center">
                <p><img src="{{asset('file/gambar_buku/book.jpg')}}" style="width: 180px" alt="buku"></p>
                <p><b>Judul 1</b></p>
                <p><b>Rp. 90.000</b></p>
                <p><button class="btn btn-primary btn-sm">
                    <em class="fas fa-shopping-cart"></em> Beli
                </button></p>
            </div>
            <div class="col-xl-3 col-sm-6 col-6 text-center">
                <p><img src="{{asset('file/gambar_buku/book.jpg')}}" style="width: 180px" alt="buku"></p>
                <p><b>Judul 1</b></p>
                <p><b>Rp. 90.000</b></p>
                <p><button class="btn btn-primary btn-sm">
                    <em class="fas fa-shopping-cart"></em> Beli
                </button></p>
            </div>
            <div class="col-xl-3 col-sm-6 col-6 text-center">
                <p><img src="{{asset('file/gambar_buku/book.jpg')}}" style="width: 180px" alt="buku"></p>
                <p><b>Judul 1</b></p>
                <p><b>Rp. 90.000</b></p>
                <p><button class="btn btn-primary btn-sm">
                    <em class="fas fa-shopping-cart"></em> Beli
                </button></p>
            </div>
        </div>
    </section>
</div>
@endsection
