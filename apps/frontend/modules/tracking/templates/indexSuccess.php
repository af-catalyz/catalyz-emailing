<div class="page-header"><h1>Tracking</h1></div>

	<?php include_partial('global/flashMessage') ?>


<?php if (count($sessions) > 0): ?>
<table class="table">
<thead>
	<tr>
		<th>Date</th>
		<th>Utilisateur</th>
		<th>Historique</th>
	</tr>
</thead>
<tbody>
<?php foreach($sessions as /*(WebSession)*/$session): ?>
<tr>
	<td><?php echo $session->getCreatedAt('d/m/Y H:i:s') ?></td>
	<td><?php
	$contact = $session->getWebVisitor()->getContactId();
	if($contact){
		echo $contact;
	}
	?></td>
	<td>
		<ul><?php
	foreach($session->getWebPageAccesss() as /*(WebPageAccess)*/$webPageAccess){
		printf('<li>%s <a href="">%s</a></li>',$webPageAccess->getCreatedAt('d/m/Y H:i:s'), $webPageAccess->getWebPage()->getPath());
	}
	 ?></ul>
	</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<?php else: ?>
<p>Aucun visiteur n'a été enregistré.</p>
<?php endif; ?>





