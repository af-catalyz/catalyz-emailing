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

			echo '<td>';
			echo link_to('Modifier', '@settings_edit_user?id=' . $usr->getId(), array('class' => 'btn', 'title' => 'Modifier cet utilisateur'));
			if ($sf_user->getProfile()->getId() != $usr->getId()) {
				echo '&nbsp;'.link_to('Supprimer', '@settings_do_delete_user?id=' . $usr->getId(), array('class' => 'btn btn-danger','title'=>sprintf('Supprimer l\'utilisateur "%s"',$usr->getFullName()),'post' => true, 'confirm' => sprintf("Vous êtes sur le point de supprimer l'utilisateur \"%s\".\nCette action est définitive et ne peut pas être annulée.\n\nCliquez sur OK pour confirmer la suppression définitive de cet utilisateur.\nCliquez sur Annuler pour conserver cet utilisateur.", $usr->getFullName(),$usr->getFullName())));
			}
			echo '</td>';

			echo '</tr>';
		}
		?>


				</tbody>
			</table>

