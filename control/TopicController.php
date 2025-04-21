<?php

class TopicController {

    public function showMessages(int $id): void {
        $topics = TopicFactory::loadFromFile("../messages/topics.txt");

        if (!isset($topics[$id - 1])) {
            die("Topic not found.");
        }

        $topic = $topics[$id - 1];
        $messages = MessageFactory::loadFromFile("messages/topic_$id.txt");

        include("../views/show_messages.php");
    }

    public functions showTopics(): void {
        $topics = TopicFactory::loadFromFile("../messages/topics.txt");
        include("../views/show_topics.php");
    }

}


?>
