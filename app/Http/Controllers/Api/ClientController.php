<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    // Get all clients
    public function getAll(){
        $result = Client::select('id', 'email', 'join_date')->get();
        return $result;
    }

    // Create new client
    public function store(Request $request){
        $client = new Client;
        $client->email = $request->email;
        $client->join_date = date('Y-m-d');
        $client->save();
        // Response
        return $client;
    }
}
