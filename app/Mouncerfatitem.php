<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Mouncerfatcat;

class Mouncerfatitem extends Model
{
    //
    protected $table = 'mouncerfatitems';
    public $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = array('date','note','amount','file');

    public function mouncerfatcat()
    {
        return $this->belongsTo(Mouncerfatcat::class);

    }//end fo category
}
