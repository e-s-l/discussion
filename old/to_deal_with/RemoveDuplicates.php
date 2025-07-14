<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

$dir = "messages";
$topicFiles = array_diff(scandir($dir), ['.', '..', 'topics.txt']);

foreach ($topicFiles as $file) {
    $filePath = "$dir/$file";

    if (file_exists($filePath) && filesize($filePath) > 0) {
        $MessageArray = file($filePath);
        $MessageArray = array_unique($MessageArray);
        $MessageArray = array_values($MessageArray);
        $NewMessages = implode("", $MessageArray);
        $MessageStore = fopen($filePath, "w");
        fwrite($MessageStore, "$NewMessages");
        fclose($MessageStore);
    }
}

header("location:index.php");
exit;

?>
