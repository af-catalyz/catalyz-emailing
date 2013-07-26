<div class="page-header">
	<h1>Gestion des modèles de campagnes</h1>
</div>



		<?php include_partial('global/flashMessage') ?>

			<table class="table table-striped">
				<thead>
					<tr>
						<th class="span2">Visuel</th>
						<th>Nom</th>
						<th class="span6">Actions</th>
					</tr>
				</thead>
				<tbody>


				<?php
		foreach ($templates as /*(CampaignTemplate)*/$template){
			printf('<tr%s>', $template->getIsArchived()?' class="archived_elements"':'');

			$picture_src = 'http://placehold.it/80x60';
			if ($template->getPreviewFilename() && is_file(sfConfig::get('sf_web_dir').$template->getPreviewFilename())) {
				$picture_src = thumbnail_path($template->getPreviewFilename(), 80, 60);
			}

			printf('<td><img src="%s" alt="" class="pull-left" style="margin-right: 10px;" /></td>',$picture_src);
			printf('<td>%s<br/>%s</td>',$template->getName(), html_entity_decode($template->getStatusBadge(false)));
			echo '<td nowrap="nowrap">';
			if ($template->getIsArchived()) {
				printf('<a class="btn " href="%s"><i class="icon-star"></i>&nbsp;%s</a>', url_for('@template_do_unarchive?slug=' . $template->getSlug()),__("Restaurer ce modèle"));
			}else{
				printf('<a class="btn " href="%s"><i class="icon-share"></i>&nbsp;%s</a>', url_for('@campaigns_do_create?slug=' . $template->getSlug()),__("Créer une campagne avec ce modèle"));
				printf('&nbsp;<a class="btn " href="%s"><i class="icon-star-empty"></i>&nbsp;%s</a>', url_for('@template_do_archive?slug=' . $template->getSlug()),__("Archiver ce modèle"));
			}
			echo '</td>';
			echo '</tr>';
		}
		?>


				</tbody>
			</table>

