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
    <form action="{$conf->action_root}login" method="post" class="pure-form pure-form-aligned bottom-margin">
	<h3>Logowanie</h3>
	<fieldset>
		<div class="pure-control-group">
			<label for="id_login">Login: </label>
			<input id="id_login" type="text" name="login" /><br>
			<label for="id_password">Password: </label>
			<input id="id_password" type="password" name="password" />
		</div>
		<div class="pure_controls">
			<input type="submit" value="zaloguj" class="pure-button pure-button-primary"/>
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