<?php include "includes/header.php"; ?>
<!-- Navigation -->
<?php include "includes/nav.php"; ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                Timeline
            </h1>

            <!-- First Blog Post -->
            <?php

                $posts = getPosts();
                foreach($posts as $post){
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
                
            ?>

            <!-- Second Blog Post -->
            <!-- <h2>
                <a href="#">Blog Post Title</a>
            </h2>
            <p class="lead">
                by <a href="index.php">Start Bootstrap</a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:45 PM</p>
            <hr>
            <img class="img-responsive" src="http://placehold.it/900x300" alt="">
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, quasi, fugiat, asperiores harum voluptatum tenetur a possimus nesciunt quod accusamus saepe tempora ipsam distinctio minima dolorum perferendis labore impedit voluptates!</p>
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php"; ?>

    </div>
    <!-- /.row -->

    <hr>
<!-- Footer -->
<?php include "includes/footer.php"; ?>