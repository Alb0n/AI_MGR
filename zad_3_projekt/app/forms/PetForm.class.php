<?php

namespace app\forms;

class PetForm {
    public $pet_type;
    public $pet_name;
    public $pet_age;

    function checkIsNull() {
        foreach ($this as $key => $value) {
            if(!isset($value)) return false;
            else return true;
        }
    }
}