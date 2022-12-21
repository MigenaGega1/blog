<?php
session_start();
include('connection.php');


    //marrja e inputeve te vendosuara nga perdoruesi
    $email=mysqli_real_escape_string($db,$_POST['email']);
    $password=mysqli_real_escape_string($db,$_POST['password']);
    $errors1=[];
    $user_inputs1=[];

    if (empty($email)) {
        $errors['email'] = 'Email must be filled.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors1['email'] = 'Your email must to be a valid one.';
    } else {
        $user_check="SELECT * FROM users WHERE email='$email' LIMIT 1";

        $res = mysqli_query($db, $user_check);
        $user = mysqli_fetch_assoc($res);
  
        if(!$user){
            $errors1['email_notexists']='User with this email does not  exists';
        }
    }
    $user_inputs1['email']= $email;

    if(empty($password)){
        $errors1['password'] = 'Pssword must be filled.';  
    }
    
    if (count($errors1)) {
       
        $_SESSION['errors1'] = $errors1;
        $_SESSION['user_inputs1']=$user_inputs1;
        header('location: login_form.php');
        exit;
      }
  

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' ";
        $result = mysqli_query($db, $query);
        $row= mysqli_fetch_array($result);
      
    if(is_array($row)){
        $_SESSION['email'] = $email;
        $_SESSION['authuser_id']= $row['id'];
        $_SESSION['userfirst_name']= $row['first_name'];
        $_SESSION['userlast_name']= $row['last_name'];
        $_SESSION['userbirthday']= $row['birthday'];
        header("location: http://localhost:3000/panel/home.php");
        }
    else{

        $_SESSION['error'] = "Wrong email or password";
        header("Location: login_form.php");

    }
}
?>


















   



  


    


