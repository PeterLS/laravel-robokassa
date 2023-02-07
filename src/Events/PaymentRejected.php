<?php

namespace PeterLS\LaravelRobokassa\Events;

use Illuminate\Queue\SerializesModels;
use Lexty\Robokassa\Payment;

class PaymentRejected {
    use SerializesModels;

    public Payment $payment;

    public function __construct(Payment $payment) {
        $this->payment = $payment;
    }
}