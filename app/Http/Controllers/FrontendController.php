<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

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


        // $data = [
        //     'title' => 'Dashboard',
        //     'breadcrumb1' => 'Home',
        //     'breadcrumb2' => 'Dashboard'
        // ];
        return view('index', compact('recents', 'editorPicked'));
    }

    public function article($slug)
    {
        $post = Post::with(['user', 'categories', 'tags'])
            ->where('slug_post', $slug)
            ->firstOrFail();

        return view('post', compact('post'));
    }
}
