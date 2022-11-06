<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Hospital;

class HospitalController extends Controller
{
    public function index(){
        $hospital = Hospital::get();
        if($hospital->isEmpty()) {
            return response()->json(['message' => 'Success'], 204);
        } else {
            return response()->json(['message' => 'Success', 'data' => $hospital], 200);
        }
    }

    public function show($slug){
        $hospital = Hospital::findBySlug($slug);
        if(!$hospital) {
            return response()->json(['message' => 'Hospital Not Found!'], 404);
        } else {
            return response()->json(['message' => 'Success', 'data' => $hospital], 200);
        }
    }
}
