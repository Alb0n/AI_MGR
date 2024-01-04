{extends file="main.tpl"}

{block name=content}

<a href="{$conf->action_root}userManage"><button class="menuButton">Zarządzanie użytkownikami</button></a>
<a href="{$conf->action_root}visitManage"><button class="menuButton">Zarządzanie wizytami zarezerwowanymi</button></a><br>

{/block}