<?php
include('C:\xampp\htdocs\TASK1REGISTER\config.php');

$db=Config::getConnection();
$authUserId=Config::getAuthUser()['id'];
$title=mysqli_real_escape_string($db,$_POST['title']);
$content=mysqli_real_escape_string($db,$_POST['content']);

$errors=[];
if(isset($_FILES['photo']['name'])){
  
    $imageName = $_FILES["photo"]["name"];
    $tmpName = $_FILES["photo"]["tmp_name"];
  
    // Image extension validation
    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $imageName); 
  
    $name = $imageExtension[0];
    $imageExtension = strtolower(end($imageExtension));
  
    if (!in_array($imageExtension, $validImageExtension)){
     
      $errors['photo'] = "Invalid Extension"; 
    
    }
}

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
    $newImageName = $name . "-" . uniqid(); // Generate new image name
    $newImageName .= '.' . $imageExtension;

    move_uploaded_file($tmpName, 'uploads/' . $newImageName);

    $query="INSERT  INTO posts (user_id,title,content,image_path) VALUES ('$authUserId','$title', '$content', '$newImageName')";
    $result2=mysqli_query($db,$query);
        if($result2){
            header('Content-Type: application/json', '', 200);
            
              echo json_encode([
                'message' => 'Data is updated successfully',

                
            ]);
            
            exit();
           
                }
        
    }























?>