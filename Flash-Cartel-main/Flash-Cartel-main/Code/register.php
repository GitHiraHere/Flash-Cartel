<?php
$pageTitle = "Flash Cartel registration page";
include 'header.php';

// Check if user is already signed in, and if so, send them to home page.
if (array_key_exists("user_id", $_SESSION)) {
  header("location: home.php");
  exit();
}
?>

<body>
  <div class="slide-in" style="width:420px; padding:40px; border-radius:25px;
    background:rgba(255,255,255,0.05); backdrop-filter:blur(15px);
    border:1px solid rgba(255,255,255,0.2); box-shadow:0 0 30px rgba(0,0,0,0.6);
    text-align:center;">

    <!-- Logo -->
    <div style="display:flex; align-items:center; justify-content:center; gap:10px; margin-bottom:6px;">
      <span style="color:#6cff4c; font-size:28px;">⚡</span>
      <span style="font-size:26px; font-weight:bold; color:white;">FLASH CARTEL</span>
    </div>

    <?php
    if (isset($_GET["error"])) {
      if ($_GET["error"] === "emptyinput") {
        echo '<div class="alert-error">Please fill in the form carefully!</div>';
      } else if ($_GET["error"] === "invaliduid") {
        echo '<div class="alert-error">Please choose an appropriate and unique username!</div>';
      } else if ($_GET["error"] === "invalidemail") {
        echo '<div class="alert-error">Please enter a valid email address!</div>';
      } else if ($_GET["error"] === "passwordsdontmatch") {
        echo '<div class="alert-error">Your passwords do not match!</div>';
      } else if ($_GET["error"] === "passwordnotstrong") {
        echo '<div class="alert-error">Password needs 8+ characters, uppercase, lowercase and a number.</div>';
      } else if ($_GET["error"] === "none") {
        echo '<div class="alert-error" style="color:#6cff4c; border-color:#6cff4c;">You are now registered!</div>';
      }
    }
    ?>

    <?php $view = $_GET["view"] ?? "choice"; ?>

    <!-- Choice view: Login or Sign Up buttons -->
    <?php if ($view === "choice"): ?>
      <p style="color:#9adf72; font-size:14px; margin:16px 0 20px;">Welcome! Please choose an option:</p>
      <a href="register.php?view=login" class="btn-choice-login">Login</a>
      <a href="register.php?view=register" class="btn-choice-signup">Sign Up to Flash Cartel</a>

    <!-- Login view -->
    <?php elseif ($view === "login"): ?>
      <a href="register.php" style="text-align:left; margin-bottom:16px;">← Back</a>
      <form action="includes/login.inc.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Username..." />
        <label for="pwd">Password:</label>
        <input type="password" id="pwd" name="pwd" placeholder="Password..." />
        <input type="submit" name="submit" value="Submit" />
        <a href="index.php">I forgot my password</a>
      </form>

    <!-- Register view -->
    <?php elseif ($view === "register"): ?>
      <a href="register.php" style="text-align:left; margin-bottom:16px;">← Back</a>
      <form action="includes/register.inc.php" method="post">
        <label for="username">Please choose a username:</label>
        <input type="text" id="username" name="username" placeholder="Username..." />
        <label for="email">Please enter your email address:</label>
        <input type="text" id="email" name="email" placeholder="Email..." />
        <label for="pwd">Please choose a unique password:</label>
        <input type="password" id="pwd" name="pwd" placeholder="Password..." />
        <label for="pwdRepeat">Please re-enter your password:</label>
        <input type="password" id="pwdRepeat" name="pwdRepeat" placeholder="Password..." />
        <input type="submit" name="submit" value="Submit" />
      </form>

    <?php endif; ?>

  </div>

  <?php include "footer.php"; ?>
</body>