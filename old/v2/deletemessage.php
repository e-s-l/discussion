<?php

/* delete message specified by number in table */

error_reporting(E_ALL);
ini_set('display_errors', 'On');

// topicId passed as hidden form
$topicId = isset($_POST["topic_id"]) ? (int)$_POST["topic_id"] : 0;
$topicFile = "../messages/topic_$topicId.txt";

if (isset($_POST["message_number"])) {
    $messageIndex = (int)$_POST["message_number"];


        if (file_exists($topicFile) && filesize($topicFile) > 0) {

            $messages = file($topicFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            if ($messageIndex == 1 && count($messages) == 1) {
                die("Cannot delete (l)on(e)ly message, go back & delete topic instead.");
            } 
    
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
    
        header("location:../viewtopic.php?topic_id=$topicId");
        exit;
    

} else {
    die("Invalid request.");
}



?>
