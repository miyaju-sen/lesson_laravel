<?php

namespace App\Models;

use App\Scopes\ScopePerson;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Person extends Model
{

    // protected static function boot() {
    //     // 初期化処理
    //     parent::boot();

    //     // これがすべての検索処理に適用される（本テーブルから呼び出す際の前提となる）
    //     static::addGlobalScope(new ScopePerson);
    // }

    // 入力のガード（値を用意しておかない項目としてidを指定）
    // idはDB側で自動的に番号を割り振るため、モデル作成時に値が必要ない
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'mail' => 'email',
        'age' => 'integer|min:0|max:150',
    );

    public function getData() {
        return $this->id.': '.$this->name.'('.$this->age.')';
    }

    public function scopeNameEqual($query, $str) {
        return $query->where('name', $str);
    }

    public function scopeAgeGreaterThan($query, $n) {
        return $query->where('age', '>=', $n);
    }

    public function scopeAgeLessThan($query, $n) {
        return $query->where('age', '<=', $n);
    }

    public function board() {
        return $this->hasOne('App\Models\Board');
    }
}
