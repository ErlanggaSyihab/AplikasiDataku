@extends('admin.layoutAdmin')

@section('judul', 'Edit barang yang anda inginkan')

@section('konten')



<form action="{{ route('admin.update', $admin->id) }}" method="post">
  @csrf
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <label for="posisi" class="form-label">posisi</label>
        <input type="text" name="posisi" class="form-control" value="{{$admin->posisi}}" id="posisi" placeholder="Masukkan posisi Barang">
      </div>

      <div class="col-md-4">
        <label for="lokasi" class="form-label">Lokasi</label>
        <input type="text" name="lokasi" class="form-control" value="{{$admin->lokasi}}" id="lokasi" placeholder="Masukkan Lokasi barang">
      </div>


      <div class="col-md-4">
        <label for="merk_barang" class="form-label">merk_barang</label>
        <input type="text" name="merk_barang" class="form-control" id="merk_barang" value="{{$admin->merk_barang}}" placeholder="Masukkan merk Barang">
      </div>

      <div class="col-md-4">
        <label for="type_barang" class="form-label">type_barang</label>
        <input type="text" name="type_barang" class="form-control" id="type_barang" value="{{$admin->type_barang}}" placeholder="Masukkan type Barang">
      </div>

      <div class="col-md-5 mb-3">
        <label for="gambar" class="form-label">Upload Gambar</label>
        <input type="file" name="gambar" class="form-control" id="gambar">
      </div>
      
      <div class="col-md-4">
        <label for="mejumlah_barang" class="form-label">jumlah_barang</label>
        <input type="text" name="jumlah_barang" class="form-control" id="jumlah_barang" value="{{$admin->jumlah_barang}}" placeholder="Masukkan jumlah Barang">
      </div>

      <div class="col-md-4">
        <label for="tanggal_masuk_barang" class="form-label">Tanggal Masuk Barang</label>
        <input type="date" name="tanggal_masuk_barang" class="form-control" value="{{$admin->tanggal_masuk_barang}}" id="tanggal_masuk_barang" placeholder="Masukkan Tanggal Masuk Barang">
      </div>

      
      <div class="col-12 mt-3">
        <button type="submit" class="btn btn-primary">Edit</button>
      </div>
    </div>
  </div>
</form>

@endsection
