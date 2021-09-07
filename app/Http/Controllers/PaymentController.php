<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Paypal\Auth\OAuthTokenCredential;
use Paypal\Rest\ApiContext;


class PaymentController extends Controller
{
    private $apiContext;
    public function __construct()
    {
        $payPalConfig = Config::get('paypal');
    
        $this->apiContext=new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                $payPalConfig['client_id'],
                $payPalConfig['secret']
            )
        );
        $this->apiContext->setConfig($payPalConfig['settings']);
    }
    public function payWithPayPal()
    {
        $payer = new \PayPal\Api\Payer();
$payer->setPaymentMethod('paypal');

$amount = new \PayPal\Api\Amount();
$amount->setTotal('100.00');
$amount->setCurrency('USD');

$transaction = new \PayPal\Api\Transaction();
$transaction->setAmount($amount);

$callbackUrl = url('/paypal/status');

$redirectUrls = new \PayPal\Api\RedirectUrls();
$redirectUrls->setReturnUrl($callbackUrl)
    ->setCancelUrl($callbackUrl);

$payment = new \PayPal\Api\Payment();
$payment->setIntent('sale')
    ->setPayer($payer)
    ->setTransactions(array($transaction))
    ->setRedirectUrls($redirectUrls);

    try {
        $payment->create($this->apiContext);
        return redirect()->away($payment->getApprovalLink());
    } catch (PayPalConnectionException $ex) {
        echo $ex->getData();
    }
    }

    public function payPalStatus(Request $request)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        if (!$paymentId || !$payerId || !$token) {
            $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
            return redirect('/paypal/failed')->with(compact('status'));
        }

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        /** Execute the payment **/
        $result = $payment->execute($execution, $this->apiContext);

        if ($result->getState() === 'approved') {
            $status = 'Gracias! El pago a través de PayPal se ha ralizado correctamente.';
            return redirect('/results')->with(compact('status'));
        }

        $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
        return redirect('/results')->with(compact('status'));
    }
}