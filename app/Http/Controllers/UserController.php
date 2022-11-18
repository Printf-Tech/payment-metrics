<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index($id = null){

        $get = ($id) ? User::find($id) : User::all();
        return response()->json($get->load('payment'), 200);
    }

    public function storage(Request $req){

        $validator =  Validator::make($req->all(), [
            'name' => 'required|string',
            'email' => 'required|string',
            'job' => 'required|string',
            'password' => 'required|string'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $password = Hash::make($req->password);

        return response()->json(User::create(array_merge($validator->validated(),["password" => $password])), 201);

    }
}
