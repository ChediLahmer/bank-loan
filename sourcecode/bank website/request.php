<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <script src="https://kit.fontawesome.com/f57879fa7e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <script src="https://kit.fontawesome.com/f57879fa7e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" integrity="sha512-doJrC/ocU8VGVRx3O9981+2aYUn3fuWVWvqLi1U+tA2MWVzsw+NVKq1PrENF03M+TYBP92PnYUlXFH1ZW0FpLw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>E-BANQUE | Votre banque en ligne</title>
</head>
<body>
    <header class="header">
        
        <nav class="nav">
            <a href="index.php" class="nav_logo">SmartLend</a>
            <ul class="nav_items">
              <li class="nav_item">
                <a href="index.php" class="nav_link">Home</a>
                <a href="request.php" class="nav_link">Product</a>
                <a href="index.php#ser" class="nav_link">Services</a>
                <a href="index.php#contact" class="nav_link">Contact</a>
                <?php

if (isset($_SESSION["user_id"])) {
    $userType = $_SESSION["user_id"];
    // Check the user type to determine if they are an admin
    if ($userType === '1' || $userType === '2' || $userType === '3'  ) {
        // User is an admin, show the navbar link
        echo '<a href="search.php" class="nav_link">search <i class="fas fa-search"></i></a>';
    } else {
        echo ''; // Handle the case when the user is not an admin
    }
}
?>
              </li>
            </ul>
            
          </nav>
        </div>
        <div class="h-icons">
            <a href=""><i class="fa-solid fa-phone"></i></a>
            <a href=""><i class="fa-solid fa-bell"></i></a>
        </div>
        <div class="profile-dropdown">
            <div class="profile-dropdown-btn" onclick="toggle()">
                <div class="profile-icone">
                    <a href=""><i class="fa-solid fa-user"></i></a>
                </div>
                &nbsp;&nbsp;
                <span>
                <?php

if (isset($_SESSION["user_id"]) && isset($_SESSION["user_name"]) && isset($_SESSION["user_email"])) {
    echo '<span>' . $_SESSION["user_name"] . '</span>';
}?>
                </span>
                &nbsp;&nbsp;
                <i class="fa-solid fa-angle-down"></i>
            </div>
            <ul class="profile-dropdown-list">
                <li class="profile-dropdown-list-item">
                    <a href="">
                        <i class="fa-solid fa-user"></i>
                        Edit Profile
                    </a>
                </li>
                <li class="profile-dropdown-list-item">
                    <a href="">
                        <i class="fa-solid fa-chart-line"></i>
                        Analystics
                    </a>
                </li>
                <li class="profile-dropdown-list-item">
                    <a href="">
                        <i class="fa-solid fa-gear"></i>
                        Settings
                    </a>
                </li>
                <li class="profile-dropdown-list-item">
                    <a href="">
                        <i class="fa-solid fa-circle-question"></i>
                        Help & Support
                    </a>
                </li>
                <hr>
                <li class="profile-dropdown-list-item">
                    <a href="logout.php">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        Log out
                    </a>
                </li>
            </ul>
        </div>
    </header>
    <section class="home">
        <div class="hometxt">
            <div class="hero">
                <div class="hero-content">
                    <h1>Your online bank</h1>
                    <p>We make  everything easier, smarter and faster.</p>
                    <div class="credit-container">
                      <div class="credit">
                        <h3>Credit for companies</h3>
                        <p>This credit type is suitable for people that are looking for financing solutions.</p>
                        <a href="projectp1.php" class="btn">Request</a>
                      </div>
                      <div class="credit">
                        <h3>Credit for individuals</h3>
                        <p>This credit type is suitable for people that are looking for financing solutions.</p>
                        <a href="projectp2.php" class="btn">Request</a>
                      </div>
                    </div>
                  
                </div>
              </div
        </div>
    </section>

    
    <section class="footer" id="contact">
        <div class="footer-sm">
        <a href=""><i class="fa-brands fa-instagram"></i></a>
        <a href=""><i class="fa-brands fa-facebook"></i></a>
        <a href=""><i class="fa-brands fa-twitter"></i></a>        
    </div>
    <ul class="footer-list">
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php#ser">Services</a></li>
        <li><a href="index.php#about">About</a></li>
        <li><a href="index.php#contact">Find us</a></li>
    </ul>
    <p class="copyright">GLSI2 @ 2023</p>
    </section>


    <script>
        let pdl = document.querySelector(".profile-dropdown-list");
        let btn =document.querySelector(".profile-dropdown-btn") ;
       
        const toggle =() => pdl.classList.toggle("active");

        let cartIcon =document.querySelector("#cart-icon");
        let cart =document.querySelector(".cart");
        let closecart =document.querySelector("#cart-close");

        cartIcon.onclick= () =>{
            cart.classList.add("active")
        }
        closecart.onclick= () =>{
            cart.classList.remove("active")
        }
        
    </script>
</body>
</html>