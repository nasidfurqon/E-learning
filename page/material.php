<?php
$conn = connect();
$stmt = $conn->prepare("SELECT * FROM material WHERE userid = ?");
$stmt->execute([$id]);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$materials = $stmt->fetchAll();


?>
<!-- Untuk Semua Material dari UserId -->
<div class="head border-dark fs-4 border-bottom">
    <p >Material</p>
</div>

<h3 class="text-center pt-4 pb-2 title">Material from all classes</h3>

<!-- Card -->
<?php foreach($materials as $material): 
$stmt2 = $conn->prepare("SELECT * FROM class WHERE id = ?");
$stmt2->execute([$material['classid']]);
$stmt2->setFetchMode(PDO::FETCH_ASSOC);
$class = $stmt2->fetch();
?>
<div class="card-wrap mt-4">

    <div class="card rounded-start rounded-end">
        <div class="bg-ass rounded-start rounded-end border-secondary-subtle border border-1 border-opacity-10"></div>
        <div class="card-img-overlay d-flex">
            <div class="icon-wrap text-light me-3 ms-2 rounded-circle">
                <i class="fa-regular fa-file-lines icon-file "></i>
            </div>
            <div class="title">
                <h5 class="card-title fs-6"><a href="/index.php?page=detail-mtr&userId=<?php echo $id ?>&classId=<?php echo $class['id'] ?>&mtrId=<?php echo $material['id']?>" class="text-decoration-none text-black">user memposting materi baru dari <?php echo $class['name'] ?>: <?php echo $material['name'] ?></a></h5>
                <p class="updated card-text text-black-50">Last updated 
                <?php
                $date1 = $material['date'];
                date_default_timezone_set("Asia/Jakarta");
                $date2 = date("h:i:sa");
                $diff = abs(strtotime($date2) - strtotime($date1));
                $minute = floor($diff / 60);
                echo $minute;
                ?>    
                mins ago</p>
            </div>
        </div>
    </div>
    
</div>
<?php endforeach; ?>