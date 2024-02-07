<?php
include "Database_Con.inc.php";
if(!isset($_SESSION['chat'])){
    $_SESSION['']='';
}
$is_page_refreshed = (isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] == 'max-age=0');
if($is_page_refreshed ) {
  //echo 'Refreshed.';
} else {
  //echo 'Not refreshed.';
}
    if(isset($_POST["chat"]) && $_SESSION['dupe'] !=$_POST["chat"]){
    if(strlen($_POST["chat"])>1)
    {
        $chat=$_POST["chat"];
        $user=$_SESSION["accountun"];
        $idUser=sqli_takefirst($conn->query("SELECT AccountId FROM accounts where AccountUsername = '$user'"));
        $conn->query("INSERT INTO chat (Text,Poster,Poster_ID)
        values('$chat','$user','$idUser')
        ");
        $_SESSION['dupe']=$chat;
        $_POST = array();
    }
    
}