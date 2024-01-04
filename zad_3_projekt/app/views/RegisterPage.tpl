<!doctype html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="{$page_description|default:'Opis domyślny'}">
	<title>{$page_title|default:"Tytuł domyślny"}</title>
	<link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css" integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">	
</head>
<body>

<center><a href="{$conf->action_root}mainPage"><button class="menuButton">Home</button></a></center>

<div class="login">
    <form action="{$conf->action_root}register" method="post" class="pure-form pure-form-aligned bottom-margin">
	<h3>Rejestracja</h3>
	<fieldset>
		<div class="pure-control-group">
			<label for="id_login">Login: </label>
			<input id="id_login" type="text" name="login" /><br>
			<label for="id_password">Hasło: </label>
			<input id="id_password" type="password" name="password" />
			<label for="id_password_repeat">Powtórz hasło: </label>
			<input id="id_password_repeat" type="password" name="password_repeat" />
			<label for="id_name">Imię: </label>
			<input id="id_name" type="text" name="user_name" /><br>
			<label for="id_surname">Nazwisko: </label>
			<input id="id_surname" type="text" name="user_surname" />
			<label for="id_email">E-mail: </label>
			<input id="id_email" type="email" name="user_email" />
			<label for="id_address">Adres zamieszkania: </label>
			<input id="id_address" type="text" name="user_address" />
			<label for="id_pesel">PESEL: </label>
			<input id="id_pesel" type="text" name="user_pesel" />

		</div>
		<div class="pure_controls">
			<input type="submit" value="Zarejestruj" class="pure-button pure-button-primary"/>
		</div>
	</fieldset>
</div>


{if $msgs->isError()}
<h4>Wystąpiły błędy:</h4>
<div class="err">
	{foreach $msgs->getMessages() as $msg}
		<li>{$msg->text}</li>
	{/foreach}
</div>
{/if}

</body>
</html>