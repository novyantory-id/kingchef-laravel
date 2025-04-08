<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TagController extends Controller
{
    public function index(): View
    {
        $tags = Tag::all();
        $data = [
            'title' => 'Tag',
            'breadcrumb1' => 'Home',
            'breadcrumb2' => 'Tag',
            'tags' => $tags
        ];
        return view('admin.tag.index', $data);
    }
}
