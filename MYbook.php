<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

$username = $_SESSION['username'];
$profile_pic = !empty($_SESSION['profile_pic']) ? $_SESSION['profile_pic'] : 'default.png';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYbook Bookstore</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body>

<!-- Sidebar 
<aside class="sidebar">
    <div class="logo">
        <h2>MYbook</h2>
    </div>

    <ul class="menu">
        <li><a href="mybook.php"><i class='bx bx-home'></i> Home</a></li>
        <li><a href="english.php"><i class='bx bx-book'></i> English</a></li>
        <li><a href="history.php"><i class='bx bx-book'></i> History</a></li>
        <li><a href="science.php"><i class='bx bx-book'></i> Science</a></li>
        <li><a href="contact.php"><i class='bx bx-phone'></i> Contact</a></li>
    </ul>
    --->

    <!-- Sidebar -->
<aside class="sidebar">
    <div class="logo">
        <h2>MYbook</h2>
    </div>

    <ul class="menu">
        <li><a href="mybook.php"><i class='bx bx-home'></i> Home</a></li>
        <li><a href="english.php"><i class='bx bx-book'></i> English</a></li>
        <li><a href="history.php"><i class='bx bx-book'></i> History</a></li>
        <li><a href="science.php"><i class='bx bx-book'></i> Science</a></li>
        <li><a href="contact.php"><i class='bx bx-phone'></i> Contact</a></li>
    </ul>

    <!-- Profile section -->
    <div class="sidebar-user">
        <img src="<?php echo $_SESSION['profile_pic'] ?? 'default.png'; ?>" 
             alt="Profile" 
             class="profile-pic" 
             id="profilePic">

        <span class="username"><?php echo $_SESSION['username'] ?? 'Guest'; ?></span>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</aside>

<!-- Profile Modal -->
<div id="profileModal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <h2>User Profile</h2>
        <img src="<?php echo $_SESSION['profile_pic'] ?? 'default.png'; ?>" class="modal-pic">

        <p><strong>Name:</strong> <?php echo $_SESSION['name'] ?? 'N/A'; ?></p>
        <p><strong>Email:</strong> <?php echo $_SESSION['email'] ?? 'N/A'; ?></p>
        <p><strong>Username:</strong> <?php echo $_SESSION['username'] ?? 'N/A'; ?></p>
        <p><strong>Gender:</strong> <?php echo $_SESSION['gender'] ?? 'N/A'; ?></p>
    </div>
    
</div>


    <!-- Profile section -->
    <div class="sidebar-user">
        <img src="<?php echo $_SESSION['profile_pic'] ?? 'default.png'; ?>" alt="Profile" class="profile-pic">
        <span class="username"><?php echo $_SESSION['username'] ?? 'Guest'; ?></span>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</aside>

<!-- Main Content -->
<main class="main-content">

<section id="home" class="home-section">
    <div class="home-content">
        <h1>Welcome to <span>MYbook</span></h1>
        <p>Your one-stop destination for books, knowledge, and inspiration.</p>
        <a href="#categories" class="btn-home">Explore Books</a>

    </div>
    <div class="home-image">
        <img src="front.jpg" alt="Bookstore">
    </div>
</section>

<!----- Book Categories ------>
<section id="categories">
<div class="cat-books">
    <div class="books english">
        <h4><a href="english.html">English</a></h4>
        <p>Enjoy your reading and share knowledge to everyone.</p>
    </div>

    <div class="books history">
        <h4><a href="history.html">History</a></h4>
        <p>Enjoy your reading and share knowledge to everyone.</p>
    </div>

    <div class="books geography">
        <h4><a href="Geography.html">Geography</a></h4>
        <p>Enjoy your reading and share knowledge to everyone.</p>
    </div>

    <div class="books science">
        <h4><a href="Science.html">Science</a></h4>
        <p>Enjoy your reading and share knowledge to everyone.</p>
    </div>

    <div class="books physics">
        <h4><a href="Physics.html">Physics</a></h4>
        <p>Enjoy your reading and share knowledge to everyone.</p>
    </div>

    <div class="books chemistry">
        <h4><a href="Chemistry.html">Chemistry</a></h4>
        <p>Enjoy your reading and share knowledge to everyone.</p>
    </div>
</div>
</section>

<!----- About Section ----->
<section id="set-about">
    <div class="set-row">
        <!-- Left side image -->
        <img src="Homeimg.png" alt="About MYbook Store">

        <!-- Right side content -->
        <div class="about-content">
            <h2>About Our MYbook Store</h2>
            <p>Enjoy your reading and share knowledge with everyone. We offer a wide variety of books across genres to make your reading experience richer and more enjoyable.</p>
            <a href="#" class="btn2">Read More</a>
        </div>
    </div>
</section>


<!----- ContactUs Section ----->

<section id="contactus">
  <div class="contact-row">
    <div class="col">
      <img src="contact.png" alt="Contact Us">
    </div>
    <div class="col">
        <form action="contact.php" method="POST">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="phone" placeholder="Phone Number" required>
        <textarea name="message" placeholder="Message" required></textarea>
        <input type="submit" value="SEND">
        </form>
  </div>
</section>



    <!-- Footer -->
    <div class="footer">
        <p>@2025 All Rights Reserved By Free Online Book Shop</p>
    </div>

</main>

<script>
    const profilePic = document.getElementById("profilePic");
    const modal = document.getElementById("profileModal");
    const closeBtn = document.querySelector(".close-btn");

    profilePic.addEventListener("click", () => {
        modal.style.display = "flex";
    });

    closeBtn.addEventListener("click", () => {
        modal.style.display = "none";
    });

    window.addEventListener("click", (e) => {
        if (e.target == modal) {
            modal.style.display = "none";
        }
    });
</script>

</body>
</html>
