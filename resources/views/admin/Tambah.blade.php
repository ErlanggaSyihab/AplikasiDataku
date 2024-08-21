@extends('admin.layoutAdmin')

@section('judul','Tambahkan data yang anda inginkan')

@section('konten')

<form action="{{ route('admin.submit') }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="container">
    <div class="row">
      <div class="col-md-5 mb-3">
        <label for="posisi" class="form-label">Posisi</label>
        <select name="posisi" class="form-control" id="posisi">
          <option value="">Pilih Posisi Barang disimpan</option>
          <option value="DPMPTSP">DPMPTSP</option>
          <option value="MAl PELAYANAN PUBLIK KOTA BANDUNG">MAl PELAYANAN PUBLIK KOTA BANDUNG</option>
        </select>
      </div>
      
      <div class="col-md-5 mb-3">
        <label for="lokasi" class="form-label">Lokasi</label>
        <input type="text" name="lokasi" class="form-control" id="lokasi" placeholder="Masukkan Lokasi Barang">
      </div>

      <div class="col-md-5 mb-3">
        <label for="merk_barang" class="form-label">Merk Barang</label>
        <input type="text" name="merk_barang" class="form-control" id="merk_barang" placeholder="Masukkan Merk Barang">
      </div>

      <div class="col-md-5 mb-3">
        <label for="type_barang" class="form-label">Type Barang</label>
        <input type="text" name="type_barang" class="form-control" id="type_barang" placeholder="Masukkan Type Barang">
      </div>

      <div class="col-md-5 mb-3">
        <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
        <input type="number" name="jumlah_barang" class="form-control" id="jumlah_barang" placeholder="Masukkan Jumlah Barang">
      </div>

      <div class="col-md-5 mb-3">
        <label for="tanggal_masuk_barang" class="form-label">Tanggal Masuk Barang</label>
        <input type="date" name="tanggal_masuk_barang" class="form-control" id="tanggal_masuk_barang" placeholder="Masukkan Tanggal Masuk Barang">
      </div>

      <div class="col-md-5 mb-3">
        <label for="gambar" class="form-label">Upload Gambar</label>
        <input type="file" name="gambar" class="form-control" id="gambar">
      </div>

      <div class="col-12 mt-3">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</form>

@endsection
