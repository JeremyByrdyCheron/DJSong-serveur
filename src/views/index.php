<?php ob_start() ?>

<h1>Acceuil</h1>

<input id="user" type="text" name="" id="">
<small id="userError"></small>

<?php
render('default', true, [
	'title' => 'Acceuil',
	'css' => 'index',
	'content' => ob_get_clean(),
]);
?>