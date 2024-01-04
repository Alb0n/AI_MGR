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

<div class="login">
    <form action="{url action="visitForm"}?id={$visit_id}" method="post" class="pure-form pure-form-aligned bottom-margin">
	<h3>Wizyta</h3>
	<h2>Lekarz: {$visit_doctor_name} {$visit_doctor_surname}<br> {$visit_datetime}</h2>
	<fieldset>
		<div class="pure-control-group">
			<label for="id_pet_name">Wybierz pacjenta: </label>
			<select id="id_pet_name" name="pet_name">
				<option value=""></option>
				{foreach $pet_list as $row}
					<option value="{$row["pet_id"]}">{$row["pet_name"]}</option>
				{/foreach}
			</select><br>
			<label for="id_visit_reason">Powód wizyty: </label>
			<textarea id="id_visit_reason" name="visit_reason"></textarea><br>
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