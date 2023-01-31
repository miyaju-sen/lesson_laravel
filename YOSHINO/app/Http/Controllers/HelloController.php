<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class HelloController extends Controller
{

    public function index(Request $request)
    {
        $items = DB::table('people')->orderBy('age', 'ASC')->get();
        // var_dump(DB::table('people')->get(['id', 'name']));

        return view('hello.index', ['items' => $items]);
    }

    public function post(Request $request) 
    {
        $items = DB::select('SELECT * FROM people');
        return view('hello.index', ['items' => $items]);
    }

    public function add(Request $request) {
        return view('hello.add');
    }

    public function create(Request $request) {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];

        DB::table('people')->insert($param);
        return redirect('/hello');
    }

    public function edit(Request $request) {
        // idがない場合のエラー処理は省略
        $item = DB::table('people')->where('id', $request->id)->first();

        return view('hello.edit', ['form' => $item]);
    }

    public function update(Request $request) {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::table('people')->where('id', $request->id)->update($param);

        return redirect('/hello');
    }

    public function del(Request $request) {
        $item = self::getData($request->id);

        return view('hello.del', ['form' => $item]);
    }

    public function remove(Request $request) {
        $param = ['id' => $request->id];
        DB::delete('DELETE FROM people WHERE id = :id', $param);

        return redirect('/hello');
    }

    public function show(Request $request) {
        $page = $request->page;
        $items = DB::table('people')
            ->offset($page * 3)
            ->limit(3)
            ->get();

        return view('hello.show', ['items' => $items]);
    }

    private function getData($id) {
        $item = DB::select('SELECT * FROM people WHERE id = '.$id);

        return $item[0];
    }
}
