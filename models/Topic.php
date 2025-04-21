<?php

require_once('models/Entry.php');

class Topic extends Entry {

    public function __construct(
        public string $title,
        public string $author,
        public int $timestamp
    ) {
        parent::__construct($author, $timestamp);
    }

    // what specific topic entries

}
?>
