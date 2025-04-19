<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

if (file_exists("messages.txt") && filesize("messages.txt") > 0) {
    $MessageArray = file("messages.txt");
    $MessageArray = array_unique($MessageArray);
    $MessageArray = array_values($MessageArray);
    $NewMessages = implode("", $MessageArray);
    $MessageStore = fopen("messages.txt", "w");
    fwrite($MessageStore, "$NewMessages");
    fclose($MessageStore);
}

header("location:ViewDiscussion.php");
?>
