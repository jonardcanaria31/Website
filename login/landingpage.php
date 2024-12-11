<?php
session_start();
?>
  <!-- Section 4: Contact Usdsda dsd -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navigation Bar with Scroll Highlights</title>

  <!-- Linking CSS -->
  <link rel="stylesheet" href="landingpage.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Angkor&family=Poppins&display=swap" rel="stylesheet">
</head>
<body>

  <!-- Navigation Section -->
  <nav>
    <!-- Left Side Navigation -->
    <div class="left-nav">
      <ul>
        <li><a href="#home" class="nav-link active" id="homeLink">Home</a></li>
        <li><a href="#menu" class="nav-link" id="menuLink">Menu</a></li>
      </ul>
    </div>

    <!-- Logo Section -->
    <div class="logo">
      <a href="#">
        <img src="images/cafe logo.png" alt="Cafe Logo">
        <span><span class="go">GO</span><span class="fee">ffee</span></span>
      </a>
    </div>

    <!-- Right Side Navigation -->
    <div class="right-nav">
      <ul>
        <li><a href="#about" class="nav-link" id="aboutLink">About Us</a></li>
        <li><a href="#contact" class="nav-link" id="contactLink">Contact</a></li>
        <li>
          <a href="#">
            <img src="images/shopping-cart.png" alt="Shopping Cart">
          </a>
        </li>
        <?php if (isset($_SESSION['email']) && isset($_SESSION['fName'])): ?>
          <li><a href="#">Hello, <?php echo htmlspecialchars($_SESSION['fName']); ?>!</a></li>
          <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
          <li><a href="index.php">Sign In</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>

  <!-- Section 1: Hero Section -->
  <section class="section-one" id="home">
    <div class="goffe-description">
      <h1>GOffe</h1>
      <p>Elevating your cravings with every order. Discover the perfect mix of flavor, convenience, and delight, delivered straight to you for an unforgettable experience!</p>
      <!-- Pass login state to JavaScript -->
      <button class="order-button" id="orderButton" data-logged-in="<?php echo isset($_SESSION['email']) ? 'true' : 'false'; ?>">Order Now</button>
    </div>
  </section>

  <!-- Section 2: Menu Section -->
  <section class="section-two" id="menu">
    <div class="flavors-section">
      <h2>Explore Our Flavors</h2>
      <div class="flavors-container">
        <div class="flavor-item">
          <img src="images/iced coffe.png" alt="Iced Coffee" class="center-iced">
          <p>Iced Coffee</p>
        </div>
        <div class="flavor-item middle-box">
          <img src="images/pasta.png" alt="Meals" class="center-pasta">
          <p>Meals</p>
        </div>
        <div class="flavor-item third-box">
          <img src="images/matcha.webp" alt="Non-Coffee">
          <p>Non-Coffee</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Section 3: About Us Section -->
  <section class="section-three" id="about">
    <div class="about-container">
      <h2>About Us</h2>
      <p>At GOffe, we value the art of crafting the perfect cup of coffee and offering delightful meals. Every bean and ingredient is hand-selected to ensure quality and freshness. Our team is committed to sustainability and community growth by sourcing locally and maintaining a positive experience for every customer.</p>
    </div>
  </section>

  <!-- Section 4: Contact Us Section -->
  <section class="section-four" id="contact">
    <div class="contact-container">
      <h2>Contact Us</h2>
      <p>We’d love to hear from you! Whether you have inquiries, feedback, or collaboration ideas, you can reach out to us using the information below:</p>
      <ul>
        <li>Email: support@goffe.com</li>
        <li>Phone: +1 (555) 123-4567</li>
        <li>Address: 123 GOffe Lane, Coffeeville, USA</li>
      </ul>
      <p>Follow us on our social media channels for news and updates:</p>
      <ul>
        <li><a href="#">Instagram</a></li>
        <li><a href="#">Facebook</a></li>
        <li><a href="#">Twitter</a></li>
      </ul>
    </div>
  </section>

  <!-- JavaScript Logic for Scroll and Highlight -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const sections = document.querySelectorAll("section");
      const navLinks = document.querySelectorAll(".nav-link");

      // Scroll effect logic
      window.addEventListener("scroll", function () {
        let currentScroll = window.scrollY;

        sections.forEach(section => {
          const sectionTop = section.offsetTop - 100;
          const sectionHeight = section.offsetHeight;
          const id = section.getAttribute("id");

          if (currentScroll >= sectionTop && currentScroll < sectionTop + sectionHeight) {
            navLinks.forEach(link => link.classList.remove("active"));
            const activeLink = document.getElementById(`${id}Link`);
            if (activeLink) activeLink.classList.add("active");
          }
        });
      });

      // Handle Order Now Button
      const orderButton = document.getElementById("orderButton");
      const loggedIn = orderButton.dataset.loggedIn === 'true';

      orderButton.addEventListener("click", function () {
        if (loggedIn) {
          const menuSection = document.getElementById("menu");
          menuSection.scrollIntoView({ behavior: "smooth" });
        } else {
          window.location.href = "index.php";
        }
      });
    });
  </script>
</body>
</html>
