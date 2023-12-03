
<?php



    
function Navbar($ISLOGIN, $img){

    if ($img == "") {   
        $Profileimg = "dp.jpg";
    }else{
        $Profileimg = $img;
    }
   
      echo "<nav>";
           echo "<div class='container nav-wrapper'>";

               echo "<div class='logo'>";
                   echo " <a href='./index.php'>বাসা লাগবে</a>";
               echo "</div>"; 

                echo "<div class='menu'>";
                    echo "<ul>";
                        echo "<li><a href='./index.php'>হোম</a></li>";
                        echo "<li><a href='./about.php'>আমাদের সম্পর্কে</a></li>";
                        echo "<li><a href='./contact.php'>যোগাযোগ</a></li>";

                        echo "<li><a href='./post.php' class='post'>
                            <i class='fa-solid fa-plus'></i>
                            পোস্ট করুন
                            </a>
                        </li>";
                    echo "</ul>";
                    
                echo "</div>";

                if ($ISLOGIN) {
                    echo "<div class='avatar' id='avatar-container'>
                        <img src='/Basha%20Lagbe%20-%20v1.0.0/uploads/{$Profileimg}' alt='avatar' class='img-fluid'>

                        <div class='avatar-dropdown' id='avatar-dropdown'>
                            <ul>
                                <li>
                                    <a href='profile.php'>
                                        <i class='fa-solid fa-user'></i>
                                        প্রোফাইল
                                    </a>
                                </li>
                                <li>
                                    <a href='logout.php'>
                                        <i class='fa-solid fa-right-from-bracket'></i>
                                        লগআউট
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>";
                }
                else{
                    echo "<div>
                    <a href='./signin.php' class='text-light fw-bold'>লগইন করুন</a>
                    </div>";
                }
                
                
            echo "</div>";
            echo " </nav>";
}