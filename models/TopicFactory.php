<?php

require_once('models/Topic.php');

class TopicFactory {

    public static function loadFromFile(string $topicsFile): array {

        $topics = [];

        if (file_exists($topicsFile) && filesize($topicsFile) > 0) {
        {
            $lines = file($topicsFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            foreach ($lines as $line) {
                list($title, $author, $timestamp) = explode("~", trim($line));

                array_push($topics, new Topic($title, $author, (int)$timestamp));
                }
            }

            return $topics;
        }
    }
}

?>
