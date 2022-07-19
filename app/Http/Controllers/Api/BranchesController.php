<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Branch;

class BranchesController extends Controller
{
    //
    public function getBranches(){
        $branch=Branch::all();
        return response()->json(['success'=>'true','data'=>$branch]);
    }
}
