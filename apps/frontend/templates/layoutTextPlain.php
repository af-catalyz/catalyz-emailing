<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo sfConfig::get('sf_default_culture') ?>" lang="<?php echo sfConfig::get('sf_default_culture') ?>">
<head>

<?php

include_http_metas();
include_metas();
include_title();

//use_stylesheet('smoothness/jquery-ui-1.7.2.custom.css');
//
//use_javascript('jquery-1.5.1.min.js');
//use_javascript('jquery-ui-1.8.12.custom.min.js');

?>

</head>
<body style="margin: 0; padding: 0">
<?php echo $sf_content; ?>

</body>
</html>