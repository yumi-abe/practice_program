<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BlogService
{

    public static function blogStore($request)
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
        return $attibutes;
    }

    public static function blogUpdate($blog, $request)
    {

        $attributes = $request->all();

        // 画像削除のリクエストがある場合
        if ($request->has('remove_image')) {
            if ($blog->image_path) {
                Storage::disk('public')->delete($blog->image_path); // 画像を削除
                $blog->image_path = '';  // データベースの画像パスを空にする
            }
        } else {
            // 新しい画像がアップロードされた場合
            if ($request->hasFile('image_path')) {
                if ($blog->image_path) {
                    Storage::disk('public')->delete($blog->image_path); // 古い画像を削除
                }
                $imagePath = $request->file('image_path')->store('images', 'public'); // 新しい画像を保存
                $attributes['image_path'] = $imagePath; // 新しい画像パスを保存
            } else {
                // 画像がアップロードされていない場合、画像パスのフィールドを変更しない
                unset($attributes['image_path']);
            }
        }
        return $attributes;
    }
}
