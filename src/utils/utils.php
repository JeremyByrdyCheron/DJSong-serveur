<?php
function redirectTo($path)
{
	header('Location: ' . $path);
}

function render($path, $template = false, $data = [])
{
	extract($data);
	if ($template) {
		require "templates/$path.php";
	} else {
		require "views/$path.php";
	}
}
