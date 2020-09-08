<?php
include("connectDatabase.php");
	session_start();

	$roomID = $_GET['roomID'];
	echo $roomID;
	// if($_SESSION['password']){

	// }else{

	// }


// print_r($_SESSION);
	// $_SESSION['roomID'] = $roomID;
	echo ($_SESSION['roomID']);
	echo ($_SESSION['nickname']);
	echo ($_SESSION['password']);
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Discord Mockup</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>
<!-- <script type="text/javascript">
		$(window).on('load',function (){
			event.preventDefault();
                jQuery.noConflict();
				$("#accessModal").modal('show');
		});
		
	</script> -->
	<main class="container">

		<aside class="channels">
			<header class="channels-header focusable">
				<h3 role="header" class="channels-header-name">My Server</h3>
				<svg role="button" aria-label="Dropdown" class="channels-header-dropdown">
					<use xlink:href="#icon-dropdown" /></svg>
			</header>

			<section class="channels-list">
				<header class="channels-list-header focusable">
					<h5> Users </h5>
				</header>

				<ul class="channels-list-text">
					<li class="channel focusable channel-text active">
						<span class="channel-name">Poong</span>
					</li>

					<li class="channel focusable channel-text">
						<span class="channel-name">Goh</span>
					</li>
				</ul>
			</section>

			<footer class="channels-footer">
				<img class="avatar" alt="Avatar" src="https://discordapp.com/assets/0e291f67c9274a1abdddeb3fd919cbaa.png" />
				<div class="channels-footer-details">
					<span class="username">yourself</span>
					<span class="tag">#0001</span>
				</div>
			</footer>
		</aside>

		<div class="vert-container">
			<div id="Div1" style=" float: left; width: 1200px; height:70% ; overflow:scroll; ">
				<canvas id="drawCanvas" width="1296" height="490" style="border:5px solid #001aff;" display:inline-block>Canvas is
					not supported on this
					browser!</canvas>

				<section id="colorSwatch">
					<input type="radio" name="color" id="color01" data-color="gold" checked><label for="color01"></label>
					<input type="radio" name="color" id="color02" data-color="darkorange"> <label for="color02"></label>
					<input type="radio" name="color" id="color03" data-color="navy"> <label for="color03"></label>
					<input type="radio" name="color" id="color04" data-color="yellowgreen"> <label for="color04"></label>
					<input type="radio" name="color" id="color05" data-color="firebrick"> <label for="color05"></label>
					<input type="radio" name="color" id="color06" data-color="powderblue"> <label for="color06"></label>
				</section>
			</div>
			<div id="Div2">
				<ul id="messages">
					<li>
						Poong: Hello
					</li>
					<li>
							Goh: Bye Poong
					</li>
				</ul>
				<form id="asd" action="">
					<input id="m" autocomplete="off"/><button>Send</button>
				</form>
				<script src="https://cdn.socket.io/socket.io-1.2.0.js"></script>
				<script src="https://code.jquery.com/jquery-1.11.1.js"></script>
				<script>
					$(function () {
						var socket = io('http://localhost:3000');
						$('#asd').submit(function() {
							socket.emit('chat message', $('#m').val());
							$('#m').val('');
							return false;
						});
						socket.on('chat message', function (msg) {
							$('#messages').append($('<li>').text(msg));
							window.scrollTo(0, document.body.scrollHeight);
						});
					});
				</script>
			</div>
		</div>
	</main>
	<div class="modal" id="passwordModal">
        <div role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5>Enter ok password</h5>
              <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button> -->
            </div>
            <div class="modal-body">

              <div class="form-group">
                <!-- <label for="exampleInputEmail1">Room Name</label> -->
                <input name="pass" id="pass" type="text" class="form-control" placeholder="Keyword">
            </div>
            <div class="modal-footer">
            <!-- <button type="button" name="submit321" id="checkPass" class="btn btn-primary">Done</button> -->
              <input type="submit" name="it123" value="Done" class="btn btn-primary">
                <!-- <a href="board.html" class="btn btn-primary" role="button">Done</a> -->
            </div>
          </div>
        </div>
      </div>
  
  <!-- <script>
  $(document).ready(function(){
			// $(window).on('load',function (){
        // if(sessionStorage.getItem("#accessModal") != 'true'){
          $("#passwordModal").modal('show');
        // }
			});
			
		</script> -->

		<script>
//   $(document).ready(function(){
// 			// $(window).on('load',function (){
//         if(sessionStorage.getItem("access") != 'true'){
// 			window.location.href = "index.php";
//         }

// 		sessionStorage.setItem('access','true');
// 			});
			
// 		</script>


	<script src="https://cdn.pubnub.com/pubnub-3.14.1.min.js"></script>
	<!-- <script src="js/app.min.js"></script> -->

	
	<script src="js/index.js"></script>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->
</body>

</html>