<?php


    function DisplayPostCard($posts){

        if($posts == null){
            echo "<h3 class='text-center text-light mt-5'>কোন পোস্ট পাওয়া যায়নি</h3>";
            return;
        }

        foreach (array_chunk($posts, 4) as $postRow) {
            echo '<div class="row mt-4">';
            foreach ($postRow as $post) {

                $type = ucwords($post['type']);
                $type = $type.' '."Space";

                $area = ucwords($post['area']);
                $division = ucwords($post['division']);
                $place = $area.', '.$division;
                $id = $post['id'];

                $imgArray = explode(', ', $post['image']);
                $img = $imgArray[0];

               echo "<div class='col-lg-3'>";

                echo    "<div class='card'>";

                echo    "<img draggable='false' src= '/Basha%20Lagbe%20-%20v1.0.0/uploads/{$img}' class='card-img-top mycard-img' alt='room pictures'>";

                echo    "<div class='card-body'>";

                echo "<h5 class='card-title'>$type</h5>";

                echo   "<p class='card-text'>$place</p>";

                echo  "<a href='post-details.php?id=$id' class='details-btn'>বিস্তারিত দেখুন</a>";

                echo   "</div>";

                echo    "</div>";

                echo "</div>";

            }
            echo '</div>';
        }
    }


?>