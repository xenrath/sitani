@extends('layouts.app')

@section('title', 'Edit Kategori harga')

@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">
        <a href="{{ url('user') }}">User</a> /
    </span> Edit
</h4>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Edit User</h5>
    </div>
    <hr class="my-1" />
    <form action="{{ url('user/' . $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card-body">
            <div class="form-group mb-3">
                <label class="form-label" for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama', $user->nama) }}" placeholder="Masukan nama" required />
            </div>
            <div class="form-group mb-3">
                <label class="form-label" for="telp">No Telepon</label>
                <input type="number" class="form-control" name="telp" id="telp" value="{{ old('telp', $user->telp) }}" placeholder="Masukan no telepon" required />
            </div>
             <div class="form-group mb-3">
                <label class="form-label" for="alamat">Alamat</label>
                <input type="text" class="form-control" name="alamat" id="alamat" value="{{ old('alamat', $user->alamat) }}" placeholder="Masukan alamat" required />
            </div>
             <div class="form-group mb-3">
                <label for="formFile" class="form-label">Gambar</label>
                <input class="form-control" type="file"
                    value="{{ old('gambar', $user->gambar) }}" name="gambar" id="gambar">
            </div>
             <div class="form-group mb-3">
                <label class="form-label" for="role">Role</label>
                <input type="text" class="form-control" name="role" id="role" value="{{ old('role', $user->role) }}" placeholder="Masukan role" required />
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
