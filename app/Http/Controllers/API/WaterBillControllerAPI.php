<?php


namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\WaterBill;

class WaterBillControllerAPI extends Controller
{
    public function index(){
        $bill = WaterBill::all();

        return response()->json(['bill'=>$bill],200);
    }
}
