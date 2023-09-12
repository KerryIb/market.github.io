#!/usr/local/bin/php
<?php
session_save_path(__DIR__.'/sessions/');
session_name('myWebpage');
session_start();


$welcome = isset($_SESSION['loggedin']) && $_SESSION['loggedin'];
$check_user=isset($_COOKIE['username']);  //be aboolean type 
if( !$welcome || !$check_user){
  header('Location: login.php');
  exit;
}
$act_name=$_COOKIE['username'];

$db = new SQLite3('credit.db'); //open database credit.db, don not need to install anything unline SQL 


$statement = 'CREATE TABLE IF NOT EXISTS users(username TEXT, credit REAl)'; //before wrote the credit as an integer, needed for it to be REAL 
$db->exec($statement);

$statement = 'SELECT credit FROM users WHERE username = \''.$_COOKIE['username'].'\''; //replace this by the person username 
$results = $db->query($statement); 
$row = $results->fetchArray();
if(($row['credit'])){
    $credit=$row['credit'];

}
else{
  $statement = 'INSERT INTO users (username, credit) VALUES (\''.$_COOKIE['username'].'\', 20.00)';
  $db->exec($statement);
  $credit=20;
}
$db->close(); //need to close it at risk of data leaking fopen has to be paired with datra close 



?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Our Merchandise</title>
    <script src="username.js" defer></script>
    <script src="merch.js" defer></script>
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
        <a href="blog.php">Our Posts</a>
        <br>
        <a class=no_click href="merch.php">Our Products</a>
        
      </nav>

      </section>
      <h1 class=h1_alig>Our Merchandise</h1>
    </header>

     <main class=overall_border>
      <section>
        <h2>Garfield's Collection</h2>
          <p>
      Please have a look around.Our new members are awarded with $20.00 in credit. You can add credit at anytime with a coupon code. When you want to make a purchase, please select the checkboxes of the items you wish to purchase and click the "Checkout" button below.
        </p>
      
        
        <p  id="credit">  
        Credit:
        <?php echo "$", number_format($credit,2,'.','') ?> 
      </span>
    
    </p>
    
    <table class="table">
      <tbody>  
         <tr>
            <td> <img src="https://www.pic.ucla.edu/~kerryibarra/HW4/garfield.jpg"  class="border_img" id="pic1" for="price1">
            <h3>Love</h3>
            <input id="price1" type="checkbox">
            <span></span>
            <p>Garfield and his teddy bear</p>
            </td>
      
            
            <td> <img src="https://www.pic.ucla.edu/~kerryibarra/HW4/cook2.jpg" class="border_img" id="pic2" for="price2">            
            <h4>Work</h4>
            <input id="price2" type="checkbox">
            <span></span>
              <p>Garfield hired as a chef</p>
            </td>
            </tr>
          <tr>
          <td> <img src="https://www.pic.ucla.edu/~kerryibarra/HW4/garfield2.jpg"  class="border_img" id="pic3" for="price3">
          <h5>Downtime</h5>
          <input id="price3" type="checkbox">
          <span></span>
          <p>Garfield going for a swim</p>
          </td>

            <td> <img src="https://www.pic.ucla.edu/~kerryibarra/HW4/rat.jpg"  class="border_img"id="pic4" for="price4">
             <h6>Sinning</h6>
       <input id="price4" type="checkbox">
      <span></span>
      <p>Garfield stealing a mouse</p>
      </td>
    </tr>     
  </tbody>  
</table>
</section>
        
<fieldset class=field_format>
    <label for ="coupon">Coupon Code: </label>
    <input id="coupon" type="textbox"> <br>
    <input id= "checkout"type="button" value="checkout">                                                                                   
    <p id=replace_p></p>
</fieldset>
</main>
    
   
   <footer>
      <hr>
      <small>
        &copy; Kerry Ibarra, 2023
      </small>
    </footer>
  </body>

</html>

