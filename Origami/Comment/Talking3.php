
<?php
include "Comment/forumpath3.php";
$chat = $con->query("SELECT * from comment3");
while ($chat = mysqli_fetch_array($chat, MYSQLI_ASSOC)) {
    $text = $chat["Text"];
    $PosterID = $chat["Poster_ID"];
    $postername = $chat["Poster"];
    echo "<p>$postername says: $text </p>";
}

?>
