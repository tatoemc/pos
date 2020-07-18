<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Mouncerfatitem;

class Mouncerfatcat extends Model
{
    //
    protected $table = 'mouncerfatcats';
    public $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = array('name');

     public function mouncerfatitems()
   {
   	 return $this->hasMany(Mouncerfatitem::class);
   }
}
