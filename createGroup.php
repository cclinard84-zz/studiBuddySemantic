<?php
 include("dbConnect.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
  date_default_timezone_set('America/Los_Angeles');
  $title = mysqli_real_escape_string($db,$_POST['groupName']);
  $start = mysqli_real_escape_string($db, date("Y-m-d", strtotime($_POST['start'])));
  $location = mysqli_real_escape_string($db, $_POST['location']);
  $memberLimit = mysqli_real_escape_string($db,$_POST['memberLimit']);

  if (empty($_POST["groupName"]) || empty($_POST["location"]) || empty($_POST["start"]) ) {
    $empty = 'true';
  } else {
    $empty = 'false';
  }

  if($empty == 'true' || $location == ''){
    header("location: createGroup-failure.html");
    return;
  }

// insert the records
  $sql = "INSERT INTO evenement (title, location, start) VALUES ('$title', '$location', '$start' )";
  $result = mysqli_query($db,$sql);

    header("location: createGroup-Success.php");
}
?>
<html lang="en">

<head>
  <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.print.min.css' rel='stylesheet' media='print' />
  <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
  <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
  <script src="semantic/dist/semantic.min.js"></script>
  <script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>
  <script>

    function getClass() {
      document.getElementById('class').innerHTML = sessionStorage.getItem('class');
    };

  </script>
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

<body onload="getClass()">
  <div class="ui middle aligned center aligned grid">
    <div class="column">
      <h2 class="ui image header">
    <img src="images/studiBuddyLogo.png" class="image" style="width:100px">
    <div class="content">
      Create group for <span id="class"></span>!
    </div>
  </h2>
  <form class="ui large form" action="" method="POST">
      <div class="ui stacked segment">
            <div class="field">
              <label style="color: #2185D0">Group Name</label>
              <input type="text" name="groupName" placeholder="Group Name">
            </div>
            <div class="field">
                  <label style="color: #2185D0">Date</label>

                    <input type="date" name="start">

              </div>
            <div class="field">
              <label style="color: #2185D0">Location</label>
              <input type="text" name="location" placeholder="Location">
            </div>
            <div class="field">
              <label style="color: #2185D0">Member Limit</label>
              <input type="number" name="memberLimit" min="1" step="1" max="5">
            </div>
          <input class="ui fluid large blue submit button" type="submit" name="submit" value="Create Group!"></input>
        </form>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
