<?php
$conn = connect();
$stmt = $conn->prepare("SELECT * FROM assignment WHERE userid = ?");
$stmt->execute([$id]);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$assignments = $stmt->fetchAll();


?>
<!-- untuk semua tugas dari userID -->

<div class="head border-dark fs-4 border-bottom">
    <p >Assignment</p>
</div>
<h3 class="text-center pt-4 pb-2 title">Assignments from all classes</h3>

<!-- Card -->
<?php foreach($assignments as $assignment): 
$stmt2 = $conn->prepare("SELECT * FROM class WHERE id = ?");
$stmt2->execute([$assignment['classid']]);
$stmt2->setFetchMode(PDO::FETCH_ASSOC);
$class = $stmt2->fetch();
?>
<div class="card-wrap mt-4">

    <div class="card rounded-start rounded-end">
        <div class="bg-ass rounded-start rounded-end border-secondary-subtle border border-1 border-opacity-10"></div>
        <div class="card-img-overlay d-flex">
            <div class="icon-wrap text-light me-3 ms-2 rounded-circle">
                <i class="fa-solid fa-question icon-file "></i>
            </div>
            <div class="title">
                <h5 class="card-title fs-6"><a href="/index.php?page=detail-ass&userId=<?php echo $id ?>&classId=<?php echo $class['id'] ?>&assId=<?php echo $assignment['id']?>" class="text-decoration-none text-black">user memposting tugas baru dari <?php echo $class['name'] ?>: <?php echo $assignment['name'] ?></a> </h5>
                <p class="updated card-text text-black-50">Last updated
                    <?php 
                    $date1 = $assignment['updated'];
                    date_default_timezone_set("Asia/Jakarta");
                    $date2 = date("h:i:sa");
                    $diff = abs(strtotime($date2) - strtotime($date1));
                    $minute = floor($diff/ 60);
                    echo $minute;
                    ?>
                     mins ago</p>
            </div>
        </div>
    </div>
    
</div>
<?php endforeach; ?>