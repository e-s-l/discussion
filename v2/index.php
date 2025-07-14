<?php

// php.ini configuration
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// start state-saving session (requires cookies)
session_start();

// if the name is already saved, use it
$namePrefill = $_SESSION['user'] ?? '';

// dir structure
$baseDir = $_SERVER['DOCUMENT_ROOT']."/discussion_forum";
$dataDir = $baseDir."/data";

// files
$topicsFile = $dataDir."/topics.txt";

/*****************
the control logic
*****************/

require_once('models/MessageFactory.php');
require_once('models/TopicFactory.php');

$topics = TopicFactory::loadFromFile($topicsFile);

/*********
the views
**********/

// include the the page header
include('views/header.php');

// the table listing current topics
include('views/topics_list_view.php');

// the search and sort section
include('views/explore_view.php');

// the submission section
include('views/post_message_view.php');

// close up the html
include('views/footer.php');

// all this should really be the controller


?>
