<?php

include 'partials/header.php';
require __DIR__.'/users/users.php';

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
    $user = updateUser($_POST, $userId);
    
  
   

    uploadImage($_FILES['picture'], $user);


    header("Location:index.php");

}


?>

            <?php include '_form.php' ?>
