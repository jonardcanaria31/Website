document.addEventListener("DOMContentLoaded", () => {
    const signUpForm = document.getElementById("signup");
    const signInForm = document.getElementById("signIn");
    const signUpButton = document.getElementById("signUpButton");
    const signInButton = document.getElementById("signInButton");
  
    // Handle sign-up visibility toggle
    signUpButton.addEventListener("click", () => {
      signUpForm.style.display = "block";
      signInForm.style.display = "none";
    });
  
    // Handle sign-in visibility toggle
    signInButton.addEventListener("click", () => {
      signInForm.style.display = "block";
      signUpForm.style.display = "none";
    });
  
    // Redirect logic
    const redirectSignIn = document.getElementById("signInButton");
    if (redirectSignIn) {
      redirectSignIn.addEventListener("click", () => {
        window.location.href = "index.php";
      });
    }
  });
  document.addEventListener("DOMContentLoaded", function () {
    const homeLink = document.getElementById('homeLink');
    const menuLink = document.getElementById('menuLink');
    const menuSection = document.getElementById('menu');
  
    // Scroll listener to dynamically change nav highlights
    window.addEventListener('scroll', function () {
      const scrollPos = window.scrollY;
      const menuOffset = menuSection.offsetTop - 100;
  
      if (scrollPos >= menuOffset) {
        menuLink.classList.add('active');
        homeLink.classList.remove('active');
      } else {
        homeLink.classList.add('active');
        menuLink.classList.remove('active');
      }
    });
  
    // Smooth scroll behavior on menu link click
    menuLink.addEventListener("click", function (e) {
      e.preventDefault();
      window.scrollTo({
        top: menuSection.offsetTop,
        behavior: "smooth"
      });
    });
  });
  
    document.addEventListener("DOMContentLoaded", function () {
      const homeLink = document.getElementById('homeLink');
      const menuLink = document.getElementById('menuLink');
      const menuSection = document.getElementById('menu');

      // Listen to scroll to dynamically change nav highlights
      window.addEventListener('scroll', function () {
        const scrollPos = window.scrollY;
        const menuOffset = menuSection.offsetTop - 100;

        if (scrollPos >= menuOffset) {
          menuLink.classList.add('active');
          homeLink.classList.remove('active');
        } else {
          homeLink.classList.add('active');
          menuLink.classList.remove('active');
        }
      });

      // Scroll to menu section when clicking menu link
      menuLink.addEventListener("click", function (e) {
        e.preventDefault();
        window.scrollTo({
          top: menuSection.offsetTop,
          behavior: "smooth"
        });
      });
    });
   