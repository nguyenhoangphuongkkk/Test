<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function student(Request $request){
        return response()->json([
            'name'=>'phuong',
            'old'=>'12'
        ]);
    }
}
