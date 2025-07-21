<main>

<!--
 * FIXME
 * duplicate code, between topics/messages
-->

<div class="title">
    <h2><?php echo strtolower($pageTitle) ?></h2>
    <?php include(FORM_VIEWS."/sort_form.php") ?>
</div>

<?php
// the table listing current topics
include(TOPIC_VIEWS.'/list_topics.php');
// the submission section
include(FORM_VIEWS.'/post_message.php');
?>
</main>
