<h2>Search Results '<?php echo htmlspecialchars($query) ?>'</h2>

<?php if (!empty($results['topics'])): ?>

<h3>Matching Topics:</h3>
<table><tbody>
<?php foreach ($results['topics'] as $r): ?>
    <tr>
        <td><a href="viewtopic.php?topic_id=<?= $r['id'] ?>"><?= htmlspecialchars($r['title']) ?> by <?= htmlspecialchars($r['author']) ?></a></td>
    </tr>
<?php endforeach; ?>
</tbody></table>
<?php endif; ?>

<?php if (!empty($results['messages'])): ?>
    <h3>Matching Messages:</h3>
    <table><tbody>
        <?php foreach ($results['messages'] as $r): ?>
            <tr>
                <td><a href="viewtopic.php?topic_id=<?= $r['id'] ?>"><?= htmlspecialchars($r['title']) ?></a></td>
                <td><?= $r['author'] ?></td>
                <td><?= $r['content'] ?></td>
                <td><?= $r['timestamp'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody></table>
<?php endif; ?>

<?php if (empty($results['topics']) && empty($results['messages'])): ?>
    <p>No matches found.</p>
<?php endif; ?>

<p><a href="index.php">Back to Topics</a></p>
