<?php

namespace app\controllers;

use app\forms\VisitForm;
use core\Logs;
use core\ParamUtils;
use core\App;
use core\SessionUtils;
use core\RoleUtils;
use core\Utils;
use core\Validator;

class VisitFormCtrl {

    public $form;

    public $visitData;

    public $visitDataPet;

    public $visit_id;

    public function __construct() {
        $this->form = new VisitForm();
    }

    public function getVisitParams() {
        $this->visit_id = ParamUtils::getFromGet("id");
        $this->form->pet_name = ParamUtils::getFromRequest("pet_name");
        $this->form->visit_reason = ParamUtils::getFromRequest("visit_reason");
    }

    public function validateVisit() {

        if(!$this->form->checkIsNull()) return false;

        $v = new Validator();
        
        $v->validate($this->form->pet_name, [
            'trim' => true,
            'required' => true,
            'required_message' => 'Nie wybrano pacjenta',
        ]);
        $v->validate($this->form->visit_reason, [
            'trim' => true,
            'required' => true,
            'required_message' => 'Nie podano powodu wizyty',
        ]);

        if(App::getMessages()->isError()) return false;

        try {
            $this->visitData = App::getDB()->update("visits",[
                "visit_reason" => $this->form->visit_reason,
                "visit_pet_id" => $this->form->pet_name
            ],[
                "visit_id" => $this->visit_id
            ]);
         
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }

        
        if(!App::getMessages()->isError()) return true;
        else return false;
    }

    public function generateView(){
        $this->visitData = App::getDB()->get("visits", [
            "[>]users" => ["visit_doctor_id" => "user_id"],
            "[>]pets" => ["visit_pet_id" => "pet_id"],
            "[>]pet_types" => ["pets.pet_type_id" => "ptype_id"]
        ],[
            "visits.visit_id",
            "visits.visit_datetime",
            "visits.visit_doctor_id",
            "users.user_name",
            "users.user_surname",
            "users.user_id",
            "pet_types.ptype_name"
        ],[
            "visits.visit_id" => $this->visit_id
        ]);

        $this->visitDataPet = App::getDB()->select("pets", [
            "pet_name",
            "pet_id"
        ],[
            "pet_user_id" => SessionUtils::load("id", $keep = true)
        ]);

        App::getSmarty()->assign("pet_list", $this->visitDataPet);
        App::getSmarty()->assign("visit_doctor_name", $this->visitData["user_name"]);
        App::getSmarty()->assign("visit_doctor_surname", $this->visitData["user_surname"]);
        App::getSmarty()->assign("visit_datetime", $this->visitData["visit_datetime"]);
        
        if($this->validateVisit()){
            header("Location: ".App::getConf()->app_url);
        } else {
            App::getSmarty()->assign("visit_id", $this->visit_id);
            App::getSmarty()->display('VisitPage.tpl');
        }
    }

    public function action_visitForm() {
        $this->getVisitParams();
        $this->generateView();
    }   
}
