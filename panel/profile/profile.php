<?php
include('C:\xampp\htdocs\TASK1REGISTER\panel\layout\header.php');
?>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
<div class="flex flex-wrap" id="tabs-id">
  <div class="w-full mt-40">
    <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row w-[1450px] ml-14">
      <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
        <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-black bg-cyan-600" onclick="changeAtiveTab(event,'tab-profile')">
          <i class="fas fa-space-shuttle text-base mr-1"></i>  Profile
        </a>
      </li>
      <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
        <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-black bg-white" onclick="changeAtiveTab(event,'tab-changefnln')">
          <i class="fas fa-cog text-base mr-1"></i>  Change First Name and Last Name 
        </a>
      </li>
      <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
        <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-black bg-white" onclick="changeAtiveTab(event,'tab-changeEmail')">
          <i class="fas fa-cog text-base mr-1"></i>  Change Email
        </a>
      </li>
      <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
        <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-black bg-white" onclick="changeAtiveTab(event,'tab-changePassword')">
          <i class="fas fa-briefcase text-base mr-1"></i>  Change Password
        </a>
      </li>
      <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
        <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-black bg-white" onclick="changeAtiveTab(event,'tab-changeProfilePhoto')">
          <i class="fas fa-briefcase text-base mr-1"></i>  Change Profile Photo
        </a>
      </li>
    
    </ul>
    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg shadow-gray-500 h-[600px] rounded w-[1450px] ml-14">
      <div class="px-4 py-5 flex-auto">
        <div class="tab-content tab-space">
          <div class="block" id="tab-profile">
            <p>
        
            <?php  require_once 'C:\xampp\htdocs\TASK1REGISTER\panel\profile\profileInfo.php'?>
              
        
            </p>
          </div>
          <div class="hidden" id="tab-changefnln">
            <p>
            <?php  require_once 'C:\xampp\htdocs\TASK1REGISTER\panel\profile\editFnLn.php'?>
             
             
            </p>
          </div>
          <div class="hidden" id="tab-changeEmail">
            <p>
          

      <?php require_once 'C:\xampp\htdocs\TASK1REGISTER\panel\profile\editEmail.php' ?>
            </p>
          </div>
          <div class="hidden" id="tab-changePassword">
            <p>
          <?php require_once 'C:\xampp\htdocs\TASK1REGISTER\panel\profile\changePassword.php' ?>
            </p>
          </div>
          <div class="hidden" id="tab-changeProfilePhoto">
            <p>
            <?php  require_once 'C:\xampp\htdocs\TASK1REGISTER\panel\profile\updateProfilePhoto.php'  ?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function changeAtiveTab(event,tabID){
    let element = event.target;
    while(element.nodeName !== "A"){
      element = element.parentNode;
    }
    ulElement = element.parentNode.parentNode;
    aElements = ulElement.querySelectorAll("li > a");
    tabContents = document.getElementById("tabs-id").querySelectorAll(".tab-content > div");
    for(let i = 0 ; i < aElements.length; i++){
      aElements[i].classList.remove("text-white");
      aElements[i].classList.remove("bg-cyan-600");
      aElements[i].classList.add("text-black");
      aElements[i].classList.add("bg-white");
      tabContents[i].classList.add("hidden");
      tabContents[i].classList.remove("block");
    }
    element.classList.remove("text-pink-600");
    element.classList.remove("bg-white");
    element.classList.add("text-white");
    element.classList.add("bg-cyan-600");
    document.getElementById(tabID).classList.remove("hidden");
    document.getElementById(tabID).classList.add("block");
  }
</script>








<?php

include('C:\xampp\htdocs\TASK1REGISTER\panel\layout\footer.php');
?>










   