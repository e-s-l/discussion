<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

$topicId = isset($_GET['topic_id']) ? (int)$_GET['topic_id'] : 0;
$topicFile = "../data/topic_$topicId.txt";


if (file_exists($topicFile) && filesize($topicFile) > 0) {

    $messages = file($topicFile);

    $timestamps = [];

    foreach ($messages as $msg) {
        $parts = explode("~", trim($msg));
        $timestamps[] = isset($parts[2]) ? (int)$parts[2] : 0;
    }

    array_multisort($timestamps, SORT_DESC, $messages);

    $NewMessages = implode($messages);

    $MessageStore = fopen($topicFile, "w");
    fwrite($MessageStore, "$NewMessages");
    fclose($MessageStore);
}

header("location:../viewtopic.php?topic_id=$topicId");
exit;

?>
