<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    
    public function index($id = null){

        $get = Payment::get($id);
        return response()->json($get, 200);
    }
}
