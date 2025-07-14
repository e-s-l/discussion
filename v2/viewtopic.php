<?php

// php.ini configuration
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// start state-saving session (requires cookies)
session_start();

// if the name is already saved, use it
$namePrefill = $_SESSION['user'] ?? '';

/*****************
the control logic
*****************/

require_once('models/MessageFactory.php');
require_once('models/TopicFactory.php');

// load all topics
$topics = TopicFactory::loadFromFile('data/topics.txt');

// get the current topic
$topicId = isset($_GET['topic_id']) ? (int)$_GET['topic_id'] : 0;

if (!isset($topics[$topicId - 1])) {
    die("<p>Topic not found.</p>");
}

$topic = $topics[$topicId - 1];

// load all messages for this topic
$topicFile = "data/topic_{$topicId}.txt";
$messages = MessageFactory::loadFromFile($topicFile);

/********
the views
*********/

// include the the page header
include('views/header.php');

// the table listing messages within topic
include('views/show_messages.php');

// the search and sort section
include('views/explore_view.php');

// the reply section
include('views/post_reply_view.php');

// close up the html
include('views/footer.php');

// all this should really be the controller

?>
