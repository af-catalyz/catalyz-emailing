<p>Une nouvelle conversion a été effectuée sur votre site internet via "<?php echo $type ?>" avec les données suivantes:</p>
<table class="table table-bordered table-condensed">
	<thead>
		<tr>
			<th>Champ</th>
			<th>Valeur</th>
		</tr>
	</thead>
	<?php foreach($datas as $fieldName => $fieldValue): ?>
	<tr>
		<td><?php echo $fieldName; ?></td>
		<td><?php echo $fieldValue; ?></td>
	</tr>
	<?php endforeach; ?>
</table>