<?php
session_start();
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="search.css"> 
  <link rel="stylesheet" href="style3.css"> 
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <script src="https://kit.fontawesome.com/f57879fa7e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" integrity="sha512-doJrC/ocU8VGVRx3O9981+2aYUn3fuWVWvqLi1U+tA2MWVzsw+NVKq1PrENF03M+TYBP92PnYUlXFH1ZW0FpLw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>search data</title>
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
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
<div >
  <form method="post">
    <div class="control">
      <div class="input_box1">
        <input type="text" class="search-input1" placeholder="Search data" id="search" name="search" />
      </div>
      <select name="category">
        <option value="entreprise">Entreprise</option>
        <option value="individuel">Individuel</option>
      </select>
      <button type="submit" name="submit" class="btn">search &nbsp;<i class="fas fa-search search-icon"></i></button>
    </div>
    
  </form>
 
  <div class="container">
    <table class="table">
    <?php
    
if (isset($_POST['submit'])) {
    $search = $_POST['search'];
    $category = $_POST['category'];
    $_SESSION['category'] = $_POST['category'];
    // Assuming $con is the database connection variable
    $sql = "SELECT * FROM `$category`";
    
    if (!empty($search)) {
        $sql .= " WHERE id='$search'";
        $_SESSION['category'] = $search;
    }
    
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Retrieve column names
        $columns = mysqli_fetch_fields($result);

        // Print table with CSS styles
        echo '<style>';
        echo 'table {';
        echo '    margin-left:130px ;';
        echo '    color: white;';
        echo '    border-collapse: separate;';
        echo '    border-spacing: 10px;';
        echo '}';
        echo 'th {';
        echo '    font-weight: bold;';
        echo '    border-bottom: 2px solid white;';      
        echo '}';
        echo 'tr {';
        echo '    border-bottom: 2px solid white;';
        echo '}';
        echo 'td.buttons {';
        echo '    display: flex;';
        echo '    align-items: center;';
        echo '}';
        echo 'form.inline-form {';
        echo '    display: inline-block;';
        echo '}';
        echo 'button {';
        echo '    padding: 5px 10px;';
        echo '    margin-right: 5px;';
        echo '    font-size: 14px;';
        echo '    background-color: #4CAF50;';
        echo '    border: none;';
        echo '    color: white;';
        echo '    cursor: pointer;';
        echo '}';
        echo '</style>';

        echo "<table>";
        echo "<tr>";
        foreach ($columns as $column) {
            echo "<th>{$column->name}</th>";
        }
        echo "<th>Actions</th>";
        echo "</tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>{$value}</td>";
            }
            echo '<td class="buttons">';
            echo '<form method="post" action="delete.php?category=' . urlencode($category) . '&row_id=' . urlencode($row['id']) . '" class="inline-form">';
            
            echo '<input type="hidden" name="category" value="' . $category . '">';
            echo '<input type="hidden" name="row_id" value="' . $row['id'] . '">';
            echo '<button type="submit" name="delete" id="del">Delete</button>';
            echo '</form>';
            
            echo '<input type="hidden" name="row_num" value="' . $row['id'] . '">';
            echo '<button class="button" id="form-open" name="modify">Modify</button>';
            
          
            
          
            echo '</td>';
            echo "</tr>";
        }
        echo "</table>";
    } else {
      echo '<em style="color: red;text-align: center; font-size: 24px;">No results found.</em>';
    }
}
?>
    </table>
  </div>
</div>

<!-- Home -->
<section class="home">
  <div class="form_container">
    <i class="fas fa-times form_close"></i>

    <!-- modify form entreprise -->
    <div class="form login_form">

      <h2>modify loan</h2>
      <div class="container">
      <form style="display:flex; flex-direction:column; align-items:center;" action="code.php" method="post">
          <div style="display:flex; flex-direction:row; justify-content:space-between; width: 100%;">
            <div class="input-col">
            <div class="input-group">
                <div class="input_box">
                <label for="ID" class="idl">ID:</label>
                <input type="text" id="ID" name="ID" class="idd" required />
                </div>
              </div>
              <div class="input-group">
                <div class="input_box">
                  <label for="nom_entreprise">Nom de l'entreprise:</label>
                  <input type="text" id="nom_entreprise" name="nom_entreprise" required />
                </div>
              </div>
              <div class="input-group">
                <div class="input_box">
                  <label for="address">Adresse:</label>
                  <input type="text" id="address" name="address" required />
                </div>
              </div>
              <div class="input-group">
                <div class="input_box">
                  <label for="ville">Ville:</label>
                  <input type="text" id="ville" name="ville" required />
                </div>
              </div>
              <div class="input-group">
                <div class="input_box">
                  <label for="ca_annuel">Chiffre d'affaires annuel:</label>
                  <input type="text" id="ca_annuel" name="ca_annuel" required />
                </div>
              </div>
            </div>
            <div class="input-col">
              <div class="input-group">
                <div class="input_box">
                  <label for="raison_sociale">Raison Sociale:</label>
                  <input type="text" id="raison_sociale" name="raison_sociale" required />
                </div>
              </div>
              <div class="input-group">
                <div class="input_box">
                  <label for="code_postal">Code Postal:</label>
                  <input type="text" id="code_postal" name="code_postal" required />
                </div>
              </div>
              <div class="input-group">
                <div class="input_box">
                  <label for="telephone">Numéro de téléphone:</label>
                  <input type="tel" id="telephone" name="telephone" required />
                </div>
              </div>
              <div class="input-group">
                <div class="input_box">
                  <label for="benefice_net">Bénéfice Net:</label>
                  <input type="text" id="benefice_net" name="benefice_net" required />
                </div>
              </div>
            </div>
          </div>
          
          <button class="button" type="submit" name="edit_btn">Submit</button>
        </form>
      </div>
    </div>
  </div>
</section>


<!-- Home -->
<section class="home1">
  <div class="form_container">
  <i class="far fa-window-close close_icon"></i>

    <!-- Login Form -->
    <div class="form login_form">

      <h2>modify loan</h2>
      <div class="container">
        <form style="display:flex; flex-direction:column; align-items:center;" action="coding.php" method="post">
          <div style="display:flex; flex-direction:row; justify-content:space-between; width: 100%;">
            <div class="input-col">
            <div class="input-group">
                <div class="input_box">
                <label for="ID" class="idl">ID:</label>
                <input type="text" id="ID" name="ID" class="idd" required />
                </div>
              </div>
              <div class="input-group">
                <div class="input_box">
                  <label for="cin">CIN:</label>
                  <input type="text" id="cin" name="cin" required />
                </div>
              </div>
              <div class="input-group">
                <div class="input_box">
                  <label for="nom">Nom:</label>
                  <input type="text" id="nom" name="nom" required />
                </div>
              </div>
              <div class="input-group">
                <div class="input_box">
                  <label for="prenom">Prenom:</label>
                  <input type="text" id="prenom" name="prenom" required />
                </div>
              </div>
              <div class="input-group">
                <div class="input_box">
                  <label for="adresse">Adresse:</label>
                  <input type="text" id="adresse" name="adresse" required />
                </div>
              </div>
            </div>
            <div class="input-col">
              <div class="input-group">
                <div class="input_box">
                  <label for="code-postal">Code postal:</label>
                  <input type="text" id="code-postal" name="code-postal" required />
                </div>
              </div>
              <div class="input-group">
                <div class="input_box">
                  <label for="ville">Ville:</label>
                  <input type="text" id="ville" name="ville" required />
                </div>
              </div>
              <div class="input-group">
                <div class="input_box">
                  <label for="numerotel">Numero tel:</label>
                  <input type="text" id="numerotel" name="numerotel" required />
                </div>
              </div>
              <div class="input-group">
                <div class="input_box">
                  <label for="date_de_demande">date:</label>
                  <input type="date" id="date_de_demande" name="date_de_demande" required />
                </div>
              </div>
            </div>
            <div class="input-col">
              <div class="input-group">
                <div class="input_box">
                  <label for="type_de_credit">Type de credit:</label>
                  <input type="text" id="type_de_credit" name="type_de_credit" required />
                </div>
              </div>
              <div class="input-group">
                <div class="input_box">
                  <label for="mtndemande">Le montant demande:</label>
                  <input type="text" id="mtndemande" name="mtndemande" required />
                </div>
              </div>
              <div class="input-group">
                <div class="input_box">
                  <label for="typeres">Type de ressource:</label>
                  <input type="tel" id="typeres" name="typeres" required />
                </div>
              </div>
              <div class="input-group">
                <div class="input_box">
                  <label for="mtnannuel">Montant Annuel:</label>
                  <input type="text" id="mtnannuel" name="mtnannuel" required />
                </div>
              </div>
            </div>
          </div>
          <button class="button" name="c_btn">Submit</button>
        </form>
      </div>
    </div>
  </div>
</section>
<script>
  var category = "<?php echo $category; ?>";

const formOpenBtn = document.querySelector("#form-open");
const home = document.querySelector(".home");
const home1 = document.querySelector(".home1");
const formCloseBtn = document.querySelector(".form_close");
const formCloseicn = document.querySelector(".close_icon");
formOpenBtn.addEventListener("click", () => {
  if (category === "entreprise") {
    home.classList.add("show");
  } else if (category === "individuel") {
    home1.classList.add("show");
  }
});

formCloseBtn.addEventListener("click", () => home.classList.remove("show"));
formCloseicn.addEventListener("click", () => home1.classList.remove("show"));
</script>
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
