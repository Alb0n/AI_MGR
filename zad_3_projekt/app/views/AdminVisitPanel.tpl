{extends file="main.tpl"}

{block name=footer}przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora{/block}

{block name=content}

<a href="{$conf->action_root}userManage"><button class="menuButton">Zarządzanie użytkownikami</button></a>
<a href="{$conf->action_root}visitManage"><button class="menuButton">Zarządzanie wizytami zarezerwowanymi</button></a><br>

<div class="colHead"><h2>Wizyty zarezerwowane</h2><br>
	<div class="column">
		{foreach $visit_list as $wiersz2}
			<div class="visit">
				<div class="visit_area1">
					<table cellpadding="5">
						<tr>
							Numer ID lekarza:<span class="tab"></span>{$wiersz2["visit_doctor_id"]}<br>
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
				<div class="visit_area2">
						<a href="{url action="visitDelete"}?visit_id={$wiersz2["visit_id"]}"><button>Usuń wizytę</button></a>
				</div>
			</div>
		{/foreach}
	</div>
</div>


{/block}