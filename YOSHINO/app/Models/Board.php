<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'person_id' => 'required',
        'title' => 'required',
        'message' => 'required',
    );

    public function getData() {
        // !! personの中身が空なレコードがひとつでもあると、non-objectエラーになる
        if(isset($this->person)) {
            return $this->id.': '.$this->title.' ('.$this->person->name.')';
        }
        
        return $this->id.': '.$this->title;
    }

    public function person() {
        return $this->belongsTo('App\Models\Person');
    }
}
