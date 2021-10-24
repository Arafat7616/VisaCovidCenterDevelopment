<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function takePaymentFromUser($id, $purpose){
        $user = User::findOrFail($id);
        // $price =
        return view('Volunteer.payment.take-payment', compact('user','purpose',''));

    }
}
