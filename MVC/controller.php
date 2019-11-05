<?php

include_once("model.php");

if(isset($_GET['action'])) {
	switch($_GET['action']) {
		case "save":
			saveData($_POST['name'], $_POST['address'], $_POST['salary']);
			break;
		case "display":
			getData();
			break;
	}
}