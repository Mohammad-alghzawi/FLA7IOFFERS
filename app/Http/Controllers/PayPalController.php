<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Checkout;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;


class PayPalController extends Controller
{
    //pay for become member of the Auction

    public function payment(Request $request)
    {
        $user_id = $request->user_id;

        try {
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypaltoken = $provider->getAccessToken();

            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('success', $user_id),
                    "cancel_url" => route('cancel'),
                ],
                "purchase_units" => [
                    [
                        "amount" => [
                            'currency_code' => 'USD',
                            "value" => $request->price,

                            // Make sure 'value' is used for the price

                        ],


                    ],
                ],
            ]);

            foreach ($response['links'] as $link) {
                if ($link['rel'] == "approve") {
                    return redirect()->away($link['href']);
                }
            }
        } catch (\Exception $e) {
            // Handle API request errors here, e.g., log the error message
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function success(Request $request)
    {


        $memberinfo = $request;

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypaltoken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);
        // use carbon library

        if (isset($response['status']) && $response['status'] == "COMPLETED") {
            DB::table('payments')->insert([
                'user_id' => Auth::user()->id,
                'user_name' => $response['payment_source']['paypal']['name']['given_name'] . $response['payment_source']['paypal']['name']['surname'],
                'user_email' => $response['payment_source']['paypal']['email_address'],
                'payment_status' => $response['payment_source']['paypal']['account_status'],
                'currency' => 'USD',
                'amount' => $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'],
            ]);


            // $carts = Cart::all()->where('user_id',Auth::user()->id)->where('checkout_id', '<', 2);
            // // ---------for remaining amount----
            // foreach ($carts as $cart) {
            //     $product = $cart->product;
            //     $product->product_quantity -= $cart->quantity;
            //     $product->save();
            // }

            $checkout = Checkout::create([
                'user_id' => Auth::user()->id,
                'payment_method' => 3,
                'total price' => $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'],
                'arrive date' => date('Y-m-d'),
                // 'discount_id' => Discount::first()->id,
                'address' => 'test',
                // 'zipcode' => '12345662'
            ]);

            $carts = Cart::all()->where('user_id', Auth::user()->id)->where('checkout_id', '<', 2);
            // ---------for remaining amount----
            foreach ($carts as $cart) {
                $product = $cart->product;
                $product->product_quantity -= $cart->quantity;
                $product->save();
            }
            // --------- end for remaining amount----
            foreach ($carts as $cart) {
                $cart->update(['checkout_id' => $checkout->id]);
            }

            // $carts->each(function ($cartItem) {
            //     $cartItem->delete();
            // });


            // approve payment
            return redirect()->route('home');
        } else {

            return response()->json('Failed payment');
        }


    }

    public function cancel()
    {
        dd('cancelled the order');

    }


}