<?php

session_start();

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('display_errors', 'On');

require("header.html");

$namePrefill = $_SESSION['user'] ?? '';

?>

<body>
    <header>
        <h1><a href="index.php">Discussion</a></h1>
    </header>
    <hr>
    <main>
    <?php

        $topicsFile = "messages/topics.txt";

        if (!file_exists($topicsFile) || filesize($topicsFile) == 0) {
            echo "<p>There are no messages posted.</p>";
        } else {

            echo "<div class=\"display\">";
            echo "<h2>Topics:</h2>";

            $topics = file($topicsFile);

            foreach ($topics as $topic) {
                $keyTopics[] = explode("~", $topic);
            }

            echo "<table class=\"centre\"><tbody>";
            for ($i = 0; $i < count($keyTopics); ++$i) {
                echo "<tr>";
                echo "<td class=\"num\"><strong><a href=\"viewtopic.php?topic_id=" . ($i + 1) . "\">" . ($i + 1) . "</a></strong></td>";
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

        <div class="explore-section">
            <div class="sort-section">
            <h3>Sort</h3>
                <p><a href="SortTopicsAscending.php">A-Z</a><br><a href="SortTopicsDescending.php">Z-A</a></p>
            </div>
            <div class="search-section">
                <h3>Search</h3>
                <form action="search.php" method="get">
                    <input type="text" name="q" placeholder="Search..." required>
                    <input type="submit" value="Search">
                </form>
            </div>
        </div>
    </div>

    <div class="post">
        <h2>Post New Message</h2>
        <form method="post" action="PostMessage.php">
            <p>Topic: <input type="text" name="topic"/></p>
            <p>Name: <input type="text" name="name" value="<?php echo htmlspecialchars($namePrefill) ?>"/></p>
            <p>Message:<br><textarea name="message" rows="12" cols="80"></textarea></p>
            <p><input type="submit" value="Post Message"/></p>
            <p><input type="reset" value="Reset Form"/></p>
        </form>
    </div>

    <hr/>
    <div class="delete-section">
        <h2>Admin</h2>
        <h3>Delete</h3>
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
