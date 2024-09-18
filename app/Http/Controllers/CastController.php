<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCastRequest;
use App\Models\CastCategory;
use App\Services\CastService;
use Illuminate\Http\Request;

class CastController extends Controller
{
    public function index()
    {
        $casts = CastCategory::orderBy('created_at', 'desc')
            ->paginate(10);
        return view('cast-list.index', compact('casts'));
    }

    public function create()
    {
        return view('cast-list.create');
    }

    public function store(StoreCastRequest $request)
    {
        // $mainImagePath = $request->file('main_image_path')->store('images', 'public');
        // dd($mainImagePath);

        $attributes = CastService::castStore($request);

        // if ($request->hasFile('main_image_path')) {
        //     dd($attributes);
        // } else {
        //     dd('false');
        // }


        CastCategory::create($attributes);

        session()->flash('status', '予約完了しました。');
        return to_route('owner.cast-list.index');
    }
}
