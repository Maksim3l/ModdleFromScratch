
<?php
        include "forumpath.php";
        $chat=$conn->query("SELECT * from chat");
        while($chats= mysqli_fetch_array(
            $chat,MYSQLI_ASSOC)){
                $text=$chats["Text"];
                $PosterID =$chats["Poster_ID"];
                $postername= $chats["Poster"];
                echo"<div class='amsg'><p class='poster'>$postername</p><p class='text'> $text </p></div>";
            }
    ?>