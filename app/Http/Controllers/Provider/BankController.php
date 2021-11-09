<?php

namespace App\Http\Controllers\Provider;

use Exception;
use Stripe\Stripe;
use Stripe\Customer;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Exception\GuzzleException;

class BankController extends Controller
{
    public function addBank(Request $request)
    {
        if ($request->has('verify') && !(is_null($request->verify))) {
            $this->verifyBank($request);
            return redirect()->back();
            exit;
        }
        $user     = auth()->user();
        $stripe = new \Stripe\StripeClient(
            config('services.stripe.secret')
        );
        $customer = $stripe->customers->create([
            'name'   => $request->accountHolderName,
            'email'  => $user->email,
            'source' => $request->stripeToken,
        ]);
        $user->provider->update([
            'bankName' => $request->bname,
            'routingNumber' => $request->routingNumber,
            'accountNumber' => $request->accountNumber,
            'accountHolderName' => $request->accountHolderName,
            'confirmed' => 0,
        ]);
        $user->update([
            'stripeAccountBank' => $request->bank_id,
            'stripeAccount' => $customer->id
        ]);
        session()->flash('alert-success', "You bank details are added");
        return redirect()->route('provider.profile');
    }

    public function verifyBank($request)
    {
        // dd($request->all(    ));
        Stripe::setApiKey(config('services.stripe.secret'));
        $user = auth()->user();
        try {
            $bank_account = Customer::retrieveSource(
                $user->stripeAccount,
                $user->stripeAccountBank
            );
            $bank = $bank_account->verify(['amounts' => [$request->amount1, $request->amount2]]);
            if ($bank->status == 'verified') {
                $user->provider->update([
                'confirmed' => 1,
            ]);
                session()->flash('alert-success', 'You bank account is verified');
                return true;
            }
        } catch (Exception $e) {
            session()->flash('alert-danger', 'Please try again this is not correct! or '.$e->getMessage());
            return false;
        }
    }

    public function createToken()
    {
        $user     = auth()->user();
        $client   = new Client([
            'base_uri' => config('services.plaid.PLAID_LINK'),
            'timeout'  => 5.0,
            'headers'  => [
                'content-type' => 'application/json',
            ],
        ]);
        $body = json_encode([
            'client_id'     => config('services.plaid.PLAID_CLIENT_ID'),
            'secret'        => config('services.plaid.PLAID_SECRET'),
            'client_name'   => $user->name,
            'language'      => 'en',
            'country_codes' => ['US'],
            'user'          => [
                'client_user_id' => uniqid(),
            ],
            'products'      => ['auth'],
            'webhook'       => 'https://www.medconnectus.com/',
        ]);
        // die($body);
        try {
            $response = $client->request('POST', '/link/token/create', [
                'body' => $body,
            ]);
            $body     = $response->getBody();
            $arr_body = json_decode($body);
            $token    = $arr_body->link_token;
            return response($token, 200);
        } catch (GuzzleException $exception) {
            dump($exception->getMessage());
        }
    }

    public function verifyToken(Request $request)
    {
        $user       = auth()->user();
        $headers[]  = 'Content-Type: application/json';
        $params     = [
            'client_id'    => config('services.plaid.PLAID_CLIENT_ID'),
            'secret'       => config('services.plaid.PLAID_SECRET'),
            'public_token' => $request->public_token,
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, config('services.plaid.PLAID_LINK') . '/item/public_token/exchange');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_TIMEOUT, 80);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        if (!$result = curl_exec($ch)) {
            trigger_error(curl_error($ch));
        }
        curl_close($ch);
        $jsonParsed  = json_decode($result);
        $btok_params = [
            'client_id'    => config('services.plaid.PLAID_CLIENT_ID'),
            'secret'       => config('services.plaid.PLAID_SECRET'),
            'access_token' => $jsonParsed->access_token,
            'account_id'   => $request->account_id,
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, config('services.plaid.PLAID_LINK') . '/processor/stripe/bank_account_token/create');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($btok_params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_TIMEOUT, 80);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        if (!$result = curl_exec($ch)) {
            trigger_error(curl_error($ch));
        }
        curl_close($ch);

        $btok_parsed = json_decode($result);

        $stripe = new \Stripe\StripeClient(
            config('services.stripe.secret')
        );
        $customer = $stripe->customers->create([
            'name'   => $user->name,
            'email'  => $user->email,
            'source' => $btok_parsed->stripe_bank_account_token,
        ]);
        $user->update([
            'stripeAccount'     => $customer->id,
            'stripeAccountBank' => $btok_parsed->stripe_bank_account_token,
        ]);
        return response('Connected', 200);
    }
}
