<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image; // intervention/imageライブラリの読み込み

class ImagesController extends Controller
{
    
    // 写真を読み込み加工する
    public function retouch()
    {
        // 読み込み
        $path = storage_path('image/udetate_man.png');
        $img = Image::make($path);

        $img->widen(100);   
        $img->heighten(100);

        //保存
        $save_path = storage_path('image/udetate_man.png');
        $img->save($save_path);
    }
}
