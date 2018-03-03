<?php
   include("dbConnect.php");

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);
      $myemail = mysqli_real_escape_string($db, $_POST['email']);

      if (empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["email"]) ) {
        $empty = 'true';
      } else {
        $empty = 'false';
      }

      $check = "SELECT username FROM Students WHERE username = '$myusername'";
      $exists= mysqli_query($db, $check);
      $count = mysqli_num_rows($exists);
      if($count > 0 || $empty == 'true'){
        header("location: sign-up-failure.html");
      }
      else{

        $sql = "INSERT INTO Students (username, password, email) VALUES( '$myusername', '$mypassword', '$myemail')";
        $result = mysqli_query($db,$sql);

            if ($result) {
               header("location: index.php");
          }
    }
         }
      ?>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
  <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
  <script src="semantic/dist/semantic.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <style type="text/css">
  body {
    background-color: #2185D0;
  }
  body > .grid {
    height: 100%;
  }
  .image {
    margin-top: -100px;
  }
  .column {
    max-width: 450px;
  }
  .content {
    color:white;
  }
  .new{
    color:#2185D0;
  }
</style>
</head>

<body>
  <div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui image header">
      <img src="images/studiBuddyLogo.png" class="image" style="width:100px">
      <div class="content">
        Sign up for your free account
      </div>
    </h2>
    <form class="ui large form" action="" method="POST">
      <div class="ui stacked segment">
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="username" placeholder="Username">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="Password">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="mail icon"></i>
            <input type="email" name="email" placeholder="Email@email.com">
          </div>
        </div>
        <input class="ui fluid large blue submit button" type="submit" name="submit" value="Sign-up!"></input>
      </div>
    </form>
    <div class="ui message">
      <span class="new">Here by mistake?   <a href="index.php">Back to Login</a></span>
  </div>
</div>

</body>

</html>
