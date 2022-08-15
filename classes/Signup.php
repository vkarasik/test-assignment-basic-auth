<?php

/**
 * Signup Class
 * 
 */
class Signup extends DBHandler
{
    function __construct()
    {
        parent::__construct('users');
    }

    /**
     * Check if value exists in database
     * 
     * @param string $field search over
     * @param string $value to check
     * 
     * @return boolean of check result
     */
    protected function checkUnique($field, $value)
    {
        if ($this->db_count($field, $value)) {
            return true;
        }
        return false;
    }

    /**
     * @param string $login
     * @param string $pass
     * @param string $email
     * @param string $name
     * 
     * @return boolean
     */
    protected function setUser($login, $pass, $email, $name)
    {
        $pass = Helper::encrypt_pass($pass);
        $user = array(
            "login" => $login,
            "password" => $pass,
            "email" => $email,
            "name" => $name
        );
        $this->db_update($user);
        return true;
    }
}
