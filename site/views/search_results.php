<h2>search results for '<?php echo htmlspecialchars($query) ?>'</h2>

<?php if (!empty($results['topics'])): ?>

<h2>matching topics:</h2>
<table><tbody>
<?php foreach ($results['topics'] as $r): ?>
    <tr>
        <td><a href="viewtopic.php?topic_id=<?= $r['id'] ?>"><?= htmlspecialchars($r['title']) ?> by <?= htmlspecialchars($r['author']) ?></a></td>
    </tr>
<?php endforeach; ?>
</tbody></table>
<?php endif; ?>

<?php if (!empty($results['messages'])): ?>
    <h2>matching messages:</h2>
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
    <p>no matches found.</p>
<?php endif; ?>

<!--
<h4><a href="index.php">back to topics</a></h4>
-->
