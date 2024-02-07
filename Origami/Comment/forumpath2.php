<?php
include "Connection.php";
if (!isset($_SESSION["comment"])) {
    $_SESSION["comment"] = "";
}
$is_page_refreshed =
    isset($_SERVER["HTTP_CACHE_CONTROL"]) &&
    $_SERVER["HTTP_CACHE_CONTROL"] == "max-age=0";
if ($is_page_refreshed) {
    //echo 'Refreshed.';
} else {
    //echo 'Not refreshed.';
}
if (isset($_POST["comment"]) && $_SESSION["dupe"] != $_POST["comment"]) {
    if (strlen($_POST["comment"]) > 1) {
        $comment = $_POST["comment"];
        $user = $_SESSION["Username"];
        $idUser = sqli_takefirst(
            $con->query("SELECT ID FROM login where Username = '$user'")
        );
        $con->query("INSERT INTO comment2(text,poster,poster_ID)
        values('$comment','$user','$idUser')
        ");
        $_SESSION["dupe"] = $comment;
        $_POST = [];
    }
}
