<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 'On');

require("../resources/head.html");

$baseDir = $_SERVER['DOCUMENT_ROOT']."/discussion_forum";
$dataDir = $baseDir."/data";

if (empty($_POST['topic']) || empty($_POST['name']) || empty($_POST['message'])) {
    echo "<p>All fields must be filled.</p>";

} else {

    $topic = trim($_POST['topic']);
    $name = trim($_POST['name']);

    $_SESSION["user"] = $name;

    $message = str_replace(array("\r\n", "\r", "\n"), "<br/>", trim($_POST['message']));


    $timestamp = time();

    if (!is_dir($dataDir)) {
        mkdir($dataDir);
    }

    $topicsFile = $dataDir."/topics.txt";
    $duplicate = false;
    
    $topics = TopicFactory::loadFromFile($topicsFile);

    foreach ($topics as $i => $t) {

        $topicId = $i + 1;

        if (stripos($t->title, $topic) !== false) {
            $duplicate = true;
        }
        break;

    }

    if ($duplicate) {
        echo "<p>The topic already exists.</p>
        <p><a href=\"index.php\">Go Back</a></p>";
    } else {

        $messageFile = $dataDir."/topic_$topicIndex.txt";

        $postTopic = addslashes("$topic~$name~$timestamp\n");
        $postMessage = addslashes("$name~$message~$timestamp\n");

        $topicsStore = fopen("$topicsFile","a+");
        fwrite($topicsStore, "$postTopic");
        fclose($topicsStore);

        $messageStore = fopen($messageFile,"a+");
        fwrite($messageStore, "$postMessage");
        fclose($messageStore);

        header("location:../index.php");
        exit;
    }
}

?>
