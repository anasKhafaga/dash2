<?php include "includes/header.php"; ?>
<!-- Navigation -->
<?php include "includes/nav.php"; ?>

<?php 
  if(!$_GET["category"]){
    header("Location: index.php");
  };
  $posts = catPosts($_GET["category"]);
  if(!$posts){
    header("Location: index.php");
  };
?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                <?php print($_GET["category"]); ?>
            </h1>

            <!-- Blog Post Blueprint -->
            <?php
                foreach($posts as $post){
                    foreach($post as $key => $value){
                        $$key = $value;
                    };
                    $content = substr($content, 0, 150) . '...';
                    echo "
                        <h2>
                            <a href='/dash/post.php?id=$id'>{$title}</a>
                        </h2>
                        <p class='lead'>
                            by <a href='index.php'>{$author}</a>
                        </p>
                        <p><span class='glyphicon glyphicon-time'></span> Posted on {$created_at}</p>
                        <p><span class='glyphicon glyphicon-time'></span> Last update {$modified_at}</p>
                        <hr>
                        <img class='img-responsive' src={$image} alt=''>
                        <hr>
                        <p>{$content}</p>
                        <a class='btn btn-primary' href='/dash/post.php?id=$id'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>

                        <hr>
                    ";
                };
                
            ?>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php"; ?>

    </div>
    <!-- /.row -->

    <hr>
<!-- Footer -->
<?php include "includes/footer.php"; ?>