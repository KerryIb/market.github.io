#!/usr/local/bin/php
<?php
	header('content-type: text/plain";chartset=utf-8');
	$valuesAreSet= isset($_POST['username']) && isset( $_POST['credit']);
	if($valuesAreSet){
		echo "enter";
		$db = new SQLite3('credit.db');
		$statement = 'UPDATE users SET credit =\''.$_POST['credit'].'\' WHERE username =\''.$_POST['username'].'\'';
		$db->exec($statement);
		$db->close();
		}
	else{
		echo 'Either the user or credit was not posted';
		
	}

	/*Takes the POST request information from the AJAX request and updates the credit database.
	• Landing on the page directly won’t produce a warning but should print a nice text message
	Either the user or credit was not posted.
	3*/

    ?>