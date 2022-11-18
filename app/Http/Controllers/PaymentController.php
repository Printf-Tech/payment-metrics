<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Validator;

class PaymentController extends Controller
{
    
    public function index($id = null){

        $get = Payment::get($id);
        return response()->json($get, 200);
    }

    public function storage(Request $req){

        $validator =  Validator::make($req->all(), [
            'receipt' => 'required',
            'exchange_rate' => 'required',
            'date' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $receipt_converted = ($req->receipt * $req->exchange_rate);

        return response()->json(Payment::create(array_merge($validator->validated(),["receipt_converted" => $receipt_converted])), 201);

    }
}
