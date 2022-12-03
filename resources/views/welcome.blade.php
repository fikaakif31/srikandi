@extends('layout.navbar')
@section('content')

<link rel="stylesheet" href="{{ asset('assets/utama.css') }}">
<center><br><br><br>

  
  <div class="container-fluid">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{ asset('assets/img/slayer1.png') }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="{{ asset('assets/img/slayer2.png') }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="{{ asset('assets/img/slayer2.png') }}" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div><br><br>
</center>
  
  <div class="container-fluid">
    <h5>promo menarik bulan ini</h5><hr>
      <div class="row justify-content-between">
        @foreach ($Produk as $baju)
        <div class="card mb-4" style="width: 15rem;">
            <img src="assets/img/barang/{{$baju->gambar}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h4>{{$baju->nama}}</h4>
                <p class="fw-light">Rp. {{ $baju->harga }},-</p>
            </div>
        </div>  
        @endforeach
      </div>
  </div>
@endsection