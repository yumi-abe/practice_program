<?php

namespace App\Services;

use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImageService
{
    public static function cropImage($imgPath, $width, $height)
    {
        $manager = new ImageManager(new Driver());

        $img = $manager->read($imgPath);
        // 画像のサイズを取得
        $currentWidth = $img->width();
        $currentHeight = $img->height();
        // 中心から切り抜く位置を計算
        $x = ($currentWidth - $width) / 2;
        $y = ($currentHeight - $height) / 2;

        // 切り抜き
        $img->crop($width, $height, (int)$x, (int)$y); // 切り抜き位置を真ん中に指定
        $img->save(public_path('img/resize' . time() . '.jpg'));
    }

    // public function cropImage($imageFile, $width, $height)
    // {
    //     // 画像を読み込む
    //     $img = $this->manager->make($imageFile);

    //     // 中心から切り抜く位置を計算
    //     $imgWidth = $img->width();
    //     $imgHeight = $img->height();
    //     $x = ($imgWidth - $width) / 2;
    //     $y = ($imgHeight - $height) / 2;

    //     // 指定したサイズで切り抜き
    //     $img->crop($width, $height, (int)$x, (int)$y);

    //     return $img;
    // }
}
