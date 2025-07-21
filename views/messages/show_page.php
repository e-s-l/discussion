<main>

<div class="title">
    <h2><?php echo strtolower($pageTitle) ?></h2>
    <?php 
    if (count($messages) > 1) {
        require(FORM_VIEWS."/sort_form.php");
    }
    ?>
</div>

<?php
// the table listing messages within topic
require(MESSAGE_VIEWS.'/list_messages.php');
// the reply section
require(FORM_VIEWS.'/post_reply.php');
?>
</main>
