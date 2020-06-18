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

function fetchPosts(){
  global $connection;
  $arr = [];
  $query = "SELECT * FROM `posts`";
  $cursor = mysqli_query($connection, $query);
  while($row = mysqli_fetch_assoc($cursor)){
    array_push($arr, $row);
  };
  return $arr;
};

function deletePost($id){
  global $connection;
  $query = "DELETE FROM `posts` WHERE (`id` = '$id')";
  mysqli_query($connection, $query);
};

function createPost($postData){
  global $connection;
  foreach($postData as $key => $value){
    $value = mysqli_real_escape_string($connection, $value);
    $$key = $value;
  };
  $date = date_create()->format("Y-m-d H:i:s");
  $url = $_ENV["Domain"] . 'data/images/' . $image;
  print_r($postData);
  $query = "INSERT INTO `posts` (`category`, `title`, `author`, `created_at`, `modified_at`, `content`, `image`, `tags`) VALUES ('$category', '$title', '$author', '$date', '$date', '$content', '$url', '$tags')";
  mysqli_query($connection, $query);
};

function fetchPost($id){
  global $connection;
  $id = mysqli_real_escape_string($connection, $id);
  $query = "SELECT * FROM `posts` WHERE (`id` = '$id')";
  $cursor = mysqli_query($connection, $query);
  $row = mysqli_fetch_assoc($cursor);
  return $row;
};

function editPost($postData){
  global $connection;
  foreach($postData as $key => $value){
    $value = mysqli_real_escape_string($connection, $value);
    $$key = $value;
  };
  $date = date_create()->format("Y-m-d H:i");
  if(!$image){
    $queryEdit = '';
  }else{
    $url = $_ENV["Domain"] . 'data/images/' . $image;
    $queryEdit = ", `image` = '$url'";
  };
  $query = "UPDATE `posts` SET `title` = '$title', `author` = '$author', `modified_at` = '$date', `content` = '$content', `tags` = '$tags' $queryEdit WHERE (`id` = $id)";
  mysqli_query($connection, $query);
};