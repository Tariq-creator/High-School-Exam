<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registrera Konto</title>
    <link rel="stylesheet" href="registration.css"/>
</head>
<body>
<?php
    require('db.php');
    if (isset($_REQUEST['username'])) {
		if ($_POST["password"] === $_POST["confirm_password"]) {
		// removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, create_datetime)
                     VALUES ('$username', '$password', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
			echo header("Location: classrum.php");
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
			}
		}
    } else {
?>
    <img class="background-img" src="background.jpg">
    <form action="" method="post">
	  <div class="login-details">
       <h1>Elevplacering</h1>
	   <p>Skapa ett konto för att uppleva elevplaceringen!</p>
	  </div>
	  <div class="user">
	    <span>Lärarens namn:</span><br/>
        <input type="text" class="login-user" name="username" required />
	  </div>
	  <div class="password">
	    <span>Lösenord:</span><br/>
        <input type="password" class="login-password" name="password">
      </div>
	  <div class="verify-password">
	    <span>Bekräfta lösenord:</span>
		<input type="password" class="confirm-password" name="confirm_password">
	  </div>
      <input type="submit" class="login-button" name="submit" value="Registrera dig!">
      <p class="link">Har du ett konto? <a href="login.php">Klicka här</a></p>
    </form>
<?php
    }
?>
</body>
</html>
