<?php

namespace app\forms;

class VisitForm {
    public $pet_type;
    public $pet_name;
    public $pet_age;
    public $visit_reason;

    function checkIsNull() {
        foreach ($this as $key => $value) {
            if(!isset($value)) return false;
            else return true;
        }
    }
}