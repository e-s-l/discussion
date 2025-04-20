<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

require("header.html");


$searchTerm = isset($_GET['q']) ? strtolower(trim($_GET['q'])) : '';

$topicsFile = "messages/topics.txt";

if (!file_exists($topicsFile)) {
    echo "<p>No topics found.</p>";
    exit;
}

$topics = file($topicsFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$results = [];

foreach ($topics as $index => $line) {
    list($title, $author, $timestamp) = explode("~", $line);
    $topicId = $index + 1;

    if (stripos($title, $searchTerm) !== false) {
        $results[] = "<tr><td><a href='viewtopic.php?topic_id=$topicId'>" . htmlspecialchars($title) . " by " . htmlspecialchars($author) . "</a></td></tr>";
    }
}

echo "<h2>Search Results '" . htmlspecialchars($searchTerm) . "'</h2>";

if (empty($results)) {
    echo "<p>No matches found.</p>";
} else {
    echo "<table><tbody>";
    foreach ($results as $result) {
        echo $result;
    }
    echo "</tbody></table>";
}

?>

<hr>
<p><a href="index.php">Back to Topics</a></p>

</html>
