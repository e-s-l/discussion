
<div class="explore-section">
    <div class="sort-section">
        <h3>Sort</h3>
        <!-- these below need to be merged -->
        <h4>Messages</h4>
        <p><a href="utilities/SortMessagesNewToOld.php?topic_id=<?php echo $topicId ?>">New-Old</a><br><a href="utilities/SortMessagesOldToNew.php?topic_id=<?php echo $topicId ?>">Old-New</a></p>
        <h4>Topics</h4>
        <p><a href="utilities/SortTopicsAscending.php">A-Z</a><br><a href="utilities/SortTopicsDescending.php">Z-A</a></p>
    </div>
    <div class="search-section">
            <h3>Search</h3>
            <form action="search.php" method="get">
                <input type="text" name="q" placeholder="Search..." required>
                <input type="submit" value="Search">
            </form>
    </div>
    <div class="back-section">
        <h3><a href="index.php">Back to Topics</a></h3>
    </div>
</div>
