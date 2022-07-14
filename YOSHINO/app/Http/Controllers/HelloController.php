<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;


class HelloController extends Controller
{

    public function index()
    {
        $data = [
            ['name' => 'ジェイ', 'mail' => 'jay@enhypen'],
            ['name' => 'ジェユン', 'mail' => 'jake@enhypen'],
            ['name' => 'ソンフン', 'mail' => 'songhun@enhypen'],
        ];
        return view('hello.index', ['data' => $data]);  // 第二引数には連想配列を渡す
    }

    public function post(Request $request) {
        $msg = $request->msg;

        $data = [
            'msg' => $msg,
        ];
        return view('hello.index', $data);
    }
}
