<?php

namespace app\controllers;

use app\forms\LoginForm;
use core\Logs;
use core\ParamUtils;
use core\App;
use core\SessionUtils;
use core\RoleUtils;
use core\Utils;
use core\Validator;


class LoginCtrl{
    
    public $form;

    public $account;

    public $accountRoles;

    public function __construct() {
        $this->form = new LoginForm();
    }

    public function getLoginParams(){
        $this->form->login = ParamUtils::getFromRequest("login");
        $this->form->password = ParamUtils::getFromRequest("password");
    }

    public function validateLogin() {
        if(!empty(SessionUtils::load("id", true))) return true;

        if(!$this->form->checkIsNull()) return false;

        $v = new Validator();
        
        $v->validate($this->form->login, [
            'trim' => true,
            'required' => true,
            'required_message' => 'Nie podano loginu',
            'min_length' => 3,
            'max_length' => 45,
            'validator_message' => 'Login powinien zawierać 3-45 znaków'
        ]);

        $v->validate($this->form->password, [
            'required' => true,
            'required_message' => 'Nie podano hasła'
        ]);

        if(App::getMessages()->isError()) return false;

        try {
            $this->account = App::getDB()->get("users", [
                "[>]users_has_roles" => ["user_id" => "ur_user_id"],
                "[>]roles" => ["users_has_roles.ur_role_id" => "role_id"]
            ],[
                "users.user_id",
                "users.user_login",
                "users.user_password",
                "roles.role_name"
            ],[
                "user_login" => $this->form->login,
                "user_password" => md5($this->form->password)
            ]);

            $this->accountRoles = App::getDB()->select("users", [
                "[>]users_has_roles" => ["user_id" => "ur_user_id"],
                "[>]roles" => ["users_has_roles.ur_role_id" => "role_id"]
            ],[
                "users.user_id",
                "users.user_login",
                "users.user_password",
                "roles.role_name"
            ],[
                "user_login" => $this->form->login
            ]);

            if(empty($this->account)){
                Utils::addErrorMessage("Nieprawidłowy login lub hasło");
            }
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }

        if(!App::getMessages()->isError()) return true;
        else return false;
    }
    
    public function generateView(){
        if($this->validateLogin()){
            SessionUtils::store("id", $this->account["user_id"]);
            SessionUtils::store("login", $this->account["user_login"]);

            foreach($this->accountRoles as $role) {
                SessionUtils::store("role", $role["role_name"]);
                RoleUtils::addRole($role["role_name"]);
            }

            RoleUtils::addRole("logged");
            Utils::addInfoMessage("Pomyślnie zalogowano");

            SessionUtils::storeMessages();

            App::getRouter()->redirectTo('mainPage');
        }
        else {
            App::getSmarty()->display('LoginPage.tpl');
        }
    }

    public function action_login() {
		$this->getLoginParams();  
        $this->generateView();     ;
    }
    public function action_logout() {
        session_destroy();
        
        App::getRouter()->redirectTo('mainPage');
        
    }

    public function action_loginShow() {
        App::getSmarty()->display("LoginPage.tpl");
    }
    
}
