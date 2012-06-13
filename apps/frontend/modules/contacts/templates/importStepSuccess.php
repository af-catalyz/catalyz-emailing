<div class="tabbable">
    <ul class="nav nav-tabs">
    <li ><a href="<?php echo url_for('contacts/add') ?>">Ajouter un contact</a></li>
    <li class="active"><a href="#1" data-toggle="tab">Importer des contacts</a></li>
    </ul>
    <div class="tab-content">
    <div class="tab-pane active" id="1">





       	<ul class="unstyled">
    		<li><u class="icon-ok"></u> Validation du format du fichier</li>
    		<li><u class="icon-ok"></u> Détermination du nombre de contacts à importer</li>
		</ul>

        <div class="progress progress-striped active">
    		<div class="bar" style="width: 40%;"></div>
    	</div>
		<p>Importation du contact 41/108...</p>


		<hr />
		cas ko:

        <div class="alert alert-success">
		<h4 class="alert-heading">Importation terminée.</h4>

		18 contacts ont étés ajoutés et 80 contacts ont étés mis à jour.
    	</div>

        <div class="alert alert-error">
		<h4 class="alert-heading">10 contacts n'ont pas étés importés</h4>
<p>Voici le détail des erreurs recontrées:</p>
			<table class="table table-bordered table-condensed">
			<thead>
				<tr>
					<th>Ligne</th>
					<th>Erreur</th>
					<th>Diagnostic</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>12</td>
					<td>L'email <strong>foo@wanadoo</strong> n'est pas valide</td>
					<td>Le domaine "wanadoo" est incorrect, vérifiez sa validité. Il doit comporter 2 parties, exemple: "domaine.com" et non "domaine".</td>
				</tr>
				<tr>
					<td>15</td>
					<td>L'email <strong>foo@fre.fr</strong> n'est pas valide</td>
					<td>Le domaine "fre.fr" ne possède pas de compte "foo".</td>
				</tr>
				<tr>
					<td>38</td>
					<td>Aucune adresse email n'est spécifiée</td>
					<td>-</td>
				</tr>
			</tbody>
			</table>
			<a href="" class="btn btn-danger">Télécharger la liste des contacts qui n'ont pas pu être importés</a>
    	</div>

			<hr />
		cas ok

        <div class="alert alert-success">
		<h4 class="alert-heading">Importation terminée.</h4>

		<p>18 contacts ont étés ajoutés et 90 contacts ont étés mis à jour.</p>
	<a href="<?php echo url_for('@contacts') ?>" class="btn btn-success">Voir la liste des contacts</a>
		<a href="<?php echo url_for('contacts/import') ?>" class="btn">Importer un autre fichier</a>

    	</div>


	</div>
    </div>
    </div>