<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Payment;

class ProcessPayment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $payment;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Payment $payment)
    {
        $this->payment = $payment;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $clp_usd = null;
        $date = date('Y-m-d');
        $verify = Payment::where('payment_date', $date)->whereNotNull('clp_usd')->first();
        if($verify){
            $clp_usd = $verify->clp_usd;
        }else{
            $response = json_decode(file_get_contents('https://mindicador.cl/api/dolar'));
            $clp_usd = $response->serie[0]->valor;
        }
        $this->payment->clp_usd = $clp_usd;
        $this->payment->save();
    }
}
