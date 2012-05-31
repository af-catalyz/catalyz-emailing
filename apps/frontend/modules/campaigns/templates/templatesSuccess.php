<div class="page-header">
	<h1>Gestion des modèles de campagnes</h1>
</div>



		<?php include_partial('global/flashMessage') ?>

			<table class="table table-striped">
				<thead>
					<tr>
						<th class="span2">Visuel</th>
						<th>Nom</th>
						<th class="span1">Actions</th>
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
			printf('<td nowrap="nowrap"><div class="btn-group"><a class="btn dropdown-toggle btn-mini" data-toggle="dropdown" href="#">%s&nbsp;<span class="caret"></span></a>
												    	<ul class="dropdown-menu">
													    	%s
													    	<li>%s</li>
													    </ul>
												    </div>
												</td>',
			__('Action'),
			!$template->getIsArchived()?
			link_to(sprintf('<li><i class="icon-share"></i> %s</a></li>', __("Créer une campagne avec ce modèle")), '@campaigns_do_create?slug=' . $template->getSlug(), array('title' => __('Créer une campagne avec ce modèle'))):'',
			$template->getIsArchived()?
			link_to(sprintf('<i class="icon-star"></i> %s</a>', __("Restaurer ce modèle")), '@template_do_unarchive?slug=' . $template->getSlug(), array('title' => __('Restaurer ce modèle'))):
			link_to(sprintf('<i class="icon-star-empty"></i> %s</a>', __("Archiver ce modèle")), '@template_do_archive?slug=' . $template->getSlug(), array('title' => __('Archiver ce modèle')))
			);
			echo '</tr>';
		}
		?>


				</tbody>
			</table>

