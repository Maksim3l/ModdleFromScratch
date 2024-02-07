
<?php
include "Comment/forumpath2.php";
$comments = $con->query("SELECT * from comment2");
while ($comment = mysqli_fetch_array($comments, MYSQLI_ASSOC)) {
    $text = $comment["Text"];
    $PosterID = $comment["Poster_ID"];
    $postername = $comment["Poster"];
    echo "<p>$postername says: $text </p>";
}

?>
