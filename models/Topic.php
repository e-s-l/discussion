<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/constants.php');
require_once(MODEL_DIR."/Entry.php");

class Topic extends Entry {

    public function __construct(
        public int $id,
        public string $title,
        public string $author,
        public int $timestamp
    ) {
        $this->id = $id;
        $this->title = $title;
        parent::__construct($author, $timestamp);
    }

}
?>
