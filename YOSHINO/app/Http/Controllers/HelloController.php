<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;


class HelloController extends Controller
{

    public function index($id='zero')
    {
        $data = [
            'msg' => 'これはコントローラから渡されたメッセージです。',
            'id' => $id,
        ];
        return view('hello.index', $data);  // 第二引数には連想配列を渡す
    }
}
