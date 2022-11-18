<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\User;
use Validator;

class PaymentController extends Controller
{
    
    public function index($id = null){

        $get = Payment::get($id);
        return response()->json($get->load('user'), 200);
    }

    public function storage(Request $req){

        $validator =  Validator::make($req->all(), [
            'user_id' => 'required|integer',
            'receipt' => 'required',
            'exchange_rate' => 'required',
            'date' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $User =  User::find($req->user_id);

        if(!$User){
            return response()->json(["error" => "user_id is invalid"], 400);
        }

        $receipt_converted = ($req->receipt * $req->exchange_rate);

        $payment = Payment::create(array_merge($validator->validated(),["receipt_converted" => $receipt_converted]));

        return response()->json($payment->load('user'), 201);
    }
}
