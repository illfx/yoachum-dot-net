<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyReCaptcha
{

    private $_site;
    private $_secret;

    public function __construct()
    {
        $this->_site = env('RECAPTCHA_SITE');
        $this->_secret = env('RECAPTCHA_SECRET');
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($this->verifyReCaptcha($request))
        {
            return $next($request);
        }
        return back()->withErrors(['g-recaptcha-response'=>'Humanoid Verification Error']);
    }

    /**
     * Get the reCaptcha Response token from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function getRecaptchaResponse($request)
    {
        if( $request->has('g-recaptcha-response') &&
            $request->input('g-recaptcha-response') !== "")
        {
            return $request->input('g-recaptcha-response');
        }

        return false;
    }

    /**
     * Verify the reCaptcha Response through Google's reCaptcha API.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function verifyReCaptcha(Request $request)
    {
        if($payload = $this->getVerificationPayload($request)) {
            $string = http_build_query($payload);
            //        $json = json_encode($payload);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $this->_site);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $string);
            curl_setopt($ch, CURLOPT_HEADER, array(
                'Content-Type: application/json',
                'Accept: application/json',
                'Content-Length: ' . strlen($string)
            ));
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            $json = curl_exec($ch);
            $result = json_decode($json);

            return $result->success;
        }
        return false;
    }

    protected function getVerificationPayload(Request $request)
    {
        return ($response = $this->getRecaptchaResponse($request)) ?
            [
                'secret'   => $this->_secret,
                'response' => $request->input('g-recaptcha-response'),
                'remoteip' => $request->ip(),
            ] :
            false;
    }

}
