<main>

<div class="title">
    <h2><?php echo strtolower($pageTitle) ?></h2>
    <?php include(FORM_VIEWS."/sort_form.php") ?>
</div>

<!-- 
FIXME 
should only include the sort if more than one message/topic
-->

<?php
// the table listing messages within topic
include(MESSAGE_VIEWS.'/list_messages.php');
// the reply section
include(FORM_VIEWS.'/post_reply.php');
?>
</main>
