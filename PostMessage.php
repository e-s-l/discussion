<?php
require("Header.html");
error_reporting(E_ALL);
ini_set('display_errors', 'On');
?>

<body>
    <main>

    <?php
        if (empty($_POST['topic']) || empty($_POST['name']) || empty($_POST['message'])) {
            echo "<p>All fields must be filled.</p>";
            echo "<p><a href=\"DiscussionForum.php\">Go Back.</a></p>";
        } else {

            $Topic = $_POST['topic'];
            $Name = $_POST['name'];
            $Message = $_POST['message'];

            $PostMessage = addslashes("$Topic~$Name~$Message\n");

            $TopicExists = FALSE;
            if (file_exists("messages.txt") && filesize("messages.txt") > 0) {
                $MessageArray = file("messages.txt");
                for ($i = 0; $i < count($MessageArray); ++$i) {
                    $CurMessage = explode("~", $MessageArray[$i]);
                    if (in_array(addslashes($Topic), $CurMessage)) {
                        $TopicExists = TRUE;
                        break;
                    }
                }
            }

            if ($TopicExists) {
                echo "<p>The topic already exists.</p>";
            } else {

                $MessageStore = fopen("messages.txt","a+");
                fwrite($MessageStore, "$PostMessage");
                fclose($MessageStore);
        
                echo "<p><strong>Topic</strong>: $Topic<br/></p>";
                echo "<p><strong>Name</strong>: $Name<br/></p>";
                echo "<p><strong>Message</strong>:$Message</p>";
            }
        }
    ?>
    <hr>
    <p><a href="ViewDiscussion.php">View Discussion</a></p>

    </main>
</body>
</html>
