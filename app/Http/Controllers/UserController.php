<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
// use Illuminate\Contracts\Validation\Validator;
// use Illuminate\Foundation\Validation\ValidatesRequests;
use App\User;

class UserController extends Controller
{

    public function index()
    {
    	$users = User::orderBy('created_at', 'desc')->paginate(4);
        return response()->json([
        	'users'=>$users,
          //'pages'=>$users,
        	]);
    }

    public function update(Request $request, $id)
    {

      	$this->validate($request, [
          'name'=>'required',
          'email' => 'required|email',
        ]);

    	$user = User::find($id);
      $user->update($request->all());
        return response()->json([
          'message'=>'user update successfully',
        	'users'=>$user
        	]);
    }


    // public function validator(array $data)
    // {
    //     return Validator::make($data, [
    //       'name'=>'require',
    //       'email' => 'require|email',
    //     ]);
    // }

    public function store(Request $request)
    {
    	$this->validate($request, [
        'name'=>'required',
        'email' => 'required|email|unique:users',
      ]);

      $user = User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'api_token' => str_random(60),
      ]);

      return response()->json([
        'message' => 'user created successfully',
        'user' => $user,
      ]);
    }

    public function destroy($id)
    {
      // return response()->json($id);
      // return dd($request->all());
      User::find($id)->delete();
      return response()->json([
        'message'=>'User deleted successfully'
      ]);
    }

}
