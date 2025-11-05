<?php

// the php.ini configuration
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// start state-saving session (requires cookies)
session_start();

// list of constants directory/urls paths
require_once($_SERVER['DOCUMENT_ROOT'].'/constants.php');

// the fat controller
require_once(CONTROL_DIR."/DiscussionController.php");
$controller = new DiscussionController();
$controller->showTopics();

?>
