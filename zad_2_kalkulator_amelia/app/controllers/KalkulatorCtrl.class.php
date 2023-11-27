<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\Validator;

class KalkulatorCtrl {

    public function action_kalkulator() {

        $v = new Validator();

        //Pobranie parametrow
        $kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
        $lata = isset($_REQUEST['lata']) ? $_REQUEST['lata'] : null;
        $procent = isset($_REQUEST['procent']) ? $_REQUEST['procent'] : null;

        if ( isset($kwota) && isset($lata) && isset($procent) ) {
            
            //Walidacja parametrow
            $kwota = $v->validateFromRequest('kwota', [
                'required' => true,
                'required_message' => 'Nie podano kwoty kredytu.',
                'numeric' => true,
                'min' => 0,
                'validator_message' => 'Kwota kredytu musi być liczbą większą od 0.',
            ]);
        
            $lata = $v->validateFromRequest('lata', [
                'required' => true,
                'required_message' => 'Nie podano liczby lat.',
                'numeric' => true,
                //'min' => 0.0000001,
                'validator_message' => 'Lata muszą być liczbą większą od 0.',
            ]);
        
            $procent = $v->validateFromRequest('procent', [
                'required' => true,
                'required_message' => 'Nie podano oprocentowania rocznego.',
                'numeric' => true,
                'min' => 0,
                'validator_message' => 'Oprocentowanie musi być liczbą większą od 0.',
            ]);

            if ($lata != "" && $lata <= 0){
                App::getMessages()->addMessage(new Message('Lata muszą być liczbą większą od 0.', Message::ERROR));
            }

            //Jesli nie ma bledow, oblicz rate
            if (App::getMessages()->isEmpty()) {
            $kwota = floatval($kwota);
            $lata = floatval($lata);
            $procent = floatval($procent);
    
            $result = ($kwota +($kwota*($procent/100)*$lata))/($lata*12);
            $result = number_format((float)$result,2,'.','');
                
            App::getSmarty()->assign("result",$result); 
            }
        }

        //Przekazanie danych do szablonu
        App::getSmarty()->assign('page_title','Zadanie 2');
        App::getSmarty()->assign('page_header','Kalkulator kredytowy');
        App::getSmarty()->assign('page_description','Przeniesienie kalkulatora do frameworka Amelia');

        App::getSmarty()->assign("kwota",$kwota);  
        App::getSmarty()->assign("lata",$lata);
        App::getSmarty()->assign("procent",$procent);  
         
        //Wywolanie szablonu
        App::getSmarty()->display("Kalkulator.tpl");
        
    }
    
}