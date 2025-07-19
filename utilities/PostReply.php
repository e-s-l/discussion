<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();

$baseDir = $_SERVER['DOCUMENT_ROOT'];
$dataDir = $baseDir."/data";

// var_dump((int)$_POST['topic_id']);

$topicId = isset($_POST['topic_id']) ? (int)$_POST['topic_id'] : 0;
$name = trim($_POST['name']);
$_SESSION["user"] = $name;

$message = str_replace(array("\r\n", "\r", "\n"), "<br/>", trim($_POST['message']));

$timestamp = time();

if ($name === '' || $message === '') {
    echo "<p>All fields must be filled.</p>";
    echo "<p><a href=\"viewtopic.php?topic_id=$topicId\">Go Back</a></p>";
    exit;
}

$replyLine = "$name~$message~$timestamp\n";
file_put_contents($dataDir."/topic_$topicId.txt", $replyLine, FILE_APPEND);

header("location:../viewtopic.php?topic_id=$topicId");
exit;

?>
