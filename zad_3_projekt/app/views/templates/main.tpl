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

<div class="header">
	<h1>{$page_title|default:"Klinika weterynaryjna"}</h1>
	<h2>{$page_header|default:"Umów się na wizytę"}</h1>
</div>

<div class="menu">
	<a href="{$conf->action_root}mainPage"><button class="menuButton">Home</button></a>
	{if count($conf->roles)>0}
		<a href="{$conf->action_root}logout"><button class="menuButton">Wyloguj</button></a>
	{else}
	 	<a href="{$conf->action_root}loginShow"><button class="menuButton">Zaloguj</button></a>
	{/if}
</div>

<div class="content">
{block name=content} Domyślna treść zawartości .... {/block}
</div><!-- content -->

<div class="footer">
	<p>
{block name=footer} Domyślna treść stopki .... {/block}
	</p>
	<p>
		Widok oparty na stylach <a href="http://purecss.io/" target="_blank">Pure CSS Yahoo!</a>. 
	</p>
</div>


</body>
</html>