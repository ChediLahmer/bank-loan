const formOpenBtn = document.querySelector("#form-open"),
  home = document.querySelector(".home"),
  formContainer = document.querySelector(".form_container"),
  formCloseBtn = document.querySelector(".form_close"),
  signupBtn = document.querySelector("#signup"),
  loginBtn = document.querySelector("#login"),
  pwShowHide = document.querySelectorAll(".pw_hide");

formOpenBtn.addEventListener("click", () => home.classList.add("show"));
formCloseBtn.addEventListener("click", () => home.classList.remove("show"));

pwShowHide.forEach((icon) => {
  icon.addEventListener("click", () => {
    let getPwInput = icon.parentElement.querySelector("input");
    if (getPwInput.type === "password") {
      getPwInput.type = "text";
      icon.classList.replace("uil-eye-slash", "uil-eye");
    } else {
      getPwInput.type = "password";
      icon.classList.replace("uil-eye", "uil-eye-slash");
    }
  });
});

signupBtn.addEventListener("click", (e) => {
  
  formContainer.classList.add("active");
});
loginBtn.addEventListener("click", (e) => {
  
  formContainer.classList.remove("active");
});

// Get the necessary DOM elements
const menuBtn = document.querySelector('#menuBtn');
const sidenav = document.querySelector('.sidenav');

// Attach click event listener to the menu button
menuBtn.addEventListener('click', () => {
  // Toggle the 'show' class on the sidenav element
  sidenav.classList.toggle('show');

  // Check if the sidenav is currently showing
  if (sidenav.classList.contains('show')) {
    // Add the 'animate' class after a short delay to trigger the slide-in animation
    setTimeout(() => {
      sidenav.classList.add('animate');
    }, 100);

    // Remove the 'hide' class if it exists
    sidenav.classList.remove('hide');
  } else {
    // Add the 'animate' class immediately to trigger the slide-out animation
    sidenav.classList.add('animate');

    // Add the 'hide' class to trigger the slide-out animation
    sidenav.classList.add('hide');

    // Remove the 'animate' class after the transition completes to reset the sidenav's position
    setTimeout(() => {
      sidenav.classList.remove('animate');
      sidenav.classList.remove('hide'); // Remove the 'hide' class to reset the sidenav's position
    }, 500);
  }
});








