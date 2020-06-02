<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileUploadController extends Controller
{
    //
    public function up(Request $request){
        dd($request);
        $request->file('image')->save("images");
        return "OK";
    }
    public function getImage($path,$name){
        return response()->download(storage_path('app/').$path."/".$name);
    }
}
