<html lang="en">

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
  <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
  <script src="semantic/dist/semantic.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.ui.dropdown').dropdown();
    });

    function getValue() {
      if ($('#dropdownMenu').dropdown('get text') != "Select Class") {
        sessionStorage.setItem('class', $('#dropdownMenu').dropdown('get text'));
        var classValue = $('#dropdownMenu').dropdown('get text');
        $_SESSION['class'] = $classValue;
        window.open("calendar.html");var value = localStorage.getItem(key);

jQuery.post("example.php", {myKey: value}, function(data)
{
  alert("Do something with example.php response");
}).fail(function()
{
  alert("Damn, something broke");
});
      } else {
        alert("Please choose a class!");
        return;
      }

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

<body>
  <div class="ui middle aligned center aligned grid">
    <div class="column">
      <h2 class="ui image header">
    <img src="images/studiBuddyLogo.png" class="image" style="width:100px">
    <div class="content">
      Select your class!
    </div>
  </h2>
      <form class="ui large form">
        <div class="ui stacked segment">
          <div class="ui fluid search selection dropdown" id="dropdownMenu">
            <input type="hidden" name="class-list">
            <i class="dropdown icon"></i>
            <div class="default text">Select Class</div>
            <div class="menu">
              <div class="item" value="CITC1301">CITC-1301</div>
              <div class="item" value="CITC1303">CITC-1303</div>
              <div class="item" value="CITC1310">CITC-1310</div>
              <div class="item" value="CITC1311">CITC-1311</div>
              <div class="item" value="CITC2335">CITC-2335</div>
              <div class="item" value="CITC2375">CITC-2375</div>
            </div>
            </input>
          </div>
          <br />
          <button class="ui fluid large blue submit button" onclick="getValue()">Choose class!</button>
        </div>
      </form>
      <div class="ui message">
        <span class="new"> Lost? <a href="index.php">Go back to Login</a></span>
      </div>
    </div>

</body>

</html>
