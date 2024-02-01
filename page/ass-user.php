<?php 
$classid = isset($_GET['classId']) ? $_GET['classId'] : '';
$conn = connect();
$stmt = $conn->prepare("SELECT * FROM assignment WHERE classid = ?");
$stmt->execute([$classid]);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$assignments = $stmt->fetchAll();

// check count of row
$stmt2 = $conn->prepare("SELECT COUNT(*) AS count FROM assignment WHERE classid =  ?");
$stmt2->execute([$classid]);
$stmt2->setFetchMode(PDO::FETCH_ASSOC);
$count = $stmt2->fetch();
?>
<!-- Tugas spesifik sesuai dengan ClassId dan UserId -->

    <!-- Card -->
<?php 
if($count['count'] != 0) :
foreach($assignments as $assignment):
    ?>
<div class="card-wrap mt-4">

    <div class="card rounded-start rounded-end">
        <div class="bg-ass rounded-start rounded-end border-secondary-subtle border border-1 border-opacity-10"></div>
        <div class="card-img-overlay d-flex">
            <div class="icon-wrap text-light me-3 ms-2 rounded-circle">
                <i class="fa-solid fa-question icon-file "></i>
            </div>
            <div class="title">
                <h5 class="card-title fs-6"><a href="/index.php?page=detail-ass&userId=<?php echo $id ?>&classId=<?php echo $classid ?>&assId=<?php echo $assignment['id']?>" class="text-decoration-none text-black">User memposting tugas baru: <?php echo $assignment['name']; ?>
                </a> </h5>
                <p class="updated card-text text-black-50">Last updated 
                <?php
                    
                $date1 = $assignment['updated'];
                date_default_timezone_set("Asia/Jakarta");
                $date2 = date("h:i:sa");    
                $diff = abs(strtotime($date2) - strtotime($date1));
                // $years = floor($diff / (365*60*60*24));
                // $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                // $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                $minute = floor($diff/ 60); 
                echo $minute;
                // printf("%d years, %d months, %d days\n", $years, $months, $days);  
                    ?> mins ago</p>
            </div>
        </div>
    </div>
    
</div>
<?php endforeach;
else: ?>
<p class="ass-nothing position-absolute top-50 start-50 translate-middle">Congratulations, you dont have an assignments!</p>
<?php endif; ?>