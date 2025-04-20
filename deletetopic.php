<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

$topicIndex = isset($_POST["topic"]) ? (int)$_POST["topic"] - 1 : -1;
$topicsFile = "messages/topics.txt";

if (file_exists($topicsFile) && filesize($topicsFile) > 0) {

    if ($topicIndex < 0) {
        die("Invalid request.");
    }

    $topics = file($topicsFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    if (isset($topics[$topicIndex])) {
        unset($topics[$topicIndex]);
        $topics = array_values($topics);
        $newTopics = implode("", $topics);
        $topicStore = fopen($topicsFile, "w");
        fwrite($topicStore, "$newTopics");
        fclose($topicStore);
    } else {
        die("Critical failure.");
    }

}

header("location:index.php");
exit;
?>
