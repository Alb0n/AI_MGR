<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\SessionUtils;


class MainPageCtrl {
    
    public $visitData;

    public function action_mainPage() {
		        
        $this->visitData = App::getDB()->select("visits", [
            "[>]users" => ["visit_doctor_id" => "user_id"]
        ],[
            "visits.visit_id",
            "visits.visit_datetime",
            "visits.visit_doctor_id",
            "users.user_name",
            "users.user_surname",
            "users.user_id"
        ], [
            "visits.visit_pet_id" => null,
            //"visits.visit_doctor_id[!]" => SessionUtils::load("id", $keep = true) 
        ]);

        App::getSmarty()->assign("lista", $this->visitData);

        SessionUtils::loadMessages();

        App::getSmarty()->display("MainPage.tpl");
        
    }
    
}
