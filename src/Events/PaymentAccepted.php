<?php

namespace PeterLS\LaravelRobokassa\Events;

use Illuminate\Queue\SerializesModels;
use Lexty\Robokassa\Payment;

class PaymentAccepted {
    use SerializesModels;

    public Payment $payment;

    public function __construct(Payment $payment) {
        $this->payment = $payment;
    }
}