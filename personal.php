<?php
  if(isset($POST_["logout"])){
    // session_start();
    echo "hi";
    session_unset();
    session_destroy();
    header("Location: index.php");
  }
?>

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
      <script type="text/javascript" src="./javascripts/personal.js"></script>
      <link rel="stylesheet" href="./stylesheets/main.css">
      <link rel="stylesheet" href="./stylesheets/personal.css">
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
              <li class="active"><a href="personal.php">Personal</a></li>
              <li><a href="groups.php">Groups</a></li>
              <li><a href="history.php">History</a></li>
              <li><a href="logout.php">Log Out</a></li>
          </ul>
          </div>
      </div>
    </nav>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <?php
            include_once("Database.class.php");
            include_once("Session.class.php");
            session_start();
              $connection;
              $res;
              $i = 1;
              $sum = 0;
              global $database;
              $connection = $database->getConnection();
              $u_id = $_SESSION["user_id"];
              $sql = "SELECT amount, created_at, expense_id FROM expense WHERE user_id = $u_id";
              $res = $database->query($sql);
              if(mysqli_num_rows($res) > 0){
                while($row = mysqli_fetch_assoc($res)){ ?>
                  <div class="card card-default">
                    <div class="card-body">
                      <h5 class="lead">Expense <?php echo $i; $i++; ?></h5>
                      <h6 class="card-subtitle mb-2 text-muted"></h6>
                      <p class="card-text">
                        <p>Bill amount is ₹ <?php echo $row["amount"] ?></p>
                        <?php $sum += $row["amount"]; ?>
                        <p>Time: <?php echo $row["created_at"] ?></p><br>
                      </p>   
                    </div>
                  </div><br>
                <?php
                } ?>
                <div class="drag-text">
                <h2><p>Total amount you spend is ₹ <?php echo $sum; ?></p></h2>
                </div>
                <?php
              }
              else{
                echo "No result";
              }
          ?>
        <div class="drag-text">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
          Add another expense
          </button>
        </div>
      </div>
    </div>
    
    <div class="modal" id="myModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title">Add Another Expense</h1>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          
          <div class="modal-body">
            <form id="upload" method='POST' action='./processing.php' enctype="multipart/form-data">
              <div class="file-upload">
                <input type="file" placeholder="Upload Bill" class="form-control" name="attachment"  title="Upload Bill" required="required" aria-required="true">
                <div class="file-upload-content">
                  <img class="file-upload-image" src="#" alt="your image" />
                </div>
              </div>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name = "submit">Save changes</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
  </body>
</html>