<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');


$topicId = isset($_POST["topic_id"]) ? (int)$_POST["topic_id"] : 0;
$topicFile = "messages/topic_$topicId.txt";


$messageIndex = isset($_POST["message_number"]) ? (int)$_POST["message_number"] - 1 : -1;

if (file_exists($topicFile) && filesize($topicFile) > 0) {

    if ($messageIndex < 0) {
        echo "$messageIndex";
        die("Invalid request.");
    }

    $messages = file($topicFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    if (isset($messages[$messageIndex])) {
        unset($messages[$messageIndex]);
        $messages = array_values($messages);
        $newMessages = implode("\n", $messages)."\n";
        $messageStore = fopen($topicFile, "w");
        fwrite($messageStore, "$newMessages");
        fclose($messageStore);
    } else {
        die("Message not found.");
    }

}

header("location:viewtopic.php?topic_id=$topicId");
exit;

?>
