
<div class="explore-section">
    <div class="sort-section">
         <h3>Sort</h3>
        <div class="sort-categories">
            <?php if (!empty($isViewingMessages)): ?>
                <form method="get" action="utilities/Sorter.php">
                    <input type="hidden" name="type" value="messages">
                    <input type="hidden" name="topic_id" value="<?= $topicId ?>">

                    <label for="sortMessages"></label>
                    <select name="sort" id="sortMessages">
                        <option value="">-- Choose --</option>
                        <option value="by=time&order=desc">Newest First</option>
                        <option value="by=time&order=asc">Oldest First</option>
                        <option value="by=alpha&order=asc">A–Z</option>
                        <option value="by=alpha&order=desc">Z–A</option>
                    </select>

                    <input type="submit" value="Sort">
                </form>
            <?php elseif (!empty($isViewingTopics)): ?>
                <form method="get" action="utilities/Sorter.php">
                    <input type="hidden" name="type" value="topics">

                    <label for="sortTopics"></label>
                    <select name="sort" id="sortTopics">
                        <option value="">-- Choose --</option>
                        <option value="by=time&order=desc">Newest First</option>
                        <option value="by=time&order=asc">Oldest First</option>
                        <option value="by=alpha&order=asc">A–Z</option>
                        <option value="by=alpha&order=desc">Z–A</option>
                    </select>

                    <input type="submit" value="Sort">
                </form>
            <?php endif; ?>
        </div>


    </div>
    <div class="search-section">
            <h3>Search</h3>
            <form action="search.php" method="get">
                <input type="text" name="q" placeholder="Search..." required>
                <input type="submit" value="Search">
            </form>
    </div>
    <?php if (!empty($isViewingMessages)): ?>
        <div class="back-section">
            <h3><a href="index.php">Back to Topics</a></h3>
        </div>
    <?php endif; ?>
</div>
