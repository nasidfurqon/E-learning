<?php
$conn = connect();
$stmt = $conn->prepare("SELECT * FROM user WHERE id = ?");
$stmt->execute([$id]);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$user = $stmt->fetch();
?>

<div class="head border-dark fs-4 border-bottom">
    <p >Change  Profile</p>
</div>

<div class="form-wrap border p-4 rounded-start rounded-end border-dark-subtle start-50">
    <form action="/index.php?page=change-profile&userId=<?php $id ?>"  enctype="multipart/form-data" method="post">
        <div class="name form-content">
            <label for="username" class="mb-2">Name :</label>
            <input class="fill-form d-block rounded-start rounded-end border p-2 border-success-subtle"  type="text" name="username" placeholder="name">
        </div>
        <div class="email form-content">
            <label for="email"  class="mb-2">Email :</label>
            <input class="d-block fill-form rounded-start rounded-end border p-2 border-success-subtle"  type="text" name="email" placeholder="email">
        </div>
        <div class="password form-content">
            <label for="pass" class="mb-2">Password :</label>
            <input class="d-block fill-form rounded-start rounded-end border p-2 border-success-subtle"  type="text" name="pass" placeholder="password">
        </div>
        <div class="address form-content">
            <label for="username" class="mb-2">Address :</label>
            <input class="d-block fill-form rounded-start rounded-end border p-2 border-success-subtle"  type="text" name="address" placeholder="address">
        </div>
        <input type="button" class="btn btn-primary" value="change">
    </form>
</div>