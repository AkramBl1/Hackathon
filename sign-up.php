<?php 
include 'config.php';
$email = $password = $name = $confirm_password = '';
$emailErr = $passwordErr = $nameErr = $confirm_passwordErr = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // validation input name if empty
    if (empty($_POST['name'])) {
        $nameErr = 'Please provide a valid name';
    } else{
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
    // validation input email if empty
    if (empty($_POST['email'])) {
        $emailErr = 'Please provide a valid email';
    } else{
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    }
    // validation input password if empty
    if (empty($_POST['password'])) {
        $passwordErr = 'Please provide a valid password';
    } else{
        $password = filter_input(INPUT_POST,'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      }
      // Validate Confirm password 
    if (empty($_POST['confirm_password'])) {
      $confirm_passwordErr = 'Please provide a valid password';
    } else {
      $confirm_password = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
    
    if (empty($nameErr) && empty($emailErr) && empty($passwordErr) && empty($confirm_passwordErr)  ) {
      // Check if passwords match
      if ($password !== $confirm_password) {
        echo '<div class="alert alert-danger">password Incorrect.</div>' ;
      }else{
        // hashing password
        $passwordhash = password_hash($password, PASSWORD_DEFAULT);
        // Check if the email already exists
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        if ($user) {
          echo '<div class="alert alert-danger"> Email already exist</div>' ;
        } else {
          $sql = $pdo->prepare("INSERT INTO users (username, email, password) 
          VALUES (:username, :email, :pwd);");
          $sql->execute(['username'=>$name, 'email'=>$email, 'pwd'=>$passwordhash]);
          header('Location: login.php');
        }   
  }
}
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
    <link rel="stylesheet" href="css/sign-up.css" />
    <title>Sign up </title>
    <style>
      form{
        margin-top: 15px;
        /* height: 600px; */
      }

      .login {
      font-size: 14px;
      margin-top: 20px;
        & a {
          font-size: 17px;
          font-weight: 700;
          color: black;
          text-decoration: none;
        } 
      }
    </style>
  </head>
  <body>
    <div class="background">
      <div class="shape"></div>
      <div class="shape"></div>
    </div>    
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" id="form">
      <h3>Sign up</h3>
      <label for="username">Username</label>
      <input type="text" class="<?= $nameErr ? 'is-invalid' : ''; ?>" id="name" name="name" placeholder="User name" value="<?= $name ?>">
      <div class="invalid-feedback" > <?= $nameErr ?></div>
      <label for="email">Email</label>
      <input type="text" class= <?= $emailErr ? 'is-invalid' : ''; ?> id="email" name="email" value="<?= $email; ?>" placeholder="Enter your email">
      <div class="invalid-feedback" > <?= $emailErr ?></div>
      <label for="password">Password</label>
      <input type="password" class="<?= $passwordErr ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="Password" value="<?= $password; ?>">
      <div class="invalid-feedback" > <?= $passwordErr ?></div>
      
      <label for="confirm_password">Confirm Password</label>
      <input type="password" class="<?= $confirm_passwordErr ? 'is-invalid' : ''; ?>" id="confirm_password" name="confirm_password" placeholder="password confirmation">
      <div class="invalid-feedback" > <?= $confirm_passwordErr ?></div>
      <button type="submit" onclick="Signup()">Sign Up</button>
      <p class="login">Already have an account? <a href="login.php">Login here</a></p>
    </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>