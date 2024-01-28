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
class HomeController extends Controller
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

    public function indexppage()
    {
        $typestructures = Typestructures::where('status',"=",1)->get();
        $structures = Structure::where('status',"=",1)->get();
        return view('indexppage',compact('typestructures'));
    }
    
    public function showindex(Request $request)
    {
       

     /*
           // Retrieve the bounding coordinates from the request
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
