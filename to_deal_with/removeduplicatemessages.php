<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

if (isset($_GET["topic_id"])) {
    $topicId =  (int)$_GET["topic_id"];

    $filePath = "messages/topic_$topicId.txt";

    if (file_exists($filePath) && filesize($filePath) > 0) {
        $MessageArray = file($filePath);
        $MessageArray = array_unique($MessageArray);
        $MessageArray = array_values($MessageArray);
        $NewMessages = implode("", $MessageArray);
        file_put_contents($filePath, $NewMessages);
    }

    header("location:viewtopic.php?topic_id=$topicId");
    exit;

} else {
    die("invalid topic id.");
}

?>
