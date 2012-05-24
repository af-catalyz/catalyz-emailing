<div class="page-header">
	<h1>Configuration</h1>
</div>

<div class="tabbable tabs-left">
<ul class="nav nav-tabs">
	<li><a href="<?php echo url_for('@settings') ?>">Utilisateurs</a></li>
	<li><a href="<?php echo url_for('@settings_contact_list') ?>">Liste des contacts</a></li>
	<li><a href="<?php echo url_for('@settings_custom_fields') ?>">Champs personnalisés</a></li>
	<li class="active"><a href="#1" data-toggle="tab">Désabonnement</a></li>
</ul>

<div class="tab-content span9">
<div class="tab-pane active" id="1">

<table class="table table-striped">
<thead>
<tr>
<th>Nom</th>
<th>Email</th>
<th>Identifiant</th>
<th>Dernière connexion</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<tr>
<td>Sébastien Hordeaux</td>
<td><a href="mailto:">sh@catalyz.fr</a></td>
<td>shordeaux</td>
<td>05/04/2012 22:36</td>
<td>
<a href="" class="btn">Modifier</a>
<a href="" class="btn btn-danger">Supprimer</a>
</td>
</tr>
</tbody>
</table>

</div>
</div>
</div>