<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index(Request $request) {
        $items = Person::all();

        return view('person.index', ['items' => $items]);
    }

    public function find(Request $request) {
        return view('person.find', ['input' => '']);
    }

    public function search(Request $request) {
        $min = $request->input * 1;
        $max = $min + 10;

        $item = Person::ageGreaterThan($min)->ageLessThan($max)->first();
        $param = ['input' => $request->input, 'item' => $item];

        return view('person.find', $param);
    }

    public function add(Request $request) {
        return view('person.add');
    }

    public function create(Request $request) {
        // バリデーション実行
        $this->validate($request, Person::$rules);

        $person = new Person;

        $form = $request->all();    // フォームの値を受け取る
        unset($form['_token']);     // が、非表示フィールドは削除

        // 個々のプロパティをまとめて設定
        $person->fill($form)->save();

        // 個別に設定する場合
        // $person->name = $request->name;
        // $person->save();

        return redirect('/person');
    }
}
