<?php

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('display_errors', 'On');

require("Header.html");


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

            $MessageArray = file("messages.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $MessageArray = array_map('stripslashes', $MessageArray);

            
            $KeyMessageArray = [];
            for ($i = 0; $i <count($MessageArray); ++$i) {

                $CurMessage = explode("~", $MessageArray[$i]);

                $KeyArray[] = $CurMessage[0];
                $ValueArray[] = $CurMessage[1]."~".$CurMessage[2];
                $KeyMessageArray = array_combine($KeyArray, $ValueArray);

                //$KeyMessageArray[$CurMessage[0]] = stripslashes($CurMessage[1])."~".stripslashes($CurMessage[2]);
            }

            $Count = 1;

            echo "<table><tbody>";
            foreach ($KeyMessageArray as $Message) {

                $CurMessage = explode("~", $Message);
                echo "<tr>";
                echo "<td class=\"topic-num\"><strong>".$Count++."</strong></td>";
                echo "<td><strong>Topic</strong>:"
                .htmlspecialchars(stripslashes(key($KeyMessageArray)))."<br>";
                echo "<strong>Name</strong>:"
                    .htmlspecialchars(stripslashes($CurMessage[0]))."<br>";
                echo "<strong>Message</strong>:"
                    .htmlspecialchars(stripslashes($CurMessage[1]));
                echo "</td></tr>";
                next($KeyMessageArray);
            }
            echo "</tbody></table>";

        }
    ?>

    <hr>
    <p><a href="DiscussionForum.php">Post New Message</a><hr><a href="SortTopicsAscending.php">Sort Topics A-Z</a><br><a href="SortTopicsDescending.php">Sort Topics Z-A</a><br><a href="RemoveDuplicates.php">Remove Duplicate Messages</a><br><a href="DeleteFirstMessage.php">Delete First Message</a><br><a href="DeleteLastMessage.php">Delete Last Message</a></p>

    <form action="DeleteMessage.php" method="post" enctype="application/x-www-form-urlencoded">
        <p>
            Delete message number:
            <input type="text" name="message" size="5"/>
            <input type="submit" value="Delete" />
        <hr>
        </p>
    </form>

    </main>
</body>
</html>
