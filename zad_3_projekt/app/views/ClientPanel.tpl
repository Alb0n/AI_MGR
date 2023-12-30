{extends file="main.tpl"}

{block name=footer}przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora{/block}

{block name=content}

<a href="{$conf->action_root}petAdd"><button class="menuButton">Dodaj zwierzę</button></a><br>

	<div class="colHead"><h2>Moje wizyty</h2>
		<div class="column">
		{foreach $lista as $wiersz}
			<div class="visit">
				<div class="visit_area1">
					<table cellpadding="5">
						<tr>
							Lekarz: {$wiersz["user_name"]}
							{$wiersz["user_surname"]}<br>
							{$wiersz["visit_datetime"]}<br>
							{$wiersz["visit_id"]}<br>
							Pacjent:<span class="tab"></span>{$wiersz["pet_name"]}<br>
							Powód wizyty:<span class="tab"></span>{$wiersz["visit_reason"]}
						</tr>	
					</table>
				</div>
				<div class="visit_area2">
					<a href="{url action="clientVisitCancel"}?visit_id={$wiersz["visit_id"]}"><button>Odmów wizytę</button></a>
				</div>
			</div>
		{/foreach}
		</div>
	</div>
	<div class="colHead"><h2>Moje zwierzęta</h2>
		<div class="column">
		{foreach $petList as $row}
			<div class="visit">
				<div class="visit_area1">
					<table cellpadding="5">
						<tr>
							Imię:<span class="tab"></span>{$row["pet_name"]}<br>
							Wiek:<span class="tab"></span>{$row["pet_age"]}<br>
							Rodzaj:<span class="tab"></span>{$row["ptype_name"]}<br>
						</tr>	
					</table>
				</div>
			</div>
		{/foreach}
		</div>
	</div>

<div class="messages">

{* wyświeltenie listy błędów, jeśli istnieją *}
{if isset($messages)}
	{if count($messages) > 0} 
		<h4>Wystąpiły błędy: </h4>
		<ol class="err">
		{foreach  $messages as $msg}
		{strip}
			<li>{$msg}</li>
		{/strip}
		{/foreach}
		</ol>
	{/if}
{/if}

{* wyświeltenie listy informacji, jeśli istnieją *}
{if isset($infos)}
	{if count($infos) > 0} 
		<h4>Informacje: </h4>
		<ol class="inf">
		{foreach  $infos as $msg}
		{strip}
			<li>{$msg}</li>
		{/strip}
		{/foreach}
		</ol>
	{/if}
{/if}

{if isset($result)}
	<h4>Wynik</h4>
	<p class="res">
	{$result}
	</p>
{/if}

</div>

{/block}