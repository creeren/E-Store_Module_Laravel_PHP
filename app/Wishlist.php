<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Wishlist extends Model
{
    public $fillable = [ //kollonas kuras drikst aizpildit
        'product_id', 'user_id',
    ];
    public static function rules(){
        return [
            'product_id'=> 'required',
        ];

    }


    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function users()
    {
        return $this->Hasmany(User::class, 'user_id', 'id');
    }

}
