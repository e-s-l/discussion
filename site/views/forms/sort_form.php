<div class="sort-section">
    <div class="sort-categories">
        <form 
        method="get"
        aria-label="sort form"
        action="<?php echo UTILITIES_URL."Sorter.php" ?>"
        >
            <?php if (!empty($isViewingMessages)): ?>
                <input type="hidden" name="type" value="messages">
                <input type="hidden" name="topic_id" value="<?= $topicId ?>">
                <select 
                name="sort" 
                id="sortMessages" 
                aria-label="sort selections"
                required>
            <?php elseif (!empty($isViewingTopics)): ?>
                <input type="hidden" name="type" value="topics">
                <select
                name="sort"
                id="sortTopics"
                aria-label="sort selections"
                required>
            <?php endif; ?>
                <option value="" selected disabled hidden>Sort...</option>
                <option value="by=time&order=desc">Newest First</option>
                <option value="by=time&order=asc">Oldest First</option>
                <option value="by=alpha&order=asc">A–Z</option>
                <option value="by=alpha&order=desc">Z–A</option>
            </select>
            <input
            aria-label="go sort"
            title="sort" 
            type="submit" 
            value="Go">
        </form>
    </div>
</div>
