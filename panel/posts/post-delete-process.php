<?php
	
    include('C:\xampp\htdocs\TASK1REGISTER\config.php');

	$db=Config::getConnection();
   
    $id = $_POST['id'];
     

	$sql="SELECT posts.*,COUNT(comments.id) as totalcomment
    FROM posts LEFT JOIN comments ON posts.id=comments.post_id where posts.id='$id'";
    $res=mysqli_query($db,$sql);
    

         if($res){
            $sql="DELETE FROM comments WHERE  post_id='$id'";
            $result = mysqli_query($db,$sql);
            
            if($result)
            {
                $q = "DELETE FROM posts WHERE id = '$id'";
                $result1 = mysqli_query($db,$q);}
                if($result1)
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