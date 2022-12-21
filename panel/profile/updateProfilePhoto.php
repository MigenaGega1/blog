<style media="screen">
    .preview{
      display: block;
      width: 150px;
      height: 180px;
      border: 5px solid black;
      margin-top: 10px;
    }
  </style>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <div class=" items-center shadow-cyan-800 h-[500px] w-[800px] ml-[425px] shadow-lg bg-gradient-to-tl from-green-400 to-indigo-800">
<div class="ml-64">
    <form method = "post" action = "uploadImageproccess.php" enctype = "multipart/form-data">
      <input class="mt-10 "  type="file" name="profile_image_url" id="profile_image_url">
      <button class="rounded-full bg-cyan-400 text-white font-bold py-2 px-4 " type="button" onchange="readURL(this)" onclick = "submitData();">Upload</button>
      <div class = "preview ml-28">
        <img  src="upload/<?php echo Config::getAuthUser()['profile_image_url'];?>" name="img" id = "img" alt = "Photo" style = "width: 100%; height: 100%">
      </div>
    </form>
   </div>
  </div>
    <script type="text/javascript">
      // Preview
      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
      // Submit
      function submitData(){
        $(document).ready(function(){
          var formData = new FormData();
          var files = $('#profile_image_url')[0].files;
          formData.append('profile_image_url', files[0]);

          $.ajax({
            url: 'uploadImageproccess.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,


            success: function(response){
             
              var res_img_url="http://localhost/TASK1REGISTER/panel/profile/upload/";
              var res_img_url_concat= res_img_url.concat(response.photo);
              $('#profile_image1').attr('src',res_img_url_concat);
              $('#profile_image2').attr('src',res_img_url_concat);
              $('#img').attr('src',res_img_url_concat);  
           
             swal("Good job!", "You successfully changed the profile photo", "success");
        
       },
       error:function(error){
              console.log(error);
              let response = JSON.parse(error.responseText);
              $.each(response.errors, function(field, message) {
                $(`[name="${field}"]`).parent().append(`<span class="invalid-error bg-red-300 mt-4 text-red-700 px-4  rounded relative" role="alert ">* ${message}</span>`);
                
              });
            }
          });
        });
      }
    </script>