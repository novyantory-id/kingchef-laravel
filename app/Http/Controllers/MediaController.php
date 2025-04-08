<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index()
    {
        // Dapatkan semua file dari folder content
        $files = Storage::disk('public')->files('content');

        // Format data untuk view
        $images = [];
        foreach ($files as $file) {
            // Hanya tampilkan file gambar
            if (preg_match('/\.(jpe?g|png|gif)$/i', $file)) {
                $images[] = [
                    'url' => asset('storage/' . $file),
                    'path' => $file,
                    'name' => basename($file),
                    'size' => Storage::disk('public')->size($file),
                    'last_modified' => Storage::disk('public')->lastModified($file),
                ];
            }
        }

        $data = [
            'title' => 'Media',
            'breadcrumb1' => 'Home',
            'breadcrumb2' => 'All Medias',
        ];

        return view('admin.media.index', compact('images'), $data);
    }

    public function upload(Request $request)
    {
        // Validasi file gambar
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Maksimal 2MB
        ]);

        // Periksa apakah file gambar ada
        if ($request->hasFile('image')) {
            // Simpan gambar ke folder storage/app/public/content
            $file = $request->file('image');

            // Pisahkan nama file dan ekstensi
            $originalName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension(); // Ambil ekstensi file
            $fileNameWithoutExtension = pathinfo($originalName, PATHINFO_FILENAME); // Ambil nama file tanpa ekstensi

            // Buat nama file unik dengan slug
            $fileName = time() . '_' . Str::slug($fileNameWithoutExtension) . '.' . $extension;

            try {
                // Simpan file menggunakan Storage::disk('public')
                $path = Storage::disk('public')->putFileAs('content', $file, $fileName);

                // Debugging: Tampilkan path file yang disimpan
                \Log::info('File saved at: ' . $path);
                \Log::info('Full path: ' . storage_path('app/public/' . $path));

                // Generate URL untuk gambar
                $url = asset('storage/' . $path);

                // Debugging: Tampilkan URL gambar
                \Log::info('Generated URL: ' . $url);

                // Kembalikan respons JSON dengan URL gambar
                return response()->json(['url' => $url]);
            } catch (\Exception $e) {
                \Log::error('Error saving file: ' . $e->getMessage());
                return response()->json(['error' => 'Failed to save file.'], 500);
            }
        }

        // Jika upload gagal, kembalikan pesan error
        return response()->json(['error' => 'Image upload failed.'], 400);
    }

    public function deleteImage(Request $request)
    {
        $request->validate([
            'images' => 'required|array',
        ]);

        $deleted = [];
        $errors = [];

        foreach ($request->images as $imageUrl) {
            try {
                // Ekstrak path dari URL (hapus bagian domain)
                $path = parse_url($imageUrl, PHP_URL_PATH);

                // Hapus '/storage/' dari path
                $relativePath = str_replace('/storage/', '', $path);

                // Path lengkap di filesystem
                $fullPath = storage_path('app/public/' . $relativePath);

                if (file_exists($fullPath)) {
                    unlink($fullPath);
                    $deleted[] = $imageUrl;
                }
            } catch (\Exception $e) {
                $errors[$imageUrl] = $e->getMessage();
                \Log::error("Failed to delete image {$imageUrl}: " . $e->getMessage());
            }
        }

        return response()->json([
            'success' => count($errors) === 0,
            'deleted' => $deleted,
            'errors' => $errors,
        ]);
    }

    //delete media yang benar
    // public function deleteMedia(Request $request)
    // {
    //     $validated = $request->validate([
    //         'path' => 'required|string' // Format: "content/1_003.jpg"
    //     ]);

    //     // Normalisasi path untuk Windows
    //     $path = str_replace('content/', '', $validated['path']);
    //     $storagePath = 'content\\' . str_replace('/', '\\', $path);

    //     \Log::info("Delete attempt", [
    //         'input' => $validated['path'],
    //         'storage_path' => $storagePath,
    //         'realpath' => storage_path('app/public/' . $storagePath)
    //     ]);

    //     try {
    //         if (!Storage::disk('public')->exists($storagePath)) {
    //             throw new \Exception("File tidak ditemukan di: " . $storagePath);
    //         }

    //         Storage::disk('public')->delete($storagePath);

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'File berhasil dihapus'
    //         ]);
    //     } catch (\Exception $e) {
    //         \Log::error("Delete error", [
    //             'error' => $e->getMessage(),
    //             'trace' => $e->getTraceAsString()
    //         ]);

    //         return response()->json([
    //             'success' => false,
    //             'error' => $e->getMessage()
    //         ], 500);
    //     }
    // }

    public function deleteMedia(Request $request)
    {
        $validated = $request->validate([
            'path' => 'required|string' // Format: "content/filename.jpg"
        ]);

        try {
            // Normalisasi path (hapus 'content/' jika ada di awal)
            $path = ltrim($validated['path'], 'content/');
            $storagePath = 'content/' . $path;

            \Log::info("Delete attempt", [
                'input' => $validated['path'],
                'storage_path' => $storagePath,
                'realpath' => storage_path('app/public/' . $storagePath)
            ]);

            if (!Storage::disk('public')->exists($storagePath)) {
                \Log::error("File not found", [
                    'available_files' => Storage::disk('public')->allFiles('content')
                ]);
                return response()->json([
                    'success' => false,
                    'error' => 'File tidak ditemukan: ' . $storagePath
                ], 404);
            }

            Storage::disk('public')->delete($storagePath);

            return response()->json([
                'success' => true,
                'message' => 'File berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            \Log::error("Delete error", [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
