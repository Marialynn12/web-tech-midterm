<?php
namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\WaterBill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class WaterBillPostController extends Controller
{
    public $successStatus = 200;

    public function getAllPosts(Request $request)
    {
        $token = $request['t']; //t = token
        $userid = $request['u'];// u-userid

        $user = User::where('id',$userid)->where('remember_token',$token)->first();

        // $inventory = DB::table('inventory')
        // ->leftJoin('users','inventory.id', '=','users.id')
        // ->select('covid_api.id','covid_api.country','covid_api.code','covid_api.confirm','covid_api.recovered','covid_api.critical','covid_api.death','covid_api.latitude','covid_api.longitude','users.name','covid_api.created_at','covid_api.updated_at')
        // ->get();
        // return response()->json($covidPost,$this->successStatus);


        if($user != null){
            // $covidPost = CovidAPI::all();
            $waterbilling = DB::table('waterbilling')
                        ->leftJoin('users','waterbilling.id', '=','users.id')
                        ->select('waterbilling.id','waterbilling.house_number','waterbilling.month','waterbilling.payment','waterbilling.balance','users.name','waterbilling.created_at','waterbilling.updated_at')
                        ->get();

            return response()->json($waterbilling,$this->successStatus);
        }else{
            return response()->json(['response'=>'Bad call'],501);
        }
    }


    public function getPost(Request $request)
    {

        $id = $request['pid']; //old post id

        $token = $request['t']; //t = token
        $userid = $request['u'];// u-userid

        $user = User::where('id',$userid)->where('remember_token',$token)->first();


        if($user != null){

            $waterBill = WaterBill::where('id',$id)->first();
            if($user != null){
                return response()->json($waterBill,$this->successStatus);
            }else{
                return response()->json(['response'=>'Posts not found'],404);
            }

        }else{
            return response()->json(['response'=>'Bad call'],501);
        }
    }


    // this method searches the country
    public function searchPost(Request $request)
    {

        $params = $request['p']; //p = params

        $token = $request['t']; //t = token
        $userid = $request['u'];// u-userid

        $user = User::where('id',$userid)->where('remember_token',$token)->first();


        if($user != null){

            $waterBill = WaterBill::where('house_number','LIKE','%' .$params . '%')->GET();
            if($user != null){
                return response()->json($waterBill,$this->successStatus);
            }else{
                return response()->json(['response'=>'Posts not found'],404);
            }

        }else{
            return response()->json(['response'=>'Bad call'],501);
        }
    }
}
