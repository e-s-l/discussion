<?php
require("header.html");

$topicId = isset($_GET['topic_id']) ? (int)$_GET['topic_id'] : 0;
$topicsFile = "messages/topics.txt";
$topicFile = "messages/topic_$topicId.txt";

if ($topicId < 1 || !file_exists($topicsFile)) {
    echo "<p>Invalid topic.</p>";
    exit;
}

$topics = file($topicsFile);
if (!isset($topics[$topicId - 1])) {
    echo "<p>Topic not found.</p>";
    exit;
}

// l($title, $author, $ts)

$topic = explode("~", trim($topics[$topicId - 1]));
echo "<h2>" . htmlspecialchars($topic[0]) . "</h2>";
echo "<hr>";

if (file_exists($topicFile)) {
    $replies = file($topicFile);
    foreach ($replies as $reply) {
        list($replyAuthor, $message, $replyTs) = explode("~", trim($reply));
        echo "<p><strong>" . htmlspecialchars($replyAuthor) . "</strong> (" . date("Y-m-d H:i", (int)$replyTs) . ")<br>";
        echo nl2br(htmlspecialchars($message)) . "</p><hr>";
    }
} else {
    echo "<p>No replies yet.</p><hr>";
}
?>

<h3>Post a Reply</h3>
<form method="post" action="PostReply.php">
    <input type="hidden" name="topic_id" value="<?= $topicId ?>">
    <p>Name: <input type="text" name="name" required></p>
    <p>Message:<br><textarea name="message" rows="4" cols="50" required></textarea></p>
    <p><input type="submit" value="Post Reply"></p>
</form>

<p><a href="index.php">Back to Topics</a></p>

</html>
