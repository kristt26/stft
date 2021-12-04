<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mylib
{
    protected $userkey;
    protected $passkey;
    protected $telepon;
    protected $message;
    protected $url;
    public function rest_kirim($telepon, $message)
    {
        $this->userkey = 't9w9i5ng9rzzmfo3hiz8';
        $this->passkey = '291cdbec108082e9a9e9eea1';
        $this->telepon = $telepon;
        $this->message = $message;
        $this->url = "http://pendaftaran.zenziva.co.id/api/sendsms/";
        
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $this->url);
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
            'userkey' => $this->userkey,
            'passkey' => $this->passkey,
            'nohp' => $this->telepon,
            'pesan' => $message
        ));
        return json_decode(curl_exec($curlHandle), true);
        curl_close($curlHandle);
    }
    public function rest_read()
    {
        $this->userkey = 't9w9i5ng9rzzmfo3hiz8';
        $this->passkey = '291cdbec108082e9a9e9eea1';
        $this->url = "http://pendaftaran.zenziva.co.id/api/readsms/?userkey=t9w9i5ng9rzzmfo3hiz8&passkey=291cdbec108082e9a9e9eea1";
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $this->url);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        return json_decode(curl_exec($curlHandle), true);
        curl_close($curlHandle);
    }
}

/* End of file Mylib.php */