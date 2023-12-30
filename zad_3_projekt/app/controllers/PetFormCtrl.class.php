<?php

namespace app\controllers;

use app\forms\PetForm;
use core\App;
use core\SessionUtils;
use core\ParamUtils;
use core\Message;
use core\Utils;
use core\Validator;

class PetFormCtrl {
    
    public $form;

    public $petData;

    public function __construct() {
        $this->form = new PetForm();
    }

    public function getPetParams() {
        $this->form->pet_type = ParamUtils::getFromRequest("pet_type");
        $this->form->pet_name = ParamUtils::getFromRequest("pet_name");
        $this->form->pet_age = ParamUtils::getFromRequest("pet_age");
    }

    public function validatePetForm() {

        if(!$this->form->checkIsNull()) return false;

        $v = new Validator();
        
        $v->validate($this->form->pet_type, [
            'trim' => true,
            'required' => true,
            'required_message' => 'Nie wybrano rodzaju zwierzęcia',
        ]);
        $v->validate($this->form->pet_name, [
            'trim' => true,
            'required' => true,
            'required_message' => 'Nie podano imienia zwierzęcia',
        ]);
        $v->validate($this->form->pet_age, [
            'trim' => true,
            'required' => true,
            'required_message' => 'Nie podano wieku zwierzęcia',
            'numeric' => true,
            'validator_message' => 'Wiek musi być liczbą'
        ]);

        if(App::getMessages()->isError()) return false;

        try {
            $this->petData = App::getDB()->insert("pets", [
                "pet_name" => $this->form->pet_name,
                "pet_age" => $this->form->pet_age,
                "pet_user_id" => SessionUtils::load("id", $keep = true),
                "pet_type_id" => $this->form->pet_type
            ]);
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }

        if(!App::getMessages()->isError()) return true;
        else return false;
    }

    public function generateView(){
        $this->petData = App::getDB()->select("pet_types", "*");

        App::getSmarty()->assign("type_list", $this->petData);

        if($this->validatePetForm()){
            header("Location: ".App::getConf()->app_url."/clientDisplay");
        }
        else {
            App::getSmarty()->display('PetAddPage.tpl');
        }
    }

    public function action_petAdd() {
		$this->getPetParams();  
        $this->generateView();           
    }
    
}
