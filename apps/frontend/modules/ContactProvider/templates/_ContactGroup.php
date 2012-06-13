<h2>Ajouter à la liste des destinataires, les contacts de certains groupes</h2>
<?php echo form_tag('@campaign-target-add-provider?slug='.$campaign->getSlug().'&provider='.$providerName, array('method' => 'POST')) ?>

			<?php if ($alreadySelectedGroups): $alreadySelectedGroups = $alreadySelectedGroups->getRawValue()?>

					<?php printf('<p class="hint">Les contacts d%s groupe%s %s sont déjà cible de cette campagne.</p>', count($alreadySelectedGroups) > 1?'es':'u', count($alreadySelectedGroups) > 1?'s':'', implode(', ', $alreadySelectedGroups)) ?>
					<?php foreach($alreadySelectedGroups as $alreadySelectedGroup){
						printf('<input type="hidden" name="groups[]" value="%s" />', $alreadySelectedGroup->getId());
					} ?>


			<?php endif ?>

			<p>Sélectionnez les groupes que vous souhaitez ajouter à la liste des destinataires de la campagne:</p>

				<?php
				foreach ($groups->getRawValue() as $k => /*ContactGroup*/$group) {
					printf('<label class="checkbox"><input class="group" type="checkbox" name="groups[]" id="groupCheckbox%1$d" value="%1$d"/>%2$s</label>', $group->getId(), html_entity_decode($group->getColoredName()));
				}
				?>

			<br />
			<input class="btn btn-primary" type="submit" name="Add" value="Ajouter" />

</form>
