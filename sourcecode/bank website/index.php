<!DOCTYPE html>
<!-- Coding by CodingLab || www.codinglabweb.com -->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="style.css" />
    <!-- Unicons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <script src="https://kit.fontawesome.com/f57879fa7e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" integrity="sha512-doJrC/ocU8VGVRx3O9981+2aYUn3fuWVWvqLi1U+tA2MWVzsw+NVKq1PrENF03M+TYBP92PnYUlXFH1ZW0FpLw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    <!-- Header -->
    <header class="header">
      <nav class="nav">
        <a href="#" class="nav_logo">SmartLend</a>

        <ul class="nav_items">
          <li class="nav_item">
            <a href="#" class="nav_link">Home</a>
            <a href="request.php" class="nav_link">Product</a>
            <a href="#ser" class="nav_link">Services</a>
            <a href="#contact" class="nav_link">Contact</a>
          </li>
        </ul>
        <!--
        <section id="menuBtn">
          <img src="img/menu.png" id="menu">
        </section>-->
        <div class="sidenav" id="sidenav">
          <div class="nav1">
            <a href="#about">Qui sommes-nous ?</a>
            <a href="#ser">Notre réseaux</a>
            <a href="#contact">Contact</a>
          </div>
        </div>
        <button class="button" id="form-open">Login</button>
        
      </nav>
    </header>
    <style>
      iframe{
        filter: invert(100%);
      }
    </style>
    <!-- Home -->
    <section class="home" id="h">
      <section class="main">
        
        <div class="hometxt">
            <h1 class="animated bounceInRight" style="animation-delay: 1s">Your online bank</h1>
            <p class="animated bounceInLeft" style="animation-delay: 1.5s">We make everything Easier</p>
        </div>
    </section>
  
      <div class="form_container">
        <i class="uil uil-times form_close"></i>
        <!-- Login From -->
        <div class="form login_form">
          <form action="http://localhost:3000/login.php"  method="post">
            <h2>Login</h2>

            <div class="input_box">
              <input type="email" name="email" id="email" placeholder="Enter your email" >
              <i class="uil uil-envelope-alt email"></i>
            </div>
            <div class="input_box">
              <input type="password" name="password" id="password" placeholder="Enter your password">
              <i class="uil uil-lock password"></i>
              <i class="uil uil-eye-slash pw_hide"></i>
            </div>

            <div class="option_field">
              <span class="checkbox">
                <input type="checkbox" id="check" />
                <label for="check">Remember me</label>
              </span>
              <a href="#" class="forgot_pw">Forgot password?</a>
            </div>
            <?php
                        session_start();
                            if (isset($_SESSION['error'])) {
                            echo '<em style="color: red; font-weight: bold;">Invalid credentials. Please try again.</em>';
                            unset($_SESSION['error']);
                                 }
                                ?>
            <button class="button">Login Now</button>

            <div class="login_signup">Don't have an account? <a href="#" id="signup">Signup</a></div>
          </form>
        </div>

        <!-- Signup From -->
        <div class="form signup_form">
          <form action="signup.php" method="post">
            <h2>Signup</h2>
            <div class="input_box">
              <i class="uil uil-user"></i>
              <input type="text" id="name" name="name" placeholder="Enter your name" required>
              
            </div>
            <div class="input_box">
              <input type="email" id="email" name="email" placeholder="Enter your email">
              <i class="uil uil-envelope-alt email"></i>
            </div>
            <div class="input_box">
              <input type="password" id="password" name="password" placeholder="Create password">
              <i class="uil uil-lock password"></i>
              <i class="uil uil-eye-slash pw_hide"></i>
            </div>
            <div class="input_box">
              <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm password">
              <i class="uil uil-lock password"></i>
              <i class="uil uil-eye-slash pw_hide"></i>
            </div>

            <button class="button" type="submit">Signup Now</button>

            <div class="login_signup">Already have an account? <a href="#" id="login">Login</a></div>
          </form>
        </div>
      </div>
    </section>
    <section id="qsn">
      <div class="title-text">
          <h2 id="about">Qui sommes-nous ?</h2>
      </div>
      <div class="qsnbox">
          <div class="qsnboxtxt">
              <p>We are a financial services company that provides customized solutions to meet the needs of our clients. Our mission is to help our clients achieve their financial objectives.</p>
          </div>
          <divc class="qsnboximg">
              <img src="img/banker.png" alt="pharmacie">
          </div>
      </div>
  </section>
  <section id="ser">
    <div class="title-text">
        <h2 id="about">Service</h2>
    </div>
    <div class="serbox">
        <div class="card">
            <div class="icon">
                <i class="fas fa-money-bill-wave"></i>
            </div>
            <div class="info">
                <h3>Facilité de paiement</h3>
                <p>Welcome to our website! We believe in providing our customers with a seamless and hassle-free payment experience. That's why we offer a convenient payment option called 'Facilité de Paiement' (Easy Payment). With Facilité de Paiement, making payments has never been easier</p>
            </div>
        </div>
        <div class="card">
            <div class="icon">
                <i class="fas fa-money-bill-alt"></i>
            </div>
            <div class="info">
                <h3>Consumer loans</h3>
                <p>Need financial assistance to fulfill your dreams? Look no further! At SmartLend, we understand the importance of accessible financing solutions. That's why we offer hassle-free consumer loans, designed to make borrowing easy and convenient for you.</p>
            </div>
        </div>
        <div class="card">
            <div class="icon">
                <i class="fa-solid fa-money-bill"></i>
            </div>
            <div class="info">
                <h3>Business loans</h3>
                <p>Are you an ambitious entrepreneur seeking funding to take your business to the next level? Look no further! At SmartLend, we specialize in providing hassle-free business loans, designed to fuel your growth and support your entrepreneurial journey.</p>
            </div>
        </div>
    </div>
</section>
<section class="wcs">
  <div class="testimonial">
      <div class="title-text">
          <h2 id="about">L'Avis Des Clients</h2>
          <br><br>
      </div>
      <div class="testimonial-text">
          <div class="user-text  active-text">
              <p>
                  J'ai récemment découvert cette plateforme et je suis vraiment satisfait de mes achats. Les options de recherche sont conviviales, ce qui facilite la navigation parmi les différents produits. De plus, j'ai reçu ma commande plus tôt que prévu et les articles étaient bien emballés. Je suis très heureux de cette expérience d'achat et je compte revenir sur cette plateforme à l'avenir.
              </p>
              <span>Mohamed hajji</span>
          </div>
          <div class="user-text">
              <p>
                  Je suis un client fidèle de cette plateforme depuis plusieurs années et je n'ai jamais été déçu. Les produits sont toujours de haute qualité, les prix sont compétitifs et la livraison est rapide. De plus, leur équipe d'assistance est toujours prête à répondre à mes questions. Je recommande cette plateforme à tous mes amis et collègues.
              </p>
              <span>Aymen Mimouni</span>
          </div>
          <div class="user-text">
              <p>
                  J'ai adoré mon expérience sur cette plateforme ! Le processus de commande était simple et rapide, et j'ai été impressionné par la qualité du service client. Je recommande vivement cette plateforme à tous ceux qui recherchent un service fiable et efficace.
              </p>
              <span>Zied Trabelsi</span>
          </div>
          <div class="user-text">
              <p>
                  Je suis un utilisateur régulier de cette plateforme et j'apprécie vraiment la diversité des services proposés. Que ce soit pour réserver un logement, commander de la nourriture ou réserver des billets pour des événements, cette plateforme offre une grande variété d'options. De plus, les avis des autres utilisateurs m'ont souvent aidé à prendre des décisions éclairées. Je recommande fortement cette plateforme pour sa commodité et sa fiabilité.                  
              </p>
              <span>Sami Laabidi</span>
          </div>
          <div class="user-text">
              <p>
                  J'ai eu un problème avec ma commande et j'ai contacté le service client de cette plateforme. Je dois dire que leur réponse a été rapide et efficace. Ils ont résolu mon problème rapidement et ont été très professionnels tout au long du processus. Cela m'a donné confiance dans cette plateforme et je continuerai à l'utiliser à l'avenir.
              </p>
              <span>Hassen Ben amor</span>
          </div>
      </div>
      <div class="testimonial-pic">
          <img src="imgs/user/user1.jpeg" alt="ronaldo" class="user-pic active-pic" onclick="showreview()">
          <img src="imgs/user/user2.jpeg" alt="ronaldo" class="user-pic" onclick="showreview()">
          <img src="imgs/user/user3.jpeg" alt="ronaldo" class="user-pic" onclick="showreview()" >
          <img src="imgs/user/user3.jpeg" alt="ronaldo" class="user-pic" onclick="showreview()" >
          <img src="imgs/user/user4.jpeg" alt="ronaldo" class="user-pic" onclick="showreview()" >
      </div>
  </div>
</section>
<section class="map" id="map">
  <div  class="title-text">
      <h2>Trouvez-Nous</h2>
  </div>
  <div class="mapbox">
      <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12777.040176852857!2d10.114285632153415!3d36.81228807009766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd33ba885363d3%3A0x1bc6d4d462bb6886!2sBank%20Of%20Tunisia!5e0!3m2!1sen!2stn!4v1683464712920!5m2!1sen!2stn" width="1000" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 
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
  <li><a href="index.php#h">Login</a></li>
</ul>
<p class="copyright">MALM @ 2023</p>
</section>

























<script>
  window.addEventListener('scroll', function () {
      var backToTopButton = document.querySelector('.back-to-top');
      if (window.pageYOffset > 300) {
          backToTopButton.style.display = "block";
      } else {
          backToTopButton.style.display = "none";
      }
  });




  let usertexts = document.getElementsByClassName("user-text");
  let userpics =document.getElementsByClassName("user-pic");

  function showreview(){
      for(userpic of userpics){
          userpic.classList.remove("active-pic");
      }
      for(userText of usertexts){
          userText.classList.remove("active-text");
      }
      let i = Array.from(userpics).indexOf(event.target);

      userpics[i].classList.add("active-pic");
      usertexts[i].classList.add("active-text");


  }

  const text=document.querySelector(".second-text");
  const textLoad = ()=> {
      setTimeout(() => {
          text.textContent="Easier"
      },0);
      setTimeout(() => {
          text.textContent="Faster"
      },4000);
      setTimeout(() => {
          text.textContent="Smarter"
      },8000);
  }
  textLoad();
</script>
    <script src="script.js"></script>
    
  </body>
</html>
