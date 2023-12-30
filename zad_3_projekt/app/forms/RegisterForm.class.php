<?php

namespace app\forms;

class RegisterForm {
    public $login;
    public $password;
    public $password_repeat;
    public $name;
    public $surname;
    public $email;
    public $address;
    public $pesel;

    function checkIsNull() {
        foreach ($this as $key => $value) {
            if(!isset($value)) return false;
            else return true;
        }
    }
}