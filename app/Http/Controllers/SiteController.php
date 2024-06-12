<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;

class SiteController extends Controller
{
    public function index(): view
    {
        return view('dashboard')->with([
            'plans' => json_decode(File::get('plans.json'), true),
            'chosenPlans' => auth()->user()->payments
        ]);
    }

    public function plans(): view
    {
        return view('plans')->with([
                'plans' => json_decode(File::get('plans.json'), true),
                'faqs' => json_decode(File::get('faq.json'), true)]
        );
    }

    public function payment(string $plan): view|RedirectResponse
    {
        $plans = json_decode(File::get('plans.json'), true);
        if (isset($plans[$plan])) {
            return view('payment')->with(['plan' => $plans[$plan]]);
        }

        return to_route('plans')->withErrors(['error' => 'Plan not found']);
    }

    public function paymentProcess(Request $request): RedirectResponse
    {
        $plans = json_decode(File::get('plans.json'), true);
        $validation = Validator::make($request->all(), [
            'plan' => [
                'required',
                Rule::in(array_keys($plans))
            ],
            'note' => 'nullable|string'
        ]);

        if (!$validation->fails()) {
            $plan = $plans[$request->input('plan')];

            auth()->user()->payments()->create([
                'plan_id' => $plan['id'],
                'plan_price' => $plan['price'],
                'plan_data' => $plan,
                'payment_data' => $validation->validated(),
                'note' => $request->input('note')
            ]);

            return to_route('success');
        }

        return back()->withInput()->withErrors(['error' => $validation->errors()->first()]);
    }

    public function successPaymentPage(): view
    {
        return view('success-payment');
    }

    public function profile(Request $request): view|RedirectResponse
    {
        $user = auth()->user();

        if ($request->isMethod('GET')) {
            return view('profile')->with(['user' => $user]);
        } else {
            $validation = Validator::make($request->all(), [
                'email' => 'required|email|unique:users,email,' . $user->id,
                'full_name' => 'required|string',
                'company_name' => 'required|string'
            ]);

            if (!$validation->fails()) {
                $user->update([
                    'email' => $request->get('email'),
                    'full_name' => $request->get('full_name'),
                    'company_name' => $request->get('company_name')
                ]);

                return back();
            }

            return back()->withInput()->withErrors(['error' => $validation->errors()->first()]);
        }
    }
}
