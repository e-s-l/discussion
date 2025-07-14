<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

$baseDir = $_SERVER['DOCUMENT_ROOT'];
$dataDir = $baseDir . "/data";


$type = $_GET['type'] ?? '';
$topicId = isset($_GET['topic_id']) ? (int)$_GET['topic_id'] : 0;

parse_str($_GET['sort'] ?? '', $sortParams);
$sortBy = $sortParams['by'] ?? '';
$order = $sortParams['order'] ?? 'asc';

switch ($type) {
    case 'messages':
        if ($topicId <= 0) {
            die("Missing topic_id in sort");
        }

        $topicFile = $dataDir . "/topic_$topicId.txt";

        if (!file_exists($topicFile) || filesize($topicFile) === 0) {
            die("Invalid topic file");
        }

        $messages = file($topicFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        switch ($sortBy) {
            case 'alpha':

                $bodies = [];
                foreach ($messages as $msg) {
                    $parts = explode("~", $msg);
                    $bodies[] = strtolower($parts[1] ?? '');
                }

                if ($order === "asc") {
                    array_multisort($bodies, SORT_ASC, $messages);
                } elseif ($order === "desc") {
                    array_multisort($bodies, SORT_DESC, $messages);
                } else {
                    die("Unknown sort order!");
                }
                break;

            case 'time':

                $timestamps = [];
                foreach ($messages as $msg) {
                    $parts = explode("~", $msg);
                    $timestamps[] = isset($parts[2]) ? (int)$parts[2] : 0;
                }

                if ($order === "asc") {
                    array_multisort($timestamps, SORT_ASC, $messages);
                } elseif ($order === "desc") {
                    array_multisort($timestamps, SORT_DESC, $messages);
                } else {
                    die("Unknown sort order!");
                }
                break;

            default:
                die("Invalid sort by type for messages.");
        }

        file_put_contents($topicFile, implode("\n", $messages) . "\n");

        header("Location: ../viewtopic.php?topic_id=$topicId");
        exit;

    case 'topics':
        $topicsFile = $dataDir . "/topics.txt";

        if (!file_exists($topicsFile) || filesize($topicsFile) === 0) {
            die("Invalid topics file");
        }

        $topics = file($topicsFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        switch ($sortBy) {
            case 'alpha':


                $titles = [];
                foreach ($topics as $line) {
                    $parts = explode("~", $line);
                    $titles[] = isset($parts[1]) ? strtolower($parts[1]) : '';
                }

                if ($order === "asc") {
                    array_multisort($titles, SORT_ASC, $topics);
                } elseif ($order === "desc") {
                    array_multisort($titles, SORT_DESC, $topics);
                } else {
                    die("Invalid sort order!");
                }
                break;

            case 'time':

                $timestamps = [];
                foreach ($topics as $line) {
                    $parts = explode("~", $line);
                    $timestamps[] = isset($parts[3]) ? (int)$parts[3] : 0;
                }

                if ($order === "asc") {
                    array_multisort($timestamps, SORT_ASC, $topics);
                } elseif ($order === "desc") {
                    array_multisort($timestamps, SORT_DESC, $topics);
                } else {
                    die("Invalid sort order!");
                }
                break;

            default:
                die("Invalid sort by type for topics.");
        }

        file_put_contents($topicsFile, implode("\n", $topics) . "\n");

        header("Location: ../index.php");
        exit;

    default:
        die("Invalid type.");
}
?>
