<?php include "includes/db.php"; ?>
<?php

function fetchCats(){
  global $connection;
  $arr = [];
  $query = "SELECT * FROM `categories`";
  $cursor = mysqli_query($connection, $query);
  while($row = mysqli_fetch_assoc($cursor)){
    array_push($arr, $row);
  };
  return $arr;
};

function addCat($title){
  if(!$title){
    return;
  };
  global $connection;
  $title = mysqli_real_escape_string($connection, $title);
  $query = "INSERT INTO `categories` (`cat_title`) VALUES ('$title')";
  mysqli_query($connection, $query);
};

function deleteCat($id){
  global $connection;
  $query = "DELETE FROM `categories` WHERE (`cat_id`={$id})";
  mysqli_query($connection, $query);
};