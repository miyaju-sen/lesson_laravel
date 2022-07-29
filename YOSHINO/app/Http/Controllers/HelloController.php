<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;
use Illuminate\Support\Facades\Validator;

class HelloController extends Controller
{

    public function index(Request $request)
    {
        $validator = Validator::make($request->query(), [
            'id' => 'required',
            'pass' => 'required',
        ]);

        if($validator->fails()) {
            $msg = 'クエリーに問題があります。';
        }
        else {
            $msg = 'ID/PASSを受け付けました。フォームを入力ください。';
        }

        return view('hello.index', ['msg' => $msg]);
    }

    public function post(HelloRequest $request) 
    {
        return view('hello.index', ['msg' => '正しく入力されました！']);
    }
}
