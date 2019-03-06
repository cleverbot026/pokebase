<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
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


  </style>
</head>
<body>

<nav class="navbar navbar-light bg-light">
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
<!--         <li><a href="#">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li> -->
      </ul>
<!--       <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul> -->
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content text-center">

    <div class="col text-center"> 

      <?php 
  
        require_once('mysqli_connect.php');

        $query = "SELECT * FROM pokemon_info";
        $response = @mysqli_query($dbc,$query);

        if ($response) {

        echo '<table class="table table-success table-striped">
        <tr>
          <td>#</td>
          <td>Name</td>
          <td>Type</td>
          <td>Total</td>
          <td>HP</td>
          <td>Attack</td>
          <td>Defense</td>
          <td>Sp. Atk</td>
          <td>Sp. Def</td>
          <td>Speed</td>
        </tr>';

          while ($row = mysqli_fetch_array($response)) {

            echo'<tr>
                  <td><img src="assets\sprite\\'.$row['pokedex_number'].'.png" width="50" height="50">'.$row['pokedex_number'].'</td>
                  <td>'.$row['name'].'</td>
                  <td>'.$row['type1'].' '.$row['type2'].'</td>
                  <td>'.$row['base_total'].'</td>
                  <td>'.$row['hp'].'</td>
                  <td>'.$row['attack'].'</td>
                  <td>'.$row['defense'].'</td>
                  <td>'.$row['sp_attack'].'</td>
                  <td>'.$row['sp_defense'].'</td>
                  <td>'.$row['speed'].'</td>
                </tr>
                ';
          }

        } else {

          echo "Couldn't issue database query";
          echo mysqli_error($dbc);
        } 

       ?>

       </table>
    </div>


  </div>
</div>


</body>
</html>
