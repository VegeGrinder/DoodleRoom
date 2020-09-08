<?php
include("connectDatabase.php");
  session_start();
  // echo $_SESSION['nickname'];
   echo $_SESSION['image'];
	//$roomID = $_GET['roomID'];
	// if($_SESSION['password']){

	// }else{

	// }


// print_r($_SESSION);
	// $_SESSION['roomID'] = $roomID;
?>

<html>
  <head>
    <meta charset="UTF-8">
    <title>Discord Mockup</title>
    <!-- <link rel="stylesheet" type="text/css"
      href="node_modules/bootstrap/dist/css/bootstrap.css" /> -->
    <link rel="stylesheet" type="text/css" href="css/room.css">
  </head>
  <body>
    <script>
        var nickname = "<?php echo $_SESSION['nickname']; ?>";
        var channelId = "<?php echo $_SESSION['roomID']; ?>";
        var imageId = "<?php echo $_SESSION['image']; ?>";
    </script>
    <script type="text/javascript" src="node_modules/jquery/dist/jquery.js"></script>
    <script type="text/javascript"
      src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script type="text/javascript"
      src="node_modules/chat-engine/dist/chat-engine.js"></script>
    <script type="text/javascript" src="chat.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <main class="container-main">

      <aside class="channels">
        <header class="channels-header focusable">
          <h3 role="header" class="channels-header-name">My Server</h3>
          <svg role="button" aria-label="Dropdown"
            class="channels-header-dropdown">
            <use xlink:href="#icon-dropdown" /></svg>
          </header>

          <section class="channels-list">
            <header class="channels-list-header focusable">
              <h5> Users </h5>
            </header>
  
            <ul id="channels-list-text">
            </ul>
          </section>

          <footer class="channels-footer">
            <img class="avatar" alt="Avatar"
              src="https://discordapp.com/assets/0e291f67c9274a1abdddeb3fd919cbaa.png"
              />
            <div class="channels-footer-details">
              <span class="username">yourself</span>
              <span class="tag">#0001</span>
            </div>
          </footer>
        </aside>
        <div class="vert-container">
          <div id="Div1" style="float: left; width: 1200px; height:70% ;
            overflow:scroll;">
            <canvas id="drawCanvas" width="1200" height="70%" style="border:5px
              solid #001aff;" display:inline-block>Canvas is
              not supported on this
              browser!</canvas>

            <section id="colorSwatch">
              <input type="radio" name="color" id="color01" data-color="gold"
                checked><label for="color01"></label>
              <input type="radio" name="color" id="color02"
                data-color="darkorange">
              <label for="color02"></label>
              <input type="radio" name="color" id="color03" data-color="navy">
              <label for="color03"></label>
              <input type="radio" name="color" id="color04"
                data-color="yellowgreen"> <label for="color04"></label>
              <input type="radio" name="color" id="color05"
                data-color="firebrick">
              <label for="color05"></label>
              <input type="radio" name="color" id="color06"
                data-color="powderblue">
              <label for="color06"></label>
            </section>
          </div>
          <div id="chat-box">
            <ul class="list-group" id="log">
                
            </ul>
          </div>
          <div id="message-box">
            <input type="text" class="form-control" id="message"
                  placeholder="'Enter' to send message">
          </div>
        </div>
        
      </main>
      <script>
		    var drawHistory = true;
	    </script>
      <script src="//cdn.pubnub.com/pubnub-3.14.1.min.js"></script>
      <script src="js/draw.js"></script>
      
    </body>
  </html>
