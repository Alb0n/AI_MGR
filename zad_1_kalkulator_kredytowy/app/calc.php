<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów

$kwota = $_REQUEST ['kwota'];
$lata = $_REQUEST ['lata'];
$procent = $_REQUEST ['procent'];

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($kwota) && isset($lata) && isset($procent))) {
	//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

// sprawdzenie, czy potrzebne wartości zostały przekazane
if ( $kwota == "") {
	$messages [] = 'Nie podano kwoty kredytu';
}
if ( $lata == "") {
	$messages [] = 'Nie podano liczby lat';
}
if ( $procent == "") {
	$messages [] = 'Nie podano oprocentowania rocznego';
}

//nie ma sensu walidować dalej gdy brak parametrów
if (empty( $messages )) {
	
	// sprawdzenie, czy $x i $y są liczbami całkowitymi
	if (! is_numeric( $kwota) || !($kwota>0)) {
		$messages [] = 'Pierwsza wartość nie jest liczbą lub jest ujemna';
	}
	
	if (! is_numeric( $lata ) || !($lata>0)) {
		$messages [] = 'Druga wartość nie jest liczbą lub jest ujemna';
	}	
	
	if (! is_numeric( $procent) || !($procent>0)) {
		$messages [] = 'Trzecia wartość nie jest liczbą lub jest ujemna';
	}	
}

// 3. wykonaj zadanie jeśli wszystko w porządku

if (empty ( $messages )) { // gdy brak błędów
	
	//konwersja parametrów na int
	$kwota = floatval($kwota);
	$lata = floatval($lata);
	$procent = floatval($procent);

	//obliczenie raty
	$result = ($kwota +($kwota*($procent/100)*$lata))/($lata*12);
	$result = number_format((float)$result,2,'.','');
}

// 4. Wywołanie widoku z przekazaniem zmiennych
include 'calc_view.php';