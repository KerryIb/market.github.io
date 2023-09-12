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
  $check_user=isset($_COOKIE['username']); 
  if( !$welcome || !$check_user){
    header('Location: login.php');
  }


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset=UTF-8>
    <title> Welcome </title>
    <link rel="stylesheet" href="style.CSS">
  </head>
  
<body>
 <header >
  <div class=greeting>
 <?php
 $user=($_COOKIE['username']);
 echo ("Hi,". $user);
 ?>
  <nav>
        <a class=no_click href="index.php">Home</a>
        <br>
        <a href="login.php">Login</a>
        <br>
        <a href="blog.php">Our Posts</a>
        <br>
        <a href="merch.php">Our Products</a>
        
      </nav>
  <span id="greeting" ></span>
</div>
  <h1 class=h1_alig> My Current T.V Show </h1> 
</header>
<main class=overall_border class=fix_index>
<section >
  <h2> Abbott Elementary</h2>
<div class=img>
  <img class=index_img src=  "https://m.media-amazon.com/images/M/MV5BMTY1MWUwYjItY2JmYi00ZDgyLTgzMjUtNzNkMzg0NjNjYTdkXkEyXkFqcGdeQXVyMTUzMTg2ODkz._V1_.jpg" alt="first" > 
  <p>Current poster</p>
</div>
</section>

<section>
  <h2> Genre</h2>
  <ul>
  <li>
    Comedy
  </li>
  </ul>
</section>

<section>
    <h2>
    Plot
    </h2>
  <ul>
  <li>
    A group of dedicated, passionate teachers find themselves thrown together in a Philadelphia public school where, despite the odds stacked against them, they are determined to help their students succeed in life. Though these incredible public servants may be outnumbered and underfunded, they love what they do.
  </li>
  </ul>
 </section>
 
  <section>
    <h2>
    Cast
    </h2>
    <ol>
  <li>
    Quinta Brunson - Janine Teagues    
  </li>
  <li>
    Tyler James - Gregory Eddie
  </li>
  <li>
    Lisa Ann Walter - Melissa Shemmenti
  </li>
  <li>
    Sheryl Lee Raplh - Barbara Howard
  </li>
  <li>
    Jenner James - Ava Coleman
  </li>
  <li>
    Chris Perfetti - Jacob Hill
  </li>
  </ol>
  </section>
  
  <section> 
  <h2> Some recent posts by other users</h2>
  <p>
  <b>malicious666 </b> says: Could anyone see how I can fix my 
  
  <a href="scarf1.html" target="_blank" rel="opener">scarf</a> Please help. I'm so sad. Here's a <a href="scarf2.html" target="_blank" rel="opener">picture</a> of the other side.
  </p>
  
  </section>
  

</main>
<footer>
  <small>&copy; Kerry Ibarra, 2023
  </small>
</footer>
</body>
</html>







