@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div id="carouselExample" class="carousel slide mb-4" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100 rounded" src="{{ asset('sneat/assets/img/backgrounds/carousel-sitani1.jpg') }}" alt="First slide" />
            <div class="carousel-caption d-none d-md-block">
                <h3>Berbagai Harga Pangan Pertanian</h3>
                <p>Sumber : SIHATI, PIHPS, HargaJateng</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100 rounded" src="{{ asset('sneat/assets/img/backgrounds/carousel-sitani2.jpg') }}" alt="Second slide" />
            <div class="carousel-caption d-none d-md-block">
                <h3>Berbagai Harga Pangan Pertanian</h3>
                <p>Sumber : SIHATI, PIHPS, HargaJateng</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </a>
</div>
<div class="card">
    <h5 class="card-header">Tabel Harga Pangan</h5>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Nama Pangan</th>
                    <th>Harga</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($hargapangans as $hargapangan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $hargapangan->kategoriharga['kategori'] }}</td>
                    <td>{{ $hargapangan->namapangan }}</td>
                    <td>Rp.{{ $hargapangan->harga }}</td>
                    <td>{{ $hargapangan->tanggal }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $hargapangans->appends(Request::all())->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection

