<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Person extends Model
{

    protected static function boot() {
        // 初期化処理
        parent::boot();

        // これがすべての検索処理に適用される（本テーブルから呼び出す際の前提となる）
        static::addGlobalScope('age', function(Builder $builder) {
            $builder->where('age', '>', 20);
        });
    }

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
}
