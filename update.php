<?php

include 'partials/header.php';
require __DIR__.'/users.php';

if(!isset($_GET['id'])){
    include "partials/not_found.php";
    exit;
}
$userId = $_GET['id'];

$user = getUserById($userId);
if(!$user){
    include "partials/not_found.php";
    exit;
}

// echo '<pre>';
// var_dump($user);
// echo '</pre>';




if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    

    updateUser($_POST, $userId);
}




?>


<div class="container">
    <div class="card">
    
        <div class="card-header">
        <h3>Update user <b><?php echo $user['name'] ?></b></h3>
        </div>

        <div class="card-body">
 
        

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Name</label>
        <input name="name" value="<?php echo $user['name'] ?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Username</label>
        <input name="username" value="<?php echo $user['username'] ?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input name="email" value="<?php echo $user['email'] ?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Phone</label>
        <input name="phone" value="<?php echo $user['phone'] ?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Website</label>
        <input name="website" value="<?php echo $user['website'] ?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Image</label>
        <input name="picture" type="file" class="form-control-file">
    </div>

    <button type="submit" class="btn btn-success">Enviar</button>
</form>
        </div>

    </div>

</div>
