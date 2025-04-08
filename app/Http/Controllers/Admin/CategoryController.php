<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
                ]
            ],
            [
                'nama_kategori.required' => 'Nama kategori wajib diisi',
                'nama_kategori.string' => 'Hanya boleh berupa text',
                'nama_kategori.max' => 'Nama tidak boleh lebih dari 25 karakter',
                'slug_kategori.max' => 'Slug tidak boleh lebih dari 25 karakter',
                'slug_kategori.required' => 'Slug kategori wajib diisi',
            ]
        );

        $category = Category::create($validated);

        if (!$category) {
            return redirect()->back()->with('failed', 'Terjadi kesalahan saat menyimpan data!');
        } else {
            return redirect()->back()->with('success', 'Data kategori berhasil disimpan!');
        }

        return redirect('admin.categories');
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
                ]
            ],
            [
                'nama_kategori.required' => 'Nama kategori wajib diisi',
                'nama_kategori.string' => 'Hanya boleh berupa text',
                'nama_kategori.max' => 'Nama tidak boleh lebih dari 25 karakter',
                'slug_kategori.max' => 'Slug tidak boleh lebih dari 25 karakter',
                'slug_kategori.required' => 'Slug kategori wajib diisi',
            ]
        );

        $update = Category::where('id', $id)
            ->update($validated);

        return redirect()->route('admin.category')->with('success', 'Data berhasil diupdate!');
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
