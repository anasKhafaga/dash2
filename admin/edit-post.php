<?php include "includes/header.php"; ?>
<!-- Navigation -->
<?php include "includes/nav.php"; ?>

<?php
if (!$_GET["edit"]) {
  header("Location: all-posts.php");
};
$id = $_GET["edit"];
$post = fetchPost($id);

foreach ($post as $key => $value) {
  $$key = $value;
};
if (isset($_POST["submit"])) {
  echo $id;
  editPost($_POST);
  header("Location: all-posts.php");
};
?>

<div id="page-wrapper">

  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
          Edit a Post
        </h1>
        <div class="col-xs-8">
          <form action="edit-post.php" method="post" class="form">
            <input type="hidden" name="id" value='<?php print($id); ?>'>
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" name="title" class="form-control" value='<?php print($title); ?>'>
            </div>
            <div class="form-group">
              <label for="author">Author</label>
              <input type="text" name="author" class="form-control" value='<?php print($author); ?>'>
            </div>
            <div class="form-group">
              <label for="content">Content</label>
              <textarea name="content" id="" cols="30" rows="10" class="form-control"><?php print($content); ?></textarea>
            </div>
            <div class="form-group">
              <label for="tags">Tags</label>
              <input type="text" name="tags" class="form-control" value='<?php print($tags); ?>'>
            </div>
            <div class="form-group">
              <label for="image" class="form-label">Image</label>
              <input type="file" class="form-control" name="image">
            </div>
            <button name="submit" type="submit" class="btn btn-primary col-xs-3">
              Submit
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