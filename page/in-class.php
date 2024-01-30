<?php
$page2 = isset($_GET['page2']) ? $_GET['page2'] : '';
$classid = isset($_GET['classId']) ? $_GET['classId']: '';
$conn = connect();
$stmt = $conn->prepare("SELECT * FROM class WHERE id = ?");
$stmt->execute([$classid]); 
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$classes = $stmt->fetch();  
?>
<div class="head border-dark fs-4 border-bottom">
    <p >Class - <?php echo $classes['name']?></p>
</div>
<!-- Card-Title -->
<div class="card text-light rounded-start rounded-end mt-4">
  <div class="bg rounded-start rounded-end"></div>
  <div class="card-img-overlay position-absolute mt-4 d-flex">
    <div class="detailed-class col-11">
      <h5 class="card-title fs-4 mb-2"><?php echo $classes['name']?></h5>
      <p class="card-text"><?php echo $classes['description'] ?></p>
    </div>
      
    <!-- COLON -->
    <div class="list mt-1 col d-flex ms-5">
          <p onclick="colOnClickMenu()" class="colon fa-solid fa-ellipsis-vertical text-light fa-xl float-end text-decoration-none me-2  mt-3"></p>
          <div class="list-colon bg-white p-2 border border-2 rounded-start rounded-end" id="list-colon" style="height:4rem">
            <a href="#" class="list-colon-menu text-decoration-none text-dark">Edit</a>
            <a href="#" class="list-colon-menu text-decoration-none text-dark">Delete</a>
          </div>
        </div>
  </div>
</div>

<!-- Nav -->
<ul class="border-dark-subtle nav nav-underline justify-content-center ms-4 me-4 mt-2 border-bottom ">
  <li class="nav-item">
    <a class="item nav-link <?php if ($page2 == null or $page2 == "mtr-user" ) echo 'active' ?>" href="index.php?page=in-class&userId=<?php echo $id ?>&classId=<?php echo $classid ?>&page2=mtr-user">Material</a>
  </li>
  <li style="margin-left: 20%;" class="nav-item ">
    <a class="item nav-link <?php if ($page2 == "ass-user" ) echo 'active' ?>" href="index.php?page=in-class&userId=<?php echo $id ?>&classId=<?php echo $classid ?>&page2=ass-user">Assignment</a>
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