
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
 <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/colored-shadow.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
    
   
<?php
include('C:\xampp\htdocs\TASK1REGISTER\config.php');
		    $db=Config::getConnection();
        $authUserId=Config::getAuthUser()['id'];
        $postId=$_GET['id'];
			 $sql = "SELECT * FROM posts p INNER JOIN users u ON p.user_id = u.id where p.id='$postId'  ;" ;
			 $resultset = mysqli_query($db, $sql);			
		  	while( $record = mysqli_fetch_array($resultset) ) {
        $author=$record['user_id'];
        $title=$record['title'];
        $content=$record['content'];
        
		?>   
        <input value="<?= $authUserId ?>" type="text" hidden  id="authuser">  
        <input value="<?= $author ?>" type="text" hidden  id="postauthor">     
<div class="min-h-screen  from-cyan-200 via-white to-sky-300 bg-gradient-to-br pb-10 ">
  <div class="flex justify-center">
    <div class="w-[1200px] h-auto  md:flex-row s rounded-lg bg-white shadow-lg mt-10">
    <img class=" w-[800px] rounded-t-lg md:rounded-none md:rounded-l-lg ml-48" src="http://localhost:3000/panel/posts/uploads/<?php echo $record['image_path']; ?>" alt="" />
     <div class="p-6  justify-start">
       <div>
          <a href="http://localhost:3000/panel/home.php" class="flex items-center ">
           <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0019 16V8a1 1 0 00-1.6-.8l-5.333 4zM4.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0011 16V8a1 1 0 00-1.6-.8l-5.334 4z" />
           </svg>
          </a>
          <input type="text" value=" <?php echo $author; ?>" id="author" hidden>
          <p class="text-gray-700 text-2xl font-medium  font-mono mb-2">Title:</p>
          <input name="title" id="title" class="text-gray-500 font-mono text-xl mb-4 w-[770px] bg-white"
              value=" <?php echo $record['title']; ?>" <?php
              if($authUserId!=$author) {echo "disabled=\"disabled\"";} ?>>   
     </div>

   <div>
    <p class="text-gray-700 text-2xl font-medium font-mono mb-2">Content:</p>
    <p class="text-gray-500 text-base mb-4"></p>
 
    <textarea name="content" id="content" cols="30" class="w-[1000px] text-xl text-gray-500  bg-white font-medium" rows="15"  <?php     if($authUserId!=$author){ echo "disabled=\"disabled\"";} ?>> <?php echo $record['content']; ?> </textarea>
  </div>
        <div class="text-gray-700 text-2xl font-mono font-medium mb-2 mt-2"> Author:</div>
        <div class="flex space-x-4 items-end ">
        <img class=" mt-2 rounded-full " src="http://localhost:3000/panel/profile/upload/<?=  $record['profile_image_url'];?>" id ="profile_image2" alt = "Photo" style = "width:50px; height: 50px">
        <p class="text-gray-700 font-mono text-xl mb-4">First Name: <?php echo $record['first_name']; ?> </p>
        <p class="text-gray-700 font-mono text-xl mb-4"> Last Name: <?php echo $record['last_name']; ?>  </p>
        </div>
        <p class="text-gray-600 font-mono text-2xl font-medium mb-2 mt-4">Created at:</p>
  
       <p class="text-gray-700 font-mono text-base mb-4 mt-2"> <?php echo $record['created_at']; ?></p>

    <div class="flex jsutify-end">
     <div class="mt-4">
     <input type="text" hidden id="postid" value="<?php echo $postId;?>">
     <p class="text-base font-mono">All comments for this post</p>
        <div class="comments-holder" data-id="<?php $post_id;?>"></div>
        
        <div class=" mx-20 comment-form">
          <form method="post" id="comment-form"  class=" w-full p-5">
            <div class="mb-2 ">
              
              <div class="inline-flex">
              <textarea name="comment_content" id="comment_content" class=" block  p-2.5 -ml-10 w-[700px] text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Add a comment here"></textarea>
           
            
             <a href="#" class="flex"> 
             <button type="submit" class=" create-comment inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
            <svg aria-hidden="true" class="w-6 h-6 rotate-90" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path></svg>
       
        </button>
              </a></div>

              <?php if($authUserId==$author) {
echo"<div class='flex space-x-40 mt-4 '>"; 
  echo "<button  data-id='$postId' data-title='$title' data-content='$content' class='update-btn min-w-auto w-32 h-10 bg-green-500 p-2 rounded-t-xl hover:bg-green-700  text-white font-semibold transition-transform hover:-translate-y-2 ease-in-out flex text-xl items-center gap-2 space-x-10' type='submit' name='edit'>Edit <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' fill='none' viewBox='0 0 24 24' stroke='currentColor' stroke-width='2'>
  <path stroke-linecap='round' stroke-linejoin='round' d='M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z' />
   </svg></button>";
  echo "<button  data-id='$postId' class='delete-btn min-w-auto w-32 h-10 bg-red-500 p-2 rounded-t-xl hover:bg-red-600  text-white font-semibold transition-transform hover:-translate-y-2 ease-in-out flex text-xl items-center gap-2 space-x-10' type='submit' name='delete'>Delete<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
  <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
  <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
  </svg></button>" ;
echo "</div>";
}
?>
            </div>
          </form>
        </div>
  
        </div>



<!--  -->








  



</div>
  </div>

</div>
</div>
</div>
</form> 
</body>
</html>
<div class="card-body">
</div>
			<?php } ?>





























  

      
      
<!-- script for updating post -->
<script>
      $(document).on("click",".update-btn",function(){  
        $('.invalid-error').remove();
                var id = $(this).attr("data-id") ;                  
                var element = this;  
                var title = $('#title').val();
                var title=title.trim();
                var content = $('#content').val(); 
                var content=content.trim();
                let errors = 0;
        if (!title) {
          errors++;
          $(`[name="title"]`).parent().append(`<span class="invalid-error  text-red-700 px-4  rounded relative" role="alert ">* Title is required</span>`);
        }
        if(!content){
          errors++;
          $(`[name="content"]`).parent().append(`<span class="invalid-error  text-red-700 px-4  rounded relative" role="alert ">* Content is required</span>`);
        }
        if (errors > 0) {
          return;
        } 

       $.ajax({  
          url :"post-update-process.php",  
          type:"POST",  
          dataType: "JSON",
          data:{id:id,
          title:title,
          content:content },  


           success:function(response){
           console.log(response);
          
           
           Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Your work has been saved',
  showConfirmButton: false,
  timer: 1000
})
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
</script>

<!-- script for deleting the post -->

<script>
        $(document).on("click", ".delete-btn", function() {
            let id = $(this).attr("data-id");
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success bg-green-500 ml-4',
                    cancelButton: 'btn btn-danger bg-red-500'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes delete it',
                cancelButtonText: 'No',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url: "post-delete-process.php",
                        type: "post",
                        cache: false,
                        data: {
                            id: id
                        },

                        success: function(response) {
                            console.log(response);
                        }
                    });

                   
                    window.location.href = "http://localhost:3000/panel/home.php";
                } else if (
                   
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your  file is not deleted. ',
                        'error'
                    )
                }
            })
        });
    </script>



<!-- script for addig a comment -->
<script>
     $(document).on("click", ".delete-comment-btn", function() {
            let comment_id = $(this).attr("data-id");
            $clicked_btn = $(this);
            // alert(comment_id)
            let post_id = $('#postid').val();
            let post_author = $('#author').val();
            // alert(post_author);
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success bg-green-500 ml-4',
                    cancelButton: 'btn btn-danger bg-red-500'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure for deleteing this comment ?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes delete it',
                cancelButtonText: 'No',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url: "http://localhost:3000/panel/posts/comments/comment-delete-process.php",
                        type: "post",
                        cache: false,
                        data: {
                            comment_id:comment_id,
                            post_id:post_id,
                            post_author:post_author

                        },

                        success: function(response) {
                            console.log(response);
                            $clicked_btn.parent().parent().parent().remove();
        // $('#name').val('');
        // $('#comment').val('');
                        }
                    });

                   
                } else if (
                   
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your  comment is not deleted. ',
                        'error'
                    )
                }
            })
        });

  $(document).ready(function() {
  let post_id = $('#postid').val();
  let authuser = $('#authuser').val();
  let postauthor=$('#postauthor').val();
 
  
            $.ajax({
                url: 'http://localhost:3000/panel/posts/comments/comment-create-process.php',
                type: "post",
                data: {
                    post_id: post_id,
                    action: 'fetch-comments',
                }
            }).then(function(response) {
                let commentsHolder = $('.comments-holder')
                $.each(response, function(index, value) {
                    commentauthor=value.comment_author;
                    
                   if(authuser== commentauthor || authuser==postauthor){
                    commentsHolder.append(                 `
      <div class=" comment-content w-1/2 bg-white p-2 pt-4 rounded shadow-md shadow-black m-4">
      <div class="flex ml-3">
       <div>
        <img  class="h-12 w-12 mr-3 rounded-full mr-3" src="http://localhost:3000/panel/profile/upload/${value.profile_image}" alt="" class="rounded-full">
        <h1 class="font-semibold">${value.fn} ${value.ln}</h1>
        <p class="text-base font-mono text-gray-500">${value.comment}</p>
        <small>${value.comm_time}</small>
     
        <button type="button" class="delete-comment-btn ml-12" data-id="${value.comment_id}"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#0000FF" stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
</svg></button>
      </div>

    </div>
                        `
                    
                   )
                }
                else{
                    commentsHolder.append(                 `
      <div class=" comment-content w-1/2 bg-white p-2 pt-4 rounded shadow-md shadow-black m-4">
      <div class="flex ml-3">
       <div>
        <img  class="h-12 w-12 mr-3 rounded-full mr-3" src="http://localhost:3000/panel/profile/upload/${value.profile_image}" alt="" class="rounded-full">
        <h1 class="font-semibold">${value.fn} ${value.ln}</h1>
        <p class="text-base font-mono text-gray-500">${value.comment}</p>
        <small>${value.comm_time}</small>
     
 
      </div>

    </div>
                        `
                    
                   )

                }
                })
            })

            

            $('#comment-form').submit(function(e) {
                e.preventDefault();
                let post_id = $('#postid').val();
                let content = $(this).find('#comment_content').val();
                if (!content) {
                    return;
                }

                $.ajax({
                    url: 'http://localhost:3000/panel/posts/comments/comment-create-process.php',
                    type: "post",
                    data: {
                        post_id: post_id,
                        action: 'insert-comment',
                        content: content
                    }
                }).then(function(response) {
                    $('.comments-holder').append(


                        `
  <div class=" comment-content w-1/2 bg-white p-2 pt-4 shadow-md shadow-black m-4">
    <div class="flex ml-3">
    <div>
        <img  class="h-12 w-12 rounded-full" src="http://localhost:3000/panel/profile/upload/${response.profile_image}" alt="" class="rounded-full">
     
     
        <h1 class="font-semibold">${response.fn} ${response.ln}</h1>
        <p class="text-xs text-gray-500">${response.comment}</p>
        <small>${response.comm_time}</small>
        <button type="button" class="delete-comment-btn ml-12" data-id="${response.comment_id}"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#0000FF" stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
</svg></button>
      </div>

    </div>
                          
                        `
                    )
                });

            })
        });
</script>
