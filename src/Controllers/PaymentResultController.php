<?php

namespace PeterLS\LaravelRobokassa\Controllers;

use App\Http\Controllers\Controller;
use PeterLS\LaravelRobokassa\Events\PaymentAccepted;
use PeterLS\LaravelRobokassa\Events\PaymentRejected;
use PeterLS\LaravelRobokassa\Robokassa;
use Illuminate\Http\Request;

class PaymentResultController extends Controller {
    public function __invoke(Request $request) {
        $robokassa = new Robokassa;

        if ($robokassa->getPayment()->validateResult($request->all(), FALSE)) {
            event(new PaymentAccepted($robokassa->getPayment()));

            return $robokassa->getPayment()->getSuccessAnswer();
        }

        event(new PaymentRejected($robokassa->getPayment()));
    }
}