<?php

//Rechercher pour totalement comprendre.

spl_autoload_register(
	function ($class) {
		if ($class === "Router") {
			include '../Router.php';
		} else if (strpos($class, "DAO") !== false) {
			require_once("Models/DAO/{$class}.php");
		} else if (strpos($class, "Controller") !== false) {
			require_once("Controllers/{$class}.php");
		} else {
			require_once("Models/Entities/{$class}.php");
		}
	}
);
