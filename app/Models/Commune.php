<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Str;

class Commune extends Model
{
    use HasFactory;
  //  use SoftDeletes;
    protected $table = 'communes';

    public function wilaya_tab(){
        return $this->belongsTo('App\Models\Wilaya','wilaya_code');
    }

  
    


    public function  Structure(){
        return $this->hasMany('App\Models\Structure','commune','id')->withTrashed();
    }
}
