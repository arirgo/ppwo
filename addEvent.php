<?php

// Connexion à la base de données
require_once('config.php');

//echo $_POST['title'];
if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){
	
	$title = $_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];
	$username = $_POST['userevent'];

	$sql = mysqli_query($koneksi,"INSERT INTO events(title, start, end, color , username) values ('$title', '$start', '$end', '$color', '$username')") or die (mysqli_error());
	//$req = $bdd->prepare($sql);
	//$req->execute();
	
	

}
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
