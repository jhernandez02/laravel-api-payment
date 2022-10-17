<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function client(){
        // A payment belongs to a client
        return $this->belongsTo(Client::class);
    }
}
