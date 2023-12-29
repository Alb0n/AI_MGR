<?php

namespace app\forms;

class DoctorVisitForm {
    public $visit_date;
    public $visit_time;

    function checkIsNull() {
        foreach ($this as $key => $value) {
            if(!isset($value)) return false;
            else return true;
        }
    }
}