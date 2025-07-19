<div class="post">
    <h2>post message</h2>

    <form
        method="post"
        action="<?php echo CONTROL_URL."PostTopicController.php" ?>">
        <div class="form-group">
            <label for="topic">topic:</label>
            <input type="text" id="topic" name="topic" required>
        </div>
        <div class="form-group">
            <label for="name">name:</label>
            <input 
                type="text"
                id="name"
                name="name" 
                value="<?php echo htmlspecialchars($namePrefill) ?>"
                required
            >
        </div>
        <div class="form-group">
            <label for="message">message:</label>
            <textarea 
                name="message" 
                id="message" 
                rows="12" 
                cols="80"
                required></textarea>
        </div>

        <div class="form-group">
            <button type="submit">post</button>
            <button type="reset">reset</button>
        </div>
     </form>
</div>
