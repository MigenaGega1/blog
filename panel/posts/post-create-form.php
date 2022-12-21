<script src="https://cdn.tailwindcss.com"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  

<body class="bg-gradient-to-br from-slate-100 to-slate-300">
<form id="frm-add-post" action="javascript:void(0)" class=" mt-10 " method="post" enctype="multipart/form-data" >
<div class="editor mx-auto heading rounded-xl w-10/12 h-[780px] flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg shadow-cyan-400 max-w-2xl bg-gradient-to-tl from-green-400 to-indigo-800">
  <a href="http://localhost:3000/panel/home.php" class="flex items-center ">
  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0019 16V8a1 1 0 00-1.6-.8l-5.333 4zM4.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0011 16V8a1 1 0 00-1.6-.8l-5.334 4z" />
  </svg>
   </a>
  <div class="heading rounded-xl text-center font-serif text-2xl m-5 text-gray-800"> Create New Post</div>
  <div>
    <input name="title" id="title" class="title border rounded-xl hover:border-cyan-300 border-blue-500 p-2 mb-4 outline-none w-full" spellcheck="false" placeholder="Title" type="text">
   </div> 
   <div><textarea name="content" id="content" class="description  rounded-xl w-full sec p-3 h-60 border border-gray-300 outline-none" spellcheck="false" placeholder="Describe everything about this post here"></textarea>
    </div>
    <div class="border-gray-500 relative">
    <input name="photo" id="photo" class=" h-[50px] mt-10 photo block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"  type="file"/>
    
    <img src="" id="profile-img-tag"  class="w-[400px] h-[100px] ml-32 mt-10 border shadow-lg shadow-cyan-800" alt="Post Photo" />
</div>
    <div class="buttons flex">
      <button type="submit" id="btnSubmit" class=" submit-form-create rounded w-[400px] bg-indigo-800 text-white font-bold p-2.5 ml-32 text-center mt-4 items-center" > Create Post</button>
    </div>
  </div>
</form>
</body>


<script type="text/javascript">
    //function to preview photo 
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#photo").change(function(){
        readURL(this);
    });
</script>
<br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(function() {

        // Ajax form submission 
        $('#frm-add-post').on('submit', function(e) {

            e.preventDefault();
            $('.invalid-error').remove();

            var formData = new FormData(this);
            var files = $('#photo')[0].files;
            var title=$('#title').val();
            var title=title.trim();
            var content=$('#content').val();
            var content=content.trim();
            var errors = 0;
        if (!title) {
          errors++;
          $(`[name="title"]`).parent().append(`<span class="invalid-error  mt-4 text-red-600 px-4  rounded text-xl" role="alert ">*Title  is required</span>`);
        }
        if (!content) {
          errors++;
          $(`[name="content"]`).parent().append(`<span class="invalid-error  mt-4 text-red-600 px-4  rounded  text-xl" role="alert ">*Content  is required</span>`);
        }
       
        if ($('#photo').get(0).files.length === 0) {
          errors++;
          $(`[name="photo"]`).parent().append(`<span class="invalid-error  mt-4 text-red-600 px-4  rounded  text-xl" role="alert ">*Photo   is required</span>`);
        }
       

        if (errors > 0) {
          return;
        }
            $.ajax({
                url: "post-create-process.php",
                type: "POST",
                cache: false,
                data: formData,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success:function(response){
                  console.log(response);
                  swal("", "You successfully created the post", "success").then(function () {
                   window.location.href = "http://localhost:3000/panel/home.php";
                }, function (dismiss) {
 
                if (dismiss === 'cancel') {
                window.location.href = "http://localhost:3000/panel/posts/post-create-form.php";
             }
           });
        },
                error: function(error) {
              let response = JSON.parse(error.responseText);
              $.each(response.errors, function(field, message) {
                $(`[name="${field}"]`).parent().append(`<span class="invalid-error  text-red-600 rounded relative" role="alert ">* ${message}</span>`);
                
              });
                }
            });
        });
    });
</script>