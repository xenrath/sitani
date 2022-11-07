@extends('layouts.app')

@section('title', 'Tambah User')

@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">
        <a href="{{ url('user') }}">User</a> /
    </span> Tambah
</h4>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Tambah User</h5>
    </div>
    <hr class="my-1" />
    <form action="{{ url('user') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group mb-3">
                <label class="form-label" for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan nama" required />
            </div>
            <div class="form-group mb-3">
                <label class="form-label" for="telp">No Telepon</label>
                <input type="number" class="form-control" name="telp" id="telp" placeholder="Masukan no telepon" required />
            </div>
             <div class="form-group mb-3">
                <label class="form-label" for="alamat">Alamat</label>
                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukan alamat" required />
            </div>
             <div class="form-group mb-3">
                <label class="form-label" for="gambar">Gambar</label>
                <input type="file" class="form-control" name="gambar" id="gambar" placeholder="Masukan gambar" required />
            </div>
             <div class="form-group mb-3">
                <label class="form-label" for="role">Role</label>
                <input type="text" class="form-control" name="role" id="role" placeholder="Masukan role" required />
            </div>
        </div>
        <div class="card-footer float-end">
            <button type="reset" class="btn btn-secondary me-1">
                <span class="tf-icons bx bx-reset"></span>&nbsp; Reset</a>
            </button>
            <button type="submit" class="btn btn-primary">
                <span class="tf-icons bx bx-send"></span>&nbsp; Kirim</a>
            </button>
        </div>
    </form>
</div>
@endsection
