<?php

$baseDir = $_SERVER['DOCUMENT_ROOT'];
$modelsDir = $baseDir."/models";
require_once($modelsDir."/Entry.php");

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
