<?php

namespace app\controllers;

use core\App;
use core\SessionUtils;
use core\ParamUtils;
use core\Message;
use core\Utils;
use core\Validator;

class AdminCtrl {

    public $userData;

    public $doctorData;

    public $visitDataAccepted;

    public $form;

    public $isDoctor;
    
    
    public function action_adminDisplay() {

        App::getSmarty()->assign("page_header", "Panel admina");

        App::getSmarty()->display("AdminPanel.tpl");
        
    }

    public function action_changeRole() {
        $user_id = ParamUtils::getFromGet("user_id");

        $this->isDoctor = App::getDB()->has("users_has_roles", [
            "ur_user_id" => $user_id,
            "ur_role_id" => 3
        ]);

        if(!$this->isDoctor) {
            App::getDB()->insert("users_has_roles", [
                "ur_user_id" => $user_id,
                "ur_role_id" => 3
            ]);
            
            App::getDB()->delete("users_has_roles", [
                "ur_user_id" => $user_id,
                "ur_role_id" => 2
            ]);
        } else {
            App::getDB()->delete("visits", [
                "visit_doctor_id" => $user_id
            ]);
            
            App::getDB()->delete("users_has_roles", [
                "ur_user_id" => $user_id,
                "ur_role_id" => 3
            ]);
            
            App::getDB()->insert("users_has_roles", [
                "ur_user_id" => $user_id,
                "ur_role_id" => 2
            ]);
        } 
        
        Utils::addInfoMessage("Pomyślnie zmieniono rolę użytkownika");  
        SessionUtils::storeMessages();

        App::getRouter()->redirectTo('userManage');
    }

    public function action_userManage() {
        $this->userData = App::getDB()->select("users", [
            "[>]users_has_roles" => ["user_id" => "ur_user_id"],
            "[>]roles" => ["users_has_roles.ur_role_id" => "role_id"]
        ],[
            "users.user_name",
            "users.user_surname",
            "users.user_id",
            "users.user_login",
            "roles.role_name",
        ],[
            "roles.role_name[!]" => "admin"
        ]);
        
        App::getSmarty()->assign("user_list", $this->userData);
        App::getSmarty()->assign("page_header", "Panel admina");
        App::getSmarty()->display('AdminUserPanel.tpl');
    }
    
    public function action_visitManage() {
        $this->doctorData = App::getDB()->select("users", [
            "[>]visits" => ["user_id" => "visit_doctor_id"]
        ],[
            "users.user_name",
            "users.user_surname",
            "visits.visit_doctor_id",
        ]);

        $this->visitDataAccepted = App::getDB()->select("visits", [
            "[>]pets" => ["visit_pet_id" => "pet_id"],
            "[>]users" => ["pets.pet_user_id" => "user_id"],
            "[>]pet_types" => ["pets.pet_type_id" => "ptype_id"]
        ],[
            "visits.visit_id",
            "visits.visit_datetime",
            "visits.visit_doctor_id",
            "visits.visit_reason",
            "users.user_name",
            "users.user_surname",
            "users.user_id",
            "pets.pet_name",
            "pets.pet_age",
            "pet_types.ptype_name"
        ],[
            "visits.visit_pet_id[!]" => null,
        ]);

        
        App::getSmarty()->assign("doctor_list", $this->doctorData);
        App::getSmarty()->assign("visit_list", $this->visitDataAccepted);

        App::getSmarty()->assign("page_header", "Panel admina");
        
        if($this->validateDoctorListForm()){
            App::getSmarty()->display('AdminVisitPanel.tpl');
        } else {
            App::getSmarty()->display('AdminVisitPanel.tpl');
        }
    }

    public function action_visitDelete() {
        $visit_id = ParamUtils::getFromGet("visit_id");

        App::getDB()->delete("visits", [
            "visit_id" => $visit_id 
        ]);

        Utils::addInfoMessage("Pomyślnie usunięto wizytę");
        SessionUtils::storeMessages();

        App::getRouter()->redirectTo('visitManage');
    }
}
