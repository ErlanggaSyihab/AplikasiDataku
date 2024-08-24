@extends('admin.layoutAdmin')

@section('judul', 'Tambahkan Barang yang Anda Inginkan, Cek Kembali dan pastikan semua Form Terisi')

@section('konten')

<form action="{{ route('admin.submit') }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="container my-5">
    <div class="row">
      <!-- Posisi -->
      <div class="col-12 mb-4">
        <label for="posisi" class="form-label text-lg font-semibold text-gray-700">Posisi</label>
        <select name="posisi" class="form-select bg-light border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary" id="posisi" required>
          <option value="">Pilih Posisi Barang disimpan</option>
          <option value="DPMPTSP">DPMPTSP</option>
          <option value="MPP">MPP</option>
        </select>
      </div>
      
      <!-- Lokasi -->
      <div class="col-12 mb-4">
        <label for="lokasi" class="form-label text-lg font-semibold text-gray-700">Lokasi</label>
        <input type="text" name="lokasi" class="form-control border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary" id="lokasi" placeholder="Masukkan Lokasi Barang" required>
      </div>

      <!-- Merk Barang -->
      <div class="col-12 mb-4">
        <label for="merk_barang" class="form-label text-lg font-semibold text-gray-700">Merk Barang</label>
        <input type="text" name="merk_barang" class="form-control border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary" id="merk_barang" placeholder="Masukkan Merk Barang" required>
      </div>

      <!-- Type Barang -->
      <div class="col-12 mb-4">
        <label for="type_barang" class="form-label text-lg font-semibold text-gray-700">Tipe Barang</label>
        <input type="text" name="type_barang" class="form-control border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary" id="type_barang" placeholder="Masukkan Tipe Barang" required>
      </div>

      <!-- Jumlah Barang -->
      <div class="col-12 mb-4">
        <label for="jumlah_barang" class="form-label text-lg font-semibold text-gray-700">Jumlah Barang</label>
        <input type="number" name="jumlah_barang" class="form-control border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary" id="jumlah_barang" placeholder="Masukkan Jumlah Barang" required>
      </div>

      <!-- Tanggal Masuk Barang -->
      <div class="col-12 mb-4">
        <label for="tanggal_masuk_barang" class="form-label text-lg font-semibold text-gray-700">Tanggal Masuk Barang</label>
        <input type="date" name="tanggal_masuk_barang" class="form-control border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary" id="tanggal_masuk_barang" required>
      </div>

      <!-- Upload Gambar -->
      <div class="col-12 mb-4">
        <label for="gambar" class="form-label text-lg font-semibold text-gray-700">Upload Gambar</label>
        <input type="file" name="gambar" class="form-control border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary" id="gambar" required>
      </div>

      <!-- Submit Button -->
      <div class="w-full mt-4 text-right px-4">
        <button type="submit" class="btn btn-primary px-4 py-2 shadow-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Submit</button>
      </div>
    </div>
  </div>
</form>

@endsection
