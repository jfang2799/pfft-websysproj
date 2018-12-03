<?php
  session_start();

  // Connect to the database
  try {
   $dbname = 'bookdaddy';
  $user = 'root';
  $pass = 'newpassword';
  $dbconn = new PDO('mysql:host=127.0.0.1;dbname='.$dbname, $user, $pass);
 }
  catch (Exception $e) {
    echo "Error: " . $e->getMessage();
  }
      if (isset($_POST['register']) && $_POST['register'] == 'Register') {
        // Validate fields
        // @TODO: Also check to see if duplicate usernames exist
        if (!isset($_POST['fname']) || 		!isset($_POST['lname']) ||
				!isset($_POST['dob']) || !isset($_POST['username']) || !isset($_POST['pass']) || !isset($_POST['passconfirm']) ||
				empty($_POST['fname']) ||
				empty($_POST['lname']) ||
				empty($_POST['dob']) || 
				empty($_POST['username']) || empty($_POST['pass']) || empty($_POST['passconfirm'])) {
          $msg = "Please fill in all form fields.";
        }
        else if ($_POST['pass'] !== $_POST['passconfirm']) {
          $msg = "Passwords must match.";
        }
        else {
			  $email = $_POST["username"];
			 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  					$msg = "Invalid email format"; 
			 }
			 else if ($_POST['username'][-3] != 'e' || $_POST['username'][-2] != 'd' || $_POST['username'][-3] != 'u'){
				 $msg = "Must use a .edu email.";
			 }else{
          // Generate random salt
          $salt = hash('sha256', uniqid(mt_rand(), true));
          // Apply salt before hashing
          $salted = hash('sha256', $salt . $_POST['pass']);
          // Store the salt with the password, so we can apply it again and check the result
          $stmt = $dbconn->prepare("INSERT INTO users(fname, lname, dob, username, pass, salt)
                              VALUES (:fname, :lname, :dob, :username, :pass, :salt)");
          $stmt->execute(array(
				 ':fname'    => $_POST['fname'],
				 ':lname'    => $_POST['lname'],
				 ':dob'      => $_POST['dob'],
				 ':username' => $_POST['username'],
                               ':pass' => $salted,
                               ':salt' => $salt
                                ));
          $msg = "Account created.";
			 }
        }
      }
    // if ($_SESSION['is_admin'] != true) {
    //   header('Location: login_secure_auth.php');
    //   exit();
    // }
?>