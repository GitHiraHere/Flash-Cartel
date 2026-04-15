<?php
$pageTitle = "Home";
include "header.php";

if (!array_key_exists("user_id", $_SESSION)) {
  header("location: index.php");
  exit();
}
?>

<body class="home-page">

  <div class="navbar">

    <!-- Logo -->
    <div class="nav-logo">
      <span style="color:#6cff4c; font-size:22px;">⚡</span>
      <span style="font-weight:bold; font-size:16px;">FLASH CARTEL</span>
    </div>

    <!-- Welcome message -->
    <div class="nav-welcome">
      Welcome to Flash Cartel, <?php echo $_SESSION["username"]; ?>!
    </div>

    <!-- Edit Account dropdown -->
    <div class="nav-account">
      <button class="nav-account-btn">Edit Account ▾</button>
      <div class="nav-dropdown">
        <a href="edit_account.php">Edit username</a>
        <a href="edit_account.php?section=email">Edit email</a>
        <a href="edit_account.php?section=password">Change password</a>
        <a href="includes/logout.inc.php" class="logout-btn">Logout</a>
      </div>
    </div>

  </div>

  <p>This is the home page.</p>
  <?php
  include "footer.php";
