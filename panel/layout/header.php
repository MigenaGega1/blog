
<?php

include('C:\xampp\htdocs\TASK1REGISTER\config.php');
?>

<!DOCTYPE HTML>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  </head>
  <body>
  <nav class="bg-gradient-to-tl from-green-400 to-indigo-800 shadow fixed w-screen h-[95px]  z-10 mx-auto inset-x-0 top-0 flex justify-between items-center">
      
      <a href="http://localhost:3000/panel/home.php" class="text-2xl -mt-10  font-mono ml-10">HOME </a> 
      
        
      
      <!-- List of nav item -->
        <div  class="bg-gradient-to-tl from-green-400 to-indigo-800  space-x-10 items-center font-semibold z-10 rounded-bl-md flex absolute top-0 right-0 transition-all duration-500 transform translate-x-0 w-1/2 md:w-auto px-3 md:px-0 flex-col md:flex-row -translate-y-full md:translate-y-0 md:mt-1 md:items-center md:mx-1 ">
            <a href="http://localhost:3000/panel/posts/posts.php" class="mx-0 sm:mx-2 my-2 border-b-2 border-transparent hover:text-pink-700 transition-all duration-500 py-1 sm:p-0">My Posts</a>
            <a href="http://localhost:3000/panel/posts/post-create-form.php" class="mx-0 sm:mx-2 my-2 border-b-2 border-transparent hover:text-pink-700 transition-all duration-500 py-1 sm:p-0">Create new post</a>
            <a href="#" class="mx-0 sm:mx-2 my-2 border-b-2 border-transparent hover:text-pink-700 transition-all duration-500 py-1 sm:p-0">Link</a>
            <a href="#" class="mx-0 sm:mx-2 my-2 border-b-2 border-transparent hover:text-pink-700 transition-all duration-500 py-1 sm:p-0">LINK</a>
            <a href="#" class="mx-0 sm:mx-2 my-2 border-b-2 border-transparent hover:text-pink-700 transition-all duration-500 py-1 sm:p-0">LINK</a>
            <a href="#" class="mx-0 sm:mx-2 my-2 border-b-2 border-transparent hover:text-pink-700 transition-all duration-500 py-1 sm:p-0">Link</a>
            <a href="#" class="mx-0 sm:mx-2 my-2 border-b-2 border-transparent hover:text-pink-700 transition-all duration-500 py-1 sm:p-0">LINK</a>
            <a href="#" class="mx-0 sm:mx-2 my-2 border-b-2 border-transparent hover:text-pink-700 transition-all duration-500 py-1 sm:p-0">Link</a>
      <div class=" flex items-center bg-gray-200 -ml-4 mt-2 relative px-2 border w-56 ml-20 rounded-full shadow">
     <div class="flex  space-x-2 items-center font mono text-black ">
      <p>Hi</p>
     <p id="first_name"><?= Config::getAuthUser()['first_name'] ?> </p>  
     <p id="last_name"><?= Config::getAuthUser()['last_name'] ?> </p>  
<div class="flex justify-center ">
<div x-data="{ dropdownOpen: false }" class="relative ">
  <button @click="dropdownOpen = !dropdownOpen" class="relative z-20 block rounded-md  p-2 focus:outline-none">
  <div class="block flex-grow-0 flex-shrink-0 h-10 w-12 pl-5">
    
  <img class=" mt-2 rounded-full " src="http://localhost:3000/panel/profile/upload/<?php echo Config::getAuthUser()['profile_image_url'];?>" id ="profile_image2" alt = "Photo" style = "width: 100px; height: 30px"></div>
  
  </button>
   <div x-show="dropdownOpen" class="absolute right-0 mt-2 py-2 w-48  rounded-md shadow-xl z-20">
    <a href="http://localhost:3000/panel/profile/profile.php" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-gradient-to-tl from-green-400 to-indigo-800 hover:text-white">
      My profile
    </a>
    <a href="http://localhost:3000/panel/logout.php" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-gradient-to-tl from-green-400 to-indigo-800 ">
      Log Out
    </a>
  </div>
</div>
</div>
  </div>
        </div>
      
    </nav>
































  
      
     


