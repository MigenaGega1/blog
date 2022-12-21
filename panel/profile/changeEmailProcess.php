<?php
include('C:\xampp\htdocs\TASK1REGISTER\config.php');
$db=Config::getConnection();
$authUserId=Config::getAuthUser()['id'];
$email=mysqli_real_escape_string($db,$_POST['email']);
$errors=[];

if (empty($email)) {
    $errors['email'] = "Email is required"; 
    
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Email is not  valid"; 
   
} else {
    $user_check="SELECT * FROM users WHERE email='$email' LIMIT 1";
    $res = mysqli_query($db, $user_check);
    $user = mysqli_fetch_assoc($res);

    if($user){
        $errors['email'] = "User with this email already exists"; 
    }
}


if (count($errors)) {
    header('Content-Type: application/json', '', 422);
    echo json_encode([
        'message' => 'The given data is invalid.',
        'errors' => $errors
    ]);
    exit();
}

else{

    $query="UPDATE users SET email='$email' where id='$authUserId'";
    $result2=mysqli_query($db,$query);
        if($result2){
          
          
            header('Content-Type: application/json', '', 200);
              echo json_encode([
                
                'email'=> $email,
                'message' => 'Data is updated successfully'
            ]);
            exit();
                }
        
    }
    
   

  




?>