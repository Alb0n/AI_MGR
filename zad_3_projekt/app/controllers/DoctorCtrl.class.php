<?php

namespace app\controllers;

use core\App;
use core\SessionUtils;
use core\ParamUtils;
use core\Message;
use core\Utils;

class DoctorCtrl {

    public $visitData;

    public $visitDataAccepted;
    
    public function action_doctorDisplay() {
		    
        $this->visitData = App::getDB()->select("visits", [
            "[>]users" => ["visit_doctor_id" => "user_id"],
            "[>]pets" => ["visit_pet_id" => "pet_id"]
        ],[
            "visits.visit_id",
            "visits.visit_datetime",
            "visits.visit_doctor_id",
            "visits.visit_reason",
            "users.user_name",
            "users.user_surname",
            "users.user_id",
            "pets.pet_name",
            "pets.pet_age"
        ], [
            "visits.visit_pet_id" => null,
            "visits.visit_doctor_id" => SessionUtils::load("id", $keep = true) 
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
            "visits.visit_doctor_id" => SessionUtils::load("id", $keep = true) 
        ]);

        App::getSmarty()->assign("lista", $this->visitData);
        App::getSmarty()->assign("lista2", $this->visitDataAccepted);

        App::getSmarty()->assign("page_header", "Panel doktora");

        App::getSmarty()->display("DoctorPanel.tpl");
        
    }

    public function action_doctorVisitCancel() {
        $visit_id = ParamUtils::getFromGet("visit_id");

        $this->visitData = App::getDB()->delete("visits", [
            "visit_id" => $visit_id 
        ]);

        Utils::addInfoMessage("Pomyślnie usunięto zaproponowaną wizytę");
        SessionUtils::storeMessages();
        App::getRouter()->redirectTo('doctorDisplay');

    }
    
}
