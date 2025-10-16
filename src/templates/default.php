<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/style.css">
	<?php if (!empty($css)) { ?>
		<link rel="stylesheet" href="assets/css/<?= $css ?>.css">
	<?php } ?>
	<title>Document<?= isset($title) ? ' - ' . $title : '' ?></title>
</head>

<body>
	<main>
		<?= $content ?>
	</main>
</body>

</html>