<?php
$conn = connect();
$stmt = $conn->prepare("SELECT * FROM class WHERE userid = ?");
$stmt->execute([$id]);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$classes = $stmt->fetchAll();  

$stmt2 = $conn->prepare("SELECT SUM(value) as sum FROM class WHERE userid = ?");
$stmt2->execute([$id]);
$stmt2->setFetchMode(PDO::FETCH_ASSOC);
$idclass = $stmt2->fetch();

?>

<div class="head border-dark fs-4 border-bottom">
    <p >Class</p>
  </div>
<?php if($idclass["sum"] != ""): ?>
<div class="greeting mt-4">
  <p>Here are some classes available for you.</p>
</div>
<?php else: ?>
<div class="w-nothing position-absolute top-50 start-50 translate-middle">
  <p>Nothing class for you, lets find out now!</p>
</div>
<?php endif;?>
<!-- Card --> 
<div class="row row-cols-1 pt-2 row-cols-md-3 g-4">
<?php
foreach($classes as $class):
?>
  <div class="col">
    <div class="card">
      <div class="bg card-img-top text-light d-flex">
        <div class="name p-3 ">
          <a href="index.php?page=in-class&userId=<?php echo $id ?>" class="fs-3 name-link text-light text-decoration-none"><?php echo $class['name'] ?></a>
        </div>
        <!-- <div class="list mt-3 col d-flex">
          <p onclick="colOnClickMenu()" class="colon fa-solid fa-ellipsis-vertical text-light fa-xl float-end text-decoration-none me-2  mt-3"></p>
          <div class="list-colon bg-white p-2 border border-2 rounded-start rounded-end" id="list-colon" style="height:4rem">
            <a href="#" class="list-colon-menu text-decoration-none text-dark">Edit</a>
            <a href="#" class="list-colon-menu text-decoration-none text-dark">Delete</a>
          </div>
        </div> -->
      </div>
      <div class="card-body">
        <p >Tenggat</p>
        <a href="/index.php?page=assignment&userId=<?php echo $id ?>" class="hw card-title fs-3 text-decoration-none">Homework</a>
        <p class="card-text"></p>
      </div>
    </div>
  </div>
  <?php endforeach;?>
</div>