<?php

namespace app\controllers;

use core\App;
use core\SessionUtils;
use core\ParamUtils;
use core\Message;
use core\Utils;

class ClientCtrl {

    public $visitDataAccepted;

    public $petData;
    
    public function action_clientDisplay() {

        $this->visitDataAccepted = App::getDB()->select("visits", [
            "[>]pets" => ["visit_pet_id" => "pet_id"],
            "[>]users" => ["visit_doctor_id" => "user_id"],
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
            "pets.pet_user_id" => SessionUtils::load("id", $keep = true), 
        ]);

        $this->petData = App::getDB()->select("pets", [
            "[>]pet_types" => ["pets.pet_type_id" => "ptype_id"]
        ],[
            "pets.pet_id",
            "pets.pet_name",
            "pets.pet_age",
            "pet_types.ptype_name"
        ],[
            "pets.pet_user_id" => SessionUtils::load("id", $keep = true) 
        ]);

        App::getSmarty()->assign("lista", $this->visitDataAccepted);
        App::getSmarty()->assign("petList", $this->petData);

        App::getSmarty()->assign("page_header", "Panel klienta");

        App::getSmarty()->display("ClientPanel.tpl");
        
    }

    public function action_clientVisitCancel() {
        $visit_id = ParamUtils::getFromGet("visit_id");

        $this->visitDataAccepted = App::getDB()->update("visits", [
            "visit_pet_id" => null,
            "visit_reason" => null
        ],[
            "visit_id" => $visit_id 
        ]);

        Utils::addInfoMessage("Pomyślnie odmówiono wizytę");
        SessionUtils::storeMessages();
        
        App::getRouter()->redirectTo('clientDisplay');
    }

    public function action_clientPetDelete() {
        $pet_id = ParamUtils::getFromGet("pet_id");

        App::getDB()->update("visits", [
            "visits.visit_pet_id" => null,
            "visits.visit_reason" => null 
        ],[
            "visits.visit_pet_id" => $pet_id
        ]);

        App::getDB()->delete("pets", [
            "pet_id" => $pet_id
        ]);

        Utils::addInfoMessage("Pomyślnie usunięto zwierzę z konta");
        SessionUtils::storeMessages();

        App::getRouter()->redirectTo('clientDisplay');
    }
    
}
