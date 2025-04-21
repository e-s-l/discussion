<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');


require_once('control/SearchController.php');


/*****************
the control logic
*****************/

$query = isset($_GET['q']) ? $_GET['q'] : '';

$controller = new SearchController();
$results = $controller->search($query);


/*********
the views
**********/

// the html header
require("resources/head.html");

// the the page header
include('views/header.php');

// the search results
include('views/search_results.php');

// the end
include('views/footer.php');

// all this should really be the controller


?>
