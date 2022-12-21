<?php
include('C:\xampp\htdocs\TASK1REGISTER\config.php');

$authUserId=Config::getAuthUser()['id'];
$db=Config::getConnection();

   // marrim te gjitha te dhenat e vendosura ne form
    $first_name=trim(mysqli_real_escape_string($db,$_POST['first_name']));
    $last_name=trim(mysqli_real_escape_string($db,$_POST['last_name']));
    $errors =[];
    // validimi per first_name
    if (empty($first_name)) {
        $errors['first_name'] = "First name is required"; 
    }else if(strlen(trim($first_name))<2 || strlen($first_name)>30) {
        $errors['first_name'] = "First name must be minimum 2 and max 30 characters"; 
    }
    $user_inputs['first_name']= $first_name;

    if (empty($last_name)) {
        $errors['last_name'] = "Last name is required"; 
    }else if (strlen(trim($last_name))<2 || strlen($last_name)>30) {
        $errors['last_name'] = "Last name must be minimum 2 and max 30 characters"; 
    }
    $user_inputs['last_name']= $last_name;

   
    if (count($errors)) {
        header('Content-Type: application/json', '', 422);
        echo json_encode([
            'message' => 'The given data is invalid.',
            'errors' => $errors
        ]);
        exit();
    }



    else{
  
        $query="UPDATE users SET first_name='$first_name' , last_name='$last_name' where id='$authUserId'";
        $result2=mysqli_query($db,$query);

        if($result2){
            
     
      header('Content-Type: application/json', '', 200);
        echo json_encode([
            'first_name'=> $first_name,
            'last_name'=> $last_name,
         'message' => 'Data is updated successfully'
    ]);
    exit();
        }
        
        
    
      
   
    }

?>
