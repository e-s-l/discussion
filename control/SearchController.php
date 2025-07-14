<?php

require_once('models/SearchAll.php');

class SearchController {

    public function searchAndShow(string $query): void {

        $search = new SearchAll();
        $results = $search->searchAll($query);

        /*********
        the views
        **********/

        // the the page header
        include('views/header.php');

        // the search results
        include('views/search_results.php');

        // the end
        include('views/footer.php');

    }

}

?>
