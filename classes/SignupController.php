<?php

/**
 * SignupController Class
 * 
 */
class SignupController extends Signup
{
    private $login;
    private $pass;
    private $passrepeat;
    private $email;
    private $name;

    function __construct($login, $pass, $passrepeat, $email, $name)
    {
        $this->login = trim($login);
        $this->pass = trim($pass);
        $this->passrepeat = trim($passrepeat);
        $this->email = trim($email);
        $this->name = trim($name);
        parent::__construct();
    }

    private function checkLogin()
    {
        if (empty($this->login)) {
            return "Login can't be empty";
        }
        if (!preg_match("/^[a-zA-Z0-9]{6,}$/", $this->login)) {
            return "Login must be at least 6 characters long, nums or latin letters";
        }
        if ($this->checkUnique('login', $this->login)) {
            return "This login already taken";
        }
        return null;
    }

    private function checkEmail()
    {
        if (empty($this->email)) {
            return "Email can't be empty";
        }
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return "Incorrect email";
        }
        if ($this->checkUnique('email', $this->email)) {
            return "This email already taken";
        }
        return null;
    }

    private function checkPass()
    {
        if (empty($this->pass)) {
            return "Password can't be empty";
        }
        if (!preg_match("/^(?=\d*[A-Za-z])(?=[A-Za-z]*\d)[A-Za-z0-9]{6,}$/", $this->pass)) {
            return "Password must contain at least 6 characters nums and latin letters";
        }
        if (empty($this->passrepeat)) {
            return "Please repeat password";
        }
        if ($this->pass !== $this->passrepeat) {
            return "Passwords don't match";
        }
        return null;
    }

    private function checkName()
    {
        if (empty($this->name)) {
            return "Name can't be empty";
        }
        if (!preg_match("/^[a-zA-Zа-яёА-ЯЁ]{2,}$/u", $this->name)) {
            return "Name must be at least 2 characters long (only letters)";
        }
        return null;
    }

    /**
     * @return array $response with details
     */

    public function signUp()
    {
        $response = array();

        if ($this->checkLogin() || $this->checkEmail() || $this->checkPass() || $this->checkName()) {
            $response['status'] = 'error';
            $response['details']['login'] = $this->checkLogin();
            $response['details']['email'] = $this->checkEmail();
            $response['details']['pass'] = $this->checkPass();
            $response['details']['name'] = $this->checkName();
            return $response;
        } else {
            $response['status'] = 'signup';
            $response['details'] = 'Account was created, please Login';
            $this->setUser($this->login, $this->pass, $this->email, $this->name);
            return $response;
        }
    }
}
