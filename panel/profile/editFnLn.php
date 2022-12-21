
<section class="py-26 bg-gradient-to-tl from-green-400 to-indigo-800 shadow-lg shadow-cyan-800 h-[500px] w-[700px] ml-[420px]">
  <div class="container px-4 mx-auto">
    <div class="max-w-lg mx-auto">
      <div class="text-center mb-8">
       
        <h2 class="text-3xl md:text-4xl font-extrabold mb-2 truncate">Edit First Name & Last Name</h2>
          </div>
      <form action="changeFnLnProcess.php" method="post">
        <div class="mb-6">
          <label class="block mb-2 font-extrabold" for="">First Name</label>
          <input name="first_name"id="first_name" class="inline-block w-full p-4 leading-6 text-lg font-extrabold placeholder-indigo-900 bg-white shadow border-2 border-indigo-900 rounded" type="text" value="<?= Config::getAuthUser()['first_name']   ?>">
        </div>
        <div class="mb-6">
          <label class="block mb-2 font-extrabold" for="">Last Name</label>
          <input name="last_name" id="last_name"class=" first_name inline-block w-full p-4 leading-6 text-lg font-extrabold placeholder-indigo-900 bg-white shadow border-2 border-indigo-900 rounded" type="text"  value="<?=Config::getAuthUser()['last_name']?>">
        </div>
  
        <button type="submit"  name="submit"  class="last_name submit-form-fnln inline-block w-full py-4 px-6 mb-6 text-center text-lg leading-6 text-white font-extrabold bg-indigo-800 hover:bg-indigo-900 border-3 border-indigo-900 shadow rounded transition duration-200">Save</button>
   <div class="message"></div>
      </form>
    </div>
  </div>
</section>


<script>
$(document).ready(function(){
    $('.submit-form-fnln').on('click', function(e){
        e.preventDefault();
        $('.invalid-error').remove();
      
        let form =  $(this).closest('form');
        let formActionUrl = form.attr('action');
        let type = form.attr('method');
        let formData = form.serialize();
        
        
       
    
       
    
        $.ajax({
            url: formActionUrl,
            type: type,
            data: formData,
           
            success:function(response){
               console.log(response);
               let first_name=response.first_name;
               let last_name=response.last_name;
               $('#first_name1').html(first_name);
               $('#last_name1').html(last_name);
               $('#first_name').html(first_name);
               $('#last_name').html(last_name);
               
              swal("", "You have successfully changed first name and last name ","success");
 
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
