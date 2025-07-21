<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/constants.php');

require_once(MODEL_DIR.'/MessageFactory.php');
require_once(MODEL_DIR.'/TopicFactory.php');

include(UTILITIES_DIR."/Render.php");

class DiscussionController {


    private string $topicsFile;
    private string $namePrefill;
    private array $topics = [];

    public function __construct() {

        $this->topicsFile =  DATA_DIR . "/topics.txt";
        $this->namePrefill = $_SESSION['user'] ?? '';

        $loadedTopics = TopicFactory::loadFromFile($this->topicsFile);

        foreach ($loadedTopics as $topic) {
            $this->topics[$topic->id] = $topic;
        }
    }

    public function showTopics(): void {

        $viewPath = TOPIC_VIEWS.'/show_page.php';

        render($viewPath, [
            "pageTitle" => "Topics",
            "isViewingTopics" => true,
            "namePrefill" => $this->namePrefill,
            "topics" => $this->topics,
        ]);
    }

    public function showMessages(int $id): void {

        $topicId = $id; 

        if (!isset($this->topics[$id])) {
            die("Invalid topic ID/Topic not found");
        }

        $topic = $this->topics[$id];

        // load all messages for this topic
        $topicFile =  DATA_DIR."/topic_{$id}.txt";
        $messages = MessageFactory::loadFromFile($topicFile);

        $viewPath = MESSAGE_VIEWS.'/show_page.php';

        render($viewPath, [
            "pageTitle" => $topic->title,
            "isViewingMessages" => true,
            "namePrefill" => $this->namePrefill,
            "topicId" => $topicId,
            "messages" => $messages,
        ]);
    }
}

?>
