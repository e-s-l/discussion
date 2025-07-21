<?php if (count($messages) > 0): ?>
    <table class="centre">
        <tbody>
            <?php foreach ($messages as $msg): ?>
                <tr>
                    <td>
                        <strong><?php echo $msg->formattedAuthor() ?></strong>
                        <?php echo $msg->formattedDate() ?><br><br>
                        <?php echo $msg->formattedContent() ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>error finding messages.</p>
<?php endif; ?>
