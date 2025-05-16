<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Media;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'My Post',
            'breadcrumb1' => 'Home',
            'breadcrumb2' => 'My Post Lists',
        ];
        // Ambil semua post beserta relasi user dan categories
        // $posts = Post::with(['user', 'categories'])->get();
        $posts = Post::with(['user', 'categories', 'tags'])
            ->where('user_id', auth()->id())
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('admin.post.mypost', $data, compact('posts'));
    }

    public function all()
    {
        $data = [
            'title' => 'Post',
            'breadcrumb1' => 'Home',
            'breadcrumb2' => 'Post Lists',
        ];
        // Ambil semua post beserta relasi user dan categories
        // $posts = Post::with(['user', 'categories'])->get();
        $posts = Post::with(['user', 'categories', 'tags'])
            ->orderBy('updated_at', 'desc')
            ->get();

        // Format data
        // $formattedPosts = $posts->map(function ($post) {
        //     return [
        //         'username' => $post->user->username, // Nama penulis
        //         'title_post' => $post->title_post, // Judul post
        //         'keyword_post' => $post->keyword_post, // Keyword
        //         'slug_post' => $post->slug_post, // Slug post
        //         'content_post' => $post->content_post, // Konten post
        //         'nama_kategori' => $post->categories->pluck('nama_kategori')->implode(', '), // Nama kategori dipisahkan koma
        //         'nama_tag' => $post->tags->pluck('nama_tag')->implode(', '), // Nama tag dipisahkan koma
        //         'status_post' => $post->status_post,
        //         'created_at' => $post->created_at,
        //         'updated_at' => $post->updated_at,
        //         'published_at' => $post->published_at
        //     ];
        // });

        return view('admin.post.all', $data, compact('posts'));
    }

    public function add(Request $request)
    {
        // Buat judul default
        $defaultTitle = 'Post Baru'; // Judul default
        $slug = Str::slug($defaultTitle); // Buat slug dari judul default
        $slug = $this->makeUniqueSlug($slug); // Pastikan slug unik

        // Simpan post baru dengan status draft dan user_id sesuai pengguna yang login
        $post = new Post();
        $post->title_post = $defaultTitle; // Gunakan judul default
        $post->slug_post = $slug;
        $post->status_post = 'draft'; // Set status ke draft
        $post->user_id = Auth::id(); // Isi user_id dengan ID pengguna yang login
        $post->save();

        // Redirect ke halaman edit dengan parameter slug
        return redirect()->route('admin.posts.edit', ['slug' => $post->slug_post]);


        return view('admin.post.add');
    }


    private function makeUniqueSlug($slug)
    {
        $originalSlug = $slug;
        $count = 1;

        // Cek apakah slug sudah ada di database
        $count = Post::where('slug_post', $slug)->count();

        // Cek apakah slug sudah ada di database
        while (Post::where('slug_post', $slug)->exists()) {
            // Jika sudah ada, tambahkan nomor urut di belakang
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }

    public function edit($slug)
    {

        $data = [
            'title' => 'Edit Post',
        ];
        // Ambil post berdasarkan slug
        $post = Post::where('slug_post', $slug)->firstOrFail();
        $categories = Category::all();
        $tags = Tag::all();

        // Tampilkan view edit dengan data post
        return view('admin.post.edit', $data, compact('post', 'categories', 'tags'));
    }

    // public function update(Request $request, $slug)
    // {
    //     $request->validate([
    //         'title_post' => 'required|string|max:255',
    //         'content_post' => 'required|string',
    //         'categories' => 'nullable|array',
    //     ]);

    //     $post = Post::where('slug_post', $slug)->firstOrFail();
    //     $post->update([
    //         'title_post' => $request->title_post,
    //         'content_post' => $request->content_post,
    //     ]);

    //     // Sync categories
    //     if ($request->has('categories')) {
    //         $post->categories()->sync($request->categories);
    //     } else {
    //         $post->categories()->detach();
    //     }

    //     // Ambil data categories lagi
    //     $categories = Category::all();

    //     // Kembalikan view yang sama dengan pesan sukses
    //     return view('admin.post.edit', [
    //         'post' => $post,
    //         'categories' => $categories,
    //         'success' => 'Post updated successfully!', // Pesan sukses
    //     ]);
    // }

    //yang benar
    // public function update(Request $request, $slug)
    // {
    //     $request->validate([
    //         'title_post' => 'required|string|max:255',
    //         'content_post' => 'required|string',
    //         'categories' => 'nullable|array',
    //         'keyword_post' => 'nullable|string|max:128',
    //         'slug_post' => 'nullable|string|max:128',
    //         'thumbnail_post' => 'image|mimes:jpeg,png,jpg,gif|max:1024'
    //     ]);

    //     $post = Post::where('slug_post', $slug)->firstOrFail();
    //     $updateData = [
    //         'title_post' => $request->title_post,
    //         'content_post' => $request->content_post,
    //         'keyword_post' => $request->keyword_post,
    //         'slug_post' => $request->slug_post,
    //         'status_post' => ($request->input('action') === 'publish') ? 'publish' : 'draft'
    //     ];

    //     //kelola gambar
    //     if ($request->hasFile('thumbnail_post')) {

    //         $disk = Storage::disk('public');

    //         // Delete file lama jika ada
    //         if ($post->thumbnail_post) {
    //             $fileLama = 'thumbnails/' . $post->thumbnail_post;
    //             if ($disk->exists($fileLama)) {
    //                 $disk->delete($fileLama);
    //             }
    //         }

    //         $file = $request->file('thumbnail_post');
    //         $fileName = $file->hashName(); // atau bisa gunakan $file->getClientOriginalName()

    //         // Simpan file
    //         $file->storeAs('thumbnails', $fileName, 'public');

    //         // Hanya simpan nama file ke database
    //         $updateData['thumbnail_post'] = $fileName;
    //     }

    //     $post->update($updateData);

    //     // Sync categories
    //     if ($request->has('categories')) {
    //         $post->categories()->sync($request->categories);
    //     } else {
    //         $post->categories()->detach();
    //     }

    //     // Ambil data categories lagi
    //     $categories = Category::all();

    //     // Jika slug berubah, redirect ke URL baru
    //     if ($slug !== $request->slug_post) {
    //         return redirect()->route('admin.posts.edit', $request->slug_post)
    //             ->with([
    //                 'post' => $post,
    //                 'categories' => $categories,
    //                 'success' => 'Post updated successfully as ' . ($updateData['status_post'] === 'publish' ? 'publish' : 'draft')
    //             ]);
    //     }

    //     // Kembalikan view yang sama dengan pesan sukses
    //     return redirect()->route('admin.posts.edit', $request->slug_post)
    //         ->with([
    //             'post' => $post,
    //             'categories' => $categories,
    //             'success' => 'Post updated successfully as ' . ($updateData['status_post'] === 'publish' ? 'publish' : 'draft')
    //         ]);
    // }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'title_post' => 'required|string|max:255',
            'content_post' => 'required|string',
            'categories' => 'nullable|array',
            'tags' => 'nullable|array',
            'keyword_post' => 'nullable|string|max:128',
            'slug_post' => 'nullable|string|max:128',
            'thumbnail_post' => 'image|mimes:jpeg,png,jpg,gif|max:1024'
        ]);

        $post = Post::where('slug_post', $slug)->firstOrFail();
        $disk = Storage::disk('public');

        // $statusChangedToPublish = ($request->input('action') === 'publish' && $post->status_post !== 'publish');
        // $isSavingDraft = ($request->input('action') === 'save_draft');

        $updateData = [
            'title_post' => $request->title_post,
            'content_post' => $request->content_post,
            'keyword_post' => $request->keyword_post,
            'slug_post' => $request->slug_post,
            'status_post' => ($request->input('action') === 'publish') ? 'publish' : 'draft',
            'published_at' => $this->determinePublishedAt($request, $post) //Logika lebih aman
        ];

        // Jika save draft atau pertama kali publish, update created_at
        // if ($isSavingDraft || $statusChangedToPublish) {
        //     $updateData['created_at'] = now(); // atau Carbon::now()
        // }

        // Handle penghapusan thumbnail (jika tombol hapus diklik)
        if ($request->has('remove_thumbnail') && $request->remove_thumbnail) {
            if ($post->thumbnail_post) {
                $oldFilePath = 'thumbnails/' . $post->thumbnail_post;
                if ($disk->exists($oldFilePath)) {
                    $disk->delete($oldFilePath);
                }
                $updateData['thumbnail_post'] = null;
            }
        }

        //kelola gambar
        elseif ($request->hasFile('thumbnail_post')) {
            // Delete file lama jika ada
            if ($post->thumbnail_post) {
                $fileLama = 'thumbnails/' . $post->thumbnail_post;
                if ($disk->exists($fileLama)) {
                    $disk->delete($fileLama);
                }
            }

            $file = $request->file('thumbnail_post');
            $fileName = $file->hashName(); // atau bisa gunakan $file->getClientOriginalName()

            // Simpan file
            $file->storeAs('thumbnails', $fileName, 'public');

            // Hanya simpan nama file ke database
            $updateData['thumbnail_post'] = $fileName;
        }

        $post->update($updateData);

        // Sync categories
        if ($request->has('categories')) {
            $post->categories()->sync($request->categories);
        } else {
            $post->categories()->detach();
        }

        // Sync tags
        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->detach();
        }

        // Ambil data categories lagi
        $categories = Category::all();
        $tags = Tag::all();

        // Jika slug berubah, redirect ke URL baru
        if ($slug !== $request->slug_post) {
            return redirect()->route('admin.posts.edit', $request->slug_post)
                ->with([
                    'post' => $post,
                    'categories' => $categories,
                    'tags' => $tags,
                    'success' => 'Post updated successfully as ' . ($updateData['status_post'] === 'publish' ? 'publish' : 'draft')
                ]);
        }

        // Kembalikan view yang sama dengan pesan sukses
        return redirect()->route('admin.posts.edit', $request->slug_post)
            ->with([
                'post' => $post,
                'categories' => $categories,
                'tags' => $tags,
                'success' => 'Post updated successfully as ' . ($updateData['status_post'] === 'publish' ? 'publish' : 'draft')
            ]);
    }

    protected function determinePublishedAt($request, $post)
    {
        //Jika sudah pernah publish, pertahankan tanggal publish aslinya
        if ($post->published_at && $post->status_post === 'publish') {
            return $post->published_at;
        }

        //Jika action = 'publish', set tanggal sekarang
        return $request->input('action') === 'publish' ? now() : null;
    }
}
