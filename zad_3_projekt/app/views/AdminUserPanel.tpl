{extends file="main.tpl"}

{block name=footer}przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora{/block}

{block name=content}

<a href="{$conf->action_root}userManage"><button class="menuButton">Zarządzanie użytkownikami</button></a>
<a href="{$conf->action_root}visitManage"><button class="menuButton">Zarządzanie wizytami zarezerwowanymi</button></a><br>

	<div class="colHead"><h2>Klienci</h2>
		<div class="column">
		{foreach $user_list as $row}
		{if {$row["role_name"]} == "client"}
			<div class="visit">
				<div class="visit_area1">
					<table cellpadding="5">
						<tr>
							ID: {$row["user_id"]}<br>
							{$row["user_name"]} {$row["user_surname"]}<br>
							Login: {$row["user_login"]}<br>
						</tr>	
					</table>
				</div>
		
				<div class="visit_area2">
					<a href="{url action="changeRole"}?user_id={$row["user_id"]}"><button>Dodaj rolę doctor</button></a>
				</div>
			</div>	
		{/if}
		{/foreach}
		</div>
	</div>

	<div class="colHead"><h2>Doktorzy</h2>
		<div class="column">
		{foreach $user_list as $row}
		{if {$row["role_name"]} == "doctor"}
			<div class="visit">
				<div class="visit_area1">
					<table cellpadding="5">
						<tr>
							ID: {$row["user_id"]}<br>
							{$row["user_name"]} {$row["user_surname"]}<br>
							Login: {$row["user_login"]}
						</tr>	
					</table>
				</div>
		
				<div class="visit_area2">
					<a href="{url action="changeRole"}?user_id={$row["user_id"]}"><button>Usuń rolę doctor</button></a>
				</div>
			</div>	
		{/if}
		{/foreach}

		</div>
	</div>

{/block}