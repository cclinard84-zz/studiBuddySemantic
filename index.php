<?php
   @include("dbConnect.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);

      $sql = "SELECT username FROM Students WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      $count = mysqli_num_rows($result);

      if(empty($_POST["username"]) || empty($_POST["password"])){
        header("location: login-failure.html");
      }
      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
        $_SESSION['myusername']="username";
         $_SESSION['login_user'] = $myusername;

         header("location: class-list.php");
      }else {
         header("location: login-failure.html");
      }
   }
?>
  <!DOCTYPE html>
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

          body>.grid {
            height: 100%;
          }

          .image {
            margin-top: -100px;
          }

          .column {
            max-width: 450px;
          }

          .content {
            color: white;
          }

          .new {
            color: #2185D0;
          }
    </style>

  </head>

  <body>

    <div class="ui middle aligned center aligned grid">
      <div class="column">
        <h2 class="ui image header">
      <img src="images/studiBuddyLogo.png" class="image" style="width:100px">
      <div class="content">
        Log-in to your account
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
            <input class="ui fluid large blue submit button" type="submit" name="submit" value="Login"></input>
          </div>
          <div class="ui error message">
            <?php echo $error; ?>
          </div>
        </form>

        <div class="ui message">
          <span class="new"> New to us? <a href="sign-up.php">Sign Up</a></span>
        </div>
      </div>
    </div>

  </body>

  </html>
