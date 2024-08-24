@extends('admin.layoutAdmin')

@section('judul', 'Edit Barang yang Anda Inginkan, Cek Kembali dan pastikan semua Form sudah terisi')


@section('konten')

<form action="{{ route('admin.update', $admin->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
  @csrf
  @method('POST') 
  <div class="flex flex-wrap -mx-4">
    
    <div class="w-full md:w-1/3 px-4 mb-4">
      <label for="posisi" class="form-label text-lg font-semibold text-gray-700">Posisi</label>
      <select name="posisi" class="form-select bg-light border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary" id="posisi" required>
        <option value="">Pilih Posisi Barang disimpan</option>
        <option value="DPMPTSP" {{ old('posisi', $admin->posisi) == 'DPMPTSP' ? 'selected' : '' }}>DPMPTSP</option>
        <option value="MPP" {{ old('posisi', $admin->posisi) == 'MPP' ? 'selected' : '' }}>MPP</option>
      </select>
    </div>

    <div class="w-full md:w-1/3 px-4 mb-4">
      <label for="lokasi" class="form-label font-semibold">Lokasi</label>
      <input type="text" name="lokasi" class="form-control border-gray-300 rounded-lg shadow-sm" value="{{ old('lokasi', $admin->lokasi) }}" id="lokasi" placeholder="Masukkan Lokasi barang" required>
    </div>

    <div class="w-full md:w-1/3 px-4 mb-4">
      <label for="merk_barang" class="form-label font-semibold">Merk Barang</label>
      <input type="text" name="merk_barang" class="form-control border-gray-300 rounded-lg shadow-sm" id="merk_barang" value="{{ old('merk_barang', $admin->merk_barang) }}" placeholder="Masukkan merk Barang" required>
    </div>

    <div class="w-full md:w-1/3 px-4 mb-4">
      <label for="type_barang" class="form-label font-semibold">Tipe Barang</label>
      <input type="text" name="type_barang" class="form-control border-gray-300 rounded-lg shadow-sm" id="type_barang" value="{{ old('type_barang', $admin->type_barang) }}" placeholder="Masukkan tipe Barang" required>
    </div>

    <div class="w-full md:w-1/3 px-4 mb-4">
      <label for="jumlah_barang" class="form-label font-semibold">Jumlah Barang</label>
      <input type="number" name="jumlah_barang" class="form-control border-gray-300 rounded-lg shadow-sm" id="jumlah_barang" value="{{ old('jumlah_barang', $admin->jumlah_barang) }}" placeholder="Masukkan jumlah Barang" required>
    </div>

    <div class="w-full md:w-1/3 px-4 mb-4">
      <label for="tanggal_masuk_barang" class="form-label font-semibold">Tanggal Masuk Barang</label>
      <input type="date" name="tanggal_masuk_barang" class="form-control border-gray-300 rounded-lg shadow-sm" value="{{ old('tanggal_masuk_barang', $admin->tanggal_masuk_barang) }}" id="tanggal_masuk_barang" required>
    </div>

    <div class="w-full md:w-1/3 px-4 mb-4">
      <label for="gambar" class="form-label font-semibold">Upload Gambar</label>
      <input type="file" name="gambar" class="form-control border-gray-300 rounded-lg shadow-sm" id="gambar">
      
      @if($admin->gambar)
        <div class="mt-2">
          <img src="{{ asset('images/' . $admin->gambar) }}" alt="Gambar Barang" class="img-thumbnail rounded shadow-sm" style="max-width: 150px;">
        </div>
      @endif
    </div>

    <div class="w-full mt-4 text-right px-4">
      <button type="submit" class="btn btn-primary px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition duration-200">Edit</button>
    </div>
  </div>
</form>

@endsection

