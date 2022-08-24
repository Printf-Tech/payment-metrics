<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'receipt',
        'exchange_rate',
        'receipt_converted',
        'date'
    ];

    public static function get($id = null){

        return ($id) ? Payment::find($id) : Payment::all();
    }
}
