<?php


include("..\\conn.php");

if (isset($_GET['b_id'])) {
    $id = $_GET['b_id'];
    $query = "delete  from book where id=? ";
    $s = $conn->prepare($query);
    $s->bind_param('i', $id);
    $s->execute();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Library Managments</title>
    <link rel="stylesheet" href="..//assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="..//assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="..//assets/css/style.css">
    <link rel="shortcut icon" href="..//assets/images/favicon.ico" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper">
            <div class="" style="width: 100%;">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="page-header">
                                        <h3 class="page-title"> <a href="./add.php" class="btn btn-primary">Add New</a> </h3>
                                        <nav aria-label="breadcrumb">
                                            <input type="text" name="" id="" class="form-control" placeholder="Search">
                                        </nav>
                                    </div>
                                    </p>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Autor</th>
                                                <th>Number of copies</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $query = "SELECT * FROM book  ";
                                            $s = $conn->prepare($query);
                                            $s->execute();
                                            $result = $s->get_result();
                                            while ($row = $result->fetch_assoc()) {
                                            ?>


                                                <tr>
                                                    <td><?php echo $row['id'] ?></td>
                                                    <td><?php echo $row['name'] ?></td>
                                                    <td><?php echo $row['author'] ?></td>
                                                    <td><?php echo $row['copies'] ?></td>

                                                    <td> <a href="off.php?b_id=<?php echo $row['id'] ?>" class="btn btn-success">Delete</a></td>
                                                    <td> <a href="edit.php?b_id=<?php echo $row['id'] ?>" class="btn btn-success">update</a></td>

                                                </tr>
                                            <?php  } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="..//assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="..//assets/js/off-canvas.js"></script>
    <script src="..//assets/js/hoverable-collapse.js"></script>
    <script src="..//assets/js/misc.js"></script>
</body>

</html>