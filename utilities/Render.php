<?php
function render(string $viewPath, array $vars = []): void {
    extract($vars);
    include(VIEW_DIR.'/layout.php');
}
?>
