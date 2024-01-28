<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Typestructures extends Model
{
    use HasFactory;
    protected $table = 'typestructures';

    public function editor(){
        return $this->belongsTo('App\Models\User','edited_by')->withDefault(); 
    }

    public function deletor(){
        return $this->belongsTo('App\Models\User','deleted_by')->withDefault(); 
    }

    public function creator(){
        return $this->belongsTo('App\Models\User','created_by')->withDefault();
    }
    

    public function structures(){
        return $this->hasMany('App\Models\Structure','type_structure','id'); 
    }

    public function  getImage(){
        if($this->logo){
            return asset('assets/typestructures/'.$this->logo)    ;
        }else{
            return asset('admin/img/black-flat-marker.png') ; 
        }
    }
    
    

}
