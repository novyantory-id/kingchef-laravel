<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::all();
        $data = [
            'title' => 'Category',
            'breadcrumb1' => 'Home',
            'breadcrumb2' => 'Category',
            'categories' => $categories
        ];
        return view('admin.category.index', $data);
    }

    public function save(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
                'nama_kategori' => [
                    'required',
                    'string',
                    'max:25',
                ],
                'slug_kategori' => [
                    'required',
                    'max:25',
                ],
                'gambar_kategori' => [
                    'nullable',
                    'image',
                    'mimes:jpeg,png,jpg,gif',
                    'max:1024'
                ],
            ],
            [
                'nama_kategori.required' => 'Nama kategori wajib diisi',
                'nama_kategori.string' => 'Hanya boleh berupa text',
                'nama_kategori.max' => 'Nama tidak boleh lebih dari 25 karakter',
                'slug_kategori.max' => 'Slug tidak boleh lebih dari 25 karakter',
                'slug_kategori.required' => 'Slug kategori wajib diisi',
                'gambar_kategori.max' => 'Maksimal gambar 1MB'
            ]
        );

        // Handle upload gambar
        if ($request->hasFile('gambar_kategori')) {
            $file = $request->file('gambar_kategori');
            $fileName = $file->hashName();
            $file->storeAs('categorytag', $fileName, 'public');
        }

        // Simpan data ke database
        Category::create([
            'nama_kategori' => $validated['nama_kategori'],
            'slug_kategori' => $validated['slug_kategori'],
            'gambar_kategori' => $fileName ?? null
        ]);

        return redirect()->route('admin.category')
            ->with('success', 'Kategori baru berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $categories = Category::findOrFail($id);
        $data = [
            'title' => 'Edit Category',
            'breadcrumb1' => 'Category',
            'breadcrumb2' => 'Edit Category',
            'categories' => $categories
        ];
        return view('admin.category.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'nama_kategori' => [
                    'required',
                    'string',
                    'max:25',
                ],
                'slug_kategori' => [
                    'required',
                    'max:25',
                ],
                'gambar_kategori' => [
                    'nullable',
                    'image',
                    'mimes:jpeg,png,jpg,gif',
                    'max:1024'
                ],
                'gambar_lama' => [
                    'nullable',
                    'string'
                ]
            ],
            [
                'nama_kategori.required' => 'Nama kategori wajib diisi',
                'nama_kategori.string' => 'Hanya boleh berupa text',
                'nama_kategori.max' => 'Nama tidak boleh lebih dari 25 karakter',
                'slug_kategori.max' => 'Slug tidak boleh lebih dari 25 karakter',
                'slug_kategori.required' => 'Slug kategori wajib diisi',
                'gambar_kategori.max' => 'Maksimal gambar 1MB'
            ]
        );

        // Cari kategori yang akan diupdate
        $category = Category::findOrFail($id);

        // Update data dasar
        $category->nama_kategori = $validated['nama_kategori'];
        $category->slug_kategori = $validated['slug_kategori'];

        // Handle gambar
        if ($request->hasFile('gambar_kategori')) {
            $disk = Storage::disk('public');

            // Hapus gambar lama jika ada
            if (!empty($validated['gambar_lama'])) {
                $oldImagePath = 'categorytag/' . $validated['gambar_lama'];

                if ($disk->exists($oldImagePath)) {
                    $disk->delete($oldImagePath);
                }
            }
            // Simpan gambar baru
            $file = $request->file('gambar_kategori');
            $fileName = $file->hashName();
            $file->storeAs('categorytag', $fileName, 'public');

            // Update path gambar di database
            $category->gambar_kategori = $fileName;
        }

        // Simpan perubahan
        $category->save();

        return redirect()->route('admin.category')
            ->with('success', 'Kategori berhasil diupdate!');

        // if ($validated->fails()) {
        //     return redirect()->route('admin.categories')
        //         ->with('failed', 'Ada yang salah, periksa!.')
        //         ->withErrors($validated);
        // }

        // return redirect()->route('admin.categories')
        //     ->with('success', 'Kategori berhasil diupdate!');

        // $update = Category::where('id', $id)
        //     ->update($validated);

        // return redirect()->route('admin.category')->with('success', 'Data berhasil diupdate!');

    }

    public function delete($id)
    {
        try {
            $category = Category::findOrFail($id);

            $category->delete();

            return redirect()->route('admin.category')->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('admin.category')->with('failed', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
