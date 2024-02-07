
<?php
        include "Comment/forumpath.php";
        $comments=$con->query("SELECT * from comment1");
        while($comment= mysqli_fetch_array(
            $comments,MYSQLI_ASSOC)){
                $text=$comment["Text"];
                $PosterID =$comment["Poster_ID"];
                $postername= $comment["Poster"];
                echo"<p>$postername says: $text </p>";
            }
    ?>