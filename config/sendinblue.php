<?php

return [
    /*
     * ----------------------------------------------------
     * Sendinblue Credentials
     * ----------------------------------------------------
     *
     * This option specifies the Sendinblue credentials for
     * your account. You can put it here but I strongly
     * recommend to put thoses settings into your
     * .env & .env.example file.
     *
     */
    'apikey' => env('SENDINBLUE_APIKEY', null),
    'prefix' => env('SENDINBLUE_PREFIX', null),
];
