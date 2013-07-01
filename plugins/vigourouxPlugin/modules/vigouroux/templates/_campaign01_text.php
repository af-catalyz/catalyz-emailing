<?php $renderer = new CatalyzEmailTextRenderer();

$parameters = unEscape($parameters);

$renderer->renderHeader1($parameters ['title']);

$renderer->renderHeader2($parameters ['editorial_title']);
$renderer->renderContent($parameters ['editorial_content']);

$renderer->renderSubitems($parameters ['products_content'], array(
'title' => 'Header2',
'content' => 'Content',
'link' => 'Content',
));

$renderer->renderHeader1($parameters ['news_title']);

$renderer->renderSubitems($parameters ['news_content'], array(
'title' => 'Header2',
'content' => 'Content',
'link' => 'Content',
));

$renderer->renderFooter($parameters ['footer']);

?>