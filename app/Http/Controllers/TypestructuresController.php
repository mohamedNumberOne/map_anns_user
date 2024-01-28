<?php

namespace App\Http\Controllers;
use App\Models\User;
use Spatie\Permission\Models\Role;
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
use App\Models\Wilaya;
use App\Models\Typestructures;
use App\Models\Structure;
class TypestructuresController extends Controller
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
   
        return view('typestructures.index');
    }


   
  

    /**
     * Create User 
     * @param Nill
     * @return Array $user
     * @author  Guermat sidahmed
     */

    public function create()
    {

        return view('typestructures.add');
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
            'name'                     => ['required', 'string',  'max:255', 'unique:typestructures'],
            'name_abr'                 => ['required', 'string',  'max:255', 'unique:typestructures'],
            'name_ar'                  => 'nullable',
            'name_en'                  => 'nullable', 
            'description'              => 'nullable',
            'description_ar'           => 'nullable',
            'description_en'           => 'nullable',
            'status'                   => 'nullable', 
            'image'                    => 'nullable|image|mimes:gif,jpg,jpeg,png,svg|max:4048',
           
        ]);
        $typestructures  =null;
        $status        = 404;
        $errors        = 1;
        $message       = "Une erreur est survenue. Veuillez réessayer";
        if ($validator->fails()) {
                
                   if($validator->errors()->first('name')){
                    $message  =    "Nom déjà u tilisé" ;
                    }else{ 

                        if($validator->errors()->first('name_abr')){
                            $message  =    "Nom abrégé déjà u tilisé" ;
                            }else{
                               $message  = "Veuillez vérifier les données";  
                            }

                        }
                    
        }else{  
            $imageName='';
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
                            $path = public_path().'assets/typestructures/';
                            File::makeDirectory($path, $mode = 0777, true, true); 
                            $file->move(public_path('assets/typestructures/'), $filename_nv);
            }

            $typestructures                           = new Typestructures();
            $typestructures->name                     = $request->name;
            $typestructures->name_abr                 = $request->name_abr;
            $typestructures->name_ar                  = $request->name_ar;
            $typestructures->name_en                  = $request->name_en;
            $typestructures->description              = $request->description;
            $typestructures->description_ar           = $request->description_ar;
            $typestructures->description_en           = $request->description_en;
            $typestructures->status                   = $request->status;
            $typestructures->logo                     = $filename_nv;
            $typestructures->created_by               = Auth::user()->id;
            $save                                     = $typestructures->save();
            if ($save) {
                $errors = 0;
                $status = 200;
            }
        }
        $response['status'] = $status;
        $response["data"]   = $typestructures;
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

        $status_id       = $request->get('status');
        




        $response = [];
        $status   = 200;
       
        $totalRecords    = Typestructures::with('wilayaent')->whereRaw('1 = 1') ;
        if($status_id!=""){
        $totalRecords    = $totalRecords->where('typestructures.status', '=', $status_id);
        }
        
        
     

    
        $totalRecords    = $totalRecords->count();

        $totalRecordswithFilter = Typestructures::whereRaw('1 = 1') ;
        if($status_id!=""){
            $totalRecordswithFilter    = $totalRecordswithFilter->where('typestructures.status', '=', $status_id);
        }
       

      

      
     
       
        $totalRecordswithFilter =  $totalRecordswithFilter->where(function($query) use ($searchValue) {
                                    $query->orWhere('typestructures.name', 'like', '%' . $searchValue . '%')
                                    ->orWhere('typestructures.name_en', 'like', '%' . $searchValue . '%')
                                    ->orWhere('typestructures.description', 'like', '%' . $searchValue . '%')
                                    ->orWhere('typestructures.description_ar', 'like', '%' . $searchValue . '%')
                                    ->orWhere('typestructures.description_en', 'like', '%' . $searchValue . '%')
                                    ->orWhere('typestructures.name_abr', 'like', '%' . $searchValue . '%')
                                    ->orWhere('typestructures.name_ar', 'like', '%' . $searchValue . '%');})
                                    ->count();
        $records         = Typestructures::whereRaw('1 = 1') ;

        if($status_id!=""){
            $records    = $records->where('typestructures.status', '=', $status_id);
        }


       
       
        
        
        $records         = $records->where(function($query) use ($searchValue) {
                            $query->orWhere('typestructures.name', 'like', '%' . $searchValue . '%')
                                    ->orWhere('typestructures.name_en', 'like', '%' . $searchValue . '%')
                                    ->orWhere('typestructures.description', 'like', '%' . $searchValue . '%')
                                    ->orWhere('typestructures.description_ar', 'like', '%' . $searchValue . '%')
                                    ->orWhere('typestructures.description_en', 'like', '%' . $searchValue . '%')
                                    ->orWhere('typestructures.name_abr', 'like', '%' . $searchValue . '%')
                                    ->orWhere('typestructures.name_ar', 'like', '%' . $searchValue . '%'); })
                                    ->skip($start)->take($rowperpage)
                                    ->select('typestructures.*')
                                    ->orderBy($columnName,$columnSortOrder)
                                    ->get();
     
        $data_arr = array();
        
        foreach ($records as $record) {

           

             
                    
                $data_arr[] = array(
                'name'                    => $record->name,
                'status'                  => $record->status,
                'name_abr'                => $record->name_abr ,
                'logo'                    => $record->logo,
                'getImage'                => $record->getImage(),
                "id"                      => $record->id,
                "created_at"              => $record->created_at,
                "updated_at"              => $record->updated_at,
                "edited_by"               => $record->edited_by ,
                "user_editor"             =>  $record->editor ? $record->editor->full_name : '<span class="kt-badge kt-badge--inline kt-badge--warning">NULL</span>',
                "created_by"              => $record->created_by ,
                "user_creator"            =>  $record->creator ? $record->creator->full_name : '<span class="kt-badge kt-badge--inline kt-badge--warning">NULL</span>',
                "action"                  => route('typestructures.edit',[$record->id])
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
    
    public function edit(Typestructures $typestructures)
    {
        return view('typestructures.edit')->with([
            'typestructures'  => $typestructures,
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
        
        $typestructures = Typestructures::find($request->id);
        
        $validator = Validator::make($request->all(), [
            'id'                       => 'required',
      
            'name'                     => ['required', 'string',  'max:255', \Illuminate\Validation\Rule::unique('typestructures')->ignore($typestructures->id)],
            'name_abr'                 => ['required', 'string',  'max:255', \Illuminate\Validation\Rule::unique('typestructures')->ignore($typestructures->id)],
            'name_ar'                  => 'nullable',
            'name_en'                  => 'nullable', 
            'description'              => 'nullable',
            'description_ar'           => 'nullable',
            'description_en'           => 'nullable',
            'status'                   => 'nullable', 
            'image'                    => 'nullable|image|mimes:gif,jpg,jpeg,png,svg|max:4048',
           
        ]);
        $status        = 404;
        $errors        = 1;
        $message       = "Une erreur est survenue. Veuillez réessayer";
        

        if ($validator->fails() || $typestructures  == null) {
            
            if($validator->errors()->first('name')){
                $message  =    "Nom déjà u tilisé" ;
                }else{ 

                    if($validator->errors()->first('name_abr')){
                        $message  =    "Nom abrégé déjà u tilisé" ;
                        }else{
                           $message  = "Veuillez vérifier les données";  
                        }

                    }
        }else {  
                
                $filename_nv=$typestructures->logo;
                if(request()->hasFile('image')) {
                                $file = request()->file('image');
                                $filename_nv = "" ;
                                $filename    = $file->getClientOriginalName();
                                $extension   = $file->getClientOriginalExtension();
                                $onlyName    = explode('.'.$extension,$filename)[0];
                                $filesize    = $file->getSize();
                                $imageName   = '';
                                $filename_nv = time().'.'.$extension; 
                                $path = public_path().'assets/typestructures/';
                                File::makeDirectory($path, $mode = 0777, true, true); 
                                $file->move(public_path('assets/typestructures/'), $filename_nv);
                }
          

              

            
                
                $typestructures->name                     = $request->name;
                $typestructures->name_abr                 = $request->name_abr;
                $typestructures->name_ar                  = $request->name_ar;
                $typestructures->name_en                  = $request->name_en;
                $typestructures->description              = $request->description;
                $typestructures->description_ar           = $request->description_ar;
                $typestructures->description_en           = $request->description_en;
                $typestructures->status                   = $request->status;


                $typestructures->logo                     = $filename_nv;
                $typestructures->edited_by                 = Auth::user()->id;
                $save                                 = $typestructures->save();
                if ($save) {
                     
                            $errors = 0;
                            $status = 200;
                }
        }
        $response['status'] = $status;
        $response["data"]   = $typestructures;
        $response['msg']    = $message;
        $response['errors'] = $errors;
        $response['token']  = $request->token;
        return response()->json($response);

    }


    public function getTypestructures(Request $request){

        $search = $request->search;
        $l = Str::length($search);
        

        if($search == ''){
           $typestructures = Typestructures::orderby('id','asc')->select('id','name_abr')->get();
        }else{
           $typestructures = Typestructures::orderby('id','asc')->select('id','name_abr')
                    ->where('name', 'like', '%' .$search . '%')
                    ->where('name_abr', 'like', '%' .$search . '%')
                    ->limit(5)->get();

        }
  
        $response = array();
      
        foreach($typestructures as $typestructures){
                    $response[] = array(
                         "id"=>$typestructures->id,
                         "text"=>$typestructures->name_abr
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
        $typestructures = Typestructures::find($request->id);
        $status   = 404;
        $errors   = 1;
        $message  = "Une erreur est survenue. Veuillez réessayer";

        if ($validator->fails() || $typestructures  == null) {
            $message  = "Veuillez vérifier les données";
        }else{
    
            if ($typestructures->delete()) {
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


    /**
     * Import Users 
     * @param Null
     * @return View File
     */

   

}
