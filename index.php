<?php

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('display_errors', 'On');

require("header.html");

?>

<body>
    <header>
        <h1>Discussion</h1>
    </header>
    <hr>
    <main>
    <?php

        $topicsFile = "messages/topics.txt";

        if (!file_exists($topicsFile) || filesize($topicsFile) == 0) {
            echo "<p>There are no messages posted.</p>";
        } else {

            echo "<h2>Topics</h2>";

            $topics = file($topicsFile);

            foreach ($topics as $topic) {
                $keyTopics[] = explode("~", $topic);
            }

            echo "<table><tbody>";
            for ($i = 0; $i < count($keyTopics); ++$i) {
                echo "<tr>";
                echo "<td class=\"topic-num\"><strong><a href=\"viewtopic.php?topic_id=" . ($i + 1) . "\">" . ($i + 1) . "</a></strong></td>";
                echo "<td><a href=\"viewtopic.php?topic_id=" . ($i + 1) . "\"><strong>Topic</strong>: "
                .htmlspecialchars(stripslashes($keyTopics[$i][0]))."<br>";
                echo "<br><strong>Posted by</strong>: "
                    .htmlspecialchars(stripslashes($keyTopics[$i][1]))."<br>";
                if (isset($keyTopics[$i][2])) {
                    $FormattedDate = date("Y-m-d H:i", (int)$keyTopics[$i][2]);
                    echo "<strong>Posted</strong>: $FormattedDate";
                }
                echo "</a></td></tr>";
            }
            echo "</tbody></table>";

        }
    ?>

    <hr>
   
    <h2>Post New Message</h2>

    <form method="post" action="PostMessage.php">
        <p>Topic: <input type="text" name="topic"/></p>
        <p>Name: <input type="text" name="name"/></p>
        <p>Message:<br><textarea name="message" rows="5" cols="50"></textarea></p>
        <p><input type="submit" value="Post Message"/></p>
        <p><input type="reset" value="Reset Form"/></p>
    </form>

    <hr/>
    <div class="sort-section">
        <h2>Sort</h2>
        <p><a href="SortTopicsAscending.php">Sort Topics A-Z</a><br><a href="SortTopicsDescending.php">Sort Topics Z-A</a></p>
    </div>
    <hr/>
    <div class="search-section">
        <h2>Search</h2>
        <form action="search.php" method="get">
            <input type="text" name="q" placeholder="Search..." required>
            <input type="submit" value="Search">
        </form>
    </div>
    <hr/>
    <div class="delete-section">
        <h2>Delete</h2>
        <p><a href="RemoveDuplicates.php">Remove Duplicates</a></p>
        <form action="deletetopic.php" method="post" enctype="application/x-www-form-urlencoded">
            <p>
                Delete Topic number:
                <input type="text" name="topic" size="5"/>
                <input type="submit" value="Delete" />
            </p>
        </form>

    </div>

    </main>
</body>
</html>
