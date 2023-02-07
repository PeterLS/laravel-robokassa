<?php

namespace PeterLS\LaravelRobokassa\Controllers;

use App\Http\Controllers\Controller;
use PeterLS\LaravelRobokassa\Robokassa;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentSuccessController extends Controller {
    public function __invoke(Request $request) {
        $robokassa = new Robokassa;

        $attributes = collect($request->all())->filter(function ($value, $key) {
            return in_array($key, ['OutSum', 'InvId', 'SignatureValue', 'Culture']) || starts_with($key, 'Shp_');
        });

        if (!$robokassa->getPayment()->validateSuccess($request->all(), FALSE)) {
            return view('robokassa::fail', ['attributes' => $attributes]);
        }

        return view('robokassa::success', ['attributes' => $attributes]);
    }
}