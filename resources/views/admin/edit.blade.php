@extends('admin.layoutAdmin')

@section('judul', 'Edit barang yang anda inginkan')

@section('konten')



<form action="{{ route('admin.update', $admin->id) }}" method="post">
  @csrf
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <label for="nama_barang" class="form-label">Nama Barang</label>
        <input type="text" name="nama_barang" class="form-control" value="{{$admin->nama_barang}}" id="nama_barang" placeholder="Masukkan Nama Barang">
      </div>
      <div class="col-md-4">
        <label for="tanggal_masuk_barang" class="form-label">Tanggal Masuk Barang</label>
        <input type="date" name="tanggal_masuk_barang" class="form-control" value="{{$admin->tanggal_masuk_barang}}" id="tanggal_masuk_barang" placeholder="Masukkan Tanggal Masuk Barang">
      </div>
      <div class="col-md-4">
        <label for="jenis_barang" class="form-label">Jenis Barang</label>
        <input type="text" name="jenis_barang" class="form-control" id="jenis_barang" value="{{$admin->jenis_barang}}" placeholder="Masukkan Jenis Barang">
      </div>
      <div class="col-md-4">
        <label for="lokasi" class="form-label">Lokasi</label>
        <input type="text" name="lokasi" class="form-control" value="{{$admin->lokasi}}" id="lokasi" placeholder="Masukkan Lokasi">
      </div>
      
      <div class="col-12 mt-3">
        <button type="submit" class="btn btn-primary">Edit</button>
      </div>
    </div>
  </div>
</form>

@endsection
