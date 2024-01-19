<?php
$page2 = isset($_GET['page2']) ? $_GET['page2'] : '';
?>
<div class="head border-dark fs-4 border-bottom">
    <p >Class - Lorem ipsum dolor sit amet.</p>
</div>

<!-- Card-Title -->
<div class="card text-light rounded-start rounded-end mt-4">
  <div class="bg rounded-start rounded-end"></div>
  <div class="card-img-overlay position-absolute mt-4">
    <h5 class="card-title fs-4 mb-2">Card title</h5>
    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
  </div>
</div>

<!-- Nav -->
<ul class="border-dark-subtle nav nav-underline justify-content-center ms-4 me-4 mt-2 border-bottom ">
  <li class="nav-item">
    <a class="item nav-link" href="index.php?page=in-class&page2=mtr-user">Material</a>
  </li>
  <li style="margin-left: 20%;" class="nav-item">
    <a class="item nav-link" href="index.php?page=in-class&page2=ass-user">Assignment</a>
  </li>
</ul>

<div class="hero">
  <?php
      switch($page2){
          case 'ass-user';
              include "page/ass-user.php";
              break;
          case 'mtr-user';
                include "page/mtr-user.php";
                break;    
          default:
              include "page/mtr-user.php";
              break;                
      }
      ?>
</div>
<!-- 
<div class="card mb-3 d-none">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
  </div>
</div>

<div class="card d-none">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
  </div>
  <img src="..." class="card-img-bottom" alt="...">
</div> -->