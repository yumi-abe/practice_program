<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\CastCategory;
use App\Services\CastService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $blogs = Blog::orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        $casts = CastCategory::orderBy('created_at', 'desc')->get();

        CastService::isNew($casts);

        return view('index', compact('blogs', 'casts'));
    }

    public function cast()
    {
        $casts = CastCategory::orderBy('created_at', 'desc')->get();

        CastService::isNew($casts);

        return view('cast', compact('casts'));
    }
}
