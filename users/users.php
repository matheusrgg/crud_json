<?php



function getUsers(){

   return json_decode(file_get_contents(__DIR__.'/users.json'), true);
//    echo'<pre>';
//     var_dump($users);
//     echo'</pre>'; 
//     exit;
}

function getUserById($id){
      
   $users = getUsers();
   foreach ($users as $user){
      if($user['id']== $id){
         return $user;
      }
   }

   return null;

}



function createUser($data)
{

   
   $users  =getUsers();

   $data['id'] = rand(100000, 200000);


   $users[] = $data;

   putJson($users);

   return $data;

}


function updateUser($data,$id){

   $updateUser = [];


   $users = getUsers();
   foreach($users as $i => $user){
      if($user['id'] == $id){
        
         $users[$i] = $updateUser = array_merge($user, $data);
      }
   }

// echo '<pre>';
// var_dump($users);
// echo '</pre>';

putJson($users);

return $updateUser;
    
}

function deleteUser($id){


      $users = getUsers();

      foreach($users as $i => $user){
         if($user['id'] == $id){
            array_splice($users, $i  , 1);
         }
      }

      putJson($users);

}

function uploadImage($file, $user)
{

        // move_uploaded_file ( string $filename , string $destination ) : bool
   if(isset($_FILES['picture']) && $_FILES['picture']['name']){

        if(!is_dir(__DIR__ . "/images")) {
         mkdir(__DIR__ . "/images");
     }     

     //get the file extension from the filename
     $fileName = $file['name'];
     //search for the dot in the filename
     $dotPosition = strpos ($fileName, '.');
     //take the substring from  the dot position till the end of the string
     $extension =  substr($fileName, $dotPosition + 1);



     move_uploaded_file($file['tmp_name'], __DIR__ . "/images/${user['id']}.$extension");

     $user['extension'] = $extension;
     updateUser($user, $user['id']);
   }
}


function putJson($users)
{
   file_put_contents(__DIR__.'/users.json',json_encode($users, JSON_PRETTY_PRINT));
}