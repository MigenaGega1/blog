<?php

include('C:\xampp\htdocs\TASK1REGISTER\config.php');
$db=Config::getConnection();
$oldpsw=Config::getAuthUser()['password'];
$authUserId=Config::getAuthUser()['id'];



$oldpassword=md5(mysqli_real_escape_string($db,$_POST['oldpassword']));
$newpassword=mysqli_real_escape_string($db,$_POST['newpassword']);
$confirmpassword=mysqli_real_escape_string($db,$_POST['confirmpassword']);


$errors=[];


if(empty($oldpassword)){
    $errors['oldpassword'] = "Old Password is required"; 

}elseif($oldpsw != $oldpassword){
    $errors['oldpassword'] = "Old password dont match "; 

}
if(empty($newpassword)){
    $errors['newpassword'] = "New password is required"; 

}else if(strlen($newpassword)<6 ) {
    $errors['newpassword'] = "Newpassword min ength is 6 characterss"; 

}
if(empty($confirmpassword)){
    $errors['confirmpassword'] = "Confirm password is required"; 

}

elseif ($newpassword != $confirmpassword) {
    $errors['confirmpassword'] = "New password dont match with confirm password"; 
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

$newpassword1=md5($newpassword);
$confirmpassword1=md5($confirmpassword);
$query="UPDATE users SET password='$newpassword1' , password_confirmation='$confirmpassword1' where id='$authUserId' ";
$result2=mysqli_query($db,$query);

if($result2){ 
            header('Content-Type: application/json', '', 200);
              echo json_encode([
                'message' => 'Data is updated successfully'
            ]);
            exit();
    
}


}


















?>