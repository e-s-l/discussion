<?php


require_once($_SERVER['DOCUMENT_ROOT'].'/constants.php');
require_once(MODEL_DIR."/Topic.php");

class TopicFactory {

    public static function loadFromFile(string $topicsFile): array {

        $topics = [];

        if (file_exists($topicsFile) && filesize($topicsFile) > 0) {
        {
            $lines = file($topicsFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            foreach ($lines as $line) {

                // format is: id~title~author~timestamp
                list($id, $title, $author, $timestamp) = explode("~", trim($line));

                $id = (int)$id;
                $timestamp = (int)$timestamp;

                array_push($topics, new Topic($id, $title, $author, $timestamp));
                }
            }
        }
        return $topics;

    }
}

?>
