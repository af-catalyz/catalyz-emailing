<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>


    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
   <!--[if lt IE 9]>
		<script src="/js/html5.js"></script>
    <![endif]-->
		<script type="text/javascript" src="/js/jquery.js"></script>
		<script type="text/javascript" src="/js/jquery-ui-1.8.20.custom.min.js"></script>
		<link rel="stylesheet" href="/css/ui-lightness/jquery-ui-1.8.20.custom.css" />

    <!-- Le fav and touch icons
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    -->
  </head>

  <body>
   	<?php //include_partial('global/header'); ?>
	<div class="container">
		<?php echo $sf_content ?>
	</div> <!-- /container -->
    <?php include_javascripts() ?>

  </body>
</html>