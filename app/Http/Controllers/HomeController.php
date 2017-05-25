<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        #$this->middleware('auth');
    }

    public function saveimage(Request $request)
    {   

        if($request->hasFile('file')){

        $file = $request->file('file');
        $filename = md5(time()) . '.' . $file->getClientOriginalExtension();
        Storage::disk('public')->put('avatars/', $file, 'public');
        // return [
        //     'id' => 123,
        //     'name' => $filename,
        // ];
        return response()->json([
            'id' => time(),
            'name' => $filename,
            'success' => 'true'
        ]);
        #return json_encode(["success"=>"true"]);
        }
        return false;

    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
