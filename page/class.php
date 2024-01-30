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

  // condition database for assignments
$classid = $class['id'];
$stmt3 = $conn->prepare("SELECT * FROM assignment WHERE classid = ?");
$stmt3->execute([$classid]);
$stmt3->setFetchMode(PDO::FETCH_ASSOC);
$assignment = $stmt3->fetch();

// check count of row
$stmt5 = $conn->prepare("SELECT COUNT(*) AS count FROM assignment WHERE classid =  ?");
$stmt5->execute([$classid]);
$stmt5->setFetchMode(PDO::FETCH_ASSOC);
$count = $stmt5->fetch();
?>
  <div class="col">
    <div class="card">
      <div class="bg card-img-top text-light d-flex">
        <div class="name p-3 ">
          <a href="index.php?page=in-class&userId=<?php echo $id ?>" class="fs-3 name-link text-light text-decoration-none"><?php echo $class['name'] ?></a>
        </div>
      </div>
      <?php      
      if($count['count'] != 0) :?>
      <div class="card-body">
        <p ><?php echo $assignment['tenggat'] ?></p>
        <a href="/index.php?page=assignment&userId=<?php echo $id ?>" class="hw card-title fs-3 text-decoration-none"><?php echo $assignment['name'];
        echo $count['count'] ?></a>
        
        <p class="card-text"></p> 
      </div>
      <?php else: ?>
        <div class="card-body" id="card-b-2">
        <p ></p>
        <a class="hw card-title fs-5 text-decoration-none">yuhuu you dont have an assignment</a>
        <p class="card-text"></p>
      </div>
      <?php endif;?>
    </div>  
  </div>
  <?php endforeach;?>
</div>