<?php $customFields_dispos = CatalyzEmailing::getCustomFields(); ?>
<?php use_helper('Text') ?>




<div style="position:relative;" class="span9">

<div id="wait" style="display: none;">
	<p><?php echo __('Veuillez patienter pendant le chargement de la liste avec les éléments du filtre.') ?></p>
	<br/>
	<img src="/images/loader.gif" width="60" height="60" alt="" border="0" />
</div>

			  <table class="table table-striped table-condensed">
			    <thead>
				    <tr>
				    	<?php
				    	foreach ($menu->getRawValue() as $field=>$bool){
				    		if ($bool) {
				    			if ($field == 'GROUPS') {
				    				printf('<th>%s<br/><br/></th>',ContactPeer::getfieldLabel($field));
				    			}
				    			elseif(preg_match('/^CUSTOM([1-9][0-9]?)$/', $field, $tokens)){
				    				$tokens[1] = (int)$tokens[1];
				    				if (!empty($customFields_dispos['custom'.$tokens[1]])) {
				    					printf('<th>%s %s%s</th>',ContactPeer::getfieldLabel($field) ,displaySortIcon('A',$field,$sort,$column),displaySortIcon('De',$field,$sort,$column));
				    				}
				    			}
				    			else{
				    				printf('<th>%s %s%s</th>',ContactPeer::getfieldLabel($field) ,displaySortIcon('A',$field,$sort,$column),displaySortIcon('De',$field,$sort,$column));
				    			}
				    		}
				    	}

				    	printf('<th>%s<br/><br/></th>',__('Actions'));
				    	?>
				    </tr>
			    </thead>
			  	<tbody>
						<?php
				    	foreach ($pager->getResults() as/*(Contact)*/ $contact){
				    		echo '<tr>';

				    		foreach ($menu as $field=>$bool){
				    			if ($bool) {

				    				switch($field){
				    					case 'COMPANY':
				    						printf('<td>%s</td>',$contact->getFieldValue($field));
				    						break;
				    					case 'EMAIL':
				    						printf('<td nowrap="nowrap"><a href="mailto:%1$s">%2$s</a></td>',$contact->getFieldValue($field),highlight_text($contact->getFieldValue($field), $sf_user->getAttribute('Keywords')));
				    						break;
				    					case 'STATUS':
				    						printf('<td nowrap="nowrap" align="center">%s</td>',html_entity_decode($contact->getFieldValue($field)));
				    						break;
				    					case 'CREATED_AT':
				    						printf('<td nowrap="nowrap" align="center">%s</td>',$contact->getFieldValue($field));
				    						break;
				    					case 'GROUPS':
				    					case 'FULL_NAME':
				    						printf('<td nowrap="nowrap">%s</td>', html_entity_decode($contact->getFieldValue($field, $ContactsGroupListOverview)));
				    						break;
				    					default:
				    						if(preg_match('/^CUSTOM([1-9][0-9]?)$/', $field, $tokens)){
				    							$tokens[1] = (int)$tokens[1];
				    							if (!empty($customFields_dispos['custom'.$tokens[1]])) {
				    								printf('<td nowrap="nowrap">%s</td>',highlight_text(html_entity_decode($contact->getFieldValue($field)) , $sf_user->getAttribute('Keywords')));
				    							}
				    						}else{
				    							printf('<td nowrap="nowrap">%s</td>',highlight_text(html_entity_decode($contact->getFieldValue($field)), $sf_user->getAttribute('Keywords')));
				    						}
				    					} // switch
				    			}
				    		}
if ($sf_user->hasCredential('admin')) {
	printf('<td nowrap="nowrap"><div class="btn-group"><a class="btn dropdown-toggle btn-mini" data-toggle="dropdown" href="#">%s&nbsp;<span class="caret"></span></a>
			    						    	<ul class="dropdown-menu">
			    							    	<li>%s</li>
			    							    	<li>%s</li>
			    							    	<li>%s</li>
			    							    </ul>
			    						    </div>
			    						</td>',
	__('Action'),
	link_to(sprintf('<i class="icon-eye-open"></i> %s</a>', __('Détails')), '@contact_show?slug=' . $contact->getSlug(), array('title' => __('Voir les informations de ce contact'))),
	link_to(sprintf('<i class="icon-edit"></i> %s</a>', __('Modifier')), '@contact_edit?slug=' . $contact->getSlug(), array('title' => __('Modifier ce contact'))),
	link_to(sprintf('<i class="icon-remove-circle"></i> %s</a>', __('Supprimer')), '@contact_do_delete?slug=' . $contact->getSlug(),array('title' => __('Supprimer ce contact'), 'post' => true, 'confirm' => sprintf(__('Souhaitez vous supprimer le contact "%s" de façon définitive?'), $contact->getFullName())))
	);
}else{
	printf('<td nowrap="nowrap">%s</td>',

	link_to(sprintf('<i class="icon-eye-open"></i> %s</a>', __('Détails')), '@contact_show?slug=' . $contact->getSlug(), array('title' => __('Voir les informations de ce contact'), 'class' => 'btn btn-mini')));
}
				    		echo '</tr>';
				    	}
				    	?>
			  	</tbody>
			  </table>


		<?php
				    	//region bottom buttons
				    	printf('<div class="pull-left"><a href="%1$s" class="btn"><i class="icon-download"></i> Télécharger le%2$s contact%2$s</a></div>',
				    		url_for('@contact_export'), $pager->getNbResults()>1?'s':'');
				    	//endregion

				    	include_partial('global/pager', array('pager' => $pager, 'route_prefix' => url_for('@contacts'), 'sort' => $sort, 'column' => $column));
				    	?>

		<?php
				    	printf('<form class="form-inline" action="%s">', url_for('@settings_change_list_limit'));
				    	printf('<div class="clear"><br/></div><div class="controls">Les contacts %s à %s (sur %s au total) sont affichés ci-dessus.&nbsp;',
		$pager->getFirstIndice(),
		$pager->getLastIndice(),
		$pager->getNbResults()
		);
				    	$widget = new sfWidgetFormChoice(array('choices' => array(15=>'15',30=>'30',50=>'50',100=>'100')) , array('class' => 'input-mini', 'onchange' => 'submit();'));
				    	echo $widget->render('list_limit', $limit);
				    	echo '&nbsp;<label class="checkbox">contacts par page.</label></div>';
				    	echo '</form>';
				    	?>

		</div>