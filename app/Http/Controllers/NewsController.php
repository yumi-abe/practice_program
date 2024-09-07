<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        // dd('Test');
        $blogs = Blog::orderBy('created_at', 'desc')
            ->paginate(10);
        return view('news.index', compact('blogs'));
    }

    public function show($id)
    {
        $blog = Blog::find($id);

        return view('news.show', compact('blog'));
    }
}
