@extends('admin.layoutAdmin')

@section('judul','Tambahkan data yang anda inginkan')

@section('konten')

<form action="{{ route('admin.submit') }}" method="post">
  @csrf
  <div class="container">
      <div class="col-md-5">
        <label for="nama_barang" class="form-label">Nama Barang</label>
        <input type="text" name="nama_barang" class="form-control" id="nama_barang" placeholder="Masukkan Nama Barang">
      </div>
      <div class="col-md-5">
        <label for="tanggal_masuk_barang" class="form-label">Tanggal Masuk Barang</label>
        <input type="date" name="tanggal_masuk_barang" class="form-control" id="tanggal_masuk_barang" placeholder="Masukkan Tanggal Masuk Barang">
      </div>
      <div class="col-md-5">
        <label for="jenis_barang" class="form-label">Jenis Barang</label>
        <input type="text" name="jenis_barang" class="form-control" id="jenis_barang" placeholder="Masukkan Jenis Barang">
      </div>
      <div class="col-md-5">
        <label for="lokasi" class="form-label">Lokasi</label>
        <input type="text" name="lokasi" class="form-control" id="lokasi" placeholder="Masukkan Lokasi">
      </div>
      
      <div class="col-12 mt-3">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</form>

@endsection
