<?php



// lidhja me databazen
include('connection.php');

$errors=[];
$user_inputs=[];

   // marrim te gjitha te dhenat e vendosura ne form
    $first_name=mysqli_real_escape_string($db,$_POST['first_name']);
    $last_name=mysqli_real_escape_string($db,$_POST['last_name']);
    $email=mysqli_real_escape_string($db,$_POST['email']);
    $birthday=mysqli_real_escape_string($db,$_POST['birthday']);
    $password=mysqli_real_escape_string($db,$_POST['password']);
    $password_confirmation=mysqli_real_escape_string($db,$_POST['password_confirmation']);
   
  
    // validimi per first_name
    if (empty($first_name)) {
        $errors['first_name']="First Name is required";
    }else if(strlen(trim($first_name))<2 || strlen($first_name)>30) {
        $errors['first_name']="Minimum length 2 and max 30";
    }
    $user_inputs['first_name']= $first_name;
  

    if (empty($last_name)) {
        $errors['last_name']="Last Name is required";
    }else if (strlen(trim($last_name))<2 && strlen($last_name)>30) {
        $errors['last_name']="Minimum length 2 and max 30";
    }
    $user_inputs['last_name']= $last_name;
  

     // email
    if (empty($email)) {
        $errors['email'] = 'Email must be filled.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Your email must to be a valid one.';
    } else {
        $user_check="SELECT * FROM users WHERE email='$email' LIMIT 1";

        $res = mysqli_query($db, $user_check);
        $user = mysqli_fetch_assoc($res);
  
    if($user){
        $errors['user_exists']='User with this email already exists';
        }
         }
    $user_inputs['email']= $email;

    // validimi birthday
    if (empty($birthday) ){
        $errors['birthday'] = 'Birthday must be filled';
    }
    $user_inputs['birthday']= $birthday;
     
    // validimi password
    if (empty($password)){
        $errors['password'] = 'Password must be filled';
    }
    else if(strlen(trim($password))<6 ) {
        $errors['password']="Minimum length is 6 characters";
    }
    if ($password != $password_confirmation) {
        $errors['password_match']='The two passwords do not match';
    }
    $user_inputs['password']= $password;

    if($image_size > 2000000){
        $errors['img'] = 'image size is too large!';
    }

    if (count($errors)) {
        session_start();
        $_SESSION['errors'] = $errors;
        $_SESSION['user_input']=$user_inputs;
        header('location: register_form.php');
        exit;
    }
    
    elseif (count($errors)==0){
    $password=md5($password);
    $password_confirmation=md5($password_confirmation);
    //  query per te futur te dhenat e userit ne database  pasi jane validuar me sukses
    $register="INSERT INTO users (first_name,last_name, email, birthday, password ,password_confirmation) VALUES ('$first_name','$last_name', '$email' ,'$birthday', '$password','$password_confirmation')";
    $re= mysqli_query($db, $register);
   
    //   pas rregjistrimit useri drejtohet ne nje faqe tjeter qe informon userin qe eshte regjistruar me sukses
    header('location: register_succes.php');
}

?>