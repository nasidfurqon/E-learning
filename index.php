<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Learning</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        h5{
            padding: 10px;
        }
        .sidebar{
            height: 1000px;
            position: fixed;
        }
        .icon {
            width: 30px;
        }
    </style>
  </head>
  <body>
    <div class="container ms-0 ps-0">
        <div style="height: 1000px;" class="row ms-0">
            <div class="sidebar col-2 bg-dark bg-gradient">
                <div class="mt-5 mb-5 border-bottom">
                    <h2 class="text-center mb-3 text-light">E-Learning</h2>
                </div>
                <div class="menu text-center text-light">
                    <h5>Dashboard</h5>
                    <h5>Pengumuman</h5>
                    <h5>Mata Pelajaran</h5>
                    <h5>Tugas</h5>
                </div>
                <div class="ms-5 mb-3 account dropdown fixed-bottom">
                    <a href="#" class="d-flex align-items-center text-light text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="img/Screenshot (360).png" alt="" width="32" height="32" class="rounded-circle me-2">
                        <strong class="text-light">khoirul</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>