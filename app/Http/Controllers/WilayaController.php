<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Str;
use App\Models\Commune;
use App\Models\Wilaya;
use Validator;
use Auth;
use File;
use Image;

class WilayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:wilaya-list', ['only' => ['index','show']]);
         $this->middleware('permission:wilaya-edit', ['only' =>  ['edit']]);
         $this->middleware('permission:wilaya-edit|wilaya_cci-edit', ['only' =>  ['update']]);
    }
    public function index()
    {
        //
        return view("wilaya.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\wilaya  $wilaya
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
            $draw            = $request->get('draw');
            $start           = $request->get("start");
            $rowperpage      = $request->get("length"); // Rows display per page
            $columnIndex_arr = $request->get('order');
            $columnName_arr  = $request->get('columns');
            $order_arr       = $request->get('order');
            $search_arr      = $request->get('search');
            $columnIndex     = $columnIndex_arr[0]['column']; // Column index
            $columnName      = $columnName_arr[$columnIndex]['data']; // Column name
            $columnSortOrder = $order_arr[0]['dir']; // asc or desc
            $searchValue     = $search_arr['value']; // Search value
            $response = [];
            $status   = 200;
            $totalRecords    = Wilaya::count();
            $totalRecordswithFilter = Wilaya::where(function($query) use ($searchValue) {
                                          $query->orWhere('code', 'like', '%' . $searchValue . '%')
                                                ->orWhere('name', 'like', '%' . $searchValue . '%')
                                                ->orWhere('name_ar', 'like', '%' . $searchValue . '%')
                                                ->orWhere('name_en', 'like', '%' . $searchValue . '%')
                                                ->orWhere('name_ber', 'like', '%' . $searchValue . '%')
                                                ->orWhere('zip_code', 'like', '%' . $searchValue . '%');
                                                            })
                                          ->count();
            $records         = Wilaya::where(function($query) use ($searchValue) {
                                    $query->orWhere('code', 'like', '%' . $searchValue . '%')
                                          ->orWhere('name', 'like', '%' . $searchValue . '%')
                                          ->orWhere('name_ar', 'like', '%' . $searchValue . '%')
                                          ->orWhere('name_en', 'like', '%' . $searchValue . '%')
                                          ->orWhere('name_ber', 'like', '%' . $searchValue . '%')
                                          ->orWhere('zip_code', 'like', '%' . $searchValue . '%');
                                                      })
                                        ->skip($start)->take($rowperpage)
                                        ->orderBy($columnName,$columnSortOrder)
                                        ->get();
         
            $data_arr = array();
            foreach ($records as $record) {
                $data_arr[] = array(
                    'name'                   => $record->name,
                    'name_ar'                => $record->name_ar,
                    'name_en'                => $record->name_en,
                    'status'                 => $record->status,
                    'name_ber'               => $record->name_ber,
                    'zip_code'               => $record->zip_code,
                    "id"                     => $record->id,
                    "created_at"             => $record->created_at,
                    "updated_at"             => $record->updated_at,
                    "code"                => $record->code,
                    "action"                 => route('wilaya.edit',[$record->id])
                );
            }
    
            $response = array(
                "draw" => intval($draw),
                "iTotalRecords" => $totalRecords,
                "iTotalDisplayRecords" => $totalRecordswithFilter,
                "aaData" => $data_arr
            );
    
            return response()->json($response);
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\wilaya  $wilaya
     * @return \Illuminate\Http\Response
     */
        public function edit($id)
     { 
         return view('wilaya.edit', [
        'wilaya' => Wilaya::findOrFail($id)
                                         ]);

     }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\wilaya  $wilaya
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'id'                      => 'required|int',
            'name'                    => 'nullable|string',
            'name_ar'                 => 'nullable|string',
            'name_en'                 => 'nullable|string',
            'description'             => 'nullable|string',
            'description_ar'          => 'nullable|string',
            'description_en'          => 'nullable|string',
            'image'                   => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'name_ber'                => 'nullable|string', 
            'phoneCodes'              => 'nullable|string',
            'zip_code'                => 'nullable|string',
            'longitude'               => 'nullable|string',
            'latitude'                => 'nullable|string',
            'population'              => 'nullable|string',
            'superficie'              => 'nullable|string',
            ]);

        $wilaya = Wilaya::find($request->id);
        $status        = 404;
        $errors        = 1;
        $message       = "Une erreur est survenue. Veuillez réessayer";
     
        if ($validator->fails() || $wilaya  == null ) {
            $message  = "Veuillez vérifier les données";
        } else {  

                $content = $request->description;
                if($content){
                    try{
                        libxml_use_internal_errors(true);
                        $dom = new \DomDocument();
                        $dom->loadHtml( mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'),  LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                        $imageFile = $dom->getElementsByTagName('img');
        
                        foreach ($imageFile as $count => $image) {
                            $src = $image->getAttribute('src');
                        
                            if (preg_match('/data:image/', $src)) {
                                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                                $mimeType = $groups['mime'];
                        
                                $path = '/assets/images/wilaya/' . uniqid('', true) . '.' . $mimeType;
                        
                                Image::make($src)
                                    // ->resize(300, null, function ($constraint) {
                                    //     $constraint->aspectRatio();
                                    // })
                                    ->encode($mimeType, 80)
                                    ->save(public_path($path));
                        
                                $image->removeAttribute('src');
                                $image->setAttribute('src', $path);
                            }
                        }
                        
                    
                        $content = $dom->saveHTML();
        
                    }catch(\Exception $e){
                            
                        //return false;
        
                    }
                }
               

               $content_en = $request->description_en;
               if($content_en){
                try{
                    libxml_use_internal_errors(true);
                    $dom = new \DomDocument();
                    $dom->loadHtml( mb_convert_encoding($content_en, 'HTML-ENTITIES', 'UTF-8'),  LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                    $imageFile = $dom->getElementsByTagName('img');
    
                    foreach ($imageFile as $count => $image) {
                        $src = $image->getAttribute('src');
                    
                        if (preg_match('/data:image/', $src)) {
                            preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                            $mimeType = $groups['mime'];
                    
                            $path = '/assets/images/wilaya/' . uniqid('', true) . '.' . $mimeType;
                    
                            Image::make($src)
                                // ->resize(300, null, function ($constraint) {
                                //     $constraint->aspectRatio();
                                // })
                                ->encode($mimeType, 80)
                                ->save(public_path($path));
                    
                            $image->removeAttribute('src');
                            $image->setAttribute('src', $path);
                        }
                    }
                    
                
                    $content_en = $dom->saveHTML();
    
                   }catch(\Exception $e){
                           
                    //return false;
    
                   }
               }
              


               $content_ar = $request->description_ar;
               if( $content_ar){
                try{
                    libxml_use_internal_errors(true);
                    $dom = new \DomDocument();
                    $dom->loadHtml( mb_convert_encoding($content_ar, 'HTML-ENTITIES', 'UTF-8'),  LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                    $imageFile = $dom->getElementsByTagName('img');
    
                    foreach ($imageFile as $count => $image) {
                        $src = $image->getAttribute('src');
                    
                        if (preg_match('/data:image/', $src)) {
                            preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                            $mimeType = $groups['mime'];
                    
                            $path = '/assets/images/wilaya/' . uniqid('', true) . '.' . $mimeType;
                    
                            Image::make($src)
                                // ->resize(300, null, function ($constraint) {
                                //     $constraint->aspectRatio();
                                // })
                                ->encode($mimeType, 80)
                                ->save(public_path($path));
                    
                            $image->removeAttribute('src');
                            $image->setAttribute('src',$path);
                        }
                    }
                    
                
                    $content_ar = $dom->saveHTML();
    
                   }catch(\Exception $e){
                           
                    //return false;
    
                   }
               }
              
                


            $imageName='';
            $wilaya->name                    = $request->name;
            $wilaya->name_ar                 = $request->name_ar;
            $wilaya->name_en                 = $request->name_en;
            $wilaya->name_ber                = $request->name_ber;
            $wilaya->phoneCodes              = $request->phoneCodes;
            $wilaya->description             = $content;
            $wilaya->description_ar          = $content_ar;
            $wilaya->description_en          = $content_en;
            $wilaya->zip_code                = $request->zip_code;
            $wilaya->longitude               = $request->longitude;
            $wilaya->latitude                = $request->latitude;
            $wilaya->population              = $request->population;
            $wilaya->superficie              = $request->superficie;
            $wilaya->description_html        = $request->description_html;
            $size=0;
            if($request->image &&  $request->image != 'undefined'){
                if( $wilaya->image ) {
                    $image_path=public_path('assets/images/wilaya/'.$wilaya->image);
                }else{
                    $image_path="";
                }

                if($image_path){
                    if (File::exists($image_path)) {
                         unlink($image_path);
                      }
                }

                $image = $request->image;
                $img = Image::make($image->getRealPath());
                $imageName = time().'.'.'jpg';  
                $height = $img->height();
                $width = $img->width();
                $size = $img->filesize();

                
             if($height>400 ||  $width> 1900 ||  $size >20000  ){
                    
                    $img->resize(1900, 400, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save(public_path('assets/images/wilaya/'.$imageName),60,'jpg');

                    // $img->save(public_path('assets/images/wilaya/'.$imageName),60);
               }else{
                  // $image->move(public_path('assets/images/wilaya'), $imageName);
                  $img->save(public_path('assets/images/wilaya/'.$imageName),80,'jpg');
               }
               
        
              // $image->move(public_path('assets/images/wilaya'), $imageName);

               /* $optimizerChain = OptimizerChainFactory::create();
                 
                $optimizerChain->optimize($request->image, public_path('assets/images/wilaya/'.$imageName) );*/

               
               // $request->image->move(public_path('assets/images/wilaya'), $imageName);
                $wilaya->image                   =  $imageName;
            }  
           
            $wilaya->edited_by              = Auth::user()->id;
          
            $save                                 = $wilaya->save();
            if ($save) {
                $errors = 0;
                $status = 200;
                       }
        }
        $response['status'] = $status;
        $response["data"]   = $wilaya;
        $response['msg']    = $message;
        $response['errors'] = $errors;
        $response['token']  = $request->token;

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\wilaya  $wilaya
     * @return \Illuminate\Http\Response
     */
    public function destroy(wilaya $wilaya)
    {
        //
    }

    public function getWilayas(Request $request){

        $search = $request->search;
        $l = Str::length($search);
        

        if($search == ''){
           $wilaya = Wilaya::orderby('id','asc')->select('id','name','name_ar','name_en')->get();
        }else{
           $wilaya = Wilaya::orderby('id','asc')->select('id','name','name_ar','name_en')
                    ->where('name', 'like', '%' .$search . '%')
                    ->orWhere('name_en', 'like', '%' .$search . '%')
                    ->orWhere('name_ar', 'like', '%' .$search . '%')
                    ->limit(5)->get();

        }
  
        $response = array();
        if( session()->get('locale') == 'ar'){
            foreach($wilaya as $wilaya){
                $response[] = array(
                     "id"=>$wilaya->id,
                     "text"=>$wilaya->name_ar ?  $wilaya->name_ar : $wilaya->name,
                );
             }
        }else{
            if(session()->get('locale') == 'en' ){
                foreach($wilaya as $wilaya){
                    $response[] = array(
                         "id"=>$wilaya->id,
                         "text"=> $wilaya->name_en ?  $wilaya->name_en : $wilaya->name,
                    );
                 }
            }else{
                foreach($wilaya as $wilaya){
                    $response[] = array(
                         "id"=>$wilaya->id,
                         "text"=>$wilaya->name
                    );
                 }
            }
        }
        
  
        return response()->json($response);
    }


    public function getCommunes(Request $request){

        $search      = $request->search;
        $wilaya_code = $request->wilaya_code;
        $l           = Str::length($search);
        if( $wilaya_code!=""){
             $wilaya_code = sprintf("%02d", $wilaya_code);
        }

        if($search == ''){
           $commune = Commune::orderby('id','asc')->select('id','name','name_ar');
           if( $wilaya_code!=""){
            $commune = $commune->where("wilaya_code","=",$wilaya_code);
           }
           
           $commune = $commune->get();
        }else{
           $commune = Commune::orderby('id','asc')->select('id','name','name_ar')
                    ->where('name', 'like', '%' .$search . '%')
                    ->orWhere('name_ar', 'like', '%' .$search . '%')
                    ->limit(5);
            if( $wilaya_code!=""){
                $commune = $commune->where("wilaya_code","=",$wilaya_code);
            }

            $commune = $commune->get();

        }
  
        $response = array();
        if( session()->get('locale') == 'ar'){
            foreach($commune as $commune){
                $response[] = array(
                     "id"=>$commune->id,
                     "text"=>$commune->name_ar ?  $commune->name_ar : $commune->name,
                );
             }
        }else{
            if(session()->get('locale') == 'en' ){
                foreach($commune as $commune){
                    $response[] = array(
                         "id"=>$commune->id,
                         "text"=> $commune->name ?  $commune->name : $commune->name,
                    );
                 }
            }else{
                foreach($commune as $commune){
                    $response[] = array(
                         "id"=>$commune->id,
                         "text"=>$commune->name
                    );
                 }
            }
        }
        
  
        return response()->json($response);
    }


    
}


