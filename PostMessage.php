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
            $MessageStore = fopen("messages.txt","a+");
            fwrite($MessageStore, "$PostMessage");
            fclose($MessageStore);
    
            echo "<p><strong>Topic</strong>: $Topic<br/></p>";
            echo "<p><strong>Name</strong>: $Name<br/></p>";
            echo "<p><strong>Message</strong>:$Message</p>";
        }
    ?>
    <hr>
    <p><a href="ViewDiscussion.php">View Discussion</a></p>

    </main>
</body>
</html>
