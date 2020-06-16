<?php include "includes/header.php"; ?>
<!-- Navigation -->
<?php include "includes/nav.php"; ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                Results
            </h1>

            <!-- Blog Post Blueprint -->
            <?php
              if (isset($_POST["search"]) && $_POST["search"]) {
                $searchPosts = findPost($_POST["search"]);
                
                if(!$searchPosts){
                  echo "<h2>No Result</h2>";
                }else{
                foreach($searchPosts as $post){
                    foreach($post as $key => $value){
                        $$key = $value;
                    };
                    echo "
                        <h2>
                            <a href='#'>{$title}</a>
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
                        <a class='btn btn-primary' href='#'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>

                        <hr>
                    ";
                  };
                };
              }else {
                header("Location: {$_ENV['Domain']}");
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