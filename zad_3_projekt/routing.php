<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('mainPage'); #default action
App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('mainPage', 'MainPageCtrl');
//Utils::addRoute('noPerm', 'MainPageCtrl');

Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('logout', 'LoginCtrl');
Utils::addRoute('loginShow', 'LoginCtrl');
Utils::addRoute('register', 'RegisterCtrl');

Utils::addRoute('doctorDisplay', 'DoctorCtrl',["admin", "doctor"]);
Utils::addRoute('doctorVisitCancel', 'DoctorCtrl',["admin", "doctor"]);
Utils::addRoute('doctorVisit', 'DoctorVisitCtrl',["admin", "doctor"]);

Utils::addRoute('clientDisplay', 'ClientCtrl',["admin", "client"]);
Utils::addRoute('clientVisitCancel', 'ClientCtrl',["admin", "client"]);
Utils::addRoute('petAdd', 'PetFormCtrl',["admin", "client"]);

Utils::addRoute('visitForm', 'VisitFormCtrl',["admin", "client"]);



//Utils::addRoute('action_name', 'controller_class_name');