<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Infobip\Api\SmsApi;
use Infobip\Configuration;
use Infobip\ApiException;
use Infobip\Model\SmsAdvancedTextualRequest;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;

class CheckoutController extends Controller
{
    public function checkout(Request $request){
        $mycart = Cart::where('owner', Auth::user()->email)->first();
        $delivery = Delivery::first();

        $configuration = new Configuration(
            host: 'rgzrpy.api.infobip.com',
            apiKey: '82a6416e74af30c53aecda85f13a9e42-41a5c916-0d47-4bb0-891d-06efde9b7220'
        );

        $sendSmsApi = new SmsApi(config: $configuration);
        $pharmaDelivery = "21621876801";
        $text = 'Client : '.$request->input('lastname').' '.$request->input('firstname').' - '.
                'Adresse : '.$request->input('address').' - '.
                'Téléphone : '.$request->input('phone').' - '.
                'Produit : '.$mycart->name.' - '.
                'Prix : '.number_format($mycart->price, 3, ',').' - '.
                'Quantité : '.$mycart->quantity.' - '.
                'Total TTC : '.number_format((($mycart->price * $mycart->quantity) + $delivery->amount), 3, ',');

        $message = new SmsTextualMessage(
            destinations: [
                new SmsDestination(to: $pharmaDelivery)
            ],
            from: 'Commande',
            text: $text,
        );

        $request = new SmsAdvancedTextualRequest(messages: [$message]);

        try {
            $smsResponse = $sendSmsApi->sendSmsMessage($request);
            return redirect()->route('user.panier.index')->with('success', 'Votre commande a été enrégistré avec succès');
        } catch (ApiException $apiException) {
            return redirect()->route('user.panier.index')->with('error', $apiException->getMessage());
        }


    }
}
