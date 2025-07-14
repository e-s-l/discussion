<div class="post">
    <h2>Post New Message</h2>
    <form method="post" action="control/PostTopicController.php">
        <p>Topic: <input type="text" name="topic"/></p>
        <p>Name: <input type="text" name="name" value="<?php echo htmlspecialchars($namePrefill) ?>"/></p>
        <p>Message:<br><textarea name="message" rows="12" cols="80"></textarea></p>
        <p><input type="submit" value="Post Message"/></p>
        <p><input type="reset" value="Reset Form"/></p>
    </form>
</div>
