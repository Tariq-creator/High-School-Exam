<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Elevplacering</title>
    <link rel="stylesheet" href="classrum-style.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css'>
  </head>
  <body>
    <div class="wrapper">
      <nav class="sidebar">
        <div class="logo-details"> <!-- Logo -->
          <i class='bx bxs-graduation'></i>
          <span class="logo_name">Elevplacering</span>
        </div>
        <ul class="nav-links">
          <li> <!-- Mina Klasser -->
            <div class="iocn-link">
              <a href="#">
                <i class='bx bxs-bookmarks'></i>
                <span class="link_name">Mina Klasser</span>
              </a>
              <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu"> <!-- Klasser -->
              <li>
                <a href="#"></a>
              </li>
            </ul>
          </li>
          <li> <!-- Spara Klass -->
            <a href="#">
              <i class='bx bx-save'></i>
              <span class="link_name">Spara Klass</span>
            </a>
          </li>
          <li>
            <a href="#"> <!-- Skriv ut -->
              <i class='bx bxs-file-pdf' ></i>
              <button onclick="window.print()">Skriv ut</button>
            </a>
          </li>
          <li> <!-- Utseende -->
            <div class="iocn-link">
              <a href="#">
                <i class='bx bx-edit'></i>
                <span class="link_name">Utseende</span>
              </a>
              <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu"> <!-- Bord -->
              <li>
                <button onclick="visablitySmall()">Skapa littet bord</button>
                <button onclick="visablityBig()">Skapa Större bord</button>
                <button class="rmvPupil">Ta bort alla bord</button>
              </li>
            </ul>
          </li>
	  <li> <!-- litet Fönster -->
	    <div class="crt-smallBench" id="smallBench" style="display: none;">
              <h4>Skapa litet bord <button onclick="visablitySmall()">X</button></h4>
              <div class="smallBench-input">
                <div class="smallBench-pupil">
                  Elevensnamn:<br/>
                  <input class="input-pupil" id="pupil" type="text"></input>
                </div>
                <button id="crt-Pupil" type="submit">Skapa bordet</button>
              </div>
            </div>
	  </li>
	  <li> <!-- Stort Fönster -->
	    <div class="crt-bigBench" id="bigBench" style="display: none">
              <div class="crt-header">
	        <h4>Skapa stort bord: <button onclick="visablityBig()">X</button></h4>
	      </div>
              <div class="bigBench-input">
                <div class="bigBench-pupil">
                  Elevernas namn:<br/>
                  <input class="input-pupil" id="pupil_One" type="text"><br/>
                  <input class="input-pupil" id="pupil_Two" type="text">
                </div>
                <button id="crt-pupils" type="submit">Skapa bordet</button>
              </div>
            </div>
	  </li>
          <li> <!-- Profile -->
            <div class="profile-details"> <!-- Profile -->
              <div class="profile-content">
                <img src="profile.jpg" alt="profile">
              </div>
              <div class="profile_name"><?php echo $_SESSION["username"];?></div>
              <a href="logout.php"><i class='bx bx-log-out' ></i></a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="home-whiteboard">
        <span>Whiteboard</span>
      </div>
      <main id="home-section"></main>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script src="classrum-script.js"></script>
  </body>
</html>
