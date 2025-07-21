<?php

// FIXME
// create a class out of this and move into models

function render(string $viewPath, array $vars = []): void {
    extract($vars);
    include(VIEW_DIR.'/layout.php');
}
?>
