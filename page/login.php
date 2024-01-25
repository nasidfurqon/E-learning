<?php
include_once "../connection.php";
if(isset($_POST['submit'])){ 
    $conn = connect();
    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->execute([$_POST['email']]);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $user = $stmt->fetch();
    if ($user){
        if(password_verify($_POST['password'], $user['password'])){
            $_SESSION['UserId'] = $user['id'];
            header('Location: /index.php?page=dashboard');
        }
        else{
            echo "tes";
        }
    }   
    else{
        echo "tes";
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/style/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Caveat&family=Courgette&family=Dancing+Script&family=Exo+2:ital,wght@1,300&family=Handlee&family=Pangolin&family=Quicksand:wght@500&family=Shadows+Into+Light&family=Sono:wght@300&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
</head>
  <body>
    <div class="container-fluid">
        <div class="card bg-transparent border-white position-absolute top-50 start-50 translate-middle" style="width: 18rem; height: 20.3rem;">
            <div class="card-body">
                <h5 class="card-title text-center pb-3 pt-3 text-white fw-bold fs-2">Login</h5>
                <form action="login.php" method="post" enctype="multipart/form-data" class="p-2">
                    <div class="form-group mb-4 ">    
                        <span class="fa-solid fa-envelope position-absolute icon"></span>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group mb-4">
                        <span class="fa-solid fa-lock position-absolute icon"></span>
                        <input type="text" name="password" id="password" class="form-control" placeholder="Password">
                    </div> 
                    <input type="submit" name="submit" value="Login" class="btn-login btn bg-white form-control fw-bold mb-1" style="width: 100%;">
                </form>
                <small class="ps-4 text-white ">Don't have an account? <a href="register.php" class="text-white text-decoration-none">Register</a></small>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/01b9b143dd.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>