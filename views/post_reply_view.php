<div class="post">

   
    <h2>Post Reply</h2>
    <form method="post" action="utilities/PostReply.php">
        <input type="hidden" name="topic_id" value="<?= $topicId ?>">
        <p>Name: <input type="text" name="name" value="<?php
        echo htmlspecialchars($namePrefill) ?>" required></p>
        <p>Message:<br><textarea name="message" rows="12" cols="80" required></textarea></p>
        <p><input type="submit" value="Post Reply"></p>
    </form>
</div>
