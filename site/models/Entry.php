<?php

//abstract class to be extended by Topic and Message classes

abstract class Entry {

    public function __construct(
        public string $author,
        public int $timestamp
    ) {}

    public function formattedDate(): string {
        return date("Y-m-d H:i", $this->timestamp);
    }

    public function formattedAuthor(): string {
        return htmlspecialchars($this->author);
    }

}


?>
