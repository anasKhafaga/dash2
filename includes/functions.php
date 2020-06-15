<?php include "includes/db.php"; ?>
<?php

function getCat() {
  global $connection;
  $query = "SELECT * FROM `categories`";
  $cursor = mysqli_query($connection, $query);
  $arr = [];
  while($row = mysqli_fetch_assoc($cursor)){
    array_push($arr, $row['cat_title']);
  };
  return $arr;
};

function getPosts() {
  global $connection;
  $query = "SELECT * FROM `posts`";
  $cursor = mysqli_query($connection, $query);
  $arr = [];
  while($row = mysqli_fetch_assoc($cursor)){
    array_push($arr, $row);
  };
  return $arr;
};