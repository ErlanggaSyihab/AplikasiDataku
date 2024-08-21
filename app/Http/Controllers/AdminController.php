<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
            'posisi' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'merk_barang' => 'required|string|max:255',
            'type_barang' => 'required|string|max:255',
            'jumlah_barang' => 'required|integer|max:255',
            'tanggal_masuk_barang' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Menyimpan data
        $admin = new Admin();
        $admin->posisi = $request->input('posisi');
        $admin->lokasi = $request->input('lokasi');
        $admin->merk_barang = $request->input('merk_barang');
        $admin->type_barang = $request->input('type_barang');
        $admin->jumlah_barang = $request->input('jumlah_barang'); 
        $admin->tanggal_masuk_barang = $request->input('tanggal_masuk_barang');
        
        // Handle image upload
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('images/' . $imageName);
            
            // Resize and save image
            $this->resizeImage($image->getRealPath(), $imagePath, 300, 300);
            
            $admin->gambar = $imageName;
        }
        
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

        // Validasi input
        $request->validate([
            'posisi' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'merk_barang' => 'required|string|max:255',
            'type_barang' => 'required|string|max:255',
            'jumlah_barang' => 'required|integer|max:255',
            'tanggal_masuk_barang' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Update data
        $admin->posisi = $request->input('posisi');
        $admin->lokasi = $request->input('lokasi');
        $admin->merk_barang = $request->input('merk_barang');
        $admin->type_barang = $request->input('type_barang');
        $admin->jumlah_barang = $request->input('jumlah_barang'); 
        $admin->tanggal_masuk_barang = $request->input('tanggal_masuk_barang');
        
        // Handle image upload
        if ($request->hasFile('gambar')) {
            // Delete old image
            if ($admin->gambar && file_exists(public_path('images/' . $admin->gambar))) {
                unlink(public_path('images/' . $admin->gambar));
            }

            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('images/' . $imageName);
            
            // Resize and save image
            $this->resizeImage($image->getRealPath(), $imagePath, 250, 250);
            
            $admin->gambar = $imageName;
        }
        
        $admin->save();
     
        return redirect()->route('admin.HalamanBarang')->with('success', 'Data berhasil diperbarui!');
    }

    public function delete($id)
    {
        $admin = Admin::findOrFail($id);
        // Delete image if exists
        if ($admin->gambar && file_exists(public_path('images/' . $admin->gambar))) {
            unlink(public_path('images/' . $admin->gambar));
        }
        $admin->delete();
    
        return redirect()->route('admin.HalamanBarang')->with('success', 'Data berhasil dihapus!');
    }

    public function search(Request $request)
    {
        $query = Admin::query();

        // Filter berdasarkan nama_barang, jenis_barang, dan tanggal_masuk_barang
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('posisi', 'like', "%{$search}%")
                  ->orWhere('lokasi', 'like', "%{$search}%")
                  ->orWhere('merk_barang', 'like', "%{$search}%")
                  ->orWhere('type_barang', 'like', "%{$search}%")
                  ->orWhere('jumlah_barang', 'like', "%{$search}%")
                  ->orWhereDate('tanggal_masuk_barang', $search);
        }

        $admin = $query->get();
        $totalData = $query->count(); // Hitung jumlah total data berdasarkan filter pencarian

        return view('admin.HalamanBarang', compact('admin', 'totalData'));
    }

    // Method baru untuk dashboard
    public function dashboard()
    {
        // Hitung jumlah total data
        $totalData = Admin::count();

        // Dapatkan tanggal awal dan akhir minggu ini
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        // Query untuk menghitung jumlah barang yang masuk minggu ini
        $weeklyData = Admin::whereBetween('tanggal_masuk_barang', [$startOfWeek, $endOfWeek])->count();

        return view('dashboard', compact('totalData', 'weeklyData'));
    }

    private function resizeImage($sourcePath, $destinationPath, $width, $height)
    {
        list($originalWidth, $originalHeight) = getimagesize($sourcePath);
        $imageResized = imagecreatetruecolor($width, $height);
        
        $imageType = exif_imagetype($sourcePath);

        switch ($imageType) {
            case IMAGETYPE_JPEG:
                $imageSource = imagecreatefromjpeg($sourcePath);
                break;
            case IMAGETYPE_PNG:
                $imageSource = imagecreatefrompng($sourcePath);
                break;
            case IMAGETYPE_GIF:
                $imageSource = imagecreatefromgif($sourcePath);
                break;
            default:
                return;
        }

        imagecopyresampled($imageResized, $imageSource, 0, 0, 0, 0, $width, $height, $originalWidth, $originalHeight);
        
        switch ($imageType) {
            case IMAGETYPE_JPEG:
                imagejpeg($imageResized, $destinationPath);
                break;
            case IMAGETYPE_PNG:
                imagepng($imageResized, $destinationPath);
                break;
            case IMAGETYPE_GIF:
                imagegif($imageResized, $destinationPath);
                break;
        }

        imagedestroy($imageSource);
        imagedestroy($imageResized);
    }
}
