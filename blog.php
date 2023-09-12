#!/usr/local/bin/php
<?php
  // IMPORTANT: The lack of a blank line between
  // #!/usr/local/bin/php and <?php is essential.

  // SETTING UP OR RESUMING A SESSION
  session_save_path(__DIR__.'/sessions/');
  session_name('myWebpage');
  session_start();

  // STORING WHETHER THE USER IS WELCOME OR NOT
  // (Recall: 'and' has lower precedence than '='
  //          which has lower precedence than '&&';
  //          so using 'and' without extra parentheses
  //          would create a nasty bug here...)
  $welcome = isset($_SESSION['loggedin']) && $_SESSION['loggedin'];
  $check_user=isset($_COOKIE['username']);  //be aboolean type 
  if( !$welcome || !$check_user){
    header('Location: login.php');
    exit;
  }

 

?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Our Posts</title>
    <link rel="stylesheet" href="style.CSS">
 
  </head>

  <body>
    <header>
    <section class="greeting">
    <nav>
        <a  href="index.php">Home</a>
        <br>
        <a href="login.php">Login</a>
        <br>
        <a class=no_click href="blog.php">Our Posts</a>
        <br>
        <a href="merch.php">Our Products</a>
        
      </nav>
      </section>
      <h1 class=h1_alig>Blog Posts</h1>
    </header>

    <main class=overall_border >
    <form method="POST" action="post.php" >
        <label for="author"> Author: 
      </label>
        <input type="text" id="author" name="authorname" value= <?php echo $_COOKIE['username'] ?>>
        <br>
        <label for="content">Content:</label>
        <textarea id="content" name="content" ></textarea>
        <input type="submit" value="Post">
      </form>

      <section>
        <h2>Post by Other Users:</h2>
        <?php

             if(file_exists('posts.txt')){
              readfile('posts.txt');
             }
         ?>
        </section>
      </main>

    <footer>
      <hr>
      <small>
        &copy; Kerry Ibarra, 2023
      </small>
    </footer>
  </body>

