<?php 


function myFooter(){
    echo "<footer>
        <div class='container mt-5 bg-foot p-4 rounded-1'>
            <div class='row'>


                <div class='col-lg-4'>
                    <div class='footer-logo logo mb-3'>
                        <a href='./index.php'>বাসা লাগবে</a>
                    </div>

                    <div class='footer-social-links soc-link'>
                        <ul>
                            <li><a href='#'><i class='fa-brands fa-facebook-f'></i></a></li>
                            <li><a href='#'><i class='fa-brands fa-twitter'></i></a></li>
                            <li><a href='#'><i class='fa-brands fa-instagram'></i></a></li>
                        </ul>
                    </div>
                </div>


                <div class='col-lg-4'>
                    <div class='footer-links'>
                        <ul>
                            <li><a class='text-light fw-bold' href='./index.php'>হোম</a></li>
                            <li><a class='text-light fw-bold' href='./about.php'>আমাদের সম্পর্কে</a></li>
                            <li><a class='text-light fw-bold' href='./contact.php'>যোগাযোগ</a></li>
                            <li><a class='text-light fw-bold' href='./post.php'>পোস্ট করুন</a></li>
                        </ul>
                    </div>
                </div>


                <div class='col-lg-4'>
                    <div class='footer-address'>
                        <ul>
                            <li class='text-light'><i class='fa-solid fa-map-marker'></i> ঢাকা, বাংলাদেশ</li>
                            <li class='text-light'><i class='fa-solid fa-envelope'></i>
                                <a class='text-light' href='mailto: sheikhshovono6@gmail.com'> contact@BashaLagbe.com</a> </li>
                            <li class='text-light'><i class='fa-solid fa-phone'></i> +880 1234567890</li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </footer>";
}