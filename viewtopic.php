<?php

// php.ini configuration
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// start state-saving session (requires cookies)
session_start();

require_once("control/DiscussionController.php");

$controller = new DiscussionController();

// get the current topic
$topicId = isset($_GET['topic_id']) ? (int)$_GET['topic_id'] : 0;

if (isset($_GET['topic_id'])) {
    $controller->showMessages((int)trim($_GET['topic_id']));
} else {
    die("<p>Topic not found.</p>");
}

?>
