<?php require("Header.html"); ?>

<body>
    <header>
        <h1>Post New Message</h1>
    </header>
    <hr>
    <main>
    <form method="post" action="PostMessage.php">
        <p>Topic: <input type="text" name="topic"/></p>
        <p>Name: <input type="text" name="name"/></p>
        <p>Message:<br><textarea name="message" rows="5" cols="50"></textarea></p>
        <p><input type="submit" value="Post Message"/></p>
        <p><input type="reset" value="Reset Form"/></p>
    </form>

    <hr>
    <p><a href="ViewDiscussion.php">View Discussion</a></p>

    </main>
</body>
</html>
