<?php
include("../conn.php");

$name = "";
$author = "";
$copies = "";

$name_error = "";
$author_error = "";
$copies_error = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['add'])) {
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
            $query = "INSERT INTO book (name , author,copies) VALUES ('$name ',' $author ',' $copies')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                //echo "goood";
            } else {
                echo "faild";
            }

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
    <link rel="stylesheet" href="..//assets//vendors//css//vendor.bundle.base.css">
    <link rel="stylesheet" href="..//assets//vendors//css//vendor.bundle.base.css">
    <link rel="stylesheet" href="..//assets//css//style.css">
    <link rel="shortcut icon" href="..//assets//images//favicon.ico" />
    <style>
        .error {
            color: red;
        }
    </style>
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
                                    <h4 class="card-title">Add New Book </h4>
                                    <form class="forms-sample" method="POST">
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


                                        <input type="submit" value="Add" class="btn btn-gradient-primary me-2" name="add">
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
    <script src="../assets//vendors//js//vendor.bundle.base.js"></script>
    <script src="..//assets//js//off-canvas.js"></script>
    <script src="..//assets//js//hoverable-collapse.js"></script>
    <script src="..//assets//js//misc.js"></script>
</body>

</html>