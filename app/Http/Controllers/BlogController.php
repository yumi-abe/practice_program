<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'desc')
            ->paginate(5);
        return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        $attibutes = [
            'title' => $request->title,
            'content' => $request->content,
            'image_path' => $request->image_path,
            'owner_id' => Auth::id(), //ログインしているユーザーID
        ];

        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('images', 'public');
            $attibutes['image_path'] = $imagePath;
        }

        Blog::create($attibutes);

        session()->flash('status', '予約完了しました。');
        return to_route('owner.blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);

        // dd($blog);
        return view('blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $owner_id = Auth::id();
        $blog = Blog::find($id);
        return view('blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBlogRequest $request, $id)
    {
        $blog = Blog::find($id);

        $attributes = $request->all();
        if (!$request->hasFile('image_path')) {
            if ($blog->image_path) {
                Storage::disk('public')->delete($blog->image_path); //古いファイルを削除
                $attributes['image_path'] = '';
            }
        } else {
            //新しい画像がアップロードされた場合
            if ($blog->image_path) {
                Storage::disk('public')->delete($blog->image_path); //古いファイルを削除
            }
            $imagePath = $request->file('image_path')->store('images', 'public'); //新しい画像を保存
            $attributes['image_path'] = $imagePath; //新しい画像パスを保存
        }

        $blog->update($attributes);

        session()->flash('status', '更新しました');

        return to_route('owner.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);

        if ($blog->image_path) {
            Storage::disk('public')->delete($blog->image_path); //ファイルを削除
        }
        $blog->delete();
        session()->flash('status', '削除しました');
        return to_route('owner.blog.index');
    }
}
