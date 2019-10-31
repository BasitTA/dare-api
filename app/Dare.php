<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dare extends Model
{ 
    protected $table = "dares";
 
    protected $fillable = ['gambar','nama','url_video'];

    public function challenges(){
        return $this->hasMany('App\Challenge');
    }
}
