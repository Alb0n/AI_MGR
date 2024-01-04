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

<center><a href="{$conf->action_root}clientDisplay"><button class="menuButton">Wstecz</button></a></center>

<div class="login">
    <form action="{$conf->action_root}petAdd" method="post" class="pure-form pure-form-aligned bottom-margin">
	<h3>Dodawanie zwierzęcia</h3>
	<fieldset>
		<div class="pure-control-group">
			<label for="id_pet_type">Rodzaj zwierzęcia: </label>
			<select id="id_pet_type" name="pet_type">
				<option value=""></option>
				{foreach $type_list as $row}
					<option value="{$row["ptype_id"]}">{$row["ptype_name"]}</option>
				{/foreach}
			</select><br>
			<label for="id_pet_name">Imię: </label>
			<input id="id_pet_name" type="text" name="pet_name" /><br>
			<label for="id_pet_age">Wiek: </label>
			<input id="id_pet_age" type="number" name="pet_age" /><br>
		</div>
		<div class="pure_controls">
			<input type="submit" value="Zapisz" class="pure-button pure-button-primary"/>
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