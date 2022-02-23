<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Logga In</title>
    <link rel="stylesheet" href="login-style.css"/>
</head>
<body>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
	ucfirst($username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='$password'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user classrum page
            header("Location: classrum.php");
        } else {
            // Alert Wrong user and or password
	    header("Location: login.php");
        }
    } else {
		
?>
    <img class="background-img" src="background.jpg">
    <form method="post" name="login">
      <div class="login-details">
        <h1>Elevplacering</h1>
	<p>En platform för att underlätta lärarnas elevplacering!</p>
      </div>
      <div class="user">
	<span>Lärarens namn:</span><br/>
        <input type="text" class="login-user" name="username" autofocus="true"/>
      </div>
      <div class="password">
	<span>Lösenord:</span><br/>
	<input type="password" class="login-password" name="password"/>
      </div>
      <input type="submit" class="login-button" value="Logga in" name="submit"/>
      <p class="link">Behöver du ett konto? <a href="registration.php">Klicka här</a></p>
    </form>
<?php
    }
?>
</body>
</html>
