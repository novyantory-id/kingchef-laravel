<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostView;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index()
    {
        $editorPicked = Post::with(['categories', 'tags', 'user'])
            ->where('status_post', 'publish')
            ->where('is_editor_pick', true)  // Hanya ambil yang ditandai sebagai Editor's Pick
            ->orderBy('editor_pick_priority', 'desc')  // Urutkan berdasarkan prioritas tertinggi
            ->orderBy('created_at', 'desc')  // Jika priority sama, urutkan berdasarkan terbaru
            ->get();

        $recents = Post::with(['categories', 'tags'])
            ->where('status_post', 'publish')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $populars = Post::where('status_post', 'publish')
            ->orderBy('view_post', 'desc')
            ->limit(5)
            ->get();


        //dari tag model
        $tagPopulars = Tag::popular()->get();

        //jumlah artikel posts berdasarkan jumlah kategori terbanyak
        $mostPopularCategories = Category::withCount('posts')
            ->with(['posts' => function ($query) {
                $query->select('posts.id', 'posts.thumbnail_post', 'posts.created_at')
                    ->latest()
                    ->limit(1);
            }])
            ->orderByDesc('posts_count')
            ->limit(4) // Sesuai jumlah item slider
            ->get();

        return view('index', compact('recents', 'populars', 'editorPicked', 'tagPopulars', 'mostPopularCategories'));
    }

    public function articles(Request $request)
    {
        $recents = Post::with(['categories', 'tags'])
            ->where('status_post', 'publish')
            ->orderBy('created_at', 'desc')
            ->paginate(1);
        // ->limit(5)
        // ->get();

        $populars = Post::where('status_post', 'publish')
            ->orderBy('view_post', 'desc')
            ->limit(5)
            ->get();

        // Jika request AJAX (saat klik load more)
        if ($request->ajax()) {
            return response()->json([
                'html' => view('partials.posts', ['recents' => $recents])->render(), // << Render partial view
                'hasMore' => $recents->hasMorePages() // << Cek apakah masih ada halaman berikutnya
            ]);
        }

        return view('articles', compact('recents', 'populars'));
    }

    // halaman /category/{slug}
    public function category(Request $request, $slug)
    {
        // 1. Ambil kategori berdasarkan slug
        $category = Category::where('slug_kategori', $slug)->firstOrFail();

        // Ambil posts yang terkait dengan kategori tersebut (melalui tabel pivot post_categories)
        $posts = Post::whereHas('categories', function ($query) use ($slug) {
            $query->where('slug_kategori', $slug);
        })
            ->where('status_post', 'publish')
            ->latest()
            ->paginate(1);

        // Jika request AJAX (saat klik load more)
        if ($request->ajax()) {
            return response()->json([
                'html' => view('partials.categoryposts', ['posts' => $posts])->render(), // << Render partial view
                'hasMore' => $posts->hasMorePages() // << Cek apakah masih ada halaman berikutnya
            ]);
        }

        $populars = Post::where('status_post', 'publish')
            ->orderBy('view_post', 'desc')
            ->limit(5)
            ->get();

        return view('categories', compact('category', 'posts', 'populars'));
    }

    // halaman /tag/{slug}
    public function tag(Request $request, $slug)
    {
        // 1. Ambil kategori berdasarkan slug
        $tag = Tag::where('slug_tag', $slug)->firstOrFail();

        // Ambil posts yang terkait dengan tag tersebut (melalui tabel pivot post_tags)
        $posts = Post::whereHas('tags', function ($query) use ($slug) {
            $query->where('slug_tag', $slug);
        })
            ->where('status_post', 'publish')
            ->latest()
            ->paginate(1);

        // Jika request AJAX (saat klik load more)
        if ($request->ajax()) {
            return response()->json([
                'html' => view('partials.tagposts', ['posts' => $posts])->render(), // << Render partial view
                'hasMore' => $posts->hasMorePages() // << Cek apakah masih ada halaman berikutnya
            ]);
        }

        $populars = Post::where('status_post', 'publish')
            ->orderBy('view_post', 'desc')
            ->limit(5)
            ->get();

        return view('tags', compact('tag', 'posts', 'populars'));
    }

    // halaman /author/{username}
    public function author(Request $request, $username)
    {
        // 1. Ambil kategori berdasarkan username
        $user = User::where('username', $username)->firstOrFail();

        // Ambil posts yang terkait dengan kategori tersebut (melalui tabel pivot post_categories)
        $posts = Post::where('user_id', $user->id)
            ->where('status_post', 'publish')
            ->latest()
            ->paginate(1);

        // Jika request AJAX (saat klik load more)
        if ($request->ajax()) {
            return response()->json([
                'html' => view('partials.authorposts', ['posts' => $posts])->render(), // << Render partial view
                'hasMore' => $posts->hasMorePages() // << Cek apakah masih ada halaman berikutnya
            ]);
        }

        $populars = Post::where('status_post', 'publish')
            ->orderBy('view_post', 'desc')
            ->limit(5)
            ->get();

        return view('author', compact('user', 'posts', 'populars'));
    }

    public function article($slug)
    {
        // 1. Ambil data post dengan relasi
        $post = Post::with(['user', 'categories', 'tags'])
            ->where('slug_post', $slug)
            ->firstOrFail();

        //2. Catat kunjungan
        $this->catatPostView($post);

        $populars = Post::where('status_post', 'publish')
            ->orderBy('view_post', 'desc')
            ->limit(5)
            ->get();

        $similars = Post::with(['categories']) // Eager loading
            ->whereHas('categories', function ($query) use ($post) {
                $query->whereIn('categories.id', $post->categories->pluck('id'));
            })
            ->where('status_post', 'publish')
            ->where('id', '!=', $post->id) // Exclude current post
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('post', compact('post', 'populars', 'similars'));
    }

    //versi biasa
    // protected function catatPostView(Post $post)
    // {
    //     //cek apakah pengunjung sudah melihat hari ini
    //     $AdaView = PostView::where('post_id', $post->id)
    //         ->where('ip_address', request()->ip())
    //         ->where('user_agent', request()->userAgent())
    //         ->whereDate('created_at', today())
    //         ->exists();

    //     //Jika belum, catat view baru
    //     if (!$AdaView) {
    //         PostView::create([
    //             'post_id' => $post->id,
    //             'ip_address' => request()->ip(),
    //             'user_agent' => request()->userAgent()
    //         ]);

    //         //Update view_count di tabel posts (opsional)
    //         $post->increment('view_post');
    //     }
    // }

    //tanpa device_id
    // protected function catatPostView(Post $post)
    // {
    //     if ($this->isBotRequest()) return;

    //     $ip = $this->getClientIp();

    //     // Cek apakah IP pernah melihat artikel ini (kapanpun, tanpa batas waktu)
    //     $alreadyViewed = PostView::where('post_id', $post->id)
    //         ->where('ip_address', $ip)
    //         ->exists();

    //     if (!$alreadyViewed) {
    //         DB::transaction(function () use ($post, $ip) {
    //         PostView::create([
    //             'post_id' => $post->id,
    //                 'ip_address' => $ip,
    //                 'user_agent' => mb_substr(request()->userAgent() ?? 'Unknown', 0, 500)
    //         ]);

    //             $post->increment('view_post');
    //         });
    //     }
    // }

    //hanya device_id
    // protected function catatPostView(Post $post)
    // {
    //     if ($this->isBotRequest()) return;

    //     $ip = $this->getClientIp();
    //     $deviceId = $this->getDeviceFingerprint();
    //     $cacheKey = "post_view_{$post->id}_{$deviceId}"; // Gunakan deviceId bukan IP

    //     if (!Cache::has($cacheKey)) {
    //         DB::transaction(function () use ($post, $ip, $deviceId, $cacheKey) {
    //             $alreadyViewed = PostView::where('post_id', $post->id)
    //                 ->where('device_id', $deviceId) // Gunakan device_id
    //                 ->exists();

    //             if (!$alreadyViewed) {
    //                 PostView::create([
    //                     'post_id' => $post->id,
    //                     'ip_address' => $ip, // Simpan IP untuk referensi
    //                     'device_id' => $deviceId,
    //                     'user_agent' => mb_substr(request()->userAgent() ?? 'Unknown', 0, 500)
    //                 ]);

    //                 $post->increment('view_post');
    //                 Cache::forever($cacheKey, true);
    //             }
    //         });
    //     }
    // }

    //kombinasi ip + device_id
    protected function catatPostView(Post $post)
    {
        if ($this->isBotRequest()) return;

        $ip = $this->getClientIp();
        $deviceId = $this->generateDeviceId(); // Gabungkan IP + fingerprint browser

        // Cek apakah perangkat+IP sudah pernah melihat
        $alreadyViewed = PostView::where('post_id', $post->id)
            ->where(function ($query) use ($ip, $deviceId) {
                $query->where('ip_address', $ip)
                    ->orWhere('device_id', $deviceId);
            })
            ->exists();

        if (!$alreadyViewed) {
            PostView::create([
                'post_id' => $post->id,
                'ip_address' => $ip,
                'device_id' => $deviceId,
                'user_agent' => request()->userAgent()
            ]);

            // $post->increment('view_post');
            $post->timestamps = false;  // Matikan sementara auto-update timestamp
            $post->increment('view_post');  // Tambah view tanpa ubah `updated_at`
            $post->timestamps = true;   // Nyalakan kembali
        }
    }

    // ==================== METHOD BANTU ====================
    private function isBotRequest(): bool
    {
        return preg_match(
            '/bot|crawl|spider|facebook|Google|Yandex|slurp/i',
            request()->userAgent()
        );
    }

    protected function getDeviceFingerprint()
    {
        $userAgent = request()->userAgent() ?? 'unknown';
        $acceptLanguage = request()->header('Accept-Language') ?? 'unknown';
        $platform = request()->header('Sec-CH-UA-Platform') ?? 'unknown';

        return md5($userAgent . $acceptLanguage . $platform);
    }

    protected function generateDeviceId()
    {
        return md5(
            request()->userAgent() .
                request()->header('Accept-Language') .
                request()->ip()
        );
    }

    private function getClientIp(): string
    {
        return request()->header('CF-Connecting-IP') // Jika pakai Cloudflare
            ?? request()->header('X-Forwarded-For')  // Jika pakai load balancer
            ?? request()->ip();                      // IP default
    }
}
