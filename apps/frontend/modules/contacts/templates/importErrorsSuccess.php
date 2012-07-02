<div class="tabbable">
    <ul class="nav nav-tabs">
    <li ><a href="<?php echo url_for('contacts/add') ?>">Ajouter un contact</a></li>
    <li class="active"><a href="#1" data-toggle="tab">Importer des contacts</a></li>
    </ul>
    <div class="tab-content">
    <div class="tab-pane active" id="1">

		<?php
		if ($ok_message) {
			printf('<div class="alert alert-success">%s</div>', html_entity_decode($ok_message));
		}
    if ($ko_message) {
    	printf('<div class="alert alert-error">%s</div>', html_entity_decode($ko_message));
    }
  	?>



    <div class="alert alert-error">
			<?php
if (count($errorRows) > 1) {
	printf('<h4 class="alert-heading">%s contacts n\'ont pas étés importés</h4><p>Voici le détail des erreurs recontrées:</p>', count($errorRows));

}else{
	echo '<h4 class="alert-heading">Un contact n\'a pas été importé</h4><p>Voici le détail :</p>';
}
?>
			<table class="table table-bordered table-condensed">
			<thead>
				<tr>
					<th>Ligne</th>
					<th>Erreur</th>
					<th>Diagnostic</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($errors as $key => $rowIndex){
					echo '<tr>';
					printf('<td>%s</td>', $rowIndex);
					if (!empty($errorRows[$key][3])) {
						printf('<td>L\'email <strong>%s</strong> n\'est pas valide</td>', $errorRows[$key][3]);
						printf('<td>%s</td>', CatalyzEmailing::diagnosticEmail($errorRows[$key][3]));
					}else{
						printf('<td>Aucune adresse email n\'est spécifiée</td><td>-</td>');
					}
					echo '</tr>';
				} ?>
			</tbody>
			</table>
			<a href="<?php echo $filePath ?>" class="btn btn-danger">Télécharger la liste des contacts qui n'ont pas pu être importés</a>
			<a href="<?php echo url_for('@contact_import') ?>" class="btn">Importer un autre fichier</a>
    </div>

	</div>
    </div>
    </div>