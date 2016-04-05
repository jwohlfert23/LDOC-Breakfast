<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Error\Card;
use Stripe\Stripe;
use Stripe\Charge;

class IndexController extends Controller
{

    public function getIndex()
    {
        return view('home');

    }

    public function getUser()
    {
        return view("user", ['user' => Auth::user()]);
    }

    public function postCharge(Request $request)
    {
        $user = Auth::user();
        if (!$user)
            return redirect()->back()->with("danger", "Please login first");

        if ($user->paid)
            return redirect()->back()->with('danger', 'Already paid');

        $token = $request->input('stripeToken');

        Stripe::setApiKey(config('services.stripe.secret'));

        // Create the charge on Stripe's servers - this will charge the user's card
        try {
            $charge = Charge::create(array(
                "amount" => 1000, // amount in cents, again
                "currency" => "usd",
                "source" => $token,
                "description" => "LDOC Breakfast"
            ));

            $user->paid = true;
            $user->save();

            return view("success");
        } catch (Card $e) {
            // The card has been declined
            return redirect() - back()->with("danger", "Card declined");

        }
    }
}