

<?php
include('C:\xampp\htdocs\TASK1REGISTER\panel\layout\header.php');


?>

<?php    
function query($query) {
  $db=Config::getConnection(); 
	$result = mysqli_query($db, $query);
	$rows = [];
  
  if (mysqli_num_rows($result)==0){
    echo "<div class='relative flex min-h-screen flex-col justify-center shadow-slate-900 overflow-hidden bg-white py-6 sm:py-12'>
    <div class='mx-auto w-[800px] h-[400px] rounded-3xl from-cyan-200 via-white to-sky-300 bg-gradient-to-br shadow-cyan-500 shadow-lg p-20 text-center'>
      <h2 class='text-2xl font-serif leading-tight bg-white shadow-lg text-black'>Welcome!</h2>
      <h2 class='text-2xl font-serif leading-tight bg-white shadow-lg text-black'>No posts to display</h2>
      <div class='mt-20 flex items-center justify-center gap-4'>
        <button class='flex items-center justify-center gap-2 border border-black/50 rounded-full bg-cyan-100  px-5 py-3 text-lg font-medium text-white'>
          <a href='http://localhost:3000/panel/posts/post-create-form.php' class='flex text-black items-center space-x-2'>Create here new post
          <span>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16' fill='none'>
            <path d='M6.00156 13.4016L4.60156 12.0016L8.60156 8.00156L4.60156 4.00156L6.00156 2.60156L11.4016 8.00156L6.00156 13.4016Z' fill='black' /></svg>
          </span>
          </a>
        </button>
        </div>
        </div>
        </div>";
	
}
  else{
    while( $row = mysqli_fetch_assoc($result) ) {
      $rows[] = $row;
    }
    return $rows;
  }
}
       
$posts = query ("SELECT * FROM posts  order by id desc"); ?>

    
    
<div class=" grid grid-cols-1">
<?php if($posts){ foreach( $posts as $post ) : ?>


<div class="w-[500px] rounded hover:shadow-lg shadow-md hover:shadow-cyan-800  items-center bg-white mt-32 mb-10 ml-[580px]">
  <a href="http://localhost:3000/panel/posts/post-show.php?id=<?=$post['id'];?>">
  <img class="w-full" src="http://localhost:3000/panel/posts/uploads/<?php echo $post['image_path']; ?>" alt="Sunset in the mountains">
 </a> <div class="px-6 py-4">
    <div class="font-bold text-xl mb-2">
    <a class=" font-mono text-gray-500 hover:underline" href="http://localhost:3000/panel/posts/post-show.php?id=<?=$post['id'];?>"><?= $post["title"]; ?></a>
      
    </div> 
  
 
</div>
</div>
<?php endforeach; }?></div>


<?php
include('C:\xampp\htdocs\TASK1REGISTER\panel\layout\footer.php');
?>















