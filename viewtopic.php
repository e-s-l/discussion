<?php
require("header.html");

$topicId = isset($_GET['topic_id']) ? (int)$_GET['topic_id'] : 0;
$allTopicsFile = "messages/topics.txt";
$topicFile = "messages/topic_$topicId.txt";

if (!file_exists($allTopicsFile)) {
    echo "<p>Invalid topic.</p>";
    exit;
}

$topics = file($allTopicsFile);

if (!isset($topics[$topicId - 1])) {
    echo "<p>Topic not found.</p>";
    exit;
}


list($title, $author, $topic) = explode("~", trim($topics[$topicId - 1]));
echo "<h2>" . htmlspecialchars($title) . " [TopicID: $topicId]"."</h2>";
echo "<hr>";

if (file_exists($topicFile)) {
    $replies = file($topicFile);
    $count = 0;

    echo "<table><tbody>";
    foreach ($replies as $reply) {
        list($name, $message, $ts)= explode("~", trim($reply));

        echo "<tr>";
        echo "<td>";

        echo "<p>#".++$count." "."<strong>".htmlspecialchars($name)."</strong> ".date("Y-m-d H:i", (int)$ts)."<br><br>";
        echo nl2br(htmlspecialchars($message))."</p>";

        echo "</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<p>No replies yet.</p><hr>";
}

?>

<h3>Post Reply</h3>
<form method="post" action="PostReply.php">
    <input type="hidden" name="topic_id" value="<?= $topicId ?>">
    <p>Name: <input type="text" name="name" required></p>
    <p>Message:<br><textarea name="message" rows="4" cols="50" required></textarea></p>
    <p><input type="submit" value="Post Reply"></p>
</form>
<hr/>
<div class="sort-section">
    <h2>Sort</h2>
    <p><a href="SortMessagesNewToOld.php?topic_id=<?php echo $topicId ?>">Sort Messages New-Old</a><br><a href="SortMessagesOldToNew.php?topic_id=<?php echo $topicId ?>">Sort Messages Old-New</a></p>
</div>
<hr/>
<div class="search-section">
        <h2>Search</h2>
        <form action="search.php" method="get">
            <input type="text" name="q" placeholder="Search..." required>
            <input type="submit" value="Search">
        </form>
    </div>
<div class="delete-section">
    <h2>Delete</h2>
    <!--
    <p><a href="removeduplicatemessages.php">Remove Duplicate Messages</a></p>
    -->
    <form action="deletemessage.php" method="post" enctype="application/x-www-form-urlencoded">
        <p>
            Delete message number:
            <input type="text" name="message_number" size="5"/>
            <input type="submit" value="Delete" />
            <input type="hidden" name="topic_id" value="<?= $topicId ?>">
        </p>
    </form>
</div>
<hr>
<p><a href="index.php">Back to Topics</a></p>

</html>
