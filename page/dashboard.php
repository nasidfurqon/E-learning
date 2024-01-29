<?php
$conn = connect();
// class
$stmt = $conn->prepare("SELECT SUM(value) as sum FROM class WHERE userId = ?");
$stmt->execute([$id]);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$class = $stmt->fetch();

// name
$stmt2 = $conn->prepare("SELECT * FROM user WHERE id = ?");
$stmt2->execute([$id]);
$stmt2->setFetchMode(PDO::FETCH_ASSOC);
$name = $stmt2->fetch();

// assignment
$stmt3 = $conn->prepare("SELECT SUM(value) as sum FROM assignment WHERE userid = ?");
$stmt3->execute([$id]);
$stmt3->setFetchMode(PDO::FETCH_ASSOC);
$ass = $stmt3->fetch();

// announce
$stmt4 = $conn->prepare("SELECT SUM(value) as sum FROM announce WHERE userid = ?");
$stmt4->execute([$id]);
$stmt4->setFetchMode(PDO::FETCH_ASSOC);
$announce = $stmt4->fetch();
?>
<div class="head border-dark fs-4 border-bottom">
    <p >Dashboard</p>
</div>
<div class="greeting mt-4">
    <p>Hello, <?php echo $name['name'] ?></p>
    <p>Welcome to E-Learning Website</p>
</div>

<!-- Card  -->
<div class="card-wrapper justify-content-center mt-4 d-flex">

    <div class="card border-primary-subtle text-center mb-3" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title border-bottom border-primary-subtle pb-2">Class</h5>
            <p class="card-text icon">
                <i class="fa-solid fa-school pe-1 fa-lg"></i>
            </p>
            <a href="index.php?page=class&userId=<?php echo $id ?>" id="btn-dashboard" class="btn border-primary-subtle bg-transparent mt-3 mb-2">
                <?php 
            if ($class['sum'] == ''){
                echo 0;
            }
            else{
                echo $class['sum'];
            } ?> Class</a>
        </div>
    </div>
    
    <div class="card border-primary-subtle text-center mb-3" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title border-bottom pb-2 border-primary-subtle">Assignment</h5>
            <p class="card-text icon ">
                <i class="fa-solid fa-bookmark pe-2 fa-lg"></i>
            </p>
            <a href="/index.php?page=assignment&userId=<?php echo $id ?>" id="btn-dashboard" class="btn border-primary-subtle mt-3 mb-2"><?php 
            if ($ass['sum'] == ''){
                echo 0;
            }
            else{
                echo $ass['sum'];
            }?> Assignment</a>
        </div>
    </div>
    
    <div class="card border-primary-subtle text-center mb-3" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title border-bottom border-primary-subtle pb-2">Announcement</h5>
            <p class="card-text icon">
                <i class="fa-solid fa-inbox pe-1"></i>
            </p>
            <a href="/index.php?page=announcement&userId=<?php echo $id ?>" id="btn-dashboard" class="btn border-primary-subtle mt-3 mb-2"><?php
            if ($announce['sum'] == ''){
                echo 0;
            }
            else{
                echo $announce['sum'];
            } ?> Announcement</a>
        </div>
    </div>

</div>
