<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Plan;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        $intent = auth()->user()->createSetupIntent();
        $plans = Plan::get();

        return view('membership', compact('intent', 'plans'));
    }

    public function pay_now(Request $request)
    {
        $user = $request->user();

        $plan = Plan::findOrFail($request->plan);

        $paymentMethod = $request->payment_method;

        $user->createOrGetStripeCustomer();
        $user->updateDefaultPaymentMethod($paymentMethod);
        if (!$user->activeSubscription) {
            $subscription = $user->newSubscription($plan->name, $plan->plan_slug)->create($request->token);
        }

        return redirect('/')->with('successMsg','Subscribed successfully');
    }

}
