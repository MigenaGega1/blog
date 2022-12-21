<div class=" items-center shadow-cyan-800 h-[500px] w-[800px] ml-[425px] shadow-lg bg-gradient-to-tl from-green-400 to-indigo-800">
      

       <div class="mt-2">
        <img id="profile_image1" class=" ml-[290px] rounded-full " src="upload/<?= Config::getAuthUser()['profile_image_url'];?>"  alt = "Photo" style = "width: 180px; height: 180px"></div>
  <div class="flex items-center  mt-12">
    <div class="grid grid-cols-2 gap-10 ml-24 text-gray text-serif text-2xl">
      <label class="ml-20">First Name:
        <p id="first_name1" class="text-bold font-serif"><?= Config::getAuthUser()['first_name'] ?></p></label>
        <label for="">Last name:
        <p id="last_name1" class=" text-bold  font-serif">  <?=  Config::getAuthUser()['last_name'] ?></p></label>
        <label for="email" class="ml-20">Email:</label>
      <p id="email1" class="text-bold  font-serif"> <?=  Config::getAuthUser()['email'] ?></p>
      <label class="ml-20">Birthday:</label>
      <p  id="birthday" class="text-bold  font-serif"> <?= Config::getAuthUser()['birthday'] ?></p>
</div>

  </div>
  
</div>






