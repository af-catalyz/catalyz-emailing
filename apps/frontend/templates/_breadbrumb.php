<ul class="breadcrumb">
<?php

$items = array_merge(array('Accueil' => '@homepage'), $items->getRawValue());

foreach($items as $caption => $url) {
    printf('<li><a href="%s">%s</a> <span class="divider">/</span>', url_for($url), $caption);
}
printf('<li class="active">%s</li>', $active)

?>
</ul>
