<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertPainterBtn'])) {

	$query = insertPainter($pdo, $_POST['firstName'], 
		$_POST['lastName'], $_POST['dateOfBirth'], $_POST['artStyle'], $_POST['livePaintingSkill']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Insertion failed";
	}

}


if (isset($_POST['editPainterBtn'])) {
	$query = updatePainter($pdo,$_POST['firstName'], 
		$_POST['lastName'], $_POST['dateOfBirth'], $_POST['artStyle'], $_POST['livePaintingSkill'], $_GET['painter_id']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Edit failed";
	}

}




if (isset($_POST['deletePainterBtn'])) {
	$query = deletePainter($pdo, $_GET['painter_id']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Deletion failed";
	}
}




if (isset($_POST['insertNewPaintingBtn'])) {
	$query = insertPainting($pdo, $_POST['paintingName'], $_POST['canvasSize'], $_POST['paintUsed'], $_GET['painter_id'], $_POST['price']);

	if ($query) {
		header("Location: ../viewpaintings.php?painter_id=" .$_GET['painter_id']);
	}
	else {
		echo "Insertion failed";
	}
}




if (isset($_POST['editPaintingBtn'])) {
	$query = updatePainting($pdo, $_POST['paintingName'], $_POST['canvasSize'], $_POST['paintUsed'], $_POST['price'], $_GET['painting_id']);

	if ($query) {
		header("Location: ../viewpaintings.php?painter_id=" .$_GET['painter_id']);
	}
	else {
		echo "Update failed";
	}

}




if (isset($_POST['deletePaintingBtn'])) {
	$query = deletePainting($pdo, $_GET['painting_id']);

	if ($query) {
		header("Location: ../viewpaintings.php?painter_id=" .$_GET['painter_id']);
	}
	else {
		echo "Deletion failed";
	}
}




?>



