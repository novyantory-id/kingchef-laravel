<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class EditorPickController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'categories'])
            ->where('status_post', 'publish')
            ->orderBy('is_editor_pick', 'desc')
            ->orderBy('editor_pick_priority', 'desc')
            ->paginate(10);

        $data = [
            'title' => 'Editor Picks',
            'breadcrumb1' => 'Home',
            'breadcrumb2' => 'Editor Picks'
        ];
        return view('admin.editor.index', compact('posts'), $data);
    }

    // Update status Editor's Pick
    public function update(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'is_editor_pick' => 'required|boolean',
            'priority' => 'required|integer|min:0|max:100'
        ]);

        // Jika checkbox tidak dicentang (nilai tidak terkirim)
        // $isEditorPick = $request->has('is_editor_pick') ? $request->is_editor_pick : false;

        // Validasi maksimal Editor's Pick
        if ($request->is_editor_pick && Post::where('is_editor_pick', true)->count() >= 5) {
            return back()->with('error', 'Maksimal 5 post dapat menjadi Editor\'s Pick');
        }

        $post = Post::findOrFail($request->post_id);
        $post->update([
            'is_editor_pick' => $request->is_editor_pick,
            'editor_pick_priority' => $request->priority,
            // 'is_editor_pick' => $isEditorPick,
            // 'editor_pick_priority' => $isEditorPick ? ($request->priority ?? 50) : 0
        ]);

        return back()->with('success', 'Status berhasil diperbarui');
    }
}
