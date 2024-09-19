<?php

namespace App\Services;

use App\Models\CastCategory;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CastService
{

    public static function castStore($request)
    {
        $attibutes = [
            'cast_name' => $request->cast_name,
            'types' => $request->types,
            'gender' => $request->gender,
            'age' => $request->age,
            'character' => $request->character,
            'main_image_path' => $request->main_image_path,
        ];

        if ($request->hasFile('main_image_path')) {
            $mainImagePath = $request->file('main_image_path')->store('images', 'public');
            $attibutes['main_image_path'] = $mainImagePath;
        }
        if ($request->hasFile('sub_image_path')) {
            $subImagePath = $request->file('sub_image_path')->store('images', 'public');
            $attibutes['sub_image_path'] = $subImagePath;
        }
        return $attibutes;
    }

    public static function castUpdate($cast, $request)
    {

        $imagePath = ['main_image_path', 'sub_image_path'];
        $attributes = $request->all();

        foreach ($imagePath as $path) {
            // 画像削除のリクエストがある場合
            if ($request->has($path . '_remove')) {
                if ($cast->$path) {
                    Storage::disk('public')->delete($cast->$path);
                    $cast->$path = '';
                }
            } else {
                if ($request->hasFile($path)) {
                    if ($cast->$path) {
                        Storage::disk('public')->delete($cast->$path); // 古い画像を削除
                    }
                    $imagePath = $request->file($path)->store('images', 'public'); // 新しい画像を保存
                    $attributes[$path] = $imagePath; // 新しい画像パスを保存
                } else {
                    // 画像がアップロードされていない場合、画像パスのフィールドを変更しない
                    $attributes[$path] = $cast->$path;
                }
            }
        }
        return $attributes;



        // // 画像削除のリクエストがある場合
        // if ($request->has('image_path_remove')) {
        //     if ($cast->image_path) {
        //         Storage::disk('public')->delete($cast->image_path); // 画像を削除
        //         $cast->image_path = '';  // データベースの画像パスを空にする
        //     }
        // } else {
        //     // 新しい画像がアップロードされた場合
        //     if ($request->hasFile('image_path')) {
        //         if ($cast->image_path) {
        //             Storage::disk('public')->delete($cast->image_path); // 古い画像を削除
        //         }
        //         $imagePath = $request->file('image_path')->store('images', 'public'); // 新しい画像を保存
        //         $attributes['image_path'] = $imagePath; // 新しい画像パスを保存
        //     } else {
        //         // 画像がアップロードされていない場合、画像パスのフィールドを変更しない
        //         unset($attributes['image_path']);
        //     }
        // }
        // return $attributes;
    }
}
