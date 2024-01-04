{extends file="main.tpl"}

{block name=content}

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
	<div class="visit_area1">
		{if !\core\RoleUtils::inRole("doctor")}
			<a href="{url action="visitForm"}?id={$wiersz["visit_id"]}"><button>Wybierz</button></a>
		{/if}
	</div>
</div>
{/foreach}

</div>

{/block}