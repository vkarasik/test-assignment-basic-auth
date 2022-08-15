<?php

/**
 * Login Class
 * 
 * @param string $login
 * @param string $pass
 */
class Login extends DBHandler
{
    private $login;
    private $pass;

    public function __construct($login, $pass)
    {
        $this->login = trim($login);
        $this->pass = trim($pass);
        $this->pass = Helper::encrypt_pass($this->pass);
        parent::__construct('users');
    }

    /**
     * Authenticate user and create new session
     * 
     * @return boolean of result
     */
    public function login()
    {
        $user = $this->db_select('login', $this->login);
        if (!empty($user) && $user[0]['password'] == $this->pass) {
            session_start();
            $_SESSION['login'] = $user[0]['login'];
            $_SESSION['name'] = $user[0]['name'];
            return true;
        }
        return false;
    }

    /**
     * Check if user exists in database
     * 
     * @return boolean of result
     */
    public function checkUser()
    {
        if ($this->db_count('login', $this->login)) {
            return true;
        }
        return false;
    }

    /**
     * Check if given password is correct
     * 
     * @return boolean of result
     */
    public function checkPwd()
    {
        $user = $this->db_select('login', $this->login);
        if (!empty($user) && $user[0]['password'] == $this->pass) {
            return true;
        }
        return false;
    }
}
