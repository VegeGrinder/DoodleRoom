<?php
include("connectDatabase.php");
session_start();
  $flag=0;

  if(isset($_POST['createNickname']))
  {
    $_SESSION['nickname'] = $_POST['inputName'];
    $_SESSION['image'] = $_POST['inputImage'];
  }
  if(isset($_POST['joinNickname']))
  {
    $_SESSION['nickname'] = $_POST['inputName'];
    $_SESSION['image'] = $_POST['inputImage'];
  }

  // if(isset($_POST['submit321']))
  if(isset($_POST['joinRoom']))
  {
  $_SESSION['roomID'] = $_POST['roomID'];

  // echo $_POST['roomID'];
  $_SESSION['linkURL'] = $_POST['linkURL'];
  // echo $_POST['roomID'];
  }

  // if(isset($_POST['checkPass']))
  if(isset($_POST['submit123']))
  {
    $roomID =  $_SESSION['roomID'];
    $url = $_SESSION['linkURL'];

    $password = $_POST['password2'];
    // echo $password;

    $query1 = "SELECT * FROM room WHERE password='$password' and (roomID = '$roomID' or linkURL = '$url')";
    $result = mysqli_query($conn,$query1);
    $count = mysqli_num_rows($result);

    if($count == 1){
      header("location: board.php");
    }
    else{
      $flag=1;
      // echo json_encode( $flag ) ;  
      // echo $flag;
      session_destroy();
    }

    // $query = "SELECT * FROM room";
    // $result = mysqli_query($conn, $query);
    // while ($row = mysqli_fetch_array($result)) {
    //   if( $roomID == $row['roomID'] && $password == $row['password']){
    //       // $_SESSION['login_user'] = "admin";
    //       echo $_SESSION['roomID'];
    //       header("location: board.php");
    //   }
    //   // elseif( $_SESSION['url'] == $row['linkURL'] && $password == $row['password']){
    //   //     header("location: board.php");
    //   // }
    //   else{
    //     $flag=1;
    //   }
    // }
  }
?>

<!doctype html>
<html lang="en">
  <head>
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Doodle Room</title>
    <link rel="icon" href="doodleroom.png">
  </head>
  <body style="background-image: url('doodle.png')">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand" href="#">Doodle Room</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="faq.html">FAQ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <script type="text/javascript">
      var current = 1;
      var max = 6;

      function imageNav(d){
        current += d;
        if (current < 1){
          current = max;
        }
        else if(current > max){
          current = 1;
        }
        document.getElementById("avatar").src = "avatar" + current + ".png";
      }            
    </script>
    <div class="container">
      <div class="row" >
        <div class="col-lg-12 text-center">
          <img src="title.png" class="my-5">
          
          <form action="index.php" method='POST'>
            <div class="form-group">
              <label class="font-weight-bold">Avatar:</label><br/>
              <img id="leftarrow" src="leftarrow.png" width="50" height="50" onclick="imageNav(-1);" >
              <img id="avatar" src="avatar1.png" width="100" height="100">
              <img id="rightarrow" src="rightarrow.png" width="50" height="50" onclick="imageNav(1);" >
            </div>
            <div class="form-group row">
                <label for="inputName" class="font-weight-bold">Username:</label>
                <input type="text" class="form-control" id="inputName" placeholder="Nickname">
            </div>
              <!-- <a href="list.html" class="btn btn-primary" role="button">Enter</a> -->
              <button type="button" id="createNickname" class="btn btn-primary" data-dismiss="modal">Create Room</button>
              <button type="button" id="joinNickname" class="btn btn-primary" data-dismiss="modal">Join Room</button>
              <!-- <button onclick="createNickname()" class="btn btn-primary" data-toggle="modal" data-target="#createroom">Create Room</button> -->
              <!-- <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#createroom">Create Room</a> -->
              <!-- <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#joinroom">Join Room</a> -->
          </form>
        </div>
      </div>
    </div>

    <script type="text/javascript">
    var flag = '<?php echo $flag ?>';

    if(flag > 0){
      $('#enterPassword').modal('toggle');
    }
    </script>
    
    <script>
      $(document).ready(function(){
        
        $('#createNickname').click(function(){  
          var inputName=$('#inputName').val();
          var inputImage = document.getElementById("avatar").src;
          var createNickname=$('#createNickname').val();
                jQuery.noConflict();
                $.ajax({
                  url:'index.php',
                  type:'post',
                  data:{
                    inputName:inputName,
                    inputImage:inputImage,
                    createNickname:createNickname
                  },
                  success:function(response){
                  }
                })

                // event.preventDefault();
                
                $('#createroom').modal('toggle');
        });

        $('#joinNickname').click(function(){  
          var inputName=$('#inputName').val();
          var inputImage = document.getElementById("avatar").src;
          var createNickname=$('#joinNickname').val();
          jQuery.noConflict();
                $.ajax({
                  url:'index.php',
                  type:'post',
                  data:{
                    inputName:inputName,
                    inputImage:inputImage,
                    createNickname:createNickname
                  },
                  success:function(response){
                  }
                })

                // event.preventDefault();
                // jQuery.noConflict();
                $('#joinroom').modal('toggle');
        });
      })
    </script>

    <!-- <form action="index.php" method="POST"> -->
      <div class="modal fade" id="createroom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create a room</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                  <div class="form-group">
                      <h6>Room Name</h6>
                      <!-- <label for="exampleInputEmail1">Room Name</label> -->
                      <input name="roomName" type="text" class="form-control" id="roomName" placeholder="# Enter project name">
                      <small id="emailHelp" class="form-text text-muted">Make it awesome, fun and informative</small>
                  </div>
                  <div class="form-group">
                    <h6>Keyword</h6>
                    <input name="password" type="password" class="form-control" id="password" placeholder="E.g. 123456 ">
                    <small id="emailsap" class="form-text text-muted">Make it private for someone to access the room</small>
                  </div>
                
              </div>
              <!-- <div class="form-group"> -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" id="cancelCreate" data-dismiss="modal">Close</button>
                  <!-- <button type="submit" name="submit" class="btn btn-primary" data-toggle="modal" data-target="#roomInvite">Create</button> -->
                  <button type="button" name="submit1" class="btn btn-primary" id="createRoom" data-dismiss="modal" >Create</button>
                  <!-- <input type="submit" name="submit" value="Create" class="btn btn-primary"   data-toggle="modal" data-target="#roomInvite" > -->
                </div>
              <!-- </div> -->
            </div>
          </div>
        </div>
    <!-- </form> -->

    <script>
      $(document).ready(function(){

        $('#cancelCreate').click(function(){ 
          window.location.reload(true);
        });

        $('#createRoom').click(function(){  
                var roomName=$('#roomName').val();
                var password=$('#password').val();
                jQuery.noConflict();

                $.ajax({
                  url:'createRoom.php',
                  type:'post',
                  dataType: 'json',  
                  data:{
                    roomName:roomName,
                    password:password
                  },
                  success:function(response){

                    for (var i in response)
                    {
                    var row = response[i];          

                    var roomID = row.roomID;
                    var password = row.password;

                    $('#inputEmail3').val(roomID);
                    $('#inputEmail4').val(password);
                    $('#url').val('http://localhost/prototype/board.php?roomID='+roomID);
                    }
                  }
                })  
                //event.preventDefault();
                // $.noConflict();
                $('#roomInvite').modal('toggle');
        });

      });

      function myFunction() {
        /* Get the text field */
        var copyText = document.getElementById("url");

        /* Select the text field */
        copyText.select();

        /* Copy the text inside the text field */
        document.execCommand("copy");

        /* Alert the copied text */
        alert("Copied the text: " + copyText.value);
      }

      function myFunction() {
        /* Get the text field */
        var nickname = document.getElementById("inputName").value;
        // '<%Session["Nickname"] = "' + nickname + '"; %>';
        // <%Session["Nickname"] = "' + nickname + '";%>
      }
    </script>

  <form action="board.php" method="GET">
    <div class="modal fade" id="roomInvite" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Invite friends to Doodle Room</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <h5>Invite via Link</h5>
              <div class="input-group mb-3">

                  <input type="text" class="form-control" id="url" placeholder= 'http://localhost/prototype/board.html?rooomID=' aria-label="Recipient's username" aria-describedby="basic-addon2" readonly>
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" onclick="myFunction()">Copy</button>
                  </div>
                </div>

              <h4 class="text-center"><br>or</h4>

              <h5><br>Invite via Doodle Room ID and Keyword</h5>
              <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">Room ID :</label>
                  <div class="col-sm-3">
                    <input type="email" class="form-control" id="inputEmail3" name="roomID" readonly>
                  </div>
                  <label for="inputEmail4" class="col-sm-3 col-form-label">Keyword :</label>
                  <div class="col-sm-3">
                      <input type="email" class="form-control" id="inputEmail4" readonly>
                    </div>
                </div>
            </div>
          <div class="modal-footer">
              <!-- <a href="board.html" class="btn btn-primary" role="button">Done</a> -->
              <input type="submit" value="Done" class="btn btn-primary">
          </div>
        </div>
      </div>
    </div>
  </form>

  <form action="index.php" method='POST'>
    <div class="modal fade" id="joinroom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Join a room</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <h6>Room ID</h6>
              <div class="form-row">
                  <div class="col">
                    <input type="text" name="roomID" id="roomID" class="form-control" placeholder="Room ID">
                  </div>
              </div>  

              <h3 class="text-center"><br>OR</h3>

              <div class="form-group">
                <h6>Paste the URL</h6>
                <input type="text" name="url" id="linkURL" class="form-control" placeholder="E.g. https://doodle.com/room">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="cancelJoin" data-dismiss="modal">Close</button>
            <!-- <input type="submit" name="submit321" value="Join" id="joinRoom" class="btn btn-primary" data-toggle="modal" data-target="#enterPassword"> -->
            <button type="button" name="submit321" id="joinRoom" class="btn btn-primary" data-dismiss="modal">Join</button>
            <!-- <a href="board.html" class="btn btn-primary" role="button">Join</a> -->
          </div>
        </div>
      </div>
    </div>
  </form>
  
  <script>
      $(document).ready(function(){

        $('#cancelJoin').click(function(){ 
          window.location.reload(true);
        });

        $('#joinRoom').click(function(){  
          var roomID=$('#roomID').val();
          var linkURL=$('#linkURL').val();
          var joinRoom=$('#joinRoom').val();
          // var password=$('#password').val();
          jQuery.noConflict();

          $.ajax({
            url:'index.php',
            type:'post',
            data:{
              roomID:roomID,
              linkURL:linkURL,
              joinRoom:joinRoom
            },
            success:function(response){
            }
          })

          //event.preventDefault();
          // jQuery.noConflict();
          // $("#formAlert").hide();
          $('#enterPassword').modal('toggle');
        
        });

        
        $('#checkPass').click(function(){  
          jQuery.noConflict();
          var password2=$('#password2').val();
          var checkPass=$('#checkPass').val();
          // var password=$('#password').val();

                $.ajax({
                  url:'index.php',
                  type:'post',
                  data:{
                    password2:password2,
                    checkPass:checkPass
                  },
                  success:function(response){
                  }
                })
        
        });

      });
  </script>

    <form action="index.php" method='POST'>
      <div class="modal fade" id="enterPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Enter the password</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <?php if($flag){ ?>
                <div class="alert alert-danger">
                  <strong>Incorrect password!</strong>
                </div>
              <?php } ?>

              <!-- <div id="formAlert" class="alert"> 
                <a class="close">×</a>  <strong>Warning!</strong> Make sure all fields are filled and try again.
              </div>  -->

              <div class="form-group">
                <!-- <label for="exampleInputEmail1">Room Name</label> -->
                <input name="password2" id="password2" type="text" class="form-control" id="exampleInputEmail1" placeholder="Keyword" data-error="Invalid roomID and password !">
            </div>
            <div class="modal-footer">
            <!-- <button type="button" name="submit321" id="checkPass" class="btn btn-primary">Done</button> -->
              <input type="submit" name="submit123" value="Done" class="btn btn-primary">
                <!-- <a href="board.html" class="btn btn-primary" role="button">Done</a> -->
            </div>
            
            <?php if($flag){ ?>
                <div class="alert alert-danger">
                  <strong>Incorrect password!</strong>
                </div>
              <?php } ?>

          </div>
        </div>
      </div>
    </form>


    
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
      $(document).ready(function(){

        $('#checkPass').click(function(){  
          jQuery.noConflict();
          var password2=$('#password2').val();
          var checkPass=$('#checkPass').val();
          // var password=$('#password').val();

                $.ajax({
                  url:'index.php',
                  type:'post',
                  data:{
                    password2:password2,
                    checkPass:checkPass
                  },
                  success:function(response){
                  }
                })
        
        });

      });
  </script> -->

    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script>
  </body>
</html>