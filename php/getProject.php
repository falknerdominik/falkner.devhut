<?php

require("classes/package.php");

$project = $_GET['project'];

// create object
$p = new Package($project);
$p->sendResponse();




?>