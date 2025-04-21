<?php

require_once('models/Message.php');

class MessageFactory {

    public static function loadFromFile(string $topicsFile): array {

        $messages = [];

        if (file_exists($topicsFile) && filesize($topicsFile) > 0) {
            
            $lines = file($topicsFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            foreach ($lines as $line) {

                list($author, $content, $timestamp)= explode("~", trim($line));

                array_push($messages, new Message($author, $content, (int)$timestamp));
            }
        }

        return $messages;
        }

    }


?>
