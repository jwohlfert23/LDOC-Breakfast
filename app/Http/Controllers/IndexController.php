<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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

            $user->markPaid();

            return view("success");
        } catch (Card $e) {
            // The card has been declined
            return redirect() - back()->with("danger", "Card declined");

        }
    }

    public function getMarkPaid($id)
    {
        if (!Auth::check() || Auth::user()->id != 1)
            App::abort(404);

        $user = User::find($id);

        if($user->paid == 1)
            return "Alread paid";
        
        $user->markPaid();

    }
}