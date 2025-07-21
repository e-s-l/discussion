<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/constants.php');
require_once(MODEL_DIR.'/SearchAll.php');

include(UTILITIES_DIR."/Render.php");

class SearchController {

    public function searchAndShow(string $query): void {

        $search = new SearchAll();
        $results = $search->searchAll($query);
        $viewPath = VIEW_DIR."/search_results.php";

        render($viewPath, [
            "query" => $query,
            "results" => $results,
        ]);
    }

}

?>
