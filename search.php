<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once($_SERVER['DOCUMENT_ROOT'].'/constants.php');

require_once(CONTROL_DIR.'/SearchController.php');

$query = isset($_GET['q']) ? $_GET['q'] : '';

$controller = new SearchController();
$controller->searchAndShow($query);

?>
