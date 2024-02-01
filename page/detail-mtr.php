<?php
$conn = connect();
$classid = isset($_GET['classId']) ? $_GET['classId'] : '';
$mtrid = isset($_GET['mtrId']) ? $_GET['mtrId'] : '';
$stmt = $conn->prepare("SELECT * FROM material WHERE id = ?");
$stmt->execute([$mtrid]);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$material = $stmt->fetch();

$stmtuser = $conn->prepare("SELECT * FROM user WHERE id = ?");
$stmtuser->execute([$id]);
$stmtuser->setFetchMode(PDO::FETCH_ASSOC);
$user = $stmtuser->fetch();
?>

<div class="detail-ass">
    <div class="title-detail d-flex mb-3 ">
        <div class="icon-wrap text-light rounded-circle mt-1">
            <a class="text-decoration-none text-light" href="/index.php?page=in-class&page2=mtr-user&userId=<?php echo $id ?>&classId=<?php echo $classid ?>">
                <i class="fa-regular fa-file-lines icon-file"></i>
            </a>
        </div>
        <div class="title-detail border-bottom col-11 ms-4" id="title-detail">
            <h1><?php echo $material['name'] ?></h1>
            <div class="ms-2 updated-detail d-flex text-black-50">
                <small><p><?php echo $user['name'] ?> | Updated <?php echo $material['date'] ?></p></small>
            </div>
        </div>
    </div>
    
    <!-- Content -->
    <div class="content-detail-ass mt-4 me-3">
        <div class="information mb-4">
            <p class="fs-6"><?php echo $material['description'] ?></p>
        </div>
        
        <!-- PDF AND IMG FILE ONLY -->
        <embed class="file" src="<?php echo $material['content']?> ">
    </div>
</div>