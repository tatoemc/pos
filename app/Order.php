<?php

namespace App;
use App\Product;
use App\Client;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $guarded = [];

    public function client()
    {
        return $this->belongsTo(Client::class);

    }//end of user

    public function products()
    {
        return $this->belongsToMany(Product::class,'order_product')->withPivot('quantity','order_id');

    }//end of products
    
}
