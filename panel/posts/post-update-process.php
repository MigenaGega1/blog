<?php
include('C:\xampp\htdocs\TASK1REGISTER\config.php');

$db=Config::getConnection();
$authUserId=Config::getAuthUser()['id'];
$title=$_POST['title'];
$content=$_POST['content'];
$id = $_POST['id'];

$query = "Select * from posts where id = '$id'";

$result = mysqli_query($db, $query);

if (mysqli_num_rows($result) == 0) {
    header('Content-Type: application/json', '', 404);
    echo json_encode([
        'message' => 'The data is not found.',     
    ]);
    exit();
}
$row=[];
$row = mysqli_fetch_assoc($result);
// kontrollon nga postimi i marre nga db nese user_id eshte e njete me id e user login dhe nese jo response 403
$user_id=$row['user_id'];

if($user_id!=$authUserId){
    header('Content-Type: application/json', '', 403);
    echo json_encode([
        'message' => 'The data is not found.',
        
    ]);
    exit();
}


// kontrollon nga postimi i marre nga db nese user_id eshte e njete me id e user login dhe nese jo response 403

$errors=[];


if(empty($title)){
    $errors['title'] = "title is required"; 


}
if(empty($content)){
    $errors['content'] = "content is required"; 


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
    $query1="UPDATE  posts SET title='$title', content='$content'where id='$id'";
    $result2=mysqli_query($db,$query1);
        if($result2){
            header('Content-Type: application/json', '', 200);
            
              echo json_encode([
                'title'=> $title,
                'content'=>$content,

                'message' => 'Data is updated successfully',

                
            ]);
            
            exit();
           
                }}
        
    