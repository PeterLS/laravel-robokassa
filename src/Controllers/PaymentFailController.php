<?php

namespace PeterLS\LaravelRobokassa\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\Request;

class PaymentFailController extends Controller {
    public function __invoke(Request $request): bool|View {
        $attributes = collect($request->all())->filter(function ($value, $key) {
            return in_array($key, ['OutSum', 'InvId', 'Culture']);
        });

        return view('robokassa::fail', ['attributes' => $attributes]);
    }
}