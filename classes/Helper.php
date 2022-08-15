<?php

/**
 * Helper Class
 * 
 * @method static boolean ajax_check() check if request is xmlhttprequest
 * @method static string encrypt_pass() encrypt password with MD5 and salt
 */
class Helper
{
    /**
     * @return boolean
     */
    static function ajax_check()
    {
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }

    /**
     * @param string $pass
     * 
     * @return string $hash
     */
    static function encrypt_pass($pass)
    {
        $salt = 'Re@Oy~sIEw';
        $hash = md5($pass . $salt);
        return $hash;
    }
}
