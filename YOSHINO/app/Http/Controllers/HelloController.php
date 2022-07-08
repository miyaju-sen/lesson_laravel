<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;


class HelloController extends Controller
{

    public function index()
    {
        $data = [
            'msg' => 'お名前を入力してください。',
        ];
        return view('hello.index', $data);  // 第二引数には連想配列を渡す
    }

    public function post(Request $request) {
        $msg = $request->msg;

        $data = [
            'msg' => 'こんにちは、'.$msg.'さん',
        ];
        return view('hello.index', $data);
    }
}
