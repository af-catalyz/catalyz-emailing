<div class="page-header"><h1>Page d'atterrissage</h1></div>

	<?php include_partial('global/flashMessage') ?>


<?php if (count($landingPages) > 0): ?>
<table class="table">
<thead>
	<tr>
		<th>Nom</th>
		<th>URL</th>
		<th>Actions</th>
	</tr>
</thead>
<tbody>
<?php foreach($landingPages as $landing): ?>
<tr>
	<td><?php echo $landing->getName() ?></td>
	<td><?php echo $landing->getUrl() ?></td>
	<td>
		<a href="<?php echo url_for('@landing_show?id='.$landing->getId()) ?>" class="btn">Voir</a>
		<a href="<?php echo url_for('@landing_edit?id='.$landing->getId()) ?>" class="btn">Modifier</a>
		<a href="<?php echo url_for('@landing_delete?id='.$landing->getId()) ?>" class="btn btn-danger">Supprimer</a>
	</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<?php else: ?>
<p>Aucune page d'atterrissage n'a &eacute;t&eacute; cr&eacute;&eacute;e</p>
<?php endif; ?>



<?php
switch (count($landingTemplates)) {
    case 0:
        break;
    case 1:
    	echo '<form name="landing" action="'.url_for('landing_add').'">';
        foreach($landingTemplates as $templateKey => $templateName) {
            printf('<input type="hidden" name="template" value="%s" />', $templateKey);
        }
        echo '<input type="submit" class="btn btn-primary" value="Ajouter une nouvelle page" />';
    	echo '</form>';
        break;
    default:
    	echo '<form name="landing" action="'.url_for('landing_add').'">';
    	echo '<select name="template">';
        foreach($landingTemplates as $templateKey => $templateName) {
            printf('<option value="%s">%s</option>', $templateKey, $templateName);
        }
        echo '</select>';
        echo '<input type="submit" class="btn btn-primary" value="Ajouter" />';
		echo '</form>';
}

?>


