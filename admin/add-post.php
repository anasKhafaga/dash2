<?php include "includes/header.php"; ?>
<!-- Navigation -->
<?php include "includes/nav.php"; ?>

<?php
if (isset($_POST["submit"])) {
  createPost($_POST);
  header("Location: all-posts.php");
};
?>

<div id="page-wrapper">

  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
          Create a Post
        </h1>
        <div class="col-xs-8">
          <form action="add-post.php" method="post" class="form">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
              <label for="author">Author</label>
              <input type="text" name="author" class="form-control">
            </div>
            <div class="form-group">
              <label for="content">Content</label>
              <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label for="category">Category</label>
              <select name="category" class="form-control">
                <?php
                  $cats = fetchCats();
                  print_r($cats);
                  foreach($cats as $cat){
                    $cat_title = $cat["cat_title"];
                    echo "
                    <option value='$cat_title'>{$cat_title}</option>
                    ";
                  };
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="tags">Tags</label>
              <input type="text" name="tags" class="form-control">
            </div>
            <div class="form-group">
              <label for="image" class="form-label">Image</label>
              <input type="file" name="image" class="form-control">
            </div>
            <button name="submit" type="submit" class="btn btn-primary col-xs-3">
              Create
            </button>
          </form>
        </div>
      </div>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
<?php include "includes/footer.php"; ?>