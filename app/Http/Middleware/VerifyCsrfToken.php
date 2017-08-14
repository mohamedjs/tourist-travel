<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    /**
    * Determine if the session and input CSRF tokens match. 15      *
    * @param \Illuminate\Http\Request $request
    * @return bool 18      */
    protected function tokensMatch($request){
      // If request is an ajax request, then check to see if token matches token provider in
      // the header. This way, we can use CSRF protection in ajax requests also.
      $token = $request->ajax() ? $request->header('X-CSRF-Token') : $request->input('_token');
      return $request->session()->token() == $token;
    }
}
