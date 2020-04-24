<?php 


include 'partials/header.php';
require __DIR__.'/users/users.php';


$user = [

    'id'=> '',
    'name' => '',
    'username' => '',
    'email' => '',
    'phone' => '',
    'website' => '',

];

$errors = [

    'name' =>"",
    'username' =>"",
    'email' => "",
    'phone' => "",
    'website' => "",
   

];


$isValid = true;


if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $user = array_merge($user, $_POST);

    //não precisa mais disso
    // $name = $_POST['name'];
    // $username = $_POST['username'];
    // $email = $_POST['email'];
    // $phone = $_POST['phone'];
    // $website = $_POST['website'];

    $isValid = validateUser($user, $errors);

    

    if($isValid)
    {
    $user = createUser($_POST);
    uploadImage($_FILES['picture'], $user);
    header("Location:index.php");
    }
}

?>
<?php include '_form.php' ?>