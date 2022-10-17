<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Payment;
use App\Events\PaymentRegistered;
use App\Jobs\ProcessPayment;

class PaymentController extends Controller
{
    // Get payments by client id
    public function getByClientId(Request $request){
        $clientId = $request->input('client');
        $result = Payment::select('uuid','payment_date','expires_at','status','client_id AS user_id','clp_usd')
                    ->where('client_id', $clientId)
                    ->get();
        return $result;
    }

    // Create new client
    public function store(Request $request){
        $payment = new Payment;
        $payment->uuid = Str::uuid();
        $payment->payment_date = date('Y-m-d');
        $payment->expires_at = Carbon::now()->addMonth();
        $payment->status = "pending";
        $payment->client_id = $request->client_id;
        $payment->save();
        // Call to event PaymentRegistered
        event (new PaymentRegistered($payment->id,$payment->client->email));
        // Call to job ProcessPayment
        ProcessPayment::dispatch($payment);
        // Response
        $response = [
            'uuid' => $payment->uuid,
            'payment_date' => $payment->payment_date,
            'expires_at' => $payment->expires_at,
            'status' => $payment->uuid,
            'user_id' => $payment->client_id,
            'clp_usd' => $payment->clp_usd,
        ];
        return $response;
    }
}
