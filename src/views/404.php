<?php ob_start() ?>
<h1>404</h1>

<a href="/">Retour à l'accueil</a>

<?php
render('default', true, [
	'title' => 'Error',
	'css' => '404',
	'content' => ob_get_clean(),
]);
?>