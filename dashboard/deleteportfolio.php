<?php

session_start();
if(empty($_SESSION["user"])) {
  header("Location: login.php");
}

include_once "library/portfolio.php";

$result = new classPortfolio();
$result = $result->deletePortfolio($_GET["projectid"]);

if($result == 1) {
    header("Location: allportfolios.php");
} else {
    header("Location: allportfolios.php");
}