<?php

include('C:\xampp\htdocs\TASK1REGISTER\config.php');

$db=Config::getConnection();
$authUserId=Config::getAuthUser()['id'];

$comment_id = $_POST['comment_id'];
$post_author_id=$_POST['post_author'];


$sql = "Select * from comments where id = '$comment_id'";

$result1 = mysqli_query($db, $sql);

if (mysqli_num_rows($result1) == 0) {
    header('Content-Type: application/json', '', 404);
    echo json_encode([
        'message' => 'The data is not found.',     
    ]);
    exit();
}






$sql = "SELECT * FROM comments  where id='$comment_id';" ;
$resultset = mysqli_query($db, $sql);			
 while( $record = mysqli_fetch_array($resultset) ) {
$author_comment=$record['user_id'];

 }




if($authUserId==$post_author_id || $authUserId==$author_comment){

$q = "DELETE FROM comments WHERE id = '$comment_id'";
$result = mysqli_query($db,$q);
if(mysqli_affected_rows($db)==1)
{
    header('Content-Type: application/json', '', 200);
    echo json_encode([
       
       
        'message' => 'Data is deleted successfully'
]);
exit();		
}
}
else
{
    header('Content-Type: application/json', '', 422);
    echo json_encode([
        'message' => 'The given data cant deleted.',
       
    ]);
    exit();

}










?>