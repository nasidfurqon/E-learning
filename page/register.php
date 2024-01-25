<?php
include_once "../connection.php";
// session_start(); 

    if(isset($_POST['submit'])) {
        $conn = connect();
        $password = $_POST['password'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO user (email, password, name) VALUES (?, ?, ?)");
        $stmt->execute([$_POST['email'], $hashed_password, $_POST['username']]);
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/style/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Caveat&family=Courgette&family=Dancing+Script&family=Exo+2:ital,wght@1,300&family=Handlee&family=Pangolin&family=Quicksand:wght@500&family=Shadows+Into+Light&family=Sono:wght@300&family=Ubuntu:wght@300&display=swap" rel="stylesheet"> 
</head>
  <body>
    <div class="container-fluid">
        <div class="card bg-transparent border-white position-absolute top-50 start-50 translate-middle" style="width: 18rem; height: 23.9rem;">
            <div class="card-body">
                <h5 class="card-title text-center pb-3 pt-3 text-white fw-bold fs-2">Register</h5>
                <form action="register.php" method="post" enctype="multipart/form-data" class="p-2">
                    <div class="form-group mb-4 ">    
                        <span class="fa-solid fa-envelope position-absolute icon"></span>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group mb-4 ">    
                        <span class="fa-solid fa-user    position-absolute icon"></span>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group mb-4">
                        <span class="fa-solid fa-lock position-absolute icon"></span>
                        <input type="text" name="password" id="password" class="form-control" placeholder="Password">
                    </div> 
                    <input type="submit" name="submit" value="Register" class="btn-login btn bg-white form-control fw-bold mb-1" style="width: 100%;">
                </form>
                <small class="text-white back-login">Back to <a href="login.php" class="text-white text-decoration-none">Login</a></small>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/01b9b143dd.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>