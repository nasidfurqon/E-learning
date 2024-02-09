<head>
    <link rel="stylesheet" href="/style/login.css">
</head>
<div class="container-fluid">   
    <!-- PHP CONNECTION TO DATABASE -->
    <?php
    include_once "../connection.php";
    if(isset($_POST['submit'])) :
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
        $stmt->execute([$_POST['email']]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $user = $stmt->fetch();
        if ($user):
            if(password_verify($_POST['password'], $user['password'])):
                $_SESSION['UserId'] = $user['id'];
                header("Location: /index.php?page=dashboard&userId={$user['id']}");
            
            // triggered when wrong password
            else : ?>
                <div class="alert position-absolute start-50  translate-middle bg-danger text-white border-danger bottom-0" style="width: 19rem;">
                <div class="alert-content d-flex top-0 position-absolute pt-1">
                    <i class="pt-1 fa-solid fa-circle-exclamation"></i>
                    <p class="ms-2">please enter the correct password !</p>
                </div>
                </div>
            <?php endif;
            
        //  triggered when wrong email 
        else : ?>
            <div class="alert position-absolute start-50  translate-middle bg-danger text-white border-danger bottom-0" style="width: 24rem;">
                <div class="alert-content d-flex top-0 position-absolute pt-1">
                    <i class="pt-1 fa-solid fa-circle-exclamation"></i>
                    <p class="ms-2">please enter the correct email and password !</p>
                </div>
                </div>
        <?php endif;
    endif;
    ?>
    <!-- END PHP CONNECTION -->

    <div class="card bg-transparent border-white position-absolute top-50 start-50 translate-middle" style="width: 18rem; height: 20.3rem;">
        <div class="card-body">
            <h5 class="card-title text-center pb-3 pt-3 text-white fw-bold fs-2">Login</h5>
            <form action="/index.php?page=login" method="post" enctype="multipart/form-data" class="p-2">
                <div class="form-group mb-4 ">    
                    <span class="fa-solid fa-envelope position-absolute icon-login"></span>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group mb-4">
                    <span class="fa-solid fa-lock position-absolute icon-login"></span>
                    <input type="text" name="password" id="password" class="form-control" placeholder="Password">
                </div> 
                <input type="submit" name="submit" value="Login" class="btn-login btn bg-white form-control fw-bold mb-1" style="width: 100%;">
            </form>
            <small class="ps-4 text-white ">Don't have an account? <a href="page/register.php" class="text-white text-decoration-none">Register</a></small>
        </div>
    </div>
</div>