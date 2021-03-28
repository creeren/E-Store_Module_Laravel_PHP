<?php

namespace App;



use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = [ //kollonas kuras drikst aizpildit
        'article', 'name', 'quantity', 'price', 'country', 'categories_id'
    ];
   public static function rules(){
       return [
           'article'=> 'required|string|min:5|max:10', // strings no 5 lidz 10 zimem
           'name'=> 'required|string|min:3|max:30', //strings no 3 zimem lidz 30
           'quantity' => 'required|numeric|min:1|max:99999',//1<= skaitlis <=99999
           'price' => 'required|numeric|min:0.01', // skaitlis=>0.01
           'country' => 'required',
           'categories_id' => 'required'
       ];

   }

    public function categories()
    {
        return $this->belongsTo(Categorie::class, 'categories_id', 'id');
    }
    public function wishlist()
    {
        return $this->HasMany(Wishlist::class, 'product_id', 'id');
    }

}
