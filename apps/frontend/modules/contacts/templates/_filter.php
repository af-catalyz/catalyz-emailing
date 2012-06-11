<form>
    <div class="well">
<?php

$filters = ContactPeer::getFiltersData();
//$filters['campaigns'] = array();
//$filters['groups'] = array();
?>
<!--
<div>
    <button type="submit" class="btn btn-primary">Filtrer</button>
    <button type="clear" class="btn">Annuler</button>
    </div>

    <ul class="nav nav-list" style="padding: 8px 0pt;"><li class="divider"></li></ul>
-->
<label>Recherche dans les contacts <a href="javascript://" class="" rel="popover" title="La recherche sera effectuée dans tous les champs des contacts (Prénom, Nom, Société, Email, Genre, Champ personnalisé n°2, Champ personnalisé n°3, Champ personnalisé n°4, Champ personnalisé n°8, Champ personnalisé n°6, Champ personnalisé n°7, Champ personnalisé n°9, Champ personnalisé n°10). "><i class="icon-question-sign"></i></a></label>

<div class="controls">
	<div class="input-append">
		<input class="span2" type="text" size="16" placeholder="Indiquer le texte cherché ici" />
		<a href="" class="btn" style="margin-top: -9px;"><u class="icon-remove"></u></a>
	</div>
</div>

<ul class="nav nav-list" style="padding: 8px 0pt;"><li class="divider"></li></ul>
	<label class="checkbox"><input type="checkbox" checked="checked" /> <u class="icon-ok"></u> Actifs</label>
	<label class="checkbox"><input type="checkbox" checked="checked" /> <u class="icon-remove"></u> Inactif
	<?php if (!empty($filters['campaigns'])) {
    echo ' suite à une erreur sur';
}
?>
	</label>
	<?php
if (!empty($filters['campaigns'])) {
    printf('<select><option value="null">n\'importe quelle campagne</option>');
    foreach ($filters['campaigns'] as $campaignId => $campaignLabel) {
        printf('<option value="%s">%s</option>', $campaignId, $campaignLabel);
    }
    echo '</select>';
}

?>

	<label class="checkbox">
		<input type="checkbox" checked="checked" /> <u class="icon-off"></u> Désinscrit
		<?php if (!empty($filters['campaigns'])) {
			echo ' suite à';
		}
?>


	</label>

	<?php
if (!empty($filters['campaigns'])) {
	printf('<select><option value="null">n\'importe quelle campagne</option>');
	foreach ($filters['campaigns'] as $campaignId => $campaignLabel) {
		printf('<option value="%s">%s</option>', $campaignId, $campaignLabel);
	}
	echo '</select>';
}

if (!empty($filters['groups'])) {
	printf('<ul class="nav nav-list" style="padding: 8px 0pt;"><li class="divider"></li></ul><label>Groupes (<a href="javascript://">tous</a> / <a href="javascript://">aucun</a>)</label><div id="groups_hloder">');
	foreach ($filters['groups'] as $groupId => $groupLabel){
		printf('<label class="checkbox"><input type="checkbox" checked="checked"> %s</label>', $groupLabel);
	}
	echo '</div>';
}
?>

      </div>
    </form>


    <script type="text/javascript">
    /* <![CDATA[ */



    /* ]]> */
    </script>
