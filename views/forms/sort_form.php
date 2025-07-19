<!--
note this view requires (and assumes the existence of)
two control flags, which set whe

FIXME
way to much code repeated in the below only the id for the select changes
cannot assume the above exit &c
-->

<div class="sort-section">
    <h3>sort</h3>
    <div class="sort-categories">
        <?php if (!empty($isViewingMessages)): ?>
            <form method="get" action="<?php echo UTILITIES_URL."Sorter.php" ?>"
            >
                <input type="hidden" name="type" value="messages">
                <input type="hidden" name="topic_id" value="<?= $topicId ?>">

                <label for="sortMessages"></label>
                <select name="sort" id="sortMessages">
                    <option value="">method</option>
                    <option value="by=time&order=desc">Newest First</option>
                    <option value="by=time&order=asc">Oldest First</option>
                    <option value="by=alpha&order=asc">A–Z</option>
                    <option value="by=alpha&order=desc">Z–A</option>
                </select>

                <input type="submit" value="Sort">
            </form>
        <?php elseif (!empty($isViewingTopics)): ?>
            <form method="get" action="<?php echo UTILITIES_URL."Sorter.php" ?>">
                <input type="hidden" name="type" value="topics">

                <label for="sortTopics"></label>
                <select name="sort" id="sortTopics">
                    <option value="">method</option>
                    <option value="by=time&order=desc">Newest First</option>
                    <option value="by=time&order=asc">Oldest First</option>
                    <option value="by=alpha&order=asc">A–Z</option>
                    <option value="by=alpha&order=desc">Z–A</option>
                </select>

                <input type="submit" value="Sort">
            </form>
        <?php endif; ?>
    </div>
