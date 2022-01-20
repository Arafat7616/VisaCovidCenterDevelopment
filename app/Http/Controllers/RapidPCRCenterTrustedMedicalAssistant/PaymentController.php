<?php

namespace App\Http\Controllers\RapidPCRCenterTrustedMedicalAssistant;

use App\Http\Controllers\Controller;
use App\Models\Price;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function takePaymentFromUser($id, $purpose){
        $user = User::findOrFail($id);
        $price = Price::where('rapid_pcr_center_id', $user->rapid_pcr_center_id)->first();
        return view('RapidPCRCenterTrustedMedicalAssistant.payment.take-payment', compact('user','purpose','price'));
    }
}
