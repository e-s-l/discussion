<?php

// DIRECTORIES
define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT']);
define('VIEW_DIR', ROOT_DIR . '/views');
define('FORM_VIEWS', VIEW_DIR . '/forms');
define('TOPIC_VIEWS', VIEW_DIR . '/topics');
define('MESSAGE_VIEWS', VIEW_DIR . '/messages');
define('MODEL_DIR', ROOT_DIR.'/models');


define('DATA_DIR', ROOT_DIR."/../data");
define('CONTROL_DIR', ROOT_DIR."/control");
define('UTILITIES_DIR', ROOT_DIR."/utilities");

// URLS
define('BASE_URL', '/');
define('CONTROL_URL', BASE_URL . 'control/');
define('UTILITIES_URL', BASE_URL.'utilities/');


/*********
 * FIXME *
 *********
 *
 * the data directory should NOT be within
 * the site's document tree.
 *
 * inconsistent between urls and dirs for trailing slashes
 * 
 */
?>
