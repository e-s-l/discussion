<?php

require_once('models/Entry.php');

class Message extends Entry {

    public function __construct(
        public string $author,
        public string $content,
        public int $timestamp
    ) {
        parent::__construct($author, $timestamp);
    }

    public function formattedContent(): string {
        $message = $this->content;
        // a bit hacky way of rendering line breaks but no other html...
        $message = str_replace("<br/>", "\n", $message);
        return nl2br(htmlspecialchars($message));
    }

}

?>
