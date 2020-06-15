<?php include "env.php"; ?>
<?php
  $connection = mysqli_connect($_ENV["dbHost"], $_ENV["dbUser"], $_ENV["dbPass"], $_ENV["dbName"]);
  if(!$connection){
    die("Oops! something went worng");
  };