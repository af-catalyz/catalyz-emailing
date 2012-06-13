<div class="tabbable">
<?php
printf('<a href="%s" class="btn btn-primary pull-right"><i class="icon-plus icon-white"></i> %s</a>',
url_for('groups/create'), __('Ajouter un groupe'));
?>
<ul class="nav nav-tabs">
	<?php printf('<li><a href="%s">%s</a></li>', url_for('@contacts'), __('Contacts')) ?>
	<li class="active"><a href="#1" data-toggle="tab">Groupes</a></li>
</ul>
<div class="tab-content">
	<div class="tab-pane active" id="1">

		<?php include_partial('global/flashMessage') ?>

		<?php if (count($contact_groupList) == 0): ?>
			<?php printf('<p>%s</p>', __("Aucun groupe n'a été créé.")) ?>
		<?php else: ?>
<table class="table table-striped table-condensed">
  <thead>
    <tr>
      <th>Nom</th>
      <th>Nombre contacts actifs </th>
      <th>Nombre contacts</th>
      <th>Testeurs
      	<a rel="tooltip-campaign-comment" href="#" data-original-title="En définissant un groupe comme étant un groupe de testeurs, vous pourrez facilement leur envoyer une campagne pendant la phase de mise au point."><i class="icon-question-sign"></i></a>
      </th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <?php

			foreach ($contact_groupList->getRawValue() as $state => $groupList){


				foreach ($groupList as/*(ContactGroup)*/ $contact_group){
					printf('<tr%s>', $state=='archived'?' class="archived_elements"':'');
					printf('<td>%s&nbsp;%s</td>', $state=='archived'?$contact_group->getName():html_entity_decode($contact_group->getColoredName()), html_entity_decode($contact_group->getCommentPopup()));
					echo '<td align="center">';
					if (!empty($groupsContactsDetails[$contact_group->getId()])) {
						$activeContactCount = $groupsContactsDetails[$contact_group->getId()]['valid'];
					}

					if ($activeContactCount > 0) {
						printf('<a href="%s">%d</a>', url_for('contacts/index?group=' . $contact_group->getId()), $activeContactCount);
					}else{
						echo '0';
					}
					echo '</td>';
					echo '<td align="center">';
					if (!empty($groupsContactsDetails[$contact_group->getId()])) {
						$contactCount = $groupsContactsDetails[$contact_group->getId()]['all'];
					}

					if ($contactCount > 0) {
						printf('<a href="%s">%d</a>', url_for('contacts/index?group=' . $contact_group->getId()), $contactCount);
					} else {
						echo '0';
					}
					echo '</td>';

					printf('<td align="center">%s</td>', $contact_group->getIsTestGroup()?'<i class="icon-ok-sign"></i>':'&nbsp;');

					printf('<td nowrap="nowrap"><div class="btn-group"><a class="btn dropdown-toggle btn-mini" data-toggle="dropdown" href="#">%s&nbsp;<span class="caret"></span></a>
													    	<ul class="dropdown-menu">
														    	<li>%s</li>
														    	<li>%s</li>
														    	<li>%s</li>
														    	<li>%s</li>
														    	<li>%s</li></ul></div></td>',
					__('Action'),
					link_to(sprintf('<i class="icon-download"></i> %s</a>', __('Exporter')), '@group_do_export?slug=' . $contact_group->getSlug(), array('title' => __('Exporter'))),
					link_to(sprintf('<i class="icon-signal"></i> %s</a>', __("Statistiques")), '@group_view?slug=' . $contact_group->getSlug(), array('title' => __("Statistiques"))),
					link_to(sprintf('<i class="icon-edit"></i> %s</a>', __("Modifier le groupe")), '@group_edit?slug=' . $contact_group->getSlug(), array('title' => __('Modifier le groupe'))),
					$state=="archived"?
					link_to(sprintf('<i class="icon-star"></i> %s</a>', __("Restaurer le groupe")), '@group_do_unarchive?slug=' . $contact_group->getSlug(), array('title' => __('Restaurer le groupe'))):
					link_to(sprintf('<i class="icon-star-empty"></i> %s</a>', __("Archiver le groupe")), '@group_do_archive?slug=' . $contact_group->getSlug(), array('title' => __('Archiver le groupe'))),
					link_to(sprintf('<i class="icon-remove-circle"></i> %s</a>', __('Supprimer le groupe')), '@group_do_delete?slug=' . $contact_group->getSlug(),array('title' => __('Supprimer le groupe'), 'post' => true, 'confirm' => sprintf(__("Vous êtes sur le point de supprimer le groupe de contacts \"%s\".\nCette action est définitive et ne peut pas être annulée.\nLes contacts associés à ce groupe ne seront pas supprimés, ils seront visibles comme ne faisant plus parti de ce groupe dans la liste des contacts.\n\nCliquez sur OK pour confirmer la suppression définitive de ce groupe.\nCliquez sur Annuler pour conserver ce groupe."), $contact_group->getName())))
					);



					echo '</tr>';
				}
			}

			 ?>
  </tbody>
</table>
				<?php endif; ?>
	</div>
</div>