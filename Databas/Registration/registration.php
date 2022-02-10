<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registrera Konto</title>
    <link rel="stylesheet" href="registration.css"/>
</head>
<body>

<img src="login-classroom.png" width="100%">

<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            /*echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";*/
			echo header("Location: klassrum.php");
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
	 <div class="grid">
       <h1 class="login-title">Registrera Konto</h1>
	   <div class="user">
		 <span>Användarnamn:</span><br/>
         <input type="text" class="login-user" name="username"  required />
	   </div>
	   <div class="password">
	     <span>Lösenord:</span><br/>
         <input type="password" class="login-password" name="password">
	   </div>
	   <div class="confirm-password">
	     <span>Bekräfta lösenord:</span><br/>
	     <input type="password" class="login-confirm" name="password">
	   </div>
       <input type="submit" name="submit" value="Registrera" class="login-button">
       <p class="link"><a href="login.php">Klicka här för att logga in</a></p>
	 </div>
    </form>
<?php
    }
?>
</body>
</html>
