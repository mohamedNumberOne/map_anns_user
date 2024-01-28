<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Str;

class Wilaya extends Model
{
    use HasFactory;
  //  use SoftDeletes;
    protected $table = 'wilayas';

    public function creator(){
        return $this->belongsTo('App\Models\User','created_by');
    }

    public function editor(){
        return $this->belongsTo('App\Models\User','edited_by'); 
        
    }

    public function  Commune(){
        return $this->hasMany('App\Models\Commune','wilaya_code','id')->withTrashed();
    }   

    public function  Structure(){
        return $this->hasMany('App\Models\Structure','wilaya','id')->withTrashed();
    }
}
