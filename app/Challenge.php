<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $table = "challenges";
 
    protected $fillable = ['isi_tantangan','dare_id'];
    protected $casts = ['isi_tantangan' => 'array'];
    public function dares(){
        return $this->belongsTo('App\Dare');
    }    
}
