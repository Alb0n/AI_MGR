<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;


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
        ]);

        App::getSmarty()->assign("lista", $this->visitData);

        // App::getSmarty()->assign("visit_doctor_name", $this->visitData["user_name"]);
        // App::getSmarty()->assign("visit_doctor_surname", $this->visitData["user_surname"]);
        // App::getSmarty()->assign("visit_datetime", $this->visitData["visit_datetime"]);

        
        App::getSmarty()->display("MainPage.tpl");
        
    }
    
}
