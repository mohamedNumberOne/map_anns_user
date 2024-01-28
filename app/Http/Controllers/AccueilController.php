<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Models\Structure;
use App\Models\Typestructures;
use Str;
use App\Models\Commune;
use App\Models\Wilaya;
use Illuminate\Support\Collection;
class AccueilController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $typestructures = Typestructures::where('status',"=",1)->get();
        $structures = Structure::where('status',"=",1)->get();
        return view('home',compact('typestructures'));
    }

    public function accueil()
    {
        $typestructures = Typestructures::where('status',"=",1)->get();
        $structures = Structure::where('status',"=",1)->get();
        return view('accueil',compact('typestructures'));
    }

    
    
    
    public function showindex(Request $request)
    {
       

     /*
           //   Retrieve the bounding coordinates from the request
                $northEastLat = $request->get('northEastLat');
                $northEastLng = $request->get('northEastLng');
                $southWestLat = $request->get('southWestLat');
                $southWestLng = $request->get('southWestLng');
                $northEastLat = 37.57505900514996
                $northEastLng = 8.234252929687502
                $southWestLat = : 35.36665566526249
                $southWestLng = -0.7141113281250001
        // Query the database for markers within the bounding coordinates
        $outlets = Structure::whereBetween('latitude', [$southWestLat, $northEastLat])
                            ->whereBetween('longitude', [$southWestLng, $northEastLng])
                            ->get();

        */

        $northEastLat = 37.57505900514996;
        $northEastLng = 8.234252929687502;
        $southWestLat = 35.36665566526249;
        $southWestLng = -0.7141113281250001;
            /*
            $northEastLat = $request->get('northEastLat');
            $northEastLng = $request->get('northEastLng');
            $southWestLat = $request->get('southWestLat');
            $southWestLng = $request->get('southWestLng');
            $outlets = Structure::whereBetween('latitude', [$southWestLat, $northEastLat])
                                    ->whereBetween('longitude', [$southWestLng, $northEastLng])
                                    ->get();
                                    */

                         $outlets = Structure::with('typestructure', 'wilayaent')->get();
        $geoJSONdata = $outlets->map(function ($outlet) {
            return [
                'type'                 =>  'Feature',
                'type_structure'       =>  $outlet->type_structure,
                'logo'                 =>  $outlet->typestructure ?  $outlet->typestructure->getImage() : asset('admin/img/black-flat-marker.png')  ,
                'properties'           =>  $outlet->name,
                'wilaya'               =>  $outlet->wilayaent ? $outlet->wilayaent->name :"" ,
                'adresse'              =>  $outlet->adresse,
                'typestructure'        =>  $outlet->typestructure ? $outlet->typestructure->name :"",
                'name_abr'             =>  $outlet->typestructure ? $outlet->typestructure->name_abr :"",
                
                'telfix'               =>  $outlet->telfix,
                'id'                   =>  $outlet->id,
                'lien'                 =>  route('structure.edit',[$outlet->id]),
                'geometry'             => [
                    'type'             => 'Point',
                    'coordinates'      => [
                            $outlet->longitude,
                            $outlet->latitude,
                    ],
                ],
            ];
        });

        return response()->json([
            'type'     => 'FeatureCollection',
            'features' => $geoJSONdata,
        ]);
    }

    public function map_json(Request $request)
    {

        $status        = 404;
        $errors        = 1;
        $message       = "Une erreur est survenue. Veuillez réessayer";
        $northEastLat = $request->get('northEastLat');
        $northEastLng = $request->get('northEastLng');
        $southWestLat = $request->get('southWestLat');
        $southWestLng = $request->get('southWestLng');
        /*
        $northEastLat= 37.25656608611523;
        $northEastLng= 9.387817382812502;
        $southWestLat= 35.71975793933433;
        $southWestLng= 1.1700439453125002;*/

        $enpteprise_all  = Structure::with('typestructure', 'wilayaent')
        ->where('structures.longitude','!=', '')
        ->whereNotNull('structures.longitude')
        ->where('structures.latitude','!=', '')
        ->whereNotNull('structures.latitude')
        ->whereBetween('structures.latitude', [$southWestLat, $northEastLat])
        ->whereBetween('structures.longitude', [$southWestLng, $northEastLng])
        ->leftJoin('wilayas', 'wilayas.id', '=', 'structures.wilaya')
        ->leftJoin('typestructures', 'typestructures.id', '=', 'structures.type_structure')
        ->with('wilayaent:name')
        ->select('structures.id as  id', 
                 'structures.name as title', 
                 'structures.adresse         as address',  
                 'structures.latitude        as  latitude' ,
                 'structures.longitude       as  longitude' , 
                 'structures.telfix          as  telfix' , 
                 'typestructures.name as typestructure', 
                 'typestructures.name_abr as name_abr', 
                 'typestructures.logo as  marker_image',
                 'wilayas.name as wilaya')->get();
                // dd($enpteprise_all) ;
        $errors = 0;
        $status = 200;
        $response['status'] = $status;
        $response["data"]   = $enpteprise_all;
        $response['msg']    = $message;
        $response['errors'] = $errors;
        $response['token']  = $request->token;
       // $response['motcle']  = $categorie->motcle;
        return response()->json($response);


    }


    public function map_json_search(Request $request)
    {

        $status        = 404;
        $errors        = 1;
        $message       = "Une erreur est survenue. Veuillez réessayer";
        $northEastLat = $request->get('northEastLat');
        $northEastLng = $request->get('northEastLng');
        $southWestLat = $request->get('southWestLat');
        $southWestLng = $request->get('southWestLng');

        $centerLatitude = "28.0268755";
        $centerLongitude="1.6528399999999976" ;


        $mylatitude= $request->get('mylatitude');
        $mylongitude= $request->get('mylongitude');


        $keyword = $request->get('keyword');
        $type = $request->get('type');
        $wilaya = $request->get('wilaya');
        $commune = $request->get('commune');

        $myposition = $request->get('myposition');
        


        /*
        $northEastLat= 37.25656608611523;
        $northEastLng= 9.387817382812502;
        $southWestLat= 35.71975793933433;
        $southWestLng= 1.1700439453125002;*/

        $enpteprise_all  = Structure::with('typestructure', 'wilayaent')
        ->where('structures.longitude','!=', '')
        ->whereNotNull('structures.longitude')
        ->where('structures.latitude','!=', '')
        ->whereNotNull('structures.latitude')
         // 
        ->leftJoin('wilayas', 'wilayas.id', '=', 'structures.wilaya')
        ->leftJoin('typestructures', 'typestructures.id', '=', 'structures.type_structure')
        ->with('wilayaent:name');

        if($keyword!=""){
                $enpteprise_all =  $enpteprise_all->where(function($query) use ($keyword) {
                    $query->orWhere('structures.name', 'like', '%' . $keyword . '%')
                        ->orWhere('structures.adresse_ar', 'like', '%' . $keyword . '%')
                        ->orWhere('structures.adresse', 'like', '%' . $keyword . '%')
                        ->orWhere('structures.adresse_en', 'like', '%' . $keyword . '%')
                        ->orWhere('structures.name_ar', 'like', '%' . $keyword . '%')
                        ->orWhere('structures.name_en', 'like', '%' . $keyword . '%');
                    }) ; 

        }

        if($myposition==1){
            $enpteprise_all    = $enpteprise_all->whereBetween('structures.latitude', [$southWestLat, $northEastLat])
                                               ->whereBetween('structures.longitude', [$southWestLng, $northEastLng]);
        }

        if($type!=""){
            $enpteprise_all    = $enpteprise_all->where('structures.type_structure', '=', $type);
        }

        if($wilaya!=""){
            $enpteprise_all    = $enpteprise_all->where('structures.wilaya', '=', $wilaya);
        }
        if($commune!=""){
            $enpteprise_all    = $enpteprise_all->where('structures.commune', '=', $commune);
        }

        $enpteprise_all  =$enpteprise_all->select('structures.id as  id', 
                 'structures.name as title', 
                 'structures.adresse         as address',  
                 'structures.latitude        as  latitude' ,
                 'structures.longitude       as  longitude' , 
                 'structures.telfix          as  telfix' , 
                 'typestructures.name as typestructure', 
                 'typestructures.name_abr as name_abr', 
                 'typestructures.logo as  marker_image',
                 'wilayas.name as wilaya')->get();
                
                 

        if($enpteprise_all->count() >0) {


            // mylatitude
            // mylongitude

            $centerLatitude =  $enpteprise_all[0]->latitude;
            $centerLongitude=  $enpteprise_all[0]->longitude;


            $closestLocation = null;
            $closestDistance = PHP_INT_MAX;
        
            foreach ($enpteprise_all as $location) {
                $distance = $this->haversineDistance($mylatitude, $mylongitude, $location->latitude, $location->longitude);
        
                if ($distance < $closestDistance) {
                    $closestLocation = $location;
                    $closestDistance = $distance;
                    $centerLatitude = $location->latitude;
                    $centerLongitude=   $location->longitude;
        
                }
            }
        

          


        }



        
        

                // dd($enpteprise_all) ;
        $errors = 0;
        $status = 200;
        $response['status'] = $status;
        $response["data"]   = $enpteprise_all;

        $response["centerLatitude"]   = $centerLatitude;
        $response["centerLongitude"]   = $centerLongitude;

        $response['msg']    = $message;
        $response['errors'] = $errors;
        $response['token']  = $request->token;
       // $response['motcle']  = $categorie->motcle;
        return response()->json($response);


    }


    public function haversineDistance($lat1, $lon1, $lat2, $lon2) {
        $lat1 = deg2rad($lat1);
        $lon1 = deg2rad($lon1);
        $lat2 = deg2rad($lat2);
        $lon2 = deg2rad($lon2);
    
        $dlat = $lat2 - $lat1;
        $dlon = $lon2 - $lon1;
    
        $a = sin($dlat / 2) ** 2 + cos($lat1) * cos($lat2) * sin($dlon / 2) ** 2;
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    
        $radius = 6371; // Earth radius in kilometers
    
        return $radius * $c;
    }

    function findClosestLocation($myLatitude, $myLongitude, Collection $locations) {
        $closestLocation = null;
        $closestDistance = PHP_INT_MAX;
    
        foreach ($locations as $location) {
            $distance = haversineDistance($myLatitude, $myLongitude, $location['latitude'], $location['longitude']);
    
            if ($distance < $closestDistance) {
                $closestLocation = $location;
                $closestDistance = $distance;
            }
        }
    
        return $closestLocation;
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
    
    

    /**
     * User Profile
     * @param Nill
     * @return View Profile
     * @author Guermat sidahmed
     */
    public function getProfile()
    {
        return view('profile');
    }

    /**
     * Update Profile
     * @param $profileData
     * @return Boolean With Success Message
     * @author Guermat sidahmed
     */
    public function updateProfile(Request $request)
    {
        #Validations
        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'mobile_number' => 'required|numeric|digits:10',
        ]);

        try {
            DB::beginTransaction();
            
            #Update Profile Data
            User::whereId(auth()->user()->id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'mobile_number' => $request->mobile_number,
            ]);

            #Commit Transaction
            DB::commit();

            #Return To Profile page with success
            return back()->with('success', 'Profile Updated Successfully.');
            
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Change Password
     * @param Old Password, New Password, Confirm New Password
     * @return Boolean With Success Message
     * @author Guermat sidahmed
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        try {
            DB::beginTransaction();

            #Update Password
            User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
            
            #Commit Transaction
            DB::commit();

            #Return To Profile page with success
            return back()->with('success', 'Password Changed Successfully.');
            
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }
}
