<?php

namespace App\Models;

use Auth;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
    ];
    public function user() {
        return $this->belongsTo(User::class,'patient_id');
    }
}
