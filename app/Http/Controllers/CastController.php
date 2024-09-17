<?php

namespace App\Http\Controllers;

use App\Models\CastCategory;
use Illuminate\Http\Request;

class CastController extends Controller
{
    public function index()
    {
        $casts = CastCategory::orderBy('created_at', 'desc')
            ->paginate(10);
        return view('cast-list.index', compact('casts'));
    }
}
