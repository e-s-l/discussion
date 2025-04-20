<?php
session_start();

require("header.html");

$topicId = isset($_GET['topic_id']) ? (int)$_GET['topic_id'] : 0;
$allTopicsFile = "messages/topics.txt";
$topicFile = "messages/topic_$topicId.txt";

$namePrefill = $_SESSION['user'] ?? '';

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

echo "<header><h1><a href=\"index.php\">Discussion</a></h1></header><hr>";

echo "<div class=\"display\">";
echo "<h2>" . htmlspecialchars($title)."</h2>";


if (file_exists($topicFile)) {
    $replies = file($topicFile);
    $count = 0;

    echo "<table class=\"centre\"><tbody>";
    foreach ($replies as $reply) {
        list($name, $message, $ts)= explode("~", trim($reply));

        $message = str_replace("<br/>", "\n", $message);

        echo "<tr>";
        
        /*
        echo "<td class=\"num\">";
        echo "<p>".++$count."</p>";
        echo "</td>";
        */

        echo "<td>";
        echo "<strong>".htmlspecialchars($name)."</strong> ".date("Y-m-d H:i", (int)$ts)."<br><br>";
        echo nl2br(htmlspecialchars($message))."</p>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<p>No replies yet.</p><hr>";
}

?>

    <div class="explore-section">
        <div class="sort-section">
            <h3>Sort</h3>
            <p><a href="SortMessagesNewToOld.php?topic_id=<?php echo $topicId ?>">New-Old</a><br><a href="SortMessagesOldToNew.php?topic_id=<?php echo $topicId ?>">Old-New</a></p>
        </div>
        <div class="search-section">
                <h3>Search</h3>
                <form action="search.php" method="get">
                    <input type="text" name="q" placeholder="Search..." required>
                    <input type="submit" value="Search">
                </form>
        </div>
        <div class="back-section">
            <p><a href="index.php">Back to Topics</a></p>
        </div>
    </div>
</div>

<div class="post">
    <h2>Post Reply</h2>
    <form method="post" action="PostReply.php">
        <input type="hidden" name="topic_id" value="<?= $topicId ?>">
        <p>Name: <input type="text" name="name" value="<?php echo htmlspecialchars($namePrefill) ?>" required></p>
        <p>Message:<br><textarea name="message" rows="12" cols="80" required></textarea></p>
        <p><input type="submit" value="Post Reply"></p>
    </form>
</div>

<hr>
<div class="delete-section">
    <h2>Admin</h2>
    <h3>Delete</h3>
    <form action="deletemessage.php" method="post" enctype="application/x-www-form-urlencoded">
        <p>
            Delete message number:
            <input type="text" name="message_number" size="5"/>
            <input type="submit" value="Delete" />
            <input type="hidden" name="topic_id" value="<?= $topicId ?>">
        </p>
    </form>
    <p><a href="removeduplicatemessages.php?topic_id=<?php echo $topicId ?>">Delete Duplicates</a></p>
</div>

</html>
