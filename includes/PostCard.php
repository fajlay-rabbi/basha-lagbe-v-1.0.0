<?php


    function DisplayPostCard(){

        foreach (array_chunk($posts, 4) as $postRow) {
            echo '<div class="row">';
            foreach ($postRow as $post) {


               echo "<div class='col-lg-3'>";

                echo    "<div class='card'>";

                echo    "<img draggable='false' src='./src/assets/room.jpg' class='card-img-top' alt='room pictures'>";

                echo    "<div class='card-body'>";

                echo "<h5 class='card-title'>Office Space</h5>";

                echo   "<p class='card-text'>Merul Badda, Dhaka</p>";

                echo  "<a href='#' class='details-btn'>বিস্তারিত দেখুন</a>";

                echo   "</div>";

                echo    "</div>";

                echo "</div>";

            }
            echo '</div>';
        }
    }


?>