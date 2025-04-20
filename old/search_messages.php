<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

require("header.html");


$searchTerm = isset($_GET['q']) ? strtolower(trim($_GET['q'])) : '';

$dir = "messages";
$topicsFile = "$dir/topics.txt";

if (!file_exists($topicsFile)) {
    echo "<p>No topics found.</p>";
    exit;
}

$topics = file($topicsFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$results = [];

foreach ($topics as $index => $line) {
    $topicId = $index + 1;
    $topicFile = "$dir/topic_$topicId.txt";

    if (!file_exists($topicFile)) continue;

    $lines = file($topicFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $i => $line) {
        if (stripos($line, $searchTerm) !== false) {
            list($name, $message, $ts) = explode("~", $line);
            $results[] = [
                'topicId' => $topicId,
                'title'   => explode("~", $line)[0],
                'name'    => $name,
                'message' => $message,
                'line'    => $i + 1,
                'ts'      => $ts
            ];
        }
    }

}

echo "<h2>Search Results '" . htmlspecialchars($searchTerm) . "'</h2>";

if (empty($results)) {
    echo "<p>No matches found.</p>";
} else {
    echo "<table><tbody>";
    foreach ($results as $r) {
        echo "<tr>";
        echo "<td><a href='viewtopic.php?topic_id={$r['topicId']}'>" . htmlspecialchars($r['title']) . "</a></td>";
        echo "<td>" . htmlspecialchars($r['name']) . "</td>";
        echo "<td>" . htmlspecialchars($r['message']) . "</td>";
        echo "<td>" . date("Y-m-d H:i", (int)$r['ts']) . "</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
}

?>

<hr>
<p><a href="index.php">Back to Topics</a></p>

</html>
