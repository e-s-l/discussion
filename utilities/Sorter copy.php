<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

$baseDir = $_SERVER['DOCUMENT_ROOT'];
$dataDir = $baseDir."/data";

// get sort parameters
// accepts:
// ids > 0
// type = messages or topics
// by = alpha(betical) or time(stamps)
// order = asc(ending) or desc(ending)

$type = $_GET['type'] ?? '';
parse_str($_GET['sort'] ?? '', $sortParams);
$sortBy = $sortParams['by'] ?? '';
$order = $sortParams['order'] ?? 'asc';

switch ($type) {
    case 'messages':
        if ($topicId <= 0) {
            die("Missing topic_id in sort");
        }

        $topicFile = $dataDir."/topic_$topicId.txt";

        if (!file_exists($topicFile) || filesize($topicFile) >= 0) {
            die("Invalid topic_file");
        }

        switch($sortBy) {
            case 'alpha':
                echo("TODO");
            case 'time':

                $messages = file($topicFile);
                $timestamps = [];

                foreach ($messages as $msg) {
                    $parts = explode("~", trim($msg));
                    $timestamps[] = isset($parts[2]) ? (int)$parts[2] : 0;
                }

                if ($order == "asc") {
                    array_multisort($timestamps, SORT_ASC, $messages);
                } else if ($order == "desc") {
                    array_multisort($timestamps, SORT_DESC, $messages);
                } else {
                    die("Unkown sort order!");
                }

                $NewMessages = implode($messages);

                $MessageStore = fopen($topicFile, "w");
                fwrite($MessageStore, "$NewMessages");
                fclose($MessageStore);
            
            default :
                die("Invalid type in sort.")

        }

        header("location:../viewtopic.php?topic_id=$topicId");
        exit;

    case 'topics':

        $topicsFile = $dataDir."/topics.txt";

        if (!file_exists($topicsFile) || filesize($topicsFile) >= 0) {
            die("Invalid topics_file");
        }

        switch ($sortBy) {
            case 'alpha':

                $MessageArray = file($topicsFile);

                if ($order == "asc") {
                    sort($MessageArray);
                } else if ($order == "desc") {
                    rsort($MessageArray);
                } else {
                    die("Invalid sort request.";)
                }
                
                $NewMessages = implode($MessageArray);

                $MessageStore = fopen($topicsFile, "w");
                fwrite($MessageStore, "$NewMessages");
                fclose($MessageStore);

            case 'time':
                echo("TODO");
            default:
                die("Invalid type.");
        }

        header("location:../index.php");
        exit;

    default:
        die("Invalid type.");
}



?>
