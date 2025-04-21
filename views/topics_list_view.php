<div class="display">
    <h2>Topics:</h2>
    <?php if (count($topics) === 0): ?>
        <p>No topics posted yet.</p>
    <?php else: ?>
        <table class="centre">
            <tbody>
                <?php foreach ($topics as $index => $topic): ?>
                    <tr>
                        <td class="num">
                            <strong><a href="viewtopic.php?topic_id=<?php echo $index + 1; ?>"><?php echo $index + 1; ?></a></strong>
                        </td>
                        <td>
                            <a href="viewtopic.php?topic_id=<?php echo $index + 1; ?>">
                                <strong>Topic</strong>: <?php echo htmlspecialchars($topic->title); ?><br>
                                <strong>Posted by</strong>: <?php echo $topic->formattedAuthor(); ?><br>
                                <strong>Posted</strong>: <?php echo $topic->formattedDate(); ?>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
