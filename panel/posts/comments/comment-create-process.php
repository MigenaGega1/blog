<?php
include('C:\xampp\htdocs\TASK1REGISTER\config.php');

  $con=Config::getConnection();
  $post_id = $_POST['post_id'];

  $authUserId = Config::getAuthUser()['id'];


  $sql = "Select * from posts where id = '$post_id'";

$result1 = mysqli_query($con, $sql);

if (mysqli_num_rows($result1) == 0) {
    header('Content-Type: application/json', '', 404);
    echo json_encode([
        'message' => 'The data is not found.',     
    ]);
    exit();
}

$action = $_POST["action"] ?? "fetch-comments";

switch ($action) {
    case 'fetch-comments':
        
        $query = "select c.id as comment_id, user_id as comment_author, c.created_at as comm_time,c.content as comment, u.first_name as fn,u.last_name as ln, u.profile_image_url as profile_image from  comments c left join users u on c.user_id=u.id where c.post_id=' $post_id' order by c.id desc "; // left join me user
        $result=mysqli_query($con,$query);
        
        while( $row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        header("Content-Type: application/json", '', 200);
        echo json_encode($rows);
        exit();
        break;



    case 'insert-comment':
        $postId = $_POST['post_id'];
        $content = $_POST['content'];

        // query qe do bej insert
        $query1="INSERT INTO comments (user_id,post_id,content) VALUES ('$authUserId','$postId','$content') "; 
        $result1=mysqli_query($con,$query1);
        if($result1){
           

            $query2="SELECT c.id as comment_id ,user_id as comment_author,c.created_at as comm_time,c.content as comment, u.first_name as fn,u.last_name as ln,profile_image_url as profile_image  FROM  comments c INNER JOIN users u ON c.user_id=u.id  ORDER BY c.id DESC LIMIT 1 ";
            $result2=mysqli_query($con,$query2);

            $date= mysqli_fetch_assoc($result2) ;
        //     $data[] = $date;

        
        // $comment=$data;
        
   
        
        

        header("Content-Type: application/json", '', 200);
        echo json_encode($date);
        exit();
        }
        
}
?>