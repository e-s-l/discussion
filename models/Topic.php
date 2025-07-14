<?php

$baseDir = $_SERVER['DOCUMENT_ROOT'];
$modelsDir = $baseDir."/models";
require_once($modelsDir."/Entry.php");

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
