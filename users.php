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



function createUsers($data){
    
}


function updateUser($data,$id){

   $users = getUsers();
   foreach($users as $i => $user){
      if($user['id'] == $id){
         $users[$i] = array_merge($user, $data);
      }
   }

echo '<pre>';
var_dump($users);
echo '</pre>';

file_put_contents(__DIR__.'/users.json',json_encode($users));

    
}

function deleteUser($id){

}