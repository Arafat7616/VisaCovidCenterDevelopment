<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use App\Models\Price;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function takePaymentFromUser($id, $purpose){
        $user = User::findOrFail($id);
        $price = Price::where('center_id', $user->center_id)->first();
        return view('TrustedMedicalAssistant.payment.take-payment', compact('user','purpose','price'));
    }
}
