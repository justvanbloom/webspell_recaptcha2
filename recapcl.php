<?php

/* reCaptcah v2 by OF for Webspell */

class GoogleRecaptcha
{
    private $google_url = 'https://www.google.com/recaptcha/api/siteverify';
    private $secret = 'GOOGLE_SECRET_KEY';

    public function VerifyCaptcha($response)
    {
        $url = $this->google_url.'?secret='.$this->secret.'&response='.$response;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 15);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        $curlData = curl_exec($curl);
        curl_close($curl);
        $res = json_decode($curlData, true);
        if ($res['success'] == 'true') {
            return true;
        } else {
            return false;
        }
    }
}
