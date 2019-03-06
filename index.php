<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pokémon Database</title>
  <link rel="shortcut icon" href="assets/favicon.ico">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CDN  -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }

    .form-signin {
      width: 100%;
      max-width: 330px;
      padding: 15px;
      padding-top: 150px;
      margin: auto;
    }

    .container{
      padding-top: 135px;
    }

  </style>
</head>
<body>

<!-- <nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">
        <img src="assets/pokedex.png" width="30" length="30" alt="" class="d-inline-block"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav> -->
  
<div class="container-fluid text-center">    
  <div class="row content text-center">

    <div class="col"> 
  <?php 

  require_once("mysqli_connect.php");

  $msg;

  if (isset($_POST['signin'])) {
    
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $query = "SELECT username, password FROM accounts ";

    $response = @mysqli_query($dbc, $query);

    if ($response) {
      
      while ($row = mysqli_fetch_array($response)) {
        
        if ($user == $row['username']) {
          
          if ($pass == $row['password']) {
            
            // $msg = "<div class='alert alert-success'>Logged in Successfully!</div>";
            mysqli_close($dbc);
            header("Location:dashboard.php");
          } else {

            $msg = "<div class='alert alert-danger'>Username and password does not match!</div>";
          }

        } else {

          $msg = "<div class='alert alert-danger'>Invalid username!</div>";
        }

      }

    } else {

      echo "Couldn't issue database query";
      echo mysqli_error($dbc);
      mysqli_close($dbc);

    }

   echo $msg;
   mysqli_close($dbc);

  }

  ?>

    <form  method="post" class="form-signin" target="_self">
      <img src="assets/pokedex.png" class="mb-4" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please Sign in</h1>
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Username" name="username">
        <input type="password" class="form-control" placeholder="Password" name="password">
      </div>

      <input type="submit" class="btn btn-success btn-lg" value="Sign in" name="signin">
    </form>

    </div>


<!--     <div class="col-sm-2 sidenav">
      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div> -->

  </div>
</div>

<!-- <footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer> -->

</body>
</html>
