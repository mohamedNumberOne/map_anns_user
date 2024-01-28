<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Structure extends Model
{
    use HasFactory;

    

    protected $casts = [
                'email'         => 'array', 
                'telfix'        => 'array', 
                'mobile'        => 'array', 
                'fax'           => 'array',
                ];
         
       
   // protected $dontKeepRevisionOf = ['id'];
    protected $table = 'structures';

  

    
   
    public function editor(){
        return $this->belongsTo('App\Models\User','edited_by')->withDefault(); //edited_by updated_by
    }

    public function deletor(){
        return $this->belongsTo('App\Models\User','deleted_by')->withDefault(); //edited_by updated_by
    }

    public function creator(){
        return $this->belongsTo('App\Models\User','created_by')->withDefault();
    }
    public function validator(){
        return $this->belongsTo('App\Models\User','validated_by')->withDefault(); //edited_by updated_by
    }

    public function wilayaent(){
        return $this->belongsTo('App\Models\Wilaya','wilaya')->withDefault(); //edited_by updated_by
    }

    public function communeent(){
        return $this->belongsTo('App\Models\Commune','commune')->withDefault(); //edited_by updated_by
    }
    
    public function typestructure(){
        return $this->belongsTo('App\Models\Typestructures','type_structure')->withDefault(); //edited_by updated_by
    }
     
   
   
  

   

    public function  getImage(){
        if($this->logo){
            return asset('assets/structures/'.$this->logo)    ;
        }else{
            return asset('admin/img/no-image-icon-4.png') ; 
        }
    }
    
    

}
