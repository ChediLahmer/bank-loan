<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="form.css" />
    <link rel="stylesheet" href="style2.css" />
    <title>Registration Form</title>
    <link rel="shortcut icon" href="bank.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/f57879fa7e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <script src="https://kit.fontawesome.com/f57879fa7e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" integrity="sha512-doJrC/ocU8VGVRx3O9981+2aYUn3fuWVWvqLi1U+tA2MWVzsw+NVKq1PrENF03M+TYBP92PnYUlXFH1ZW0FpLw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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


// Retrieve the user type from the session
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
              
              <?php

if (isset($_SESSION["user_id"]) && isset($_SESSION["user_name"]) && isset($_SESSION["user_email"])) {
    echo '<span>' . $_SESSION["user_name"] . '</span>';
}?>
              
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
  <img src="imgs/img/loaning.gif" alt="">
  <h1>form for loan</h1>
  <div class="container">
    
    <form style="display:flex; flex-direction:column; align-items:center;" 
    action="http://localhost:3000/form2.php"  method="post">
      <div style="display:flex; flex-direction:row; justify-content:space-between; width: 100%;">
        <div class="input-col">
          <div class="input-group">
            <label for="cin">CIN:</label>
            <input type="text" id="cin" name="cin" required />
          </div>
          <div class="input-group">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required />
          </div>
          <div class="input-group">
            <label for="prenom">Prenom:</label>
            <input type="text" id="prenom" name="prenom" required />
          </div>
          <div class="input-group">
            <label for="adresse">Adresse:</label>
            <input type="text" id="adresse" name="adresse" required />
          </div>
        </div>
        <div class="input-col">
          <div class="input-group">
            <label for="code-postal">Code postal:</label>
            <input type="text" id="code-postal" name="code-postal" required />
          </div>
          <div class="input-group">
            <label for="ville">Ville:</label>
            <input type="text" id="ville" name="ville" required />
          </div>
          <div class="input-group">
            <label for="numerotel">Numero tel:</label>
            <input type="text" id="numerotel" name="numerotel" required />
          </div>
          <div class="input-group">
            <label for="date_de_demande">date:</label>
            <input type="date" id="date_de_demande" name="date_de_demande" required />
          </div>
        </div>
        
        <div class="input-col">
          <div class="input-group">
            <label for="type_de_credit">Type de credit:</label>
            <input type="text" id="type_de_credit" name="type_de_credit" required />
          </div>
          <div class="input-group">
            <label for="mtndemande">Le montant demande:</label>
            <input type="text" id="mtndemande" name="mtndemande" required />
          </div>
          <div class="input-group">
            <label for="typeres">Type de ressource:</label>
            <input type="tel" id="typeres" name="typeres" required />
          </div>
          <div class="input-group">
            <label for="mtnannuel">Montant Annuel:</label>
            <input type="text" id="mtnannuel" name="mtnannuel" required />
          </div>
        </div>
      </div>
      <button type="submit" class="new-button">Submit</button>


    </form>
  </div>
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
  <script src="form.js"></script>
</body>
</html>    