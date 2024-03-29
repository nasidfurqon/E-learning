<?php
$conn = connect();
$stmt = $conn->prepare("SELECT * FROM user WHERE id = ?");
$stmt->execute([$id]);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$user = $stmt->fetch();
?>
<div class="head border-dark fs-4 border-bottom">
    <p >Profile</p>
</div>


<div class="container">
    <div class="profile-content d-flex">
        <div class="profile-picture">
            <img src="<?php echo $user['pp'] ?>" width="300px" height="300px" alt="">
        </div>
        <div class="biodata fs-5">
            <div class="sub">
                <p class="sub-bio">Name</p>
                <p class="data"><b>:</b> <?php echo $user['name'] ?></p>
            </div>
            <div class="sub">            
                <p class="sub-bio">Email</p>
                <p class="data"><b>:</b> <?php echo $user['email'] ?></p>
            </div>
            <div class="sub">
                <p class="sub-bio">Address</p>
                <p class="data"><b>:</b> <?php echo $user['address'] ?></p>
            </div>
        </div>
    </div>
</div>

<!-- ALERT -->
<div class="alert alert-info" role="alert">
  Check your data correctly. If there are any wrong, please change <a href="/index.php?page=change-profile&userId=<?php echo $id ?>">here!</a>
</div>