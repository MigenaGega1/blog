

<section class="py-26 bg-gradient-to-tl from-green-400 to-indigo-800 h-[500px] w-[700px] ml-[420px]">
  <div class="container px-4 mx-auto shadow-cyan-800 ">
    <div class="max-w-lg mx-auto">
      <div class="text-center mb-8">
        <h2 class="text-3xl md:text-4xl font-extrabold mb-2">Edit Email</h2>
          </div>
      <form action="changeEmailProcess.php" method="post">
      <div class=" display-error" style="display: none">
    </div>
        <div class="mb-6">
          <label class="block mb-2 font-extrabold" for="">Email</label>
          <input id="email" class=" email form-control inline-block w-full p-4 leading-6 text-lg font-extrabold placeholder-indigo-900 bg-white shadow border-2 border-indigo-900 rounded"   name="email" value="<?=Config::getAuthUser()['email'];     ?>">
        </div>
        <button type="submit"  name="submit" class="  submit-form-email inline-block w-full py-4 px-6 mb-6 text-center text-lg leading-6 text-white font-extrabold  hover:bg-indigo-900 border-3 border-indigo-900  bg-indigo-800 shadow rounded transition duration-200">Save</button>
       <div class="message">
     </div>
  
      </form>
    </div>
  </div>
</section>

<script>
$(document).ready(function(){
    $('.submit-form-email').on('click', function(e){
        e.preventDefault();
        $('.invalid-error').remove();
      
        let form =  $(this).closest('form');
        let formActionUrl = form.attr('action');
        let type = form.attr('method');
        let formData = form.serialize();
        let email=$('#email').val();
        
        let errors = 0;
        if (!email) {
          errors++;
          $(`[name="email"]`).parent().append(`<span class="invalid-error bg-red-300 mt-4 text-red-700 px-4  rounded relative" role="alert ">* Email  is required</span>`);
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
              

                swal("", "You have successfully changed email!", "success");
 
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

    
});

</script>

  
