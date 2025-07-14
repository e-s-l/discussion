<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 'On');

$baseDir = $_SERVER['DOCUMENT_ROOT'];
$dataDir = $baseDir."/data";
$modelsDir = $baseDir."/models";
$viewsDir = $baseDir."/views";

require_once($modelsDir."/TopicFactory.php");

if (empty($_POST['topic']) || empty($_POST['name']) || empty($_POST['message'])) {

    // create a general error_view with passable args...
    
    require_once($viewsDir."/header.php");

    echo "<p>All fields must be filled.</p>";

    require_once($viewsDir."/footer.php");

} else {

    $topic = trim($_POST['topic']);
    $name = trim($_POST['name']);

    $_SESSION["user"] = $name;

    $message = str_replace(array("\r\n", "\r", "\n"), "<br/>", trim($_POST['message']));


    $timestamp = time();

    if (!is_dir($dataDir)) {
        mkdir($dataDir);
    }

    $topicsFile = $dataDir."/topics.txt";
    $duplicate = false;
    
    $topics = TopicFactory::loadFromFile($topicsFile);

    foreach ($topics as $i => $t) {

        $topicId = $i + 1;

        if (strcasecmp($t->title, $topic) === 0) {
            $duplicate = true;
            break;
        }
    }

    if ($duplicate) {

        include("../views/topic_exists_error.php");

    } else {

        $topicIndex = count($topics) + 1;
        $messageFile = $dataDir."/topic_$topicIndex.txt";

        $postTopic = addslashes("$topic~$name~$timestamp\n");
        $postMessage = addslashes("$name~$message~$timestamp\n");

        $topicsStore = fopen("$topicsFile","a+");
        fwrite($topicsStore, "$postTopic");
        fclose($topicsStore);

        $messageStore = fopen($messageFile,"a+");
        fwrite($messageStore, "$postMessage");
        fclose($messageStore);

        header("location:../index.php");
        exit;
    }
}

?>
