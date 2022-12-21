



<section class="py-26 bg-gradient-to-tl from-green-400 to-indigo-800 shadow-cyan-800 shdow-lg h-[580px] w-[700px] ml-[420px]">
  <div class="container px-4 mx-auto">
    <div class="max-w-lg mx-auto">
      <div class="text-center mb-8">
        <h2 class="text-3xl md:text-4xl font-extrabold mb-2">Change password</h2>
          </div>
      <form action="changePassprocess.php" method="POST">
        <div class="mb-6">
          <label class="block mb-2 font-extrabold" for="">Current Password</label>
          <input name="oldpassword" id="oldpassword" class="inline-block w-full p-4 leading-6 text-lg font-extrabold placeholder-indigo-900 bg-white shadow border-2 border-indigo-900 rounded" type="password" value="">
        </div>
        <div class="mb-6">
          <label class="block mb-2 font-extrabold" for="">New Password</label>
          <input name="newpassword" id="newpassword" class="inline-block w-full p-4 leading-6 text-lg font-extrabold placeholder-indigo-900 bg-white shadow border-2 border-indigo-900 rounded" type="password" value="" >
        </div>
        <div class="mb-6">
          <label class="block mb-2 font-extrabold" for="">Confirm new password</label>
          <input name="confirmpassword" id="confirmpassword" class="inline-block w-full p-4 leading-6 text-lg font-extrabold placeholder-indigo-900 bg-white shadow border-2 border-indigo-900 rounded" type="password" value="" >
        </div>
  
        <button class=" submit-form-password inline-block w-full py-4 px-6 mb-6 text-center text-lg leading-6 text-white font-extrabold bg-indigo-800 hover:bg-indigo-900 border-3 border-indigo-900 shadow rounded transition duration-200">Save</button>
  
      </form>
    </div>
  </div>



</section>




<script>

$(document).ready(function(){
    $('.submit-form-password').on('click', function(e){
        e.preventDefault();
        $('.invalid-error').remove();
      
        let form =  $(this).closest('form');
        let formActionUrl = form.attr('action');
        let type = form.attr('method');
        let formData = form.serialize();
        
        let oldpassword=$('#oldpassword').val();
        let newpassword=$('#newpassword').val();
        let confirmpassword=$('#confirmpassword').val();
       
        let errors = 0;
        if (!oldpassword) {
          errors++;
          $(`[name="oldpassword"]`).parent().append(`<span class="invalid-error bg-red-300 mt-4 text-red-700 px-4  rounded relative" role="alert"">* Old  password is required</span>`);
        }
        if (!newpassword) {
          errors++;
          $(`[name="newpassword"]`).parent().append(`<span class="invalid-error bg-red-300 mt-4 text-red-700 px-4  rounded relative" role="alert ">*  New  password is required</span>`);
        }
        if (!confirmpassword) {
          errors++;
          $(`[name="confirmpassword"]`).parent().append(`<span class="invalid-error bg-red-300 mt-4 text-red-700 px-4  rounded relative" role="alert ">*  Confirm  password is required</span>`);
        }

        if (errors > 0) {
          return;
        }
    
        $.ajax({
            url: formActionUrl,
            type: type,
            data: formData,

            success:function(response){
              console.log(response);
              swal("", "You have successfully changed password!", "success");
               
              
            },
            error:function(error){
              console.log(error);
              let response = JSON.parse(error.responseText);
              $.each(response.errors, function(field, message) {
                $(`[name="${field}"]`).parent().append(`<span class="invalid-error bg-red-300 mt-4 text-red-700 px-4  rounded relative" role="alert ">* ${message}</span>`);
              });
            }
          })
    });

    $('.message').html(" ");
    
});

</script>
