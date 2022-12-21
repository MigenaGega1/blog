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
                <label for="" class="block mt-3 text-sm text-gray-700 text-center font-serif text-2xl">
                  Login
                </label>
                <form method="POST" action="login_process.php" class="mt-10">     
                    <div>
                    <div class="mt-7">  
                      <label for="">Email</label>              
                        <input type="email"  name="email" value="<?php if(isset($_SESSION['user_inputs1']['email'])){ echo  $_SESSION['user_inputs1']['email'] ;}else echo '';?> "
                        class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0"> 
                        <? if(isset($_SESSION['error'])) { echo $_SESSION['error']; } ?>   
                        <?= @$_SESSION['error'] ?> 
                        <? if(isset($_SESSION['errors1']['email'])) { echo $_SESSION['errors1']['email']; } ?>   
                        <?= @$_SESSION['errors1
                        ']['email'] ?>     
                        <? if(isset($_SESSION['errors1
                        ']['email_notexists'])) { echo $_SESSION['errors1
                          ']['user_exists']; } ?>   
                        <?= @$_SESSION['errors1
                        ']['email_notexists'] ?>               
                    </div>
                    <div class="mt-7">   
                      <label for="">Password</label>             
                        <input type="password" name="password" class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">  
                        <? if(isset($_SESSION['errors1
                        ']['password'])) { echo $_SESSION['errors1']['password']; } ?>   
                        <?= @$_SESSION['errors1']['password'] ?>                          
                    </div>
                    <div class="mt-7">
                        <button type="submit" name="save"  class="bg-cyan-500 w-full py-3 rounded-full text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                          LOGIN
                        </button>
                    </div>
                    <div class="mt-7">
                      <a href="register_form.php">
                        <p    class="bg-cyan-500 w-full text-center py-3 rounded-full text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                        Don't have an account? Register
                        </p>
                      </a>
                    </div>
                </form>
            </div>
        </div>
     </div>
   </div>
 </body>
</html>


<?php
    if (isset($_SESSION['errors1'])) {
        unset($_SESSION['errors1']); 
    }
?>


<?php
    if (isset($_SESSION['error'])) {
        unset($_SESSION['error']); 
    }
?>
<?php
    if (isset($_SESSION['user_inputs1'])) {
        unset($_SESSION['user_inputs1']); 
    }
?>