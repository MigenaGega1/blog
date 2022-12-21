<?php 

include('C:\xampp\htdocs\TASK1REGISTER\config.php');
$con=Config::getConnection();
$errors = [];
  $authUserId = Config::getAuthUser()['id'];
if(isset($_FILES['profile_image_url']['name'])){
  
  $imageName = $_FILES["profile_image_url"]["name"];
  $tmpName = $_FILES["profile_image_url"]["tmp_name"];

  // Image extension validation
  $validImageExtension = ['jpg', 'jpeg', 'png'];
  $imageExtension = explode('.', $imageName); 

  $name = $imageExtension[0];
  $imageExtension = strtolower(end($imageExtension));

  if (!in_array($imageExtension, $validImageExtension)){
   
    $errors['photo'] = "Invalid Extension"; 
    exit;
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

    move_uploaded_file($tmpName, 'upload/' . $newImageName);

    $update = "UPDATE users SET profile_image_url = '$newImageName' WHERE id = '$authUserId' "; 
   $result2= mysqli_query($con,$update);
   if($result2){
          
          
    header('Content-Type: application/json', '', 200);
      echo json_encode([
        
        'photo'=> $newImageName,
        'message' => 'Data is updated successfully'
    ]);
    exit();
        }


    // Config::updateAuthUser();
    // echo "Changed successfully!" . ',' . Config::getAuthUser()['profile_image_url'] ;
 
   
  }
}

?>