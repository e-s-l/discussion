<div class="sort-section">
    <div class="sort-categories">
        <form method="get" action="<?php echo UTILITIES_URL."Sorter.php" ?>"
        >
            <?php if (!empty($isViewingMessages)): ?>
                <input type="hidden" name="type" value="messages">
                <input type="hidden" name="topic_id" value="<?= $topicId ?>">
                <label for="sortMessages"></label>
                <select name="sort" id="sortMessages" required>
            <?php elseif (!empty($isViewingTopics)): ?>
                <input type="hidden" name="type" value="topics">
                <label for="sortTopics"></label>
                <select name="sort" id="sortTopics" required>
            <?php endif; ?>
                <option value="" selected disabled hidden>Sort...</option>
                <option value="by=time&order=desc">Newest First</option>
                <option value="by=time&order=asc">Oldest First</option>
                <option value="by=alpha&order=asc">A–Z</option>
                <option value="by=alpha&order=desc">Z–A</option>
            </select>
            <input type="submit" value="Go">
        </form>
    </div>
</div>
