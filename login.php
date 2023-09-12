#!/usr/local/bin/php
<?php
  // IMPORTANT: The lack of a blank line between
  // #!/usr/local/bin/php and <?php is essential.

  // SETTING UP OR RESUMING A SESSION


  // At the beginning,
  // there has not been an incorrect submission.
  session_save_path(__DIR__.'/sessions/');
  session_name('myWebpage');
  session_start();

  $incorr_submiss = false;

  // If a password has been submitted,
  // we should check it and update
  // $incorr_submiss and $_SESSION['loggedin']
  // accordingly.
  if (isset($_POST['passwordSubmitted'])) {
    if($_POST['usernameSubmitted']===$_COOKIE['username']){  //why do it have to add this  
    validate($_POST['passwordSubmitted'], $incorr_submiss);
  }
}


  function validate($submiss, &$incorr_submiss) {
    // Using die is not good coding practice, but
    // I don't wish to clutter up our current code
    // by handling this situation more gracefully.
    $file = fopen('h_password.txt', 'r') or die('Unable to find the hashed password');

    // We obtain the hashed password
    // (removing any surrounding whitespace).
    $hashed_password = fgets($file);
    $hashed_password = trim($hashed_password);

    fclose($file);


    // We hash the submission using the same algorithm
    // as when we hashed the actual password.
    $hashed_submiss = hash('md2', $submiss);

    if ($hashed_submiss !== $hashed_password) {
      $_SESSION['loggedin'] = false;
      $incorr_submiss = true;
    }
    else {
      $_SESSION['loggedin'] = true;
      header('Location: index.php');
      exit;
    }
  }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.CSS">
    <script src="username.js" defer></script>
    <script src="login.js" defer></script>
  </head>

  <body >
    <header>
      <h1 class=h1_alig>Welcome! Ready to check out my webpage?</h1>
    </header>
     <main class=field_format >
     <h2>Enter a username</h2>
      <p>
       So that you can make your own posts and purchases, select a
        username and password.
      </p>
      
        <fieldset class=field_format>
        <form method="POST"  action="<?php echo $_SERVER['PHP_SELF'];?>">
        <label for="Username"> Username: </label>
        <input id="Username" name= "usernameSubmitted" type="text" value=" " maxlength="20">
        <br>
        <label for="Password"> Password:  </label>
        <input id="Password" type="password" name="passwordSubmitted" maxlength="20">
       
        <br>
      
      </fieldset>
     
      <input type="submit" value="Login">
      </form>

      <p><?php
        if($incorr_submiss){
          echo "Invalid Password!";
        }
        
      ?>
      </p>

      
      </main>

    <footer>
      <hr>
      <small>
        &copy; Kerry Ibarra, 2023
      </small>
    </footer>
  </body>

</html>





