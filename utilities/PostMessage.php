<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 'On');

require("../resources/head.html");

        if (empty($_POST['topic']) || empty($_POST['name']) || empty($_POST['message'])) {
            echo "<p>All fields must be filled.</p>";

        } else {

            $topic = trim($_POST['topic']);
            $name = trim($_POST['name']);

            $_SESSION["user"] = $name;

            $message = str_replace(array("\r\n", "\r", "\n"), "<br/>", trim($_POST['message']));
            //$message = trim($_POST['message']);


            $timestamp = time();

        //    if (!is_dir("../messages")) {
        //        mkdir("../messages");
        //    }

            $topicsFile = "../data/topics.txt";
            $duplicate = false;
            $topicIndex = 1;

            if (file_exists($topicsFile) && filesize($topicsFile) > 0) {
                $lines = file($topicsFile);
                foreach ($lines as $line) {
                    $parts = explode("~", $line);
                    if (strcasecmp(trim($parts[0]),$topic) == 0) {
                        $duplicate = true;
                        break;
                    }
                    $topicIndex++;
                }
            }

            if ($duplicate) {
                echo "<p>The topic already exists.</p>
                <p><a href=\"index.php\">Go Back</a></p>";
            } else {

                header("location:../index.php");
                exit;
            }
        }

?>
