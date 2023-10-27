<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public static $pageTitle = 'Payment';

    public function payment()
    {
        $pageTitle = self::$pageTitle;

        return view('payment.payment', compact('pageTitle'));
    }
}
