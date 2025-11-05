<?php

//require($_SERVER['DOCUMENT_ROOT'].'/constants.php');
require(MODEL_DIR.'/TopicFactory.php');
require(MODEL_DIR.'/MessageFactory.php');


class SearchAll {

    public function searchAll(string $query): array {

        $results = [
            'topics' => [],
            'messages' => []
        ];

        $query = strtolower(trim($query));

        if ($query === '') {
            return $results;
        }

        $topics = TopicFactory::loadFromFile('data/topics.txt');

        foreach ($topics as $index => $topic) {

            $topicId = $index + 1;
            $topicFile = "data/topic_$topicId.txt";

            if (stripos($topic->title, $query) !== false) {
                $results['topics'][] = [
                    'id' => $topicId,
                    'title' => $topic->title,
                    'author' => $topic->author];
            }

            if (file_exists($topicFile)) {

                $messages = MessageFactory::loadFromFile($topicFile);

                foreach ($messages as $message) {

                    if (stripos($message->content, $query) !== false) {
                        $results['messages'][] = [
                            'id' => $topicId,
                            'title' => $topic->title,
                            'author' => $message->formattedAuthor(),
                            'content' => $message->formattedContent(),
                            'timestamp' => $message->formattedDate()
                        ];
                    }
                }

            }
        }

        return $results;
    }
}



?>
