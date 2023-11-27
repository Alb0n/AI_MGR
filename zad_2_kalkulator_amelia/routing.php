<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('kalkulator'); #default action
//App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('hello', 'HelloCtrl');
Utils::addRoute('kalkulator', "KalkulatorCtrl");
//Utils::addRoute('action_name', 'controller_class_name');