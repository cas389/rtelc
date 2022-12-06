<?php
  if(have_comments()){
    echo "<h3>Comments:</h3>";

    foreach($comments as $comment){
      echo "<div class='comment-block'>";
      echo   "<div class='comment-avatar-photo'>";
                echo get_avatar($comment, 120);
      echo    "</div>";
      echo    "<div class='comment-author-date'>";
                echo "<h4>" . get_comment_author() . "</h4>";
                echo get_comment_date();
      echo    "</div>";
      echo  "</div>";

      echo "<div class='col-md-10 comment-section-text'>";
        // Retreive the comment
        echo get_comment_text();
      echo "</div>";


    }
  }

?>
