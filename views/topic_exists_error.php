<?php

/**
 * FIXME
 * 
 * use the general render into the layout.php
 * 
 * this should be a general error_view with passable args...
 */

$baseUrl = "/";

// include the the page header
include('header.php');

echo "<p>The topic already exists.</p>

<p><a href=\"$baseUrl.index.php\">Go Back</a></p>";

include("footer.php");

?>
