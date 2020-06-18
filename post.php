<?php include "includes/header.php"; ?>
<!-- Navigation -->
<?php include "includes/nav.php"; ?>

<?php
if (!$_GET["id"]) {
    header("Location: index.php");
};
$post = getPost($_GET["id"]);
if (!$post) {
    header("Location: index.php");
};
?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <!-- Blog Post Blueprint -->
            <?php
                foreach ($post as $key => $value) {
                    $$key = $value;
                };
                echo "
                        <h2>
                            <a href=''>{$title}</a>
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

                        <hr>
                    ";

            ?>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php"; ?>

    </div>
    <!-- /.row -->

    <hr>
    <!-- Footer -->
    <?php include "includes/footer.php"; ?>