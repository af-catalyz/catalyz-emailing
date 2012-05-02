<div class="page-header">
<h1>
<?php printf('<img src="http://www.gravatar.com/avatar/%s?s=60&amp;d=mm" class="pull-left" style="margin-right: 10px;" />', md5('sh@catalyz.fr')); ?>

Sébastien Hordeaux
<small>Catalyz</small>
<a href="" class="btn btn-mini">modifier</a>
</h1>
<h3>
<small>
	<a href="mailto:sh@catalyz.fr"><u class="icon-envelope"></u></a>
	sh@catalyz.fr
</small>
	<span class="label label-success">Fournisseurs (potentiels)</span>
	<span class="label label-info">Réseau</span>
	<span class="label">Etude marché</span>

</h3>

</div>

    <div class="tabbable">
    <ul class="nav nav-tabs">
    <li class="active"><a href="#1" data-toggle="tab">Historique</a></li>
    <li><a href="#2" data-toggle="tab">Informations détaillées</a></li>
    </ul>
    <div class="tab-content">
    <div class="tab-pane active" id="1">

    <div class="alert alert-danger">
    Ce contact c'est désinscrit le 10/04/2012 à 12:35 suite à la campagne <a href="">Campagne 2</a>.
	<a href="" class="btn btn-mini">Réactiver ce contact</a>
    </div>


    <table class="table table-striped">
    <thead>
    <tr>
    <th>Campagne</th>
    <th>Envoyée le</th>
    <th>Ouverte le</th>
    <th>Clics</th>
    <th>Bounce</th>
    <th>Désinscrit le</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <td>
    	<a href="">Copie de Copie de Invitation PtiDej de la com 13 avril - RELANCE NO</a>
    	<a class="btn btn-mini" data-toggle="modal" href="#myModal2" >renvoyer</a>
    </td>
    <td>02/04/2012</td>
    <td>02/04/2012</td>
    <td>
    	<span class="badge">2</span>
    	<a class="btn btn-mini" data-toggle="modal" href="#myModal" >détails</a>
	</td>
    <td>-</td>
    <td>
    	10/04/2012
	</td>
    </tr>
    <tr>
    <td>
    	<a href="">Campagne 1</a>
    	<a class="btn btn-mini" data-toggle="modal" href="#myModal2" >renvoyer</a>
    </td>
    <td>02/04/2012</td>
    <td>02/04/2012</td>
    <td>
    	<span class="badge">2</span>
    	<a class="btn btn-mini" data-toggle="modal" href="#myModal" >détails</a>
	</td>
    <td>02/04/2012 <span class="badge badge-error">HARD</span></td>
    <td>

       	<a href="" class="btn btn-danger btn-mini">désinscrire</a>
	</td>
    </tr>
    <tr>
    <td>
    	<a href="">Campagne 1</a>
    	<a class="btn btn-mini" data-toggle="modal" href="#myModal2" >renvoyer</a>
    </td>
    <td>02/04/2012</td>
    <td>02/04/2012</td>
    <td>
    	<span class="badge">2</span>
    	<a class="btn btn-mini" data-toggle="modal" href="#myModal" >détails</a>
	</td>
    <td>02/04/2012 <span class="badge badge-warning">SOFT</span></td>
    <td>

       	<a href="" class="btn btn-danger btn-mini">désinscrire</a>
	</td>
    </tr>
    </tbody>
    </table>

    </div>
    <div class="tab-pane" id="2">

<form class="form-horizontal">
<div class="span5">
	<?php for ($i = 0; $i < 5; $i++) : ?>


	<div class="control-group">
		<label class="control-label">Champ n°<?php echo $i+1; ?></label>
		<div class="controls">
			<span class="input-xlarge uneditable-input"></span>
		</div>
	</div>
	<?php endfor; ?>
</div>

<div class="span5">
	<?php for ($i = 5; $i < 10; $i++) : ?>


	<div class="control-group">
		<label class="control-label">Champ n°<?php echo $i+1; ?></label>
		<div class="controls">
			<span class="input-xlarge uneditable-input"></span>
		</div>
	</div>
		<?php endfor; ?>
</div>

</form>

    </div>
    </div>
    </div>

    <div class="modal fade" id="myModal" style="display: none">
    <div class="modal-header">
    <a class="close" data-dismiss="modal">×</a>
    <h3>Détail des clicks</h3>
    </div>
    <div class="modal-body">
	<p><strong>Sébastien Hordeaux</strong> a clické sur les liens suivants de la campagne <a href="">Campagne 1</a>:</p>
    <table class="table table-condensed">
    <thead>
    	<tr>
    		<th>Lien</th>
    		<th>Click le</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><a href="" target="_blank">Lien 1</a></td>
			<td>02/04/2012 à 12:37</td>
		</tr>
		<tr>
			<td><a href="" target="_blank">Lien 2</a></td>
			<td>02/04/2012 à 12:37</td>
		</tr>
	</tbody>
	</table>

    </div>
    <div class="modal-footer">
    <a href="#" class="btn btn-primary">Fermer</a>
    </div>
    </div>

    <div class="modal fade" id="myModal2" style="display: none">
    <div class="modal-header">
    <a class="close" data-dismiss="modal">×</a>
    <h3>Renvoi de campagne</h3>
    </div>
    <div class="modal-body">
	<p>Souhaitez-vous renvoyer la campagne <strong>Campagne 1</strong> à <strong>Sébastien Hordeaux</strong>?</p>

	<p class="muted">Vous pouvez également transmettre le lien suivant à votre campagne pour consulter la campagne en ligne avec ses informations de personnalisations spécifiques:</p>
	<pre class="muted">http://kreactiv.catalyz-emailing.com/foo/bar/dsdnfqjdqsiojdsqo</pre>
    </div>
    <div class="modal-footer">
    <a href="#" class="btn">Non, ne pas renvoyer la campagne</a>
    <a href="#" class="btn btn-primary">Oui, renvoyer la campagne</a>
    </div>
    </div>

