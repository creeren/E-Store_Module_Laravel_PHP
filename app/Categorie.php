<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public $fillable = ['name'];

    public static function rules()
    {
        return ['name' => 'required|string|min:3|max:15']; //strings no 3 lidz 15 zimem
    }

}
