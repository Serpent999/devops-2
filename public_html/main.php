<!DOCTYPE html>
<html>
<head></head>
<body>
<?php
include("resources/library/APICall.php");
include("resources/library/MCAPI.php");
//Get data from custom search form
$search = $_POST["args"];
$api = new APICall("secrets.json");
$mc = new MCAPI($api, $search, 3);
$num_results = rand(0, 10);
$movies = $mc->generateMovies($num_results);

if (count(movies) > 0) {
	echo '<ol>';
	foreach ($movies as $movie) {
		echo '<li>';
		echo '<h2 class="title">' . $movie->title . '</h2>';
		echo '<p class="overview">' . $movie->overview . '</p>';
		echo '</li>';
	}
	echo '</ol>';
} else {
	echo '<span id="movie-error">Could not find any movies for ' . $search . '.</span>';
}
?>
</body>
</html>
