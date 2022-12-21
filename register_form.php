
<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/flowbite@1.5.1/dist/datepicker.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
 <body>
  <div class="font-sans">
    <div class="relative min-h-screen flex flex-col sm:justify-center items-center bg-gray-100 ">
        <div class="relative sm:max-w-sm w-full">
            <div class="card bg-cyan-400 shadow-lg  w-full h-full rounded-3xl absolute  transform -rotate-6"></div>
             <div class="card bg-black shadow-lg  w-full h-full rounded-3xl absolute  transform rotate-6"></div>
               <div class="relative w-full rounded-3xl  px-6 py-4 bg-gray-100 shadow-md">
                <label for="" class="block mt-3 text-sm text-gray-700 text-center font-mono text-2xl">
                   Register
                </label>
                   <form method="POST" action="register_process.php" class="mt-10">
                    <div>
                        <label class="text-lg font-serif" for="">First Name</label>
                        <input type="text" placeholder="First name" name="first_name" value="<?php if(isset($_SESSION['user_input']['first_name'])){ echo  $_SESSION['user_input']['first_name'] ;}else echo '';?> " class=" formError  mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">
                        <?php if(isset($_SESSION['errors']['first_name'])){ echo '<p class="formError text-red-500">' . $_SESSION['errors']['first_name'] .'</p>';}?>  
                       <?= @$_SESSION['errors']['first_name'] ?> 
                    </div>
                    <div class="mt-2">  
                    <label class="text-lg font-serif" for="">Last Name</label>              
                        <input type="last_name" placeholder="Last name" name="last_name" value="<?php if(isset($_SESSION['user_input']['last_name'])){ echo  $_SESSION['user_input']['last_name'] ;}else echo '';?> "class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0"> 
                        <? if(isset($_SESSION['errors']['last_namel'])) { echo $_SESSION['errors']['last_name']; } ?>   
                        <?= @$_SESSION['errors']['last_name'] ?>                   
                    </div>
                    <div class="mt-2">  
                    <label class="text-lg font-serif" for="">Email</label>              
                        <input type="email"  name="email" class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0" value="<?php if(isset($_SESSION['user_input']['email'])){ echo  $_SESSION['user_input']['email'] ;}else echo '';?> "> 
                        <? if(isset($_SESSION['errors']['email'])) { echo  $_SESSION['errors']['email']; } ?>   
                        <?= @$_SESSION['errors']['email'] ?>    
                        <? if(isset($_SESSION['errors']['user_exists'])) { echo $_SESSION['errors']['user_exists']; } ?>   
                        <?= @$_SESSION['errors']['user_exists'] ?>                       
                    </div>
                    <div class="mt-2">         
                    <label class="text-lg font-serif" for="">Birthday</label>       
                        <input type="date" placeholder="Birthday" name="birthday" class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0" value="<?php if(isset($_SESSION['user_input']['birthday'])){ echo  $_SESSION['user_input']['birthday'] ;}else echo '';?> ">     
                        <? if(isset($_SESSION['errors']['birthday'])) { echo $_SESSION['errors']['birthday']; } ?>   
                        <?= @$_SESSION['errors']['birthday'] ?>                       
                    </div>
                    <div class="mt-2">  
                    <label class="text-lg font-serif" for="">Password</label>              
                        <input type="password" placeholder="Password" name="password" class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">  
                        <? if(isset($_SESSION['errors']['password'])) { echo $_SESSION['errors']['password']; } ?>   
                        <?= @$_SESSION['errors']['password'] ?>                          
                    </div>
                    <div class="mt-2">  
                    <label class="text-lg font-serif" for="">Confirm password</label>
                        <input type="password" placeholder="Confirm password" name="password_confirmation"class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">  
                        <? if(isset($_SESSION['errors']['password_match'])) { echo $_SESSION['errors']['password_match']; } ?>   
                        <?= @$_SESSION['errors']['password_match'] ?>                          
                    </div>
                    
                    <div class="mt-2">
                        <button name="register_user" class="bg-cyan-500 w-full py-3 rounded-full text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                            Register
                        </button>
                    </div>
                    <div class="mt-4">
                        <a href="login_form.php">
                        <button  class="bg-cyan-500 w-full py-3 rounded-full text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                           Already have an account?
                           <br>
                           Log in</a>
                    </div>
                </form>
            </div>
        </div>
     </div>
   </div>
 </body>
</html>

<?php
    if (isset($_SESSION['errors'])) {
        unset($_SESSION['errors']); 
    }
?>

<?php
    if (isset($_SESSION['error'])) {
        unset($_SESSION['error']); 
    }
?>
<?php
    if (isset($_SESSION['user_input'])) {
        unset($_SESSION['user_input']); 
    }
?>