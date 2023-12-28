<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;

class VisitDisplayCtrl {
    
    public function action_visitDisplay() {
		        

        $visitData = App::getDB()->select("visits", [
            '[>]users' => ['visit_doctor_id' => 'user_id']
        ],[
            'visits.visit_id',
            'visits.visit_datetime',
            'visits.visit_doctor_id'
            'users.user_name',
            'users.user_surname',
            'users.user_id'
        ]);

        if($visitData["user_id"] == $visitData["visit_doctor_id"]) {
            App::getSmarty()->assign("visit_doctor_name", $visitData["user_name"]);
            App::getSmarty()->assign("visit_doctor_surname", $visitData["user_name"]);
            App::getSmarty()->assign("visit_datetime", $visitData["visit_datetime"]);
        }

        App::getSmarty()->display("MainPage.tpl");
       
        // $variable = 123;
        
        // App::getMessages()->addMessage(new Message("Hello world message", Message::INFO));
        // Utils::addInfoMessage("Or even easier message :-)");
        
        // App::getSmarty()->assign("value",$variable);        
        // App::getSmarty()->display("Hello.tpl");
        
    }
    
}
