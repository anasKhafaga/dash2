<?php include "includes/header.php"; ?>
<!-- Navigation -->
<?php include "includes/nav.php"; ?>

<div id="page-wrapper">

  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
          Create Category
        </h1>
        <div class="col-xs-6">
        <?php
          if ($_POST && isset($_POST["title"])) {
            if (empty($_POST["title"])) {
              echo "<h6>This field shouldn't be empty</h6>";
            } else {
              addCat($_POST["title"]);
            };
          };
          if ($_POST && isset($_POST["remove"])) {
            deleteCat($_POST['id']);
          };
        ?>
          <form action="create-category.php" method="POST">
            <div class="form-group">
              <label for="title">Enter Category Name</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
              <button class="btn btn-primary" type="submit">Create</button>
            </div>
          </form>
        </div>

        <div class="col-xs-6">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Id</th>
                <th>Title</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $cats = fetchCats();
              foreach ($cats as $cat) {
                $cat_id = $cat['cat_id'];
                $cat_title = $cat['cat_title'];
                echo "
                    <tr>
                      <td>{$cat_id}</td>
                      <td>{$cat_title}</td>
                      <td>
                        <form action='create-category.php' method='POST'>
                          <input type='text' name='id' value=${cat_id} hidden>
                          <button class='btn btn-danger' name='remove' type='submit'>Remove</button>
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