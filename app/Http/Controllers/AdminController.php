<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function HalamanBarang()
    {
        $admin = Admin::get();
        $totalData = Admin::count(); // Hitung jumlah total data
        return view('admin.HalamanBarang', compact('admin', 'totalData'));
    }

    public function Tambah() {
        return view('admin.Tambah');
    }

    public function submit(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'tanggal_masuk_barang' => 'required|date',
            'jenis_barang' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
        ]);
    
        // Menyimpan data
        $admin = new Admin();
        $admin->nama_barang = $request->input('nama_barang');
        $admin->tanggal_masuk_barang = $request->input('tanggal_masuk_barang');
        $admin->jenis_barang = $request->input('jenis_barang');
        $admin->lokasi = $request->input('lokasi');
        $admin->save();
     
        return redirect()->route('admin.HalamanBarang')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admin.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::find($id);
        $admin->nama_barang = $request->input('nama_barang');
        $admin->tanggal_masuk_barang = $request->input('tanggal_masuk_barang');
        $admin->jenis_barang = $request->input('jenis_barang');
        $admin->lokasi = $request->input('lokasi');
        $admin->update();
     
        return redirect()->route('admin.HalamanBarang')->with('success', 'Data berhasil diperbarui!');
    }

    public function delete($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();
    
        return redirect()->route('admin.HalamanBarang')->with('success', 'Data berhasil dihapus!');
    }

    public function search(Request $request)
    {
        $query = Admin::query();

        // Filter berdasarkan nama_barang, jenis_barang, dan tanggal_masuk_barang
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nama_barang', 'like', "%{$search}%")
                  ->orWhere('jenis_barang', 'like', "%{$search}%")
                  ->orWhere('lokasi', 'like', "%{$search}%")
                  ->orWhereDate('tanggal_masuk_barang', $search);
        }

        $admin = $query->get();
        $totalData = $query->count(); // Hitung jumlah total data berdasarkan filter pencarian

        return view('admin.HalamanBarang', compact('admin', 'totalData'));
    }
}
