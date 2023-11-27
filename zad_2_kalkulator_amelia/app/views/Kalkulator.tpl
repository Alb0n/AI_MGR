<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
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
	<h1>{$page_title|default:"Tytuł domyślny"}</h1>
	<h2>{$page_header|default:"Tytuł domyślny"}</h1>
	<p>
		{$page_description|default:"Opis domyślny"}
	</p>
</div>

<div class="content">
<h3>Prosty kalkulator kredytowy</h2>
    
    <form class="pure-form pure-form-stacked" action="{rel_url action="kalkulator"}" method="post">
		<label for="id_kwota">Kwota kredytu [zł]: </label>
		<input id="id_kwota" type="text" name="kwota" value="{$kwota}">
		<label for="id_lata">Liczba lat: </label>
		<input id="id_lata" type="text" name="lata" value="{$lata}">
        <label for="id_procent">Oprocentowanie roczne [%]: </label>
		<input id="id_procent" type="text" name="procent" value="{$procent}">
	<button type="submit" class="pure-button pure-button-primary">Oblicz</button>
    </form>
    
{if $msgs->isError()}
	<h4>Wystąpiły błędy:</h4>
	<div class="err">
        {foreach $msgs->getMessages() as $msg}
            <li>{$msg->text}</li>
        {/foreach}
	</div>
{/if}

{if isset($result)}
	<h4>Miesięczna rata: </h4>
	<p class="res">
	{"$result zł"}
	</p>
{/if} 
 
</div>

<div class="footer">
	<p>
        Albert Pintera Inf. st.II niestac. sem.2 gr.SK
	</p>
	<p>
		Widok oparty na stylach <a href="http://purecss.io/" target="_blank">Pure CSS Yahoo!</a>.
	</p>
</div>

</body>
</html>