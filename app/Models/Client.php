<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public function payments(){
        // One client has many payments
        return $this->hasMany(Payment::class);
    }
}
