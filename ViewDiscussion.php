<?php

require("Header.html");
error_reporting(E_ALL);
ini_set('display_errors', 'On');

?>

<body>
    <header>
        <h1>Discussion</h1>
    </header>
    <hr>
    <main>
    <?php

        if (!file_exists("messages.txt") || filesize("messages.txt") == 0) {
            echo "<p>There are no messages posted.</p>";
        } else {
            $KeyMessageArray = [];
            $MessageArray = file("messages.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $MessageArray = array_map('stripslashes', $MessageArray);

            for ($i = 0; $i < count($MessageArray); ++i) {
                $CurMessage = explode("~",$MessageArray[$i]);
                $KeyMessageArray[$CurMessage[0]] = $CurMessage[1]."~".$CurMessage[2];
            }
            var_dump($KeyMessageArray);


            /*
            echo "<table><tbody>";
            for ($i = 0; $i <count($MessageArray); ++$i) {
                $CurMsg = explode("~", $MessageArray[$i]);
                echo "<tr>";
                echo "<td class=\"topic-num\"><strong>".($i+1)."</strong></td>";
                echo "<td><strong>Topic</strong>:"
                .htmlspecialchars(stripslashes($CurMsg[0]))."<br>";
                echo "<strong>Name</strong>:"
                    .htmlspecialchars(stripslashes($CurMsg[1]))."<br>";
                echo "<strong>Message</strong>:"
                    .nl2br(htmlspecialchars(stripslashes($CurMsg[2])));
                echo "</td></tr>";
            }
            echo "</tbody></table>";
            */
        }
    ?>

    <hr>
    <p><a href="DiscussionForum.php">Post New Message</a><br><a href="RemoveDuplicates.php">Remove Duplicate Messages</a><br><a href="DeleteFirstMessage.php">Delete First Message</a><br><a href="DeleteLastMessage.php">Delete Last Message</a></p>

    <form action="DeleteMessage.php" method="post" enctype="application/x-www-form-urlencoded">
        <p>
            Delete message number:
            <input type="text" name="message" size="5"/>
            <input type="submit" value="Delete" />
        </p>
    </form>

    </main>
</body>
</html>
