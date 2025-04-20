<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

$topicsFile = "messages/topics.txt";

if (isset($_POST["topic"])) {
    $topicIndex = (int)$_POST["topic"] - 1;

    if (file_exists($topicsFile) && filesize($topicsFile) > 0) {

        $topics = file($topicsFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if (isset($topics[$topicIndex])) {
            unset($topics[$topicIndex]);
            $topics = array_values($topics);
            $newTopics = implode("\n", $topics)."\n";
            $topicStore = fopen($topicsFile, "w");
            fwrite($topicStore, "$newTopics");
            fclose($topicStore);
            
            $topicFile = "messages/topic_" . ($topicIndex + 1) . ".txt";
            if (file_exists($topicFile)) {
                unlink($topicFile);
            }
        } else {
            die("Critical failure.");
        }
    }

    header("location:index.php");
    exit;

} else {
    die("Invalid request.");
}

?>
