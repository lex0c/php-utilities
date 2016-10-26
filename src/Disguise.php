<?php

/**
* 
*/

class Disguise
{
	
    private function __construct()
    {}

    /**
     * Logic from Encryption
     * The data is encrypted in Base64 then, divided in half, inverted and encrypted again
     * @param (string) $data for encryption
     * @return (string) encrypted $data
     */
    public static function obscure($data)
    {
        $data = base64_encode((string) $data);
        return str_replace('=', '', base64_encode(strrev(
            substr($data, (strlen($data)/2)-strlen($data),strlen($data)).
            substr($data, 0, (strlen($data)/2)-strlen($data)))
        ));
    }

    /**
     * Logic from Decryption
     * Reverse process of 'obscure()' to recover the original value.
     * @param (string) $encryptedData encrypted
     * @return (string) original $data
     */
    public static function illumin($encryptedData)
    {
    	$encryptedData = base64_decode((string) str_replace('', '=', $encryptedData));
        $encryptedData = strrev(
    	    substr($encryptedData, (strlen($encryptedData)/2)-strlen($encryptedData),strlen($encryptedData)).
    	    substr($encryptedData, 0, (strlen($encryptedData)/2)-strlen($encryptedData))
    	);
        return base64_decode($encryptedData);
    }

}