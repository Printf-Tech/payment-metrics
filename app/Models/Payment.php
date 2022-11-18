<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'receipt',
        'exchange_rate',
        'receipt_converted',
        'date',
        'user_id'
    ];

    public static function get($id = null){

        return ($id) ? Payment::find($id) : Payment::all();
    }
    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
