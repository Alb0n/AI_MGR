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

{if count($conf->roles)>0}
	Zalogowano: {\core\SessionUtils::load("login", true)} <br>
{/if}

{if $msgs->isInfo()}
	<center>
		<div class="inf">
			{foreach $msgs->getMessages() as $msg}
				<h3>{$msg->text}</h3>
			{/foreach}
		</div>
	</center>
{/if}

<div class="header">
	<h1>{$page_title|default:"Klinika weterynaryjna"}</h1>
	<h2>{$page_header|default:"Umów się na wizytę"}</h1>
</div>

<div class="menu">
	<a href="{$conf->action_root}mainPage"><button class="menuButton">Home</button></a>
	{if \core\RoleUtils::inRole("admin")}
	<a href="{$conf->action_root}adminDisplay"><button class="menuButton">Panel admina</button></a>
	{/if}
	{if \core\RoleUtils::inRole("doctor")}
	<a href="{$conf->action_root}doctorDisplay"><button class="menuButton">Panel lekarza</button></a>
	{/if}
	{if \core\RoleUtils::inRole("client")}
	<a href="{$conf->action_root}clientDisplay"><button class="menuButton">Panel klienta</button></a>
	{/if}
	{if count($conf->roles)>0}
		<a href="{$conf->action_root}logout"><button class="menuButton">Wyloguj</button></a>
	{else}
	 	<a href="{$conf->action_root}loginShow"><button class="menuButton">Zaloguj</button></a>
		<a href="{$conf->action_root}register"><button class="menuButton">Rejestracja</button></a>
	{/if}
</div>

<div class="content">
{block name=content} Domyślna treść zawartości .... {/block}
</div><!-- content -->

<div class="footer">
	<p>
{block name=footer} Projekt zaliczeniowy AI - Albert Pintera {/block}
	</p>
	<p>
		Widok oparty na stylach <a href="http://purecss.io/" target="_blank">Pure CSS Yahoo!</a>. 
	</p>
</div>


</body>
</html>