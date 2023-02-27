<?php 
namespace App\Scopes;

/*
* 特定のモデルに囚われない、汎用的な処理を行うスコープ
*/

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ScopePerson implements Scope {
    public function apply(Builder $builter, Model $model) {
        // 年齢20歳より上
        $builter->where('age', '>', 20);
    }
}

?>