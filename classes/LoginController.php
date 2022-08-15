<?php

/**
 * LoginController Class
 * 
 * @param string $login
 * @param string $pass
 * 
 * @method array signIn() sign in user
 */
class LoginController
{
    private $login;
    private $pass;
    private $auth;

    function __construct($login, $pass)
    {
        $this->login = trim($login);
        $this->pass = trim($pass);
        $this->auth = new Login($this->login, $this->pass);
    }

    private function checkLogin()
    {
        if (empty($this->login)) {
            return "Login can't be empty";
        }
        return null;
    }

    private function checkPass()
    {
        if (empty($this->pass)) {
            return "Password can't be empty";
        }
        return null;
    }

    private function matchLogin()
    {
        if (!$this->auth->checkUser()) {
            return "No user with such login";
        }
        return null;
    }

    private function matchPass()
    {
        if (!$this->auth->checkPwd()) {
            return "Wrong password";
        }
        return null;
    }

    /**
     * @return array $response with status and details
     */
    public function signIn()
    {
        $response = array();

        if ($this->checkLogin() || $this->checkPass()) {
            $response['status'] = 'error';
            $response['details']['login'] = $this->checkLogin();
            $response['details']['pass'] = $this->checkPass();
            return $response;
        } elseif ($this->matchLogin()) {
            $response['status'] = 'error';
            $response['details']['login'] = $this->matchLogin();
            $response['details']['pass'] = null;
            return $response;
        } elseif ($this->matchPass()) {
            $response['status'] = 'error';
            $response['details']['login'] = null;
            $response['details']['pass'] = $this->matchPass();
            return $response;
        } else {
            $response['status'] = 'login';
            $this->auth->login();
            return $response;
        }
    }
}
