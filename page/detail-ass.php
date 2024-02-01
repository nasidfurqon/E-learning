<?php
$conn = connect();
$classid = isset($_GET['classId']) ? $_GET['classId'] : '';
$assid = isset($_GET['assId']) ? $_GET['assId'] : '';
$stmt = $conn->prepare("SELECT * FROM assignment WHERE id = ?");
$stmt->execute([$assid]);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$assignment = $stmt->fetch();

$stmtuser = $conn->prepare("SELECT * FROM user WHERE id = ?");
$stmtuser->execute([$id]);
$stmtuser->setFetchMode(PDO::FETCH_ASSOC);
$user = $stmtuser->fetch();
?>


<div class="row wrapper-detail">
    <!-- left Side -->
    <div class="col-sm-8 left-side">
        <!-- Title -->
        
        <div class="title-detail d-flex mb-3 ">
            <div class="icon-wrap text-light rounded-circle mt-1">
                <a class="text-decoration-none text-light" href="/index.php?page=in-class&page2=ass-user&userId=<?php echo $id ?>&classId=<?php echo $classid ?>">
                    <i class="fa-solid fa-question icon-file"></i>
                </a>
            </div>
            <div class="title-detail border-bottom col-11 ms-4" id="title-detail">
                <h1><?php echo $assignment['name'] ?></h1>
                <div class="ms-2 updated-detail d-flex text-black-50">
                    <small><p><?php echo $user['name'] ?> | Updated <?php echo $assignment['updated'] ?> | Deadline : <?php echo $assignment['tenggat'] ?></p></small>
                </div>
            </div>
        </div>
        
        <!-- Content -->
        <div class="content-detail mt-4">
            <div class="information mb-4">
                <p class="fs-6"><?php echo $assignment['description'] ?> </p>
            </div>

            <!-- PDF AND IMG FILE ONLY -->
            <embed class="file" src="<?php echo $assignment['content'] ?> ">
        </div>
    </div>

    <!-- right Side -->
    <div class="right-side col-4">
        <!-- Assignment -->
        <div class="card ">
            <div class="card-body">
                <div class="info-card position-relative">
                    <h5 class="card-title position-absolute start-0">Assignment</h5>
                    <p class="text-black-50 position-absolute end-0">assigned</p>
                </div>

                <!-- Button -->
                <div class="btn-wrapper">
                    <a href="#" class="btn btn-transparent bg-transparent btn-primary position-relative mt-5" id="btn">+ Add Answer</a>
                    <a href="#" class="btn text-light position-relative mt-3" id="btn">Marks as Done</a>
                </div>
            </div>
        </div>
    </div>

</div>