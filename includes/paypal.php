<?php 

//url aquispe
define('URL_SITIO', 'http://localhost/proyect/');

require 'paypal/autoload.php';

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AT3ciF2CfkprZupTl8bG-1BCwn5fEOag7FIOTLgzxyfJv0k4VWA5g0lTprEkk72jgRVTe9ysjg0gsxnG',     // ClientID
        'EJyyGp2ACZLL9DTRdC4znLxkLcz1F_xWdCwQwxaZ6frG129E4DlfOwTip7TQa3gjoktSHfyXCY3Yt-WX'      // ClientSecret
    )
);

