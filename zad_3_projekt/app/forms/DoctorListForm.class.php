<?php

namespace app\forms;

class DoctorListForm {
    public $doctor_name;

    function checkIsNull() {
        foreach ($this as $key => $value) {
            if(!isset($value)) return false;
            else return true;
        }
    }
}