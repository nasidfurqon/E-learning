<?php
$page = isset($_GET['page']) ? $_GET['page'] : '';
// include_once "connection.php";
// session_start();  
// if (isset($_GET['action']) && $_GET['action'] == 'logout') {
//   unset($_SESSION['UserId']);
// }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Learning</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Caveat&family=Courgette&family=Dancing+Script&family=Exo+2:ital,wght@1,300&family=Handlee&family=Pangolin&family=Quicksand:wght@500&family=Shadows+Into+Light&family=Sono:wght@300&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="wrapper d-flex">
        <!-- Sidebar -->
        <aside class="sidebar text-light text-center">
            <!-- Burger -->
            <div class="d-flex d-none">
                <button id="toggle-btn" type="button">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>

            <!-- Sidebar Menu -->
            <div class="name ms-2 me-2 pt-4 pb-3 border-bottom border-white">
                <span class="fs-4">E-Learning</span>
            </div>

            <ul class="m-3 pt-4 list-group list-unstyled text-start ps-4">
                <li class="dashboard pb-5">
                    <i class="fa-solid fa-house pe-1 fa-lg"></i>
                    <a href="/index.php?page=dashboard" class="text-light text-decoration-none">Dashboard</a>
                </li>
                <li class="class pb-5">
                    <i class="fa-solid fa-school pe-1 fa-lg"></i>
                    <a href="/index.php?page=class" class="text-light text-decoration-none">Class</a>
                </li>
                <li class="material pb-5">
                    <i class="fa-solid fa-book pe-1 fa-lg"></i>
                    <a href="/index.php?page=material" class="text-light text-decoration-none">Material</a>
                </li>
                <li class="assignment pb-5">
                    <i class="fa-solid fa-bookmark pe-2 fa-lg"></i>
                    <a href="/index.php?page=assignment" class="text-light text-decoration-none">Assignment</a>
                </li>
                <li class="announcement pb-5">
                    <i class="fa-solid fa-inbox pe-1 fa-lg"></i>
                    <a href="/index.php?page=announcement" class="text-light text-decoration-none">Announcement</a>
                </li>
            </ul>

            <!-- Sidebar Account -->
           <div class="ms-5 mb-5 account dropdown fixed-bottom">
                    <a href="#" class="d-flex align-items-center text-light text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="img/Screenshot (360).png" alt="" width="32" height="32" class="rounded-circle me-2 ms-3">
                        <strong class="text-light">khoirul</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>  
        </aside>

        <!-- Main Page -->
        <div class="main">
            <?php
            switch($page){
                case 'material':
                    include "page/material.php";
                    break;
                case 'announcement':
                    include "page/announcement.php";
                    break;
                case 'assignment';
                    include "page/assignment.php";
                    break;
                case 'class';
                    include "page/class.php";
                    break;
                case 'in-class';
                    include "page/in-class.php";
                    break;
                case 'detail-ass';
                    include "page/detail-ass.php";
                    break;
                case 'detail-mtr';
                    include "page/detail-mtr.php";
                    break;    
                default:
                    include "page/dashboard.php";
                    break;                
            }
            ?>
        </div>
    </div>
    <script src="js/script.js"></script>
    <script src="https://kit.fontawesome.com/01b9b143dd.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>