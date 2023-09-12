#!/usr/local/bin/php
<?php
  // IMPORTANT: The lack of a blank line between
  // #!/usr/local/bin/php and <?php is essential.

  // echo "You should not echo before the header is sent\n";
  session_save_path(__DIR__.'/sessions/');
  session_name('myWebpage');
  session_start();

  header('Content-Type: text/plain; charset=utf-8');
  $valuesSetCheck = isset($_POST['content']) && isset ($_POST['authorname']);   //making sure that both is fille out so it could be used

  function post_to_file($author, $content){
    $content = str_replace("\n","<br>",$content);
    $content=str_replace(" ","&nbsp",$content);

    $file =fopen('posts.txt','a');
    if(!$file){
        echo 'file failed to open';
      }
      else{fwrite($file, "<p><b>$author</b> says: ");
        fwrite($file, $content);
        fwrite($file, "</p>");
        fwrite($file,"\n\n");
        fclose($file);
        echo 'post successfully written';
      }
    }

    if(!$valuesSetCheck){
      echo 'Nobody has made a post.';

    }
else{
  if($_POST['authorname']===" "){
    post_to_file($_COOKIE['username'],$_POST['content']);

  }

  else {
    post_to_file($_POST['authorname'],$_POST['content']);
  }
}
  

    
  ?>

         