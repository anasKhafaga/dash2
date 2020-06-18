<?php include "includes/header.php"; ?>
<!-- Navigation -->
<?php include "includes/nav.php"; ?>

<div id="page-wrapper">

  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
          All Posts
        </h1>
        <div class="col-xs-12">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Id</th>
                <th>Category</th>
                <th>title</th>
                <th>author</th>
                <th>Created at</th>
                <th>Modified at</th>
                <th>Image</th>
                <th>Comments</th>
                <th>Tags</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (isset($_POST["remove"])) {
                deletePost($_POST["remove"]);
              };
              if (isset($_POST["edit"])){
                $id = $_POST["edit"];
                header("Location: edit-post.php?edit=$id");
              };
              $posts = fetchPosts();
              foreach ($posts as $post) {
                foreach ($post as $key => $value) {
                  $$key = $value;
                };
                echo "
                    <tr>
                      <td>{$id}</td>
                      <td>{$category}</td>
                      <td>{$title}</td>
                      <td>{$author}</td>
                      <td>{$created_at}</td>
                      <td>{$modified_at}</td>
                      <td>{$image}</td>
                      <td>{$comments}</td>
                      <td>{$tags}</td>
                      <td>
                        <form action='all-posts.php' method='post'>
                          <button type='submit' name='edit' class='btn btn-success' value={$id}>
                            !
                          </button>
                        </form>
                      </td>
                      <td>
                        <form action='all-posts.php' method='post'>
                          <button type='submit' name='remove' class='btn btn-danger' value={$id}>
                            X
                          </button>
                        </form>
                      </td>
                    </tr>
                  ";
              };
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
<?php include "includes/footer.php"; ?>