{extends file="main.tpl"}

{block name=content}

<a href="{$conf->action_root}doctorVisit"><button class="menuButton">Utwórz nową propozycję wizyty</button></a><br>

	<div class="colHead"><h2>Wizyty zaproponowane</h2>
		<div class="column">
		{foreach $lista as $wiersz}
			<div class="visit">
				<div class="visit_area1">
					<table cellpadding="5">
						<tr>
							Lekarz: {$wiersz["user_name"]}
							{$wiersz["user_surname"]}<br>
							{$wiersz["visit_datetime"]}<br>
						</tr>	
					</table>
				</div>
				<div class="visit_area2">
					<a href="{url action="doctorVisitCancel"}?visit_id={$wiersz["visit_id"]}"><button>Usuń wizytę</button></a>
				</div>
			</div>
		{/foreach}
		</div>
	</div>
	<div class="colHead"><h2>Wizyty zarezerwowane</h2>
		<div class="column">
		{foreach $lista2 as $wiersz2}
			<div class="visit">
				<div class="visit_area1">
					<table cellpadding="5">
						<tr>
							{$wiersz2["visit_datetime"]}<br>
							{$wiersz2["visit_id"]}<br>
							Pacjent:<span class="tab"></span>{$wiersz2["pet_name"]}<br>
							Rodzaj:<span class="tab"></span>{$wiersz2["ptype_name"]}<br>
							Wiek:<span class="tab"></span>{$wiersz2["pet_age"]}<br>
							Właściciel:<span class="tab"></span>{$wiersz2["user_name"]} {$wiersz2["user_surname"]}<br>
							Powód wizyty:<span class="tab"></span>{$wiersz2["visit_reason"]}
						</tr>	
					</table>
				</div>
			</div>
		{/foreach}
		</div>
	</div>

{/block}