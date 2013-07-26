<div class="page-header">
	<h1>Gestion des utilisateurs
		<a href="<?php echo url_for('@settings_add_user') ?>" class="btn btn-primary pull-right">Ajouter un utilisateur</a>
	</h1>
</div>



		<?php include_partial('global/flashMessage') ?>

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


				<?php
		foreach ($userList as /*(sfGuardUserProfile)*/$usr){
			echo '<tr>';
			printf('<td>%s</td>',$usr->getFullName());
			printf('<td><a href="mailto:%1$s">%1$s</a></td>',$usr->getEmail());
			printf('<td>%s</td>',$usr->getsfGuardUser()->getUsername());
			printf('<td>%s</td>',CatalyzDate::formatShortWithTime(strtotime($usr->getsfGuardUser()->getLastLogin())));
			printf('<td nowrap="nowrap"><div class="btn-group"><a class="btn dropdown-toggle btn-mini" data-toggle="dropdown" href="#">%s&nbsp;<span class="caret"></span></a>
												    	<ul class="dropdown-menu">
													    	<li>%s</li>
													    	%s
													    </ul>
												    </div>
												</td>',
			__('Action'),
			link_to(sprintf('<i class="icon-edit"></i> %s</a>', __('Modifier')), '@settings_edit_user?id=' . $usr->getId(), array('title' => __('Modifier cet utilisateur'))),
			$sf_user->getProfile()->getId() != $usr->getId()?sprintf('<li>%s</li>', link_to(sprintf('<i class="icon-remove-circle"></i> %s</a>', __('Supprimer')), '@settings_do_delete_user?id=' . $usr->getId(),array('title' => sprintf('Supprimer l\'utilisateur "%s"',$usr->getFullName()), 'post' => true, 'confirm' => sprintf("Vous êtes sur le point de supprimer l'utilisateur \"%s\".\nCette action est définitive et ne peut pas être annulée.\n\nCliquez sur OK pour confirmer la suppression définitive de cet utilisateur.\nCliquez sur Annuler pour conserver cet utilisateur.", $usr->getFullName(),$usr->getFullName())))):''
			);
			echo '</tr>';
		}
		?>


				</tbody>
			</table>

