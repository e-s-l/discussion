<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();

$topicId = isset($_POST['topic_id']) ? (int)$_POST['topic_id'] : 0;
$name = trim($_POST['name']); // assuming is required
$_SESSION["user"] = $name;

$message = str_replace(array("\r\n", "\r", "\n"), "<br/>", trim($_POST['message']));

//$message = trim($_POST['message']);

$timestamp = time();

if ($topicId < 1 || $name === '' || $message === '') {
    echo "<p>All fields must be filled.</p>";
    echo "<p><a href=\"ViewDiscussion.php\">Go Back</a></p>";
    exit;
}

$replyLine = "$name~$message~$timestamp\n";
file_put_contents("messages/topic_$topicId.txt", $replyLine, FILE_APPEND);

header("Location: viewtopic.php?topic_id=$topicId");
exit;
