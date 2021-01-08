<?php

namespace App\Libraries;

use Config\Services;

/**
 * @codeCoverageIgnore
 */
class Recaptha
{
    public $recapthaUrl = 'https://www.google.com/recaptcha/api/siteverify';
    public $recapthaSite;
    public $recapthaSecret;

    public function __construct()
    {
        $this->recapthaUrl = Services::request()->config->recapthaURL ?? '';
        $this->recapthaSite = Services::request()->config->recapthaSite ?? '';
        $this->recapthaSecret = Services::request()->config->recapthaSecret ?? '';
    }

    public function verify($response)
    {
        if (!$this->recapthaSecret)
            return true;
        $ch = curl_init($this->recapthaUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
            'secret' => $this->recapthaSecret,
            'response' => $response,
        ]);

        // execute!
        $response = curl_exec($ch);
        curl_close($ch);
        if ($response) {
            $response = json_decode($response, true);
            if ($response['success']) {
                return true;
            } else {
                echo 'Recaptcha Error: ';
                echo $response['error-codes'];
                exit;
            }
        } else {
            return null;
        }
    }
}
