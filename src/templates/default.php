<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/style.css">
	<?php if (!empty($data['css'])) { ?>
		<link rel="stylesheet" href="assets/css/<?= $data['css'] ?>.css">
	<?php } ?>
	<title>Document<?= isset($data['title']) ? ' - ' . $data['title'] : '' ?></title>
</head>

<body>
	<main>
		<?= $data['content'] ?>
	</main>
</body>

</html>