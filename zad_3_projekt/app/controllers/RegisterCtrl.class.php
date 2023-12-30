<?php

namespace app\controllers;

use app\forms\RegisterForm;
use core\App;
use core\Message;
use core\Utils;
use core\SessionUtils;
use core\ParamUtils;
use core\Validator;

class RegisterCtrl {

    public $form;

    public function __construct() {
        $this->form = new RegisterForm();
    }

    public function getRegisterParams() {
        $this->form->login = ParamUtils::getFromRequest("login");
        $this->form->password = ParamUtils::getFromRequest("password");
        $this->form->password_repeat = ParamUtils::getFromRequest("password_repeat");
        $this->form->name = ParamUtils::getFromRequest("user_name");
        $this->form->surname = ParamUtils::getFromRequest("user_surname");
        $this->form->email = ParamUtils::getFromRequest("user_email");
        $this->form->address = ParamUtils::getFromRequest("user_address");
        $this->form->pesel = ParamUtils::getFromRequest("user_pesel");
    }
    
    public function validateRegisterForm() {
        if(!empty(SessionUtils::load("id", $keep = true))) return false;

        if(!$this->form->checkIsNull()) return false;

        $v = new Validator();

        $v->validate($this->form->login, [
            'trim' => true,
            'required' => true,
            'required_message' => 'Nie podano loginu',
            'min_length' => 3,
            'max_length' => 45,
            'validator_message' => 'Login powinien zawierać od 3 do 45 znaków'
        ]);

        $v->validate($this->form->password, [
            'trim' => true,
            'required' => true,
            'required_message' => 'Nie podano hasła',
            'min_length' => 3,
            'max_length' => 45,
            'validator_message' => 'Haslo powinno zawierać od 3 do 45 znaków'
        ]);

        $v->validate($this->form->password_repeat, [
            'trim' => true,
            'required' => true,
            'required_message' => 'Nie powtórzono hasła'
        ]);

        if($this->form->password_repeat != $this->form->password) {
            Utils::addErrorMessage("Hasła muszą być identyczne");
        }

        $v->validate($this->form->name, [
            'trim' => true,
            'required' => true,
            'required_message' => 'Nie podano imienia'
        ]);

        $v->validate($this->form->surname, [
            'trim' => true,
            'required' => true,
            'required_message' => 'Nie podano nazwiska'
        ]);

        $v->validate($this->form->email, [
            'email' => true,
            'trim' => true,
            'required' => true,
            'required_message' => 'Nie podano adresu email',
            'min_length' => 3,
            'max_length' => 100,
            'validator_message' => 'Nieprawidlowy adres email'
        ]);

        $v->validate($this->form->address, [
            'trim' => false,
            'required' => true,
            'required_message' => 'Nie podano adresu zamieszkania'
        ]);

        $v->validate($this->form->pesel, [
            'trim' => true,
            'required' => true,
            'required_message' => 'Nie podano numeru PESEL',
            'min_length' => 11,
            'max_length' => 11,
            'numeric' => true,
            'validator_message' => 'PESEL powinien składać się z 11 cyfr'
        ]);
        
        $this->checkForDuplicate();
        
        if(!App::getMessages()->isError()) return true;
        else return false;

    }

    public function checkForDuplicate(){
        try{
            $loginCheck = App::getDB()->has("users", [
                "user_login" => $this->form->login
            ]);
            
            $emailCheck = App::getDB()->has("users", [
                "user_email" => $this->form->email
            ]);

            if($loginCheck) {
                Utils::addErrorMessage("Podany login jest już zajęty");
            }

            if($emailCheck) {
                Utils::addErrorMessage("Podany email jest już zajęty");
            }

        }catch(\PDOException $e) {
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }
    }

    public function insertToDb() {
        try{
            $userRoleId = App::getDB()->get("roles", "role_id", [
                "role_name" => "client"
            ]);

            App::getDB()->insert("users", [
                "user_login" => $this->form->login,
                "user_password" => $this->form->password,
                "user_name" => $this->form->name,
                "user_surname" => $this->form->surname,
                "user_email" => $this->form->email,
                "user_address" => $this->form->address,
                "user_PESEL" => $this->form->pesel
            ]);

            $userId = App::getDB()->id();

            App::getDB()->update("users", [
                "user_mod_modifier_id" => $userId
            ],[
                "user_id" => $userId
            ]);

            App::getDB()->insert("users_has_roles", [
                "ur_user_id" => $userId,
                "ur_role_id" => $userRoleId
            ]);

            Utils::addInfoMessage("Konto zostało utworzone");

        }catch(\PDOException $e) {
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }
    }

    public function generateView() {
        if($this->validateRegisterForm()){
            $this->insertToDb();
            header("Location: ".App::getConf()->app_url);
        }
        else {
            App::getSmarty()->display('RegisterPage.tpl');
        }
    }

    public function action_register() {
		$this->getRegisterParams();
        $this->generateView();
    }
    
}