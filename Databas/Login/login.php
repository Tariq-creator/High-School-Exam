<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="login.css"/>
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<img src="login-classroom.png" width="100%">

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
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user klassrum page
            header("Location: klassrum.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
		
?>
    <form method="post" name="login">
	  <div class="grid">
        <h1 class="login-title">Elevplacering</h1>
	    <div class="user">
	      <span>Användarnamn:</span><br/>
          <input type="text" class="login-user" name="username" autofocus="true"/>
	    </div>
	    <div class="password">
	      <span>Lösenord:</span><br/>
	      <input type="password" class="login-password" name="password"/>
	    </div>
        <input type="submit" value="Logga in" name="submit" class="login-button"/>
        <p class="link">Behöver du ett konto? <a href="registration.php">Klicka här</a></p>
	  </div>
    </form>
<?php
    }
?>
</body>
</html>
