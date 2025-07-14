<?php


$baseDir = $_SERVER['DOCUMENT_ROOT'];

$modelDir = $baseDir . "/models";

require_once($modelDir.'/MessageFactory.php');
require_once($modelDir.'/TopicFactory.php');


class DiscussionController {

    private string $dataDir;
    private string $topicsFile;
    private string $namePrefill;
    private array $topics;

    public function __construct() {

         global $baseDir; 

        $this->dataDir = $baseDir . "/data";
        $this->topicsFile = $this->dataDir . "/topics.txt";
        $this->namePrefill = $_SESSION['user'] ?? '';

        $this->topics = [];
        $loadedTopics = TopicFactory::loadFromFile($this->topicsFile);
        foreach ($loadedTopics as $topic) {
            $this->topics[$topic->id] = $topic;
        }

    }

    public function showMessages(int $id): void {

        // a variable to be used in explore_views to dictate which sort
        $isViewingMessages = true;

        // if the name is already saved, use it
        // make this available in the included views
        $namePrefill = $this->namePrefill;
        // similiarly
        $topicId = $id; 

        if (!isset($this->topics[$id])) {
            die("Invalid topic ID/Topic not found");
        }

        $topic = $this->topics[$id];

        // load all messages for this topic
        $topicFile = $this->dataDir."/topic_{$id}.txt";
        $messages = MessageFactory::loadFromFile($topicFile);

        /********
        the views
        *********/

        // include the the page header
        include('views/header.php');

        // the table listing messages within topic
        include('views/show_messages.php');

        // the search and sort section
        include('views/explore_view.php');

        // the reply section
        include('views/post_reply_view.php');

        // close up the html
        include('views/footer.php');

    }

    public function showTopics(): void {

        // a variable to be used in explore_views to dictate which sort
        $isViewingTopics = true;

        // $topics = TopicFactory::loadFromFile($this->topicsFile);

        $topics = $this->topics;

        /*********
        the views
        **********/

        // if the name is already saved, use it
        $namePrefill = $_SESSION['user'] ?? '';

        // include the the page header
        include('views/header.php');

        // the table listing current topics
        include('views/topics_list_view.php');

        // the search and sort section
        include('views/explore_view.php');

        // the submission section
        include('views/post_message_view.php');

        // close up the html
        include('views/footer.php');
    }
}


?>
