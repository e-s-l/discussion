<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

$topicsFile = "messages/topics.txt";


if (file_exists($topicsFile) && filesize($topicsFile) > 0) {
    $MessageArray = file($topicsFile);

    rsort($MessageArray);

    $NewMessages = implode($MessageArray);

    $MessageStore = fopen($topicsFile, "w");
    fwrite($MessageStore, "$NewMessages");
    fclose($MessageStore);
}

header("location:index.php");
exit;

?>
