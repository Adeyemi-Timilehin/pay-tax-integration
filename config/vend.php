<?php

return [

    /*
    * set the client id
    */
    'clientId' => env('VEND_CLIENT_ID'),

    /*
    * set the client secret
    */
    'clientSecret' => env('VEND_CLIENT_SECRET'),

    /*
    * Set the url to trigger the oauth process
    */
    'redirectUri' => env('VEND_REDIRECT_URL'),

    /*
    * Set the url to redirecto once authenticated;
    */
    'landingUri' => env('VEND_LANDING_URL', '/'),

    /**
     * Set access token, when set will bypass the oauth2 process
     */
    'accessToken' => env('VEND_ACCESS_TOKEN', ''),

    /**
     * Set webhook token
     */
    'webhookKey' => env('VEND_WEBHOOK_KEY', ''),

    /**
     * Set the scopes
     */
   
];