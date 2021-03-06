<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Hello, world!</title>

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
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="faq.html">FAQ</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="contact.php">Contact
                <span class="sr-only">(current)</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    

    <div class="container">

      <?php
        $servername = "localhost";
        $username = "root";
        $password = "nthnth123";
        $dbname = "doodleroom";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }       

        if(isset($_POST['accept'])){
          $name = $_POST["mname"];
          $email = $_POST["memail"];
          $type = $_POST["mtype"];
          $message = $_POST["message"];

          $sql="insert into contact (sender, email, type, message) 
          values ('$name', '$email', '$type', '$message')";

          if ($conn->query($sql) === TRUE) {
            echo "<div class='mt-2 alert alert-success' role='alert'>New record created successfully</div>";
          } else {
            echo "<div class='mt-2 alert alert-danger' role='alert'>Error: " . $sql . "<br>" . $conn->error . "</div>";
          }
          //header("location: contact.1.php");
        }

        $conn->close();
      ?>
      <div class="row">
        <div class="col">
          <h1 class="mt-5"> Contact Us </h1>
          
          <form action="contact.1.php" method="post">
            <div class="form-group">
              <label class="font-weight-bold"> <span>Name</span></label>
              <input type="text" class="form-control" style="width: 100%" name="mname" id="mname" placeholder="Your name.. " required/>
              <br>
              <label class="font-weight-bold"> <span>Email</span></label>
              <input type="text" class="form-control" name="memail" id="memail" placeholder="Your email.." required/>
              <br>
              <label class="font-weight-bold" for="type">Message type:</label>
              <select class="form-control" id="mtype" name="mtype">
                <option value="suggestion">Suggestion</option>
                <option value="complaint">Complaint</option>
                <option value="report">Bug Report</option>
              </select>
              <br>
              <label class="font-weight-bold"> <span>Message</span></label>
              <textarea class="form-control" name="message" id="message" placeholder="Write something.." style="height:200px" required></textarea>
              <br>
              <input class="btn btn-primary" type="submit" name="accept" value="Submit">
            </div>
          </form>
          
        </div>
      </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
