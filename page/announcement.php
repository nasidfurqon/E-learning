<?php
$conn = connect();
$stmt = $conn->prepare("SELECT * FROM announce WHERE userid = ?");
$stmt->execute([$id]);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$announcements = $stmt->fetchAll();

$stmt2 = $conn->prepare("SELECT * FROM user WHERE id = ?");
$stmt2->execute([$id]);
$stmt2->setFetchMode(PDO::FETCH_ASSOC);
$user = $stmt2->fetch();
?>

<div class="head border-dark fs-4 border-bottom">
    <p >Announcement</p>
</div>
<!-- Card-Wrap -->
<?php foreach($announcements as $announcement): ?>

<div class="card-wrap mt-4">

    <!-- Card -->
    <div class="card rounded-start rounded-end p-3">
        <!-- Title -->
        <div class="Title-announce d-flex border-bottom m-3 pb-3" id="title-detail">
            <img class="profile rounded-circle me-3" src="<?php echo $user['pp'] ?>" alt="">
            <div class="title">
                <h5 class="card-title fs-6"><a href="/index.php?page=detail-mtr" class="text-decoration-none text-black">User memposting pengumuman baru:<?php echo $announcement['title']?> </a></h5>
                <p class="updated card-text text-black-50">Last updated 
                    <?php 
                    $date1 = $announcement['updated'];
                    date_default_timezone_set("Asia/Jakarta");
                    $date2 = date("h:i:sa");
                    $diff = abs(strtotime($date2) - strtotime($date1));
                    $minute = floor($diff/ 60);
                    echo $minute;
                    ?>
                     mins ago</p>
            </div>
        </div>

        <!-- Content -->
        <div class="card-body">
             <p class="card-text"><?php echo $announcement['content'] ?></p>
        </div>
    </div>
    
</div>
<?php endforeach; ?>