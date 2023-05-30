<?php
include("../conn.php");


$id = "";
$name = "";
$author = "";
$copies = "";
if (isset($_GET['b_id'])) {
  $id = $_GET['b_id'];
  $query = "select * from book where id=? ";
  $s = $conn->prepare($query);
  $s->bind_param('i', $id);
  $s->execute();
  $result = $s->get_result();
  while ($row = $result->fetch_assoc()) {
    $name = $row['name'];
    $author =  $row['author'];
    $copies =  $row['copies'];
  }
}
//-------------------------------------------------------------------


$name_error = "";
$author_error = "";
$copies_error = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (isset($_POST['Update'])) {
    $name = $_POST['name'];
    $author =  $_POST['author'];
    $copies =  $_POST['copies'];
    $success = true;
    if (empty($name)) {
      $name_error = "name is requird !!";
      $success = false;
    }
    if (empty($author)) {
      $author_error = "author is requird !!";
      $success = false;
    }

    if (empty($copies)) {
      $copies_error = "copies is requird !!";
      $success = false;
    }

    if ($success) {
      $query = "update  book set name=?,author=?,copies=? whereid=? ";
      $st = $conn->prepare($query);
      $st->bind_param("sssiii", $name, $author, $copies);
      $st->execute();
      $name = "";
      $author = "";
      $copies = "";
    }
  }
}





?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Library Managments</title>
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="shortcut icon" href="assets/images/favicon.ico" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
      <div class="" style="width: 100%;">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-4 grid-margin stretch-card"> </div>
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update New Book </h4>
                  <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label>name</label>
                      <input type="text" class="form-control" placeholder="Book name" name="name" value="<?php echo $name ?>">
                      <p class="error"><?php echo $name_error; ?></p>
                    </div>
                    <div class="form-group">
                      <label>Author</label>
                      <input type="text" class="form-control" placeholder="Book author" name="author" value="<?php echo $author ?>">
                      <p class="error"><?php echo $author_error; ?></p>

                    </div>

                    <div class="form-group">
                      <label>Number of copies</label>
                      <input type="number" class="form-control" placeholder="Book copies" name="copies" value="<?php echo $copies ?>">
                      <p class="error"><?php echo $copies_error; ?></p>

                    </div>

                    <input type="submit" value="Update" class="btn btn-gradient-success me-2" name="Update">
                    <a href="off.php" class="btn btn-light">Cancel</a>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card"> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
</body>

</html>