<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;


class HelloController extends Controller
{

    public function index(Request $request)
    {
        $data = [
            'msg' => 'これはBladeを利用したサンプルです',
            'id' => $request->id,   // ここの「id」は別に「id」である必要なし（クエリに合わせる。クエリがtestならここもtest）
        ];
        return view('hello.index', $data);  // 第二引数には連想配列を渡す
    }
}
