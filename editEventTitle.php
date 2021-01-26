<?php

require_once('config.php');
if (isset($_POST['delete']) && isset($_POST['id'])){
	
	
	$id = $_POST['id'];
	
	$sql = mysqli_query($koneksi,"DELETE FROM events WHERE id = $id") or die (mysqli_error());
	
} elseif (isset($_POST['title']) && isset($_POST['color']) && isset($_POST['id'])){
	
	$id = $_POST['id'];
	$title = $_POST['title'];
	$color = $_POST['color'];
	$username = $_POST['userevent'];
	
	$sql = mysqli_query($koneksi,"UPDATE events SET  title = '$title', color = '$color', username='$username' WHERE id = $id ") or die (mysqli_error());
}
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
