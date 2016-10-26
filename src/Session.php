<?php

class Session 
{
    private static $session = null;
    private static $status = false;
    private static $data = [];

    public static function start()
    {
        if(!self::$status):
            self::$session = session_start();
            self::$status = true;
        endif;
        
        return self::$session;
    }

    public static function destroy()
    {
    	if(self::$status):
            unset(self::$data);
            unset($_SESSION);
            self::$session = session_destroy();
            self::$status = false;
            return true;
        endif;
        
        return false;
    }
    
    public static function addData($key, $value)
    {
        $k = (string) trim(htmlentities(strip_tags($key)));
        $v = trim(htmlentities(strip_tags($value)));

        if(self::$status):
            $_SESSION[$k] = $v;
            return true;
        endif;
        
        return false;
    }
    
    public static function removeData($key)
    {
        $k = (string) trim(htmlentities(strip_tags($key)));

        if(isset($_SESSION[$k])):
            unset($_SESSION[$k]);
            return true;
        endif;
        
        return false;
    }
    
    public static function updateData($key, $value)
    {
        $k = (string) trim(htmlentities(strip_tags($key)));
        $v = trim(htmlentities(strip_tags($value)));

        if(isset($_SESSION[$k])):
            unset($_SESSION[$k]);
            $_SESSION[$k] = $v;
            return true;
        endif;
        
        return false;
    }
    
    public static function getStatus()
    {
        return self::$status;
    }
    
    public static function getData($key)
    {
        $k = (string) trim(htmlentities(strip_tags($key)));

        if(isset($_SESSION[$k])):
            return $_SESSION[$k];
        endif;
        
        return false;
    }

}