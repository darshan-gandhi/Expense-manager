<!DOCTYPE html>
<html>
  <head>
      <title>Travnal</title>
      <meta charset="utf-8"> 
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
      <link rel="stylesheet" href="./stylesheets/main.css">
      <link rel="stylesheet" href="./stylesheets/history.css">
  </head>
    <body>
        <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
                <a class="navbar-brand brand" href="#">MoneySplit</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">              
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="personal.php">Personal</a></li>
                <li><a href="groups.php">Groups</a></li>
                <li class="active"> <a href="#">History</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
            </div>
        </div>
        </nav>

        <div>
        <?php
        include_once("Database.class.php");
        include_once("Session.class.php");
        session_start();
          $connection;
          $res;
          global $database;
          $connection = $database->getConnection();
          $u_id = $_SESSION["user_id"];
          $sql = "SELECT amount, created_at FROM expense WHERE user_id = $u_id UNION SELECT amount, created_at FROM shares WHERE user_id = $u_id ORDER BY created_at";
          $res = $database->query($sql);
          if(mysqli_num_rows($res) > 0){
            while($row = mysqli_fetch_assoc($res)){?>
            <section class="timeline">
            <ul>
              <li>
                  <div>
                    <time>
                    <?php echo $row['created_at']?>
                      
                    </time> 
                    <b>
                    ₹ <?php echo $row['amount'] ?>
                    </b><br>
                  </div>
              </li>
            </ul>
          </section>
          <?php }
        }
        else{
          echo "No result";
        }
          ?>
      </div>
      <script type="text/javascript" src="./javascripts/history.js"></script>
    </body>
</html>