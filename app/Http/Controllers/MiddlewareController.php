<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiddlewareController extends Controller
{
    function publicMessage(Request $request){
        return response()->json([
            'message'=>'This is a message for all users'
        ]);
    }

    function privateMessage(Request $request){
        return response()->json([
            'message'=>'This is a message for logged-in Users'
        ]);
    }

    function downloadFile(Request $request){
        return response()->json([
            'message'=>'File Download Started'
        ]);
    }
}
