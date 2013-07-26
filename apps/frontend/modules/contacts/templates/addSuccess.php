<div class="tabbable">
    <ul class="nav nav-tabs">
    <li class="active"><a href="#1" data-toggle="tab">Ajouter un contact</a></li>
    <li><a href="<?php echo url_for('@contact_import') ?>">Importer des contacts</a></li>
    <!--li><a href="#3" data-toggle="tab">processus d'importation</a></li-->
    </ul>
    <div class="tab-content">
    <div class="tab-pane active" id="1">


   	<form class="form-horizontal" action="<?php echo url_for('contacts/update') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php
    include_partial('contacts/form', array('form' => $form));
    printf('<div class="form-actions"><input type="submit" class="btn btn-primary" value="%s"/>&nbsp;<a href="%s" class="btn">Annuler</a></div>', __('Ajouter le contact'), url_for('@contacts')); ?>
    </form>

    </div>
    <!--div class="tab-pane" id="2">

    <form class="form-horizontal">

    <div class="control-group">
            <label class="control-label" for="fileInput">Fichier à importer</label>
            <div class="controls">
              <input class="input-file" id="fileInput" type="file">
            </div>
          </div>

    <div class="form-actions">
    	<a href="" class="btn btn-primary">Importer le fichier</a>
    	<a href="" class="btn">Annuler</a>
	</div>
    </form>

    </div>
    <div class="tab-pane" id="3">

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
		<a href="" class="btn btn-success">Voir la liste des contacts</a>
		<a href="" class="btn">Importer un autre fichier</a>

    	</div>


	</div-->
    </div>
    </div>