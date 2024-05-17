 <?php 
session_start();
if(empty($_SESSION['username'])){
    header('location: 404page.php');
    die();
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard page</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<aside>
        <div id="logosec">
          <img src="img/OFPPT.png" alt="">
          <p id="title">Ofppt Hackathon</p>
        </div>
        <div class="items">

            <ul>
                <li class="active"><i class="fa-regular fa-user mt-1"></i> Dashboard</li>
                <li><i class="fa-regular fa-user mt-1"></i> MY COURSES</li>
                <li><i class="fa-regular fa-user mt-1"></i> MY CERTIFICATES</li>
                <li><i class="fa-regular fa-user mt-1"></i> MY LICENSES</li>
                <li><i class="fa-solid fa-book mt-1"></i> MY ORDERS</li>
                <li><i class="fa-regular fa-user mt-1"></i> MY GROUPS</li>
            </ul>

        </div>
    </aside>

    <!-- nav bar -->
<div class="divNav">
<nav class="navbar navbar-expand-lg bg-dark navbar-dark" id="nav">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse me-4" id="navbarNavAltMarkup" >
      <div class="navbar-nav mt-3" id="space">
        <li>
            <a class="nav-link active fs-4" aria-current="page" href="#">Home</a>
        </li>
        <ul class="nav-item dropdown" >
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="img/profile1.png" class="profile">
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            <li><a class="dropdown-item" > action</a></li>
          </ul>
        </ul>
      </div>
    </div> 
  </div>
</nav>

<main>
  <div class="welcome">
  <?php
      if(isset($_SESSION['username'])){
          echo "Welcome  ". $_SESSION['username'] . " to dashboard page";
      }
    ?> 
  </div>
</main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>