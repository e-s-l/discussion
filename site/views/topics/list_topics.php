

<?php if (count($topics) === 0): ?>
    <p>No topics posted yet.</p>
<?php else: ?>
    <table role="presentation">
        <tbody>
            <?php foreach ($topics as $topic): ?>
                <tr>
                    <td>
                        <a href="viewtopic.php?topic_id=<?php 
                        echo htmlspecialchars($topic->id ?? $topic['id']);
                        ?>">
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
