
    <div class="tabbable">


    <ul class="nav nav-tabs">
    <li class="active"><a href="#1" data-toggle="tab">Contacts</a></li>
    <li><a href="#2" data-toggle="tab">Groupes</a></li>
    </ul>
    <div class="tab-content">
    <div class="tab-pane active" id="1">



        <div class="span3" style="margin-left: 0px">

<form>
    <div class="well">

<!--
<div>
    <button type="submit" class="btn btn-primary">Filtrer</button>
    <button type="clear" class="btn">Annuler</button>
    </div>


    <ul class="nav nav-list" style="padding: 8px 0pt;"><li class="divider"></li></ul>
-->
 <label>Recherche dans les contacts     <a href="" class="" rel="popover"
 	 title="La recherche sera effectuée dans tous les champs des contacts (Prénom, Nom, Société, Email, Genre, Champ personnalisé n°2, Champ personnalisé n°3, Champ personnalisé n°4, Champ personnalisé n°8, Champ personnalisé n°6, Champ personnalisé n°7, Champ personnalisé n°9, Champ personnalisé n°10). "
 	  ><i class="icon-question-sign"></i></a>
</label>

<div class="controls">
              <div class="input-append"><input class="span2" type="text" size="16" placeholder="Indiquer le texte cherché ici" /><a href="" class="btn" style="margin-top: -9px;"><u class="icon-remove"></u></a></div>
            </div>

    <ul class="nav nav-list" style="padding: 8px 0pt;"><li class="divider"></li></ul>
	<label class="checkbox"><input type="checkbox" checked="checked" /> <u class="icon-ok"></u> Actifs</label>
	<label class="checkbox">
		<input type="checkbox" checked="checked" /> <u class="icon-remove"></u> Inactif suite à une erreur sur
	</label>
		<select>
			<option>n'importe quelle campagne</option>
			<option>Copie de Campagne 4 - relance</option>
			<option>Campagne 4</option>
		</select>
	<label class="checkbox">
		<input type="checkbox" checked="checked" /> <u class="icon-off"></u> Désinscrit suite à
	</label>
		<select>
			<option>n'importe quelle campagne</option>
			<option>Copie de Campagne 4 - relance</option>
			<option>Campagne 4</option>
		</select>


    <ul class="nav nav-list" style="padding: 8px 0pt;"><li class="divider"></li></ul>
	<label>Groupes (<a href="">tous</a> / <a href="">aucun</a>)</label>
	<label class="checkbox"><input type="checkbox" checked="checked"> <span class="label label-success">Salariés (d'entreprises clientes)</span> <a href="" class="" rel="popover" title="description du groupe"><i class="icon-question-sign"></i></a></label>
	<label class="checkbox"><input type="checkbox" checked="checked"> <span class="label label-success">P'tit Dej de Janvier - Relance</span></label>
	<label class="checkbox"><input type="checkbox" checked="checked"> <span class="label">Fournisseurs (potentiels)</span></label>
	<label class="checkbox"><input type="checkbox" checked="checked"> <span class="label">Réseau</span></label>
	<label class="checkbox"><input type="checkbox" checked="checked"> <span class="label">Etude marché</span></label>



      </div>
    </form>

    <p>Vous pouvez <a href="">sélectionner les informations des contacts à afficher dans la liste</a> depuis vos préférences.</p>
	</div>



<?php $badges = array('ok', 'ok', 'ok', 'ok', 'ok', 'remove', 'off'); ?>

<div class="span9">




	    <table class="table table-striped table-condensed">
	    <thead>
	    <tr>
	    <th>Etat</th>
	    <th>Nom complet</th>
	    <th>Société</th>
	    <th>Ajouté le</th>
	    <th>Groupes</th>
	    <th>Actions</th>
	    </tr>
	    </thead>
	    <tbody>
<?php for ($i = 0; $i < 15; $i++) { ?>

	    <tr>
	    <td nowrap="nowrap"><i class="icon-<?php echo $badges[rand(0,count($badges) - 1)]; ?>"></i></td>
	    <td nowrap="nowrap"><a href="<?php echo url_for('contacts/show') ?>">Sébastien Hordeaux</a> <a href="mailto:sh@catalyz.fr"><i class="icon-envelope"></i></a></td>
	    <td nowrap="nowrap">Catalyz</td>
	    <td nowrap="nowrap">02/04/2012</td>
	    <td>
	    <?php if(!rand(0, 3)): ?><a href=""><span class="label label-success">Salariés (d'entreprises clientes)</span></a><?php endif; ?>
	    <?php if(!rand(0, 3)): ?><a href=""><span class="label label-success">P'tit Dej de Janvier - Relance</span></a><?php endif; ?>
	    <?php if(!rand(0, 3)): ?><a href=""><span class="label">Fournisseurs (potentiels)</span></a><?php endif; ?>
	    <?php if(!rand(0, 3)): ?><a href=""><span class="label">Réseau</span></a><?php endif; ?>
	    <?php if(!rand(0, 3)): ?><a href=""><span class="label">Etude marché</span></a><?php endif; ?>


		</td>
	    <td nowrap="nowrap">
	    		    <div class="btn-group">
		    	<a class="btn dropdown-toggle btn-mini" data-toggle="dropdown" href="#">
			    	Action
			    	<span class="caret"></span>
		    	</a>
		    	<ul class="dropdown-menu">
			    	<li><a href=""><i class="icon-eye-open"></i> Détails</a></li>
			    	<li><a href=""><i class="icon-edit"></i> Modifier</a></li>
			    	<li><a href=""><i class="icon-remove-circle"></i> Supprimer</a></li>
			    </ul>
		    </div>


		</td>
	    </tr>
	<?php } ?>

	    </tbody>
	    </table>
<div class="pull-left">


	<a href="<?php echo url_for('contacts/add'); ?>" class="btn btn-primary"><i class="icon-plus icon-white"></i> Ajouter des contacts</a>
		<a href="#2" class="btn"><i class="icon-download"></i> Télécharger les contacts</a>

</div>
<div  class="pagination pagination-right">
    <ul>
    <li class="active"><a href="#">&laquo;</a></li>
    <li class="active">
    <a href="#">1</a>
    </li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">&raquo;</a></li>
    </ul>
</div>

<p>Les contacts 1 à 15 (sur 1027 au total) sont affichés ci-dessus.
<select class="input-mini"><option>15</option><option>30</option><option>50</option><option>100</option></select> contacts par page.</p>
</div>
    </div>
    <div class="tab-pane" id="2">

    <div class="span2">

    </div>
    </div>
    </div>



