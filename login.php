<?php
// Include the database connection
include 'config.php';
// Set vars to empty values
$email = $password = '';
$emailErr = $passwordErr = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // validation input email if empty
  if (empty($_POST['email'])) {
    $emailErr = 'Please provide a valid email';
  } else {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  }

  // validation input password if empty
  if (empty($_POST['password'])) {
    $passwordErr = 'Please provide a valid password';
  } else {
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }

  if (empty($emailErr) && empty($passwordErr)) {
    try {
      $sql = $pdo->prepare("SELECT * FROM users WHERE email = ?");
      $sql->execute([$email]);
      $user = $sql->fetch();

      if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['username'] = $user['username'];
        header('location: dashboard.php');
      } else {
        // Display error message
        echo '<div class="alert alert-danger">Invalid email or password.</div>';
      }
    } catch (PDOException $e) {
      echo 'error :' . $e->getMessage();
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
  <link rel="stylesheet" href="css/login.css" />
  <title>Login Page</title>
</head>

<body id="body" >
  <div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
  </div>
  <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <h3>Login Page</h3>
    <label for="email">Email</label>
    <input type="email" class="<?= $emailErr ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Enter your Email" value="<?= $email; ?>">
    <div class="invalid-feedback"> <?= $emailErr ?></div>
    <label for="password">Password</label>
    <input type="password" class="<?= $passwordErr ? 'is-invalid' : ''; ?> " id="password" name="password" placeholder="Password" value="<?= $password; ?>">
    <div class="invalid-feedback"> <?= $passwordErr ?></div>
    <button type="submit" class="login-btn">Login</button>
    <p class="sign-up">Don't have an account? <a href="sign-up.php">Sign up here</a></p>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
