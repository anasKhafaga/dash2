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

function findPost($search) {
  $search = strtolower($search);
  global $connection;
  $cleanSearch = mysqli_real_escape_string($connection, $search);
  $tags = explode(" ", $cleanSearch);
  $arr = [];
  foreach($tags as $tag){
    $query = "SELECT * FROM `posts` WHERE `tags` LIKE '%{$tag}%'";  
    $cursor = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($cursor)){
      array_push($arr, $row);
    };
  };
  if(!$arr){
    return null;
  };
  return $arr;
};