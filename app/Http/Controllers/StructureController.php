<?php

namespace App\Http\Controllers;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\Structure;
use App\Models\Typestructures;
//use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Carbon\CarbonPeriod;
use Auth ;
use File ;
use Mail;
use Str ;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\URL;
use App\Models\Wilaya;
use App\Models\Commune;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;

use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Session ; 
use Cookie;
class StructureController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
      
    }


    /**
     * List User 
     * @param Nill
     * @return Array $user
     * @author  Guermat sidahmed
     */

    

    public function index()
    {

        /*
        for ($i = 0; $i < 30; $i++) {
            $countryCode = "+213";
            $randomNumber = mt_rand(600000000, 699999999);
            $phoneNumber = $countryCode . " " . $randomNumber;
            $phoneNumbers[] = $phoneNumber;
        }

        for ($i = 0; $i < 30; $i++) {
            $countryCode = "+213";
            $randomNumber = mt_rand(500000000, 599999999);
            $phoneNumber = $countryCode . " " . $randomNumber;
            $phoneNumbers[] = $phoneNumber;
        }

        for ($i = 0; $i < 30; $i++) {
            $countryCode = "+213";
            $randomNumber = mt_rand(700000000, 799999999);
            $phoneNumber = $countryCode . " " . $randomNumber;
            $phoneNumbers[] = $phoneNumber;
        }
        
        
        
        // Output the generated phone numbers
       

        
      
         
            $array_typestructures=[];
            $typestructures = Typestructures::where('status',"=",1)->get();
            $i=0;
            foreach($typestructures as $structures ){
                $array_typestructures[$i]=$structures->id;
                $i++;
            }
            $structures   = Structure::where(function($query)  {
               // $query->orWhereNull('structures.type_structure');
                
            })                               
            ->get(); 
        
        

            foreach($structures as $structure ){

                $randomItemIndex = array_rand($phoneNumbers);
                $randomItem = $phoneNumbers[$randomItemIndex];
                
                $telfix_arry   =  explode(",", $randomItem) ;
               
                $structure->type_structure           = $array_typestructures[array_rand($array_typestructures)];
                $structure->telfix                   =  $telfix_arry ;
                $save                                = $structure->save();
            }

        
            dd($phoneNumbers);
            dd(array_rand($array_telfix)) ;
    */
      
        $typestructures = Typestructures::where('status',"=",1)->get();
        $wilayas = Wilaya::where('status',"=",1)->orderBy('code','asc')->get();
        return view('structure.index',compact('typestructures','wilayas'));
    }

    /**
     * Create User 
     * @param Nill
     * @return Array $user
     * @author  Guermat sidahmed
     */

    public function create()
    {
        $typestructures = Typestructures::where('status',"=",1)->get();
        $wilayas = Wilaya::where('status',"=",1)->orderBy('code','asc')->get();
        return view('structure.add',compact('typestructures','wilayas'));
    }

    /**
     * Store User
     * @param Request $request
     * @return View Users
     * @author  Guermat sidahmed
     */
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            
            'name'                     => ['required', 'string',  'max:255'],
            'description'              => 'nullable',
            'wilaya'                   => 'nullable',
            'latitude'                 => 'nullable', 
            'longitude'                => 'nullable',
            'adresse'                  => 'nullable',
            'name_ar'                  => 'nullable',
            'name_en'                  => 'nullable', 
            'type_structure'           => 'nullable',
            'email'                    => 'nullable',
            'siteweb'                  => 'nullable', 
            'telfix'                   => 'nullable',
            'logo'                     => 'nullable|image|mimes:gif,jpg,jpeg,png,svg|max:4048',
           
        ]);
        $structures  =null;
        $status        = 404;
        $errors        = 1;
        $message       = "Une erreur est survenue. Veuillez réessayer";
        if ($validator->fails()) {

            $message  = "Veuillez vérifier les données";  
        }else{

                $filename_nv="";
                if(request()->hasFile('image')) {
                                $file = request()->file('image');
                                $filename_nv = "" ;
                                $filename    = $file->getClientOriginalName();
                                $extension   = $file->getClientOriginalExtension();
                                $onlyName    = explode('.'.$extension,$filename)[0];
                                $filesize    = $file->getSize();
                                $imageName   = '';
                                $filename_nv = time().'.'.$extension; 
                                $path = public_path().'assets/structures/';
                                File::makeDirectory($path, $mode = 0777, true, true); 
                                $file->move(public_path('assets/structures/'), $filename_nv);
                }
                $email_arry    =  explode(",", $request->email) ;
                $telfix_arry   =  explode(",", $request->telfix) ;
                $fax_arry      =  explode(",", $request->fax) ;
                
                $structures                           = new Structure();
                $structures->name                     = $request->name;
                $structures->name_ar                  = $request->name_ar;
                $structures->name_en                  = $request->name_en;
                $structures->wilaya                   = $request->wilaya;
                $structures->commune                   = $request->commune;
                
                $structures->latitude                 = $request->latitude;
                $structures->longitude                = $request->longitude;
                $structures->adresse                  = $request->adresse;
                $structures->adresse_ar               = $request->adresse_ar;
                $structures->adresse_en               = $request->adresse_en;
                $structures->type_structure           = $request->type_structure;
                $structures->email                    = $email_arry ;
                $structures->siteweb                  = $request->siteweb;
                $structures->telfix                   = $telfix_arry;
                $structures->fax                      = $fax_arry;
                $structures->status                   = $request->status;
                $structures->description              = $request->description;
                $structures->description_ar           = $request->description_ar;
                $structures->description_en           = $request->description_en;
                $structures->logo                     = $filename_nv;
                $structures->created_by               = Auth::user()->id;
                $save                                 = $structures->save();
                if ($save) {
                    $errors = 0;
                    $status = 200;
                }
        }
        $response['status'] = $status;
        $response["data"]   = $structures;
        $response['msg']    = $message;
        $response['errors'] = $errors;
        $response['token']  = $request->token;
       // $response['motcle']  = $categorie->motcle;

        return response()->json($response);
    }
    

    /**
     * Update Status Of User
     * @param Integer $status
     * @return List Page With Success
     * @author  Guermat sidahmed
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
        $typestructure       = $request->get('typestructure');
        $status_id       = $request->get('status');
        $wilaya_id       = $request->get('wilaya');
        $commune_id       = $request->get('commune');
        $status_geo       = $request->get('status_geo');
        


        $response = [];
        $status   = 200;
       
        $totalRecords    = Structure::with('wilayaent')->whereRaw('1 = 1') ;

        if($status_id!=""){
            $totalRecords    = $totalRecords->where('structures.status', '=', $status_id);
        }

        if($typestructure!=""){
            $totalRecords    = $totalRecords->where('structures.type_structure', '=', $typestructure);
        }
    
        if($commune_id!=""){
            $totalRecords    = $totalRecords->where('commune', '=', $commune_id);
        }
        if($status_geo=="2"){
            $totalRecords    = $totalRecords->where(function($query)  {
                                            $query->orWhereNull('structures.latitude');
                                            $query->orWhereNull('structures.longitude');
                                        })      ;
        }


        if($status_geo=="1"){
            $totalRecords    = $totalRecords->where(function($query)  {
                                            $query->orwhereNotNull('structures.latitude');
                                            $query->orwhereNotNull('structures.longitude');
                                        })      ;
        }

        

        if($wilaya_id!=""){
            $totalRecords    = $totalRecords->where('wilaya', '=', $wilaya_id);
        }

        $totalRecords    = $totalRecords->count();


        $totalRecordswithFilter = Structure::whereRaw('1 = 1') ;

        if($status_id!=""){
            $totalRecordswithFilter    = $totalRecordswithFilter->where('structures.status', '=', $status_id);
        }
       
        if($typestructure!=""){
            $totalRecordswithFilter    = $totalRecordswithFilter->where('structures.type_structure', '=', $typestructure);
        }

        if($wilaya_id!=""){
            $totalRecordswithFilter    = $totalRecordswithFilter->where('wilaya', '=', $wilaya_id);
        }
        if($commune_id!=""){
            $totalRecordswithFilter    = $totalRecordswithFilter->where('commune', '=', $commune_id);
        }
        if($status_geo=="2"){
            $totalRecordswithFilter    = $totalRecordswithFilter->where(function($query)  {
                                            $query->orWhereNull('structures.latitude');
                                            $query->orWhereNull('structures.longitude');
                                        })      ;
        }


        if($status_geo=="1"){
            $totalRecordswithFilter    = $totalRecordswithFilter->where(function($query)  {
                                            $query->orwhereNotNull('structures.latitude');
                                            $query->orwhereNotNull('structures.longitude');
                                        })      ;
        }
        
       
        $totalRecordswithFilter =  $totalRecordswithFilter->where(function($query) use ($searchValue) {
                                      $query->orWhere('structures.name', 'like', '%' . $searchValue . '%')
                                            ->orWhere('structures.adresse_ar', 'like', '%' . $searchValue . '%')
                                            ->orWhere('structures.adresse', 'like', '%' . $searchValue . '%')
                                            ->orWhere('structures.adresse_en', 'like', '%' . $searchValue . '%')
                                            ->orWhere('structures.name_ar', 'like', '%' . $searchValue . '%')
                                            ->orWhere('structures.name_en', 'like', '%' . $searchValue . '%');
                                        })
                                      ->with('wilayaent')
                                      ->count();

        $records         = Structure::whereRaw('1 = 1') ;

        if($status_id!=""){
            $records    = $records->where('structures.status', '=', $status_id);
        }

        if($typestructure!=""){
            $records    = $records->where('structures.type_structure', '=', $typestructure);
        }

        if($wilaya_id!=""){
            $records    = $records->where('wilaya', '=', $wilaya_id);
        }
        if($commune_id!=""){
            $records    = $records->where('commune', '=', $commune_id);
        }

        if($status_geo=="2"){
            $records    = $records->where(function($query)  {
                                            $query->orWhereNull('structures.latitude');
                                            $query->orWhereNull('structures.longitude');
                                        })      ;
        }


        if($status_geo=="1"){
            $records    = $records->where(function($query)  {
                                            $query->orwhereNotNull('structures.latitude');
                                            $query->orwhereNotNull('structures.longitude');
                                        })      ;
        }
     
        
        
        $records         = $records->where(function($query) use ($searchValue) {
                              $query->orWhere('structures.name', 'like', '%' . $searchValue . '%')
                                    ->orWhere('structures.adresse_ar', 'like', '%' . $searchValue . '%')
                                    ->orWhere('structures.adresse', 'like', '%' . $searchValue . '%')
                                    ->orWhere('structures.adresse_en', 'like', '%' . $searchValue . '%')
                                    ->orWhere('structures.name_ar', 'like', '%' . $searchValue . '%')
                                    ->orWhere('structures.name_en', 'like', '%' . $searchValue . '%') ;
                                                  })
                                    ->with('wilayaent')
                                    ->skip($start)->take($rowperpage)
                                    ->select('structures.*')
                                    ->orderBy($columnName,$columnSortOrder)
                                    ->get();
     
        $data_arr = array();
        
        foreach ($records as $record) {
  
            $data_arr[] = array(
                'name'                    => $record->name,
                'status'                  => $record->status,
                'wilaya'                  => $record->wilaya ,
                'adresse'                 => $record->adresse ,
                'latitude'                => $record->latitude ,
                'longitude'               => $record->longitude ,
                'type_structure'          => $record->type_structure ,
                'typestructure'           => $record->typestructure    ?     $record->typestructure->name_abr     : '',
                'wilayaent'               => $record->wilayaent    ?         $record->wilayaent->name     : '',
                'commune'                  => $record->commune ,
                'communeent'               => $record->communeent    ?         $record->communeent->name     : '',
                
                'logo'                    => $record->logo,
                'getImage'                => $record->getImage(),
                "id"                      => $record->id,
                "created_at"              => $record->created_at,
                "updated_at"              => $record->updated_at,
                "edited_by"               => $record->edited_by ,
                "user_editor"             => $record->editor ? $record->editor->full_name : '<span class="kt-badge kt-badge--inline kt-badge--warning">NULL</span>',
                "created_by"              => $record->created_by ,
                "user_creator"            => $record->creator ? $record->creator->full_name : '<span class="kt-badge kt-badge--inline kt-badge--warning">NULL</span>',
                "action"                  => route('structure.edit',[$record->id])
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
     * Edit User
     * @param Integer $user
     * @return Collection $user
     * @author  Guermat sidahmed
     */
    
    public function edit(Structure $structures)
    {

        $typestructures = Typestructures::where('status',"=",1)->get();
        return view('structure.edit')->with([
            'typestructures'  => $typestructures,
            'structures'  => $structures,
        ]);
       
    }

    /**
     * Update User
     * @param Request $request, User $user
     * @return View Users
     * @author  Guermat sidahmed
     */

    public function update(Request $request)
    {
        
        $structures = Structure::find($request->id);
        $validator = Validator::make($request->all(), [
            'id'                       => 'required',
            'name'                     => ['required', 'string',  'max:255'],
            'description'              => 'nullable',
            'wilaya'                   => 'nullable',
            'latitude'                 => 'nullable', 
            'longitude'                => 'nullable',
            'adresse'                  => 'nullable',
            'name_ar'                  => 'nullable',
            'name_en'                  => 'nullable', 
            'type_structure'           => 'nullable',
            'email'                    => 'nullable',
            'siteweb'                  => 'nullable', 
            'telfix'                   => 'nullable',
            'logo'                     => 'nullable|image|mimes:gif,jpg,jpeg,png,svg|max:4048',
           
        ]);
        $status        = 404;
        $errors        = 1;
        $message       = "Une erreur est survenue. Veuillez réessayer";
        

        if ($validator->fails() || $structures  == null) {
            
          
                                $message  = "Veuillez vérifier les données";  
                                

                
        }else {  
                
                $filename_nv=$structures->logo;
                if(request()->hasFile('image')) {
                                $file = request()->file('image');
                                $filename_nv = "" ;
                                $filename    = $file->getClientOriginalName();
                                $extension   = $file->getClientOriginalExtension();
                                $onlyName    = explode('.'.$extension,$filename)[0];
                                $filesize    = $file->getSize();
                                $imageName   = '';
                                $filename_nv = time().'.'.$extension; 
                                $path = public_path().'assets/structures/';
                                File::makeDirectory($path, $mode = 0777, true, true); 
                                $file->move(public_path('assets/structures/'), $filename_nv);
                }
          

                $email_arry =explode(",", $request->email) ;
                $telfix_arry =explode(",", $request->telfix) ;
                $fax_arry =explode(",", $request->fax) ;

                $structures->name                     = $request->name;
                $structures->name_ar                  = $request->name_ar;
                $structures->name_en                  = $request->name_en;
                $structures->wilaya                   = $request->wilaya;
                $structures->commune                  = $request->commune;
                $structures->latitude                 = $request->latitude;
                $structures->longitude                = $request->longitude;
                $structures->adresse                  = $request->adresse;
                $structures->adresse_ar               = $request->adresse_ar;
                $structures->adresse_en               = $request->adresse_en;
                $structures->type_structure           = $request->type_structure;
                $structures->email                    = $email_arry ;
                $structures->siteweb                  = $request->siteweb;
                $structures->telfix                   = $telfix_arry;
                $structures->fax                      = $fax_arry;
                $structures->status                   = $request->status;
                $structures->description              = $request->description;
                $structures->description_ar           = $request->description_ar;
                $structures->description_en           = $request->description_en;
                $structures->logo                     = $filename_nv;
                $structures->edited_by                 = Auth::user()->id;
                $save                                 = $structures->save();
                if ($save) {
                     
                            $errors = 0;
                            $status = 200;
                }
        }
        $response['status'] = $status;
        $response["data"]   = $structures;
        $response['msg']    = $message;
        $response['errors'] = $errors;
        $response['token']  = $request->token;
        return response()->json($response);

    }


    public function importer_depuis_Excel(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fileexcel'                   => 'required|mimes:xlsx,xls,csv|max:100048',
            'id_typestructure'                 => 'required',
        ]);
        $status        = 404;
        $errors        = 1;
        $message       = "Une erreur est survenue. Veuillez réessayer";
        $path="";
        if ($validator->fails()) {
            $message  = "Veuillez vérifier les données";
        }else{  
            $imageName='';
            $insert_data=[];
            if($request->fileexcel &&  $request->fileexcel != 'undefined'){
                $filename_nv="" ;
                $id_typestructure =$request->id_typestructure ;
                $file=$request->fileexcel;
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $onlyName = explode('.'.$extension,$filename)[0];
                $filesize = $file->getSize();
                $imageName='';
                $filename_nv = time().'.'.$extension; 
                $path = public_path()."assets/images/tmp_excel";
                File::makeDirectory($path, $mode = 0777, true, true); 
                $file->move(public_path('assets/images/tmp_excel'), $filename_nv);

                $rows = new Collection() ;
                $data = Excel::toArray($rows, public_path('assets/images/tmp_excel/'.$filename_nv));
                $file_path=public_path('assets/images/tmp_excel/'.$filename_nv);
              
                $status = 200;
                $errors =0;
        
                if(count($data))
                {
                            $i=1;
                            $niv1="";
                            $niv2="";
                            $arr=[] ;
                            $count_email=0;
                            foreach($data as  $value)
                            {
                                foreach($value as $row)
                                {   
                                    if($i>1){

                                        $name=$row[0];
                                        $adress=$row[3];
                                        $commune=$row[2];
                                        $wilaya=$row[1];
                                        $numero_Mobile=$row[4];

                                        if($row[0]){

                                         
                                              

                                          
                                                  



                                                        $existsInstructures = Structure::where('name',  htmlentities($name))->exists();

                                                        if ($existsInstructures) {
                                                            $status_email          =  "structure exists in Structure table.";
                                                        } else {

                                                            $id_wilaya=null;
                                                            if(trim($wilaya) !=''){
                                                                $existswilaya = Wilaya::where('name', 'like', '%' . trim($wilaya) . '%')
                                                                ->first();
                                                                if ($existswilaya) {
                                                                    $id_wilaya=$existswilaya->id;

                                                                }
                                                            }

                                                            $id_commune=null;
                                                            if(trim($commune) !=''){
                                                                $existscommune = Commune::where('name', 'like', '%' . trim($commune) . '%')
                                                                ->first();
                                                                if ($existscommune &&  $existscommune->count() > 0  ) {
                                                                    $id_commune=$existscommune->id;
                                                                   
                                                                }
                                                            }


                                                            
                                                            $telfix_arry   =  explode(",", $numero_Mobile) ;
                                                           
                                                            $structures                           = new Structure();
                                                            $structures->name                     = htmlentities($name);
                                                            $structures->wilaya                   = $id_wilaya;
                                                            $structures->commune                  = $id_commune;
                                                            $structures->adresse                  = htmlentities($adress);
                                                            $structures->type_structure           = $request->id_typestructure;
                                                            $structures->telfix                   = $telfix_arry;
                                                            $structures->status                   = 1;
                                                            $structures->created_by               = Auth::user()->id;
                                                            $save                                 = $structures->save();


                                                            $insert_data[] = array( 
                                                                'Name'                => $name,
                                                                'Adress'              => $adress,
                                                                'Wilaya'              => $wilaya,
                                                                'numero_Mobile'       => $numero_Mobile,
                                                                'id_wilaya'           => $id_wilaya,
                                                                'id_commune'           => $id_commune
                                                            );
        

                                                    
                                                        }





                                                    
                                                



                                            


                                         
                                            
                                            

                                        }
                                    }
                                    $i++;
                                }
                            }
                }
                $path="";
                $image_path=public_path('assets/images/tmp_excel/'.$filename_nv);
             if($image_path){
                if (File::exists($image_path)) {
                       unlink($image_path);
                }
                }
            }
          // dd($insert_data) ;
        }
        $response['status']       = $status;
        $response["data"]         = $path;
        $response["excel"]        = $data;
        $response['msg']          = $message;
        $response['errors']       = $errors;
        $response['token']        = $request->token;
        // $response['motcle']  = $categorie->motcle;
        return response()->json($response);
    }
    


    public function refrach(Request $request){
        $structures   = Structure::where('structures.status','!=', '0')
                                    ->where('structures.adresse','!=', '')
                                    ->where(function($query)  {
                                        $query->orWhereNull('structures.latitude');
                                        $query->orWhereNull('structures.longitude');
                                    })                               
                                    ->get(); 
        $count_structure=0;
        foreach ($structures as $structure) {
                

               

            $address = $structure->adresse ;

            // Perform a dummy request to get cookies
            $dummyResponse = file_get_contents('https://www.barattalo.it');
            $dummyHeaders = $http_response_header;
            $cookies = [];
            foreach ($dummyHeaders as $header) {
                if (strpos($header, 'Set-Cookie') !== false) {
                    $cookies[] = explode(': ', $header)[1];
                }
            }
            $cookieString = implode('; ', $cookies);

            $url = 'https://www.barattalo.it/demo/getlatlong.php';

            $headers = array(
                'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36',
                'x-requested-with: XMLHttpRequest',
                'origin: https://www.barattalo.it',
                'referer: https://www.barattalo.it/',
                "content-type: application/x-www-form-urlencoded",

                "user-agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.96 Safari/537.36",
                "referer: https://www.barattalo.it/convert-address-lat-long",
                "x-requested-with: XMLHttpRequest",
                'Cookie: ' . $cookieString, // Add the extracted cookies to the request headers
            );

            $data = array(
                'q' => $address,
                'act' => 'cerca',
                'cp' => '',
            );

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

            $response_lan = curl_exec($curl);

            if ($response_lan === false) {
                $message ='cURL error: ' . curl_error($curl) ;
                $errors=1 ;
                $status=404;
                //dd('cURL error: ' . curl_error($curl) );
            }else{
                $errors=0 ;
                $status=200;
            }

            curl_close($curl);


                        if($response_lan!="ko"){

                            list($latitudeString, $longitudeString) = explode(',', $response_lan);
                                // Convert strings to numbers
                                $latitude = floatval($latitudeString);
                                $longitude = floatval($longitudeString);

                                $count_structure++;
                                $address_glopable[]=$address ; 

                                $structure->latitude                 = $latitude;
                                $structure->longitude                = $longitude;
                                $structure->edited_by                = Auth::user()->id;
                                $save                                = $structure->save();




                           
                        }


                    
                

         

        }
        $errors = 0;
        $status = 200;
        $message = "";
        $response['status'] = $status;
        $response["data"]   = $count_structure;
        $response["address_glopable"]   = $address_glopable;
        $response['msg']    = $message;
        $response['errors'] = $errors;
         return json_encode($response,JSON_INVALID_UTF8_IGNORE);        
        return response()->json($response);

    }


    

    public function getStructure(Request $request){

        $search = $request->search;
        $l = Str::length($search);
        

        if($search == ''){
           $structures = Structure::orderby('id','asc')->select('id','name')->get();
        }else{
           $structures = Structure::orderby('id','asc')->select('id','name')
                    ->where('name', 'like', '%' .$search . '%')
                    ->limit(5)->get();

        }
  
        $response = array();
      
        foreach($structures as $structures){
                    $response[] = array(
                         "id"=>$structures->id,
                         "text"=>$structures->name
                    );
        }
            
        return response()->json($response);
    }


   

    

   

    /**
     * Delete User
     * @param User $user
     * @return Index Users
     * @author  Guermat sidahmed
     */


    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required'
        ]);
        $Structure = Structure::find($request->id);
        $status   = 404;
        $errors   = 1;
        $message  = "Une erreur est survenue. Veuillez réessayer";

        if ($validator->fails() || $Structure  == null) {
            $message  = "Veuillez vérifier les données";
        }else{
    
            if ($Structure->delete()) {
             
                        $errors   = 0;
                        $status   = 200;
            }
        
          
        }
        $response['status'] = $status;
        $response['msg']    = $message;
        $response['errors'] = $errors;
        $response['token']  = $request->token;

        return response()->json($response);
    }


    public function find_long(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'adresse' => 'required'
        ]);
       
        $status   = 404;
        $errors   = 1;
        $response_lan=null ; 
        $message  = "Une erreur est survenue. Veuillez réessayer";

        if ($validator->fails() ) {
            $message  = "Veuillez vérifier les données";
        }else{


                $address = $request->adresse ;

                // Perform a dummy request to get cookies
                $dummyResponse = file_get_contents('https://www.barattalo.it');
                $dummyHeaders = $http_response_header;
                $cookies = [];
                foreach ($dummyHeaders as $header) {
                    if (strpos($header, 'Set-Cookie') !== false) {
                        $cookies[] = explode(': ', $header)[1];
                    }
                }
                $cookieString = implode('; ', $cookies);

                $url = 'https://www.barattalo.it/demo/getlatlong.php';

                $headers = array(
                    'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36',
                    'x-requested-with: XMLHttpRequest',
                    'origin: https://www.barattalo.it',
                    'referer: https://www.barattalo.it/',
                    "content-type: application/x-www-form-urlencoded",

                    "user-agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.96 Safari/537.36",
                    "referer: https://www.barattalo.it/convert-address-lat-long",
                    "x-requested-with: XMLHttpRequest",
                    'Cookie: ' . $cookieString, // Add the extracted cookies to the request headers
                );

                $data = array(
                    'q' => $address,
                    'act' => 'cerca',
                    'cp' => '',
                );

                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

                $response_lan = curl_exec($curl);

                if ($response_lan === false) {
                    $message ='cURL error: ' . curl_error($curl) ;
                    $errors=1 ;
                    $status=404;
                    //dd('cURL error: ' . curl_error($curl) );
                }else{
                    $errors=0 ;
                    $status=200;
                }

                curl_close($curl);

               // dd('address: '.$address."    lan,log   ==>   ". $response_lan);

    
           
        
          
        }

        $response['data']   = $response_lan;
        $response['status'] = $status;
        $response['msg']    = $message;
        $response['errors'] = $errors;
        $response['token']  = $request->token;

        return response()->json($response);
    }


    


    /**
     * Import Users 
     * @param Null
     * @return View File
     */

    public function importUsers()
    {
        return view('departement.import');
    }

    public function uploadUsers(Request $request)
    {
        Excel::import(new UsersImport, $request->file);
        
        return redirect()->route('departement.index')->with('success', 'User Imported Successfully');
    }

    public function export() 
    {
        return Excel::download(new DepartementExport, 'departement.xlsx');
    }

}
