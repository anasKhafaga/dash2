<?php include "includes/db.php"; ?>
<?php

function getCat() {
  global $connection;
  $query = "SELECT * FROM `categories`";
  $arr = [];
  $cursor = mysqli_query($connection, $query);
  while($row = mysqli_fetch_assoc($cursor)){
    array_push($arr, $row['cat_title']);
  };
  return $arr;
};