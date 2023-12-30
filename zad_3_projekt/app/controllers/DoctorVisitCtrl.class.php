<?php

namespace app\controllers;

use app\forms\DoctorVisitForm;
use core\App;
use core\SessionUtils;
use core\ParamUtils;
use core\Message;
use core\Utils;
use core\Validator;

class DoctorVisitCtrl {
    
    public $form;

    public $visitData;

    public function __construct() {
        $this->form = new DoctorVisitForm();
    }

    public function getDoctorVisitParams() {
        $this->form->visit_date = ParamUtils::getFromRequest("visit_date");
        $this->form->visit_time = ParamUtils::getFromRequest("visit_time");
    }

    public function validateDoctorVisit() {

        if(!$this->form->checkIsNull()) return false;

        $v = new Validator();
        
        $v->validate($this->form->visit_date, [
            'required' => true,
            'required_message' => 'Nie podano daty wizyty',
            'date-format' => 'YYYY-MM-DD'
        ]);
        $v->validate($this->form->visit_time, [
            'required' => true,
            'required_message' => 'Nie podano czasu wizyty',
            'date-format' => 'HH:MM'
        ]);

        if(App::getMessages()->isError()) return false;

        try {
            $this->visitData = App::getDB()->insert("visits", [
                "visit_datetime" => ($this->form->visit_date)." ".($this->form->visit_time),
                "visit_doctor_id" => SessionUtils::load("id", $keep = true)
            ]);
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }

        if(!App::getMessages()->isError()) return true;
        else return false;
    }

    public function generateView(){
        if($this->validateDoctorVisit()){
            header("Location: ".App::getConf()->app_url."/doctorDisplay");
        }
        else {
            App::getSmarty()->display('DoctorVisitPage.tpl');
        }
    }

    public function action_doctorVisit() {
		$this->getDoctorVisitParams();  
        $this->generateView();     
    }
    
}
