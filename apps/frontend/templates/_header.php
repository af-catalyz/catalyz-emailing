<?php //var_dump($sf_context->getModuleName()) ?>
<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php echo url_for('@homepage'); ?>">Catalyz Emailing</a>
          <div class="nav-collapse">
            <ul class="nav">
		    	<li class="divider-vertical"></li>
             <li<?php if($sf_context->getModuleName() == 'homepage'){echo ' class="active"';}?>><a href="<?php echo url_for('@homepage'); ?>">Accueil</a></li>
             <li class="dropdown<?php if(in_array($sf_context->getModuleName(), array('campaigns', 'campaign'))){echo ' active';}?>">

		    		<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		    			Campagnes<b class="caret"></b>
		    		</a>
			    	<?php echo CatalyzEmailing::getCampaignsMenu() ?>
		    	</li>
              <li<?php if($sf_context->getModuleName() == 'contacts'){echo ' class="active"';}?>><a href="<?php echo url_for('@contacts'); ?>">Contacts</a></li>
		    <?php if($sf_user->hasCredential('admin')): ?>
    		<li<?php if($sf_context->getModuleName() == 'fees'){echo ' class="active"';}?>><a href="<?php echo url_for('fees/index'); ?>">Routage</a></li>
     		  <li class="dropdown<?php if(in_array($sf_context->getModuleName(), array('settings'))){echo ' active';}?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
		    			Configuration
		    			<b class="caret"></b>
		    		</a>
			    	<ul class="dropdown-menu">
			    		<li><a href="<?php echo url_for('@settings'); ?>">Utilisateurs</a></li>
			    		<li><a href="<?php echo url_for('@settings_custom_fields'); ?>">Champs personnalisés</a></li>
			    		<li><a href="<?php echo url_for('@settings_unsubscribe'); ?>">Processus de désabonnement</a></li>
			    	</ul></li>
		    	<?php endif; ?>

            </ul>
		    <?php
		    if ($sf_user->isAuthenticated()):
					$profile = /*(sfGuardUserProfile)*/ $sf_user->getGuardUser()->getProfile();




				 ?>
				<ul class="nav pull-right">
		    	<li class="dropdown">
		    		<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		    			<i class="icon-user  icon-white"></i>
		    			<?php printf('%s', $profile->getFullName()); ?>
		    			<b class="caret"></b>
		    		</a>
			    	<ul class="dropdown-menu">
			    		<li><a href="<?php echo url_for('@settings_contact_list'); ?>"><i class="icon-cog"></i> Préférences</a></li>
			    		<li class="divider"></li>
			    		<li><a href="<?php echo url_for('@sf_guard_signout') ?>"><i class="icon-off"></i> Se d&eacute;connecter</a></li>
			    	</ul>
		    	</li>
		    </ul>
		    <?php endif ?>
            </div><!--/.nav-collapse -->

        </div>
      </div>
    </div>